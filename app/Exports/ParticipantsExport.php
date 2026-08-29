<?php

namespace App\Exports;

use App\Models\Registration;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;

class ParticipantsExport implements FromCollection, WithHeadings, WithMapping, WithTitle, ShouldAutoSize, WithStyles
{
    protected $filters;

    public function __construct(array $filters = [])
    {
        $this->filters = $filters;
    }

    public function collection()
    {
        return Registration::with('user', 'seminar')
            ->when(!empty($this->filters['seminar_id']), fn ($q) => $q->where('seminar_id', $this->filters['seminar_id']))
            ->when(!empty($this->filters['status']), fn ($q) => $q->where('status', $this->filters['status']))
            ->when(!empty($this->filters['name']), function ($q) {
                $q->whereHas('user', function ($u) {
                    $u->where('first_name', 'like', '%' . $this->filters['name'] . '%')
                      ->orWhere('last_name', 'like', '%' . $this->filters['name'] . '%');
                });
            })
            ->when(!empty($this->filters['email']), function ($q) {
                $q->whereHas('user', function ($u) {
                    $u->where('email', 'like', '%' . $this->filters['email'] . '%');
                });
            })
            ->latest('registered_at')
            ->get();
    }

    public function headings(): array
    {
        return [
            'Nom',
            'Prénom',
            'Email',
            'Téléphone',
            'Institution',
            'Séminaire',
            'Statut',
            'Date d\'inscription'
        ];
    }

    public function map($registration): array
    {
        return [
            $registration->user->last_name ?? '',
            $registration->user->first_name ?? '',
            $registration->user->email ?? '',
            $registration->user->phone ?? '-',
            $registration->user->institution ?? '-',
            $registration->seminar->theme ?? '-',
            ucfirst($registration->status ?? ''),
            $registration->registered_at ? $registration->registered_at->format('d/m/Y H:i') : '-',
        ];
    }

    public function title(): string
    {
        return 'Participants CAEI';
    }

    public function styles(Worksheet $sheet)
    {
        // En-tête (Ligne 1) : Fond bleu marine CAEI (#061743), Texte blanc gras, centré verticalement
        $sheet->getStyle('A1:H1')->applyFromArray([
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
                'size' => 11,
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '061743'],
            ],
            'alignment' => [
                'vertical' => Alignment::VERTICAL_CENTER,
            ],
        ]);

        // Hauteur de la ligne d'en-tête
        $sheet->getRowDimension(1)->setRowHeight(26);

        // Bordures fines et alignement sur l'ensemble du tableau
        $highestRow = $sheet->getHighestRow();
        if ($highestRow > 1) {
            $sheet->getStyle("A1:H{$highestRow}")->applyFromArray([
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['rgb' => 'CBD5E1'],
                    ],
                ],
            ]);

            // Alignement centré pour Statut (G) et Date d'inscription (H)
            $sheet->getStyle("G2:H{$highestRow}")->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        }

        return [];
    }
}
