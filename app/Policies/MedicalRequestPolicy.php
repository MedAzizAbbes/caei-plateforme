<?php

namespace App\Policies;

use App\Models\User;
use App\Models\MedicalRequest;
use Illuminate\Auth\Access\HandlesAuthorization;

class MedicalRequestPolicy
{
    use HandlesAuthorization;

    /**
     * L'administrateur a un accès global à toutes les demandes médicales.
     */
    public function before(User $user, string $ability): ?bool
    {
        if ($user->isAdmin()) {
            return true;
        }

        return null;
    }

    /**
     * Détermine si une clinique partenaire peut voir une demande médicale.
     */
    public function view(User $user, MedicalRequest $medicalRequest): bool
    {
        if (!$user->isClinic()) {
            return false;
        }

        $clinicPartner = $user->clinicPartner;
        if (!$clinicPartner) {
            return false;
        }

        return (int) $medicalRequest->partner_clinic_id === (int) $clinicPartner->id;
    }

    /**
     * Détermine si la clinique peut envoyer ou modifier un devis pour cette demande.
     */
    public function sendDevis(User $user, MedicalRequest $medicalRequest): bool
    {
        return $this->view($user, $medicalRequest);
    }
}
