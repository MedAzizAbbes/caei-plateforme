<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;
use App\Models\Seminar;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\StreamedResponse;

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
    public function download(Request $request, Seminar $seminar, int $documentId): StreamedResponse
    {
        $this->authorizeAccess($request, $seminar);

        $document = $seminar->documents()->findOrFail($documentId);

        return response()->streamDownload(function () use ($document) {
            echo file_get_contents(storage_path('app/' . $document->file_path));
        }, $document->title);
    }

    private function authorizeAccess(Request $request, Seminar $seminar): void
    {
        $isRegistered = $request->user()
            ->registrations()
            ->where('seminar_id', $seminar->id)
            ->exists();

        abort_unless($isRegistered, 403, "Vous n'êtes pas inscrit à ce séminaire.");
    }
}
