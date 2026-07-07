<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;
use App\Models\Seminar;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class FormationController extends Controller
{
    /** Écran 04 — supports classés par jour, pour un séminaire auquel l'utilisateur est inscrit. */
    public function index(Request $request, Seminar $seminar)
    {
        $this->authorizeAccess($request, $seminar);

        $documentsByDay = $seminar->documents()
            ->orderBy('day_number')
            ->get()
            ->groupBy('day_number');

        return view('participant.formation', compact('seminar', 'documentsByDay'));
    }

    /** Téléchargement / lecture en ligne d'un support (accès restreint aux inscrits). */
    public function preview(Request $request, Seminar $seminar, int $documentId): View
    {
        $this->authorizeAccess($request, $seminar);

        $document = $seminar->documents()->findOrFail($documentId);

        if (!$document->file_path || !Storage::exists($document->file_path)) {
            abort(404, 'Le fichier n\'a pas ete trouve sur le serveur.');
        }

        $extension = $document->getFileExtension();
        $filePath = Storage::path($document->file_path);
        $streamUrl = route('participant.formation.download', [
            'seminar' => $seminar,
            'documentId' => $document->id,
            'preview' => 1,
        ]);

        $preview = match (true) {
            $extension === 'pdf' => [
                'mode' => 'frame',
                'url' => $streamUrl,
            ],
            in_array($extension, ['mp4', 'mov', 'webm'], true) => [
                'mode' => 'video',
                'url' => $streamUrl,
                'mime' => $this->videoMimeType($extension),
            ],
            $extension === 'csv' => [
                'mode' => 'table',
                'rows' => $this->readCsvRows($filePath),
            ],
            $extension === 'xlsx' => [
                'mode' => 'table',
                'rows' => $this->readXlsxRows($filePath),
            ],
            $extension === 'docx' => [
                'mode' => 'text',
                'content' => $this->readDocxText($filePath),
            ],
            in_array($extension, ['pptx', 'ppsx'], true) => [
                'mode' => 'slides',
                'slides' => $this->readPptxSlides($filePath),
            ],
            default => [
                'mode' => 'unsupported',
                'message' => 'Apercu non disponible pour ce type de fichier dans le navigateur.',
            ],
        };

        return view('participant.document-preview', compact('document', 'extension', 'preview'));
    }

    public function download(Request $request, Seminar $seminar, int $documentId): Response
    {
        $this->authorizeAccess($request, $seminar);

        $document = $seminar->documents()->findOrFail($documentId);

        if (!$document->file_path) {
            abort(404, 'Le fichier du document n\'existe pas.');
        }

        if (!Storage::exists($document->file_path)) {
            abort(404, 'Le fichier n\'a pas été trouvé sur le serveur.');
        }

        $fileName = $this->downloadFileName($document);

        if ($request->boolean('preview')) {
            return Storage::response($document->file_path, $fileName, [], 'inline');
        }

        return Storage::download($document->file_path, $fileName);
    }

    private function authorizeAccess(Request $request, Seminar $seminar): void
    {
        $user = $request->user();

        if ($user?->isAdmin()) {
            return;
        }

        $isAssignedTrainer = $user?->isFormateur()
            && $seminar->trainers()->whereKey($user->id)->exists();

        if ($isAssignedTrainer) {
            return;
        }

        $isRegistered = $user
            ->registrations()
            ->where('seminar_id', $seminar->id)
            ->exists();

        abort_unless($isRegistered, 403, "Vous n'êtes pas inscrit à ce séminaire.");
    }

    private function downloadFileName(\App\Models\Document $document): string
    {
        $title = $document->title;
        $extension = $document->getFileExtension();

        if ($extension && strtolower(pathinfo($title, PATHINFO_EXTENSION)) !== $extension) {
            return $title . '.' . $extension;
        }

        return $title;
    }

    private function videoMimeType(string $extension): string
    {
        return match ($extension) {
            'mov' => 'video/quicktime',
            'webm' => 'video/webm',
            default => 'video/mp4',
        };
    }

    private function readCsvRows(string $filePath): array
    {
        $rows = [];
        $handle = fopen($filePath, 'rb');

        if (!$handle) {
            return $rows;
        }

        while (($row = fgetcsv($handle, 0, ';')) !== false && count($rows) < 80) {
            if (count($row) === 1 && str_contains($row[0] ?? '', ',')) {
                $row = str_getcsv($row[0], ',');
            }

            $rows[] = array_slice($row, 0, 16);
        }

        fclose($handle);

        return $rows;
    }

    private function readDocxText(string $filePath): string
    {
        $documentXml = $this->zipEntry($filePath, 'word/document.xml');

        if (!$documentXml) {
            return '';
        }

        preg_match_all('/<w:t\b[^>]*>(.*?)<\/w:t>/s', $documentXml, $matches);

        return trim(html_entity_decode(implode(' ', $matches[1] ?? []), ENT_QUOTES | ENT_XML1, 'UTF-8'));
    }

    private function readPptxSlides(string $filePath): array
    {
        $slides = [];
        $entries = $this->zipEntries($filePath, '/^ppt\/slides\/slide\d+\.xml$/');

        uksort($entries, 'strnatcasecmp');

        foreach ($entries as $xml) {
            // Parse paragraph by paragraph (<a:p>).
            // Within each paragraph, concatenate all text runs (<a:t>) inline.
            // Separate paragraphs with a newline.
            preg_match_all('/<a:p\b[^>]*>(.*?)<\/a:p>/s', $xml, $paragraphMatches);

            $paragraphLines = [];
            foreach ($paragraphMatches[1] ?? [] as $paragraphXml) {
                preg_match_all('/<a:t\b[^>]*>(.*?)<\/a:t>/s', $paragraphXml, $runMatches);
                $line = implode('', $runMatches[1] ?? []);
                $line = html_entity_decode($line, ENT_QUOTES | ENT_XML1, 'UTF-8');
                $paragraphLines[] = $line;
            }

            // Join paragraphs with newlines; collapse 3+ consecutive blank lines to 2.
            $text = implode("\n", $paragraphLines);
            $text = preg_replace('/\n{3,}/', "\n\n", $text);
            $text = trim($text);

            if ($text !== '') {
                $slides[] = [
                    'title' => 'Diapositive ' . (count($slides) + 1),
                    'text'  => $text,
                ];
            }

            if (count($slides) >= 40) {
                break;
            }
        }

        return $slides;
    }

    private function readXlsxRows(string $filePath): array
    {
        $entries = $this->zipEntries($filePath, '/^(xl\/sharedStrings\.xml|xl\/worksheets\/sheet1\.xml)$/');
        $sharedStrings = [];

        if (!empty($entries['xl/sharedStrings.xml'])) {
            preg_match_all('/<si\b[^>]*>(.*?)<\/si>/s', $entries['xl/sharedStrings.xml'], $items);

            foreach ($items[1] ?? [] as $itemXml) {
                preg_match_all('/<t\b[^>]*>(.*?)<\/t>/s', $itemXml, $texts);
                $sharedStrings[] = html_entity_decode(implode('', $texts[1] ?? []), ENT_QUOTES | ENT_XML1, 'UTF-8');
            }
        }

        $sheetXml = $entries['xl/worksheets/sheet1.xml'] ?? '';

        if ($sheetXml === '') {
            return [];
        }

        $rows = [];
        preg_match_all('/<row\b[^>]*>(.*?)<\/row>/s', $sheetXml, $rowMatches);

        foreach ($rowMatches[1] ?? [] as $rowXml) {
            $row = [];
            preg_match_all('/<c\b([^>]*)>(.*?)<\/c>/s', $rowXml, $cellMatches, PREG_SET_ORDER);

            foreach ($cellMatches as $cellMatch) {
                $attributes = $cellMatch[1] ?? '';
                $cellXml = $cellMatch[2] ?? '';
                $value = '';

                if (str_contains($attributes, 't="s"') && preg_match('/<v>(.*?)<\/v>/s', $cellXml, $valueMatch)) {
                    $value = $sharedStrings[(int) $valueMatch[1]] ?? '';
                } elseif (preg_match('/<t\b[^>]*>(.*?)<\/t>/s', $cellXml, $textMatch)) {
                    $value = $textMatch[1];
                } elseif (preg_match('/<v>(.*?)<\/v>/s', $cellXml, $valueMatch)) {
                    $value = $valueMatch[1];
                }

                $row[] = html_entity_decode($value, ENT_QUOTES | ENT_XML1, 'UTF-8');

                if (count($row) >= 16) {
                    break;
                }
            }

            if ($row !== []) {
                $rows[] = $row;
            }

            if (count($rows) >= 80) {
                break;
            }
        }

        return $rows;
    }

    private function zipEntry(string $filePath, string $entryName): ?string
    {
        $entries = $this->zipEntries($filePath, '/^' . preg_quote($entryName, '/') . '$/');

        return $entries[$entryName] ?? null;
    }

    private function zipEntries(string $filePath, string $namePattern): array
    {
        $data = @file_get_contents($filePath);

        if ($data === false) {
            return [];
        }

        $entries = [];
        $eocdPosition = strrpos($data, "PK\x05\x06");

        if ($eocdPosition === false) {
            return [];
        }

        $centralDirectorySize = $this->unsignedLong($data, $eocdPosition + 12);
        $centralDirectoryOffset = $this->unsignedLong($data, $eocdPosition + 16);
        $position = $centralDirectoryOffset;
        $end = $centralDirectoryOffset + $centralDirectorySize;

        while ($position < $end && substr($data, $position, 4) === "PK\x01\x02") {
            $method = $this->unsignedShort($data, $position + 10);
            $compressedSize = $this->unsignedLong($data, $position + 20);
            $nameLength = $this->unsignedShort($data, $position + 28);
            $extraLength = $this->unsignedShort($data, $position + 30);
            $commentLength = $this->unsignedShort($data, $position + 32);
            $localHeaderOffset = $this->unsignedLong($data, $position + 42);
            $name = substr($data, $position + 46, $nameLength);

            if (preg_match($namePattern, $name)) {
                $localNameLength = $this->unsignedShort($data, $localHeaderOffset + 26);
                $localExtraLength = $this->unsignedShort($data, $localHeaderOffset + 28);
                $contentOffset = $localHeaderOffset + 30 + $localNameLength + $localExtraLength;
                $compressed = substr($data, $contentOffset, $compressedSize);

                $content = match ($method) {
                    0 => $compressed,
                    8 => @gzinflate($compressed) ?: '',
                    default => '',
                };

                if ($content !== '') {
                    $entries[$name] = $content;
                }
            }

            $position += 46 + $nameLength + $extraLength + $commentLength;
        }

        return $entries;
    }

    private function unsignedShort(string $data, int $offset): int
    {
        $value = unpack('v', substr($data, $offset, 2));

        return $value[1] ?? 0;
    }

    private function unsignedLong(string $data, int $offset): int
    {
        $value = unpack('V', substr($data, $offset, 4));

        return $value[1] ?? 0;
    }
}
