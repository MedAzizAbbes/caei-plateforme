<?php

namespace App\Notifications;

use App\Models\MedicalRequest;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class MedicalPatientAssignedNotification extends Notification
{
    use Queueable;

    public MedicalRequest $medicalRequest;

    public function __construct(MedicalRequest $medicalRequest)
    {
        $this->medicalRequest = $medicalRequest;
    }

    /**
     * Canal de notification : stocké en base de données
     */
    public function via($notifiable): array
    {
        return ['database'];
    }

    /**
     * Données enregistrées dans la table notifications
     */
    public function toArray($notifiable): array
    {
        return [
            'medical_request_id' => $this->medicalRequest->id,
            'fullname'           => $this->medicalRequest->fullname,
            'service_type'       => $this->medicalRequest->service_type,
            'country'            => $this->medicalRequest->country,
            'preferred_date'     => $this->medicalRequest->preferred_date ? $this->medicalRequest->preferred_date->format('d/m/Y') : null,
            'title'              => "🏥 Nouveau dossier patient reçu",
            'message'            => "Le patient {$this->medicalRequest->fullname} ({$this->medicalRequest->service_type} - {$this->medicalRequest->country}) vous a été affecté par l'Administration CAEI.",
            'url'                => route('clinic.patients.show', $this->medicalRequest->id),
            'type'               => 'new_patient_assignment',
        ];
    }
}
