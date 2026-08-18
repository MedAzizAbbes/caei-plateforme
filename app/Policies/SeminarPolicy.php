<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Seminar;
use Illuminate\Auth\Access\HandlesAuthorization;

class SeminarPolicy
{
    use HandlesAuthorization;

    /**
     * L'administrateur a un accès global à tous les séminaires.
     */
    public function before(User $user, string $ability): ?bool
    {
        if ($user->isAdmin()) {
            return true;
        }

        return null;
    }

    /**
     * Détermine si l'utilisateur peut voir les détails du séminaire.
     */
    public function view(User $user, Seminar $seminar): bool
    {
        if ($seminar->status === 'published') {
            return true;
        }

        // Formateur affecté
        if ($user->isFormateur() && $seminar->trainers()->where('user_id', $user->id)->exists()) {
            return true;
        }

        // Participant inscrit
        if ($user->isParticipant() && $seminar->registrations()->where('user_id', $user->id)->exists()) {
            return true;
        }

        return false;
    }

    /**
     * Détermine si l'utilisateur peut gérer les contenus (documents) d'un séminaire.
     */
    public function manageContent(User $user, Seminar $seminar): bool
    {
        return $user->isFormateur() && $seminar->trainers()->where('user_id', $user->id)->exists();
    }
}
