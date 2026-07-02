<?php

namespace App\Http\Controllers;

use App\Models\QrCode;
use Illuminate\Support\Facades\Auth;

class PortalController extends Controller
{
    /**
     * Accès rapide à l'espace participant via le lien sécurisé
     * (scanné le jour du séminaire ou reçu par email). Connecte
     * automatiquement le participant puis redirige vers son tableau de bord.
     */
    public function show(string $token)
    {
        $qrCode = QrCode::where('secure_token', $token)->firstOrFail();

        Auth::login($qrCode->registration->user);

        return redirect()->route('participant.dashboard');
    }
}
