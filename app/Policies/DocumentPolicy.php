<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Document;
use Illuminate\Auth\Access\HandlesAuthorization;

class DocumentPolicy
{
    use HandlesAuthorization;

    /**
     * L'administrateur a un accès global à tous les documents.
     */
    public function before(User $user, string $ability): ?bool
    {
        if ($user->isAdmin()) {
            return true;
        }

        return null;
    }

    /**
     * Détermine si l'utilisateur peut télécharger/prévisualiser ce document pédagogique.
     */
    public function download(User $user, Document $document): bool
    {
        $seminar = $document->seminar;
        if (!$seminar) {
            return false;
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
}
