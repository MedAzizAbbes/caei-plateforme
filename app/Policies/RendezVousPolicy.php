<?php

namespace App\Policies;

use App\Models\User;
use App\Models\RendezVous;
use Illuminate\Auth\Access\HandlesAuthorization;

class RendezVousPolicy
{
    use HandlesAuthorization;

    /**
     * L'administrateur a un accès global à tous les rendez-vous.
     */
    public function before(User $user, string $ability): ?bool
    {
        if ($user->isAdmin()) {
            return true;
        }

        return null;
    }

    /**
     * Détermine si l'utilisateur peut voir la fiche d'un rendez-vous.
     */
    public function view(User $user, RendezVous $rendezVous): bool
    {
        return $rendezVous->agent_id === $user->id || $rendezVous->partenaire_id === $user->id;
    }

    /**
     * Détermine si le partenaire peut qualifier ce rendez-vous.
     */
    public function qualify(User $user, RendezVous $rendezVous): bool
    {
        return $user->isCallCenterPartenaire() && $rendezVous->partenaire_id === $user->id;
    }

    /**
     * Détermine si l'utilisateur peut exporter l'agenda .ics.
     */
    public function exportIcs(User $user, RendezVous $rendezVous): bool
    {
        return $rendezVous->agent_id === $user->id || $rendezVous->partenaire_id === $user->id;
    }
}
