<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Payment;
use Illuminate\Auth\Access\HandlesAuthorization;

class PaymentPolicy
{
    use HandlesAuthorization;

    /**
     * L'administrateur a un accès global à tous les paiements.
     */
    public function before(User $user, string $ability): ?bool
    {
        if ($user->isAdmin()) {
            return true;
        }

        return null;
    }

    /**
     * Détermine si le participant peut consulter ce paiement.
     */
    public function view(User $user, Payment $payment): bool
    {
        return (int) $payment->user_id === (int) $user->id;
    }

    /**
     * Détermine si le participant peut soumettre un justificatif pour ce paiement.
     */
    public function uploadProof(User $user, Payment $payment): bool
    {
        return (int) $payment->user_id === (int) $user->id;
    }
}
