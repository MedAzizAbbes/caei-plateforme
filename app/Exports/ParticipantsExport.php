<?php

namespace App\Exports;

use App\Models\Registration;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ParticipantsExport
{
    protected $filters;

    public function __construct(array $filters = [])
    {
        $this->filters = $filters;
    }

    public function download(string $filename): StreamedResponse
    {
        $registrations = Registration::with('user', 'seminar')
            ->when(!empty($this->filters['seminar_id']), fn ($q) => $q->where('seminar_id', $this->filters['seminar_id']))
            ->when(!empty($this->filters['status']), fn ($q) => $q->where('status', $this->filters['status']))
            ->get();

        $headers = [
            'Content-Type' => 'text/csv; charset=UTF-8',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
        ];

        $callback = function () use ($registrations) {
            $file = fopen('php://output', 'w');
            
            // En-têtes
            fputcsv($file, ['Nom', 'Email', 'Téléphone', 'Institution', 'Séminaire', 'Statut', 'Inscrit le'], ';');
            
            // Données
            foreach ($registrations as $registration) {
                fputcsv($file, [
                    $registration->user->first_name . ' ' . $registration->user->last_name,
                    $registration->user->email,
                    $registration->user->phone ?? '-',
                    $registration->user->institution ?? '-',
                    $registration->seminar->theme,
                    ucfirst($registration->status),
                    $registration->registered_at->format('d/m/Y'),
                ], ';');
            }
            
            fclose($file);
        };

        return new StreamedResponse($callback, 200, $headers);
    }
}
