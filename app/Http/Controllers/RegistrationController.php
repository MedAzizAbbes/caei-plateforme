<?php

namespace App\Http\Controllers;

use App\Mail\RegistrationQrCodeMail;
use App\Models\QrCode;
use App\Models\Registration;
use App\Models\Seminar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class RegistrationController extends Controller
{
    /**
     * Formulaire d'inscription à un séminaire (utilisateur connecté requis).
     * Supporte ?seminar_id=X pour présélectionner un séminaire.
     */
    public function create(Request $request)
    {
        $seminars = Seminar::where('status', 'published')
            ->orderBy('start_date')
            ->get(['id', 'theme', 'country', 'start_date', 'end_date']);

        $selectedSeminarId = $request->query('seminar_id');

        return view('registration.create', compact('seminars', 'selectedSeminarId'));
    }

    /**
     * Traite l'inscription : crée l'inscription pour l'utilisateur connecté,
     * génère le QR code et envoie l'email de confirmation.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'seminar_id' => ['required', 'exists:seminars,id'],
        ]);

        $user = Auth::user();

        $registration = DB::transaction(function () use ($data, $user) {
            $registration = Registration::firstOrCreate([
                'user_id'    => $user->id,
                'seminar_id' => $data['seminar_id'],
            ], [
                'status'        => 'inscrit',
                'registered_at' => now(),
            ]);

            return $registration;
        });

        $registration->load('user', 'seminar', 'qrCode');

        // Le QR Code et l'email seront générés/envoyés après validation du paiement par l'administrateur.

        return redirect()->route('registration.confirmation', $registration);
    }

    /** Confirmation d'inscription + affichage du QR code. */
    public function confirmation(Registration $registration)
    {
        // Vérifier que l'inscription appartient à l'utilisateur connecté
        if ($registration->user_id !== Auth::id()) {
            abort(403);
        }

        $registration->load('user', 'seminar', 'qrCode');

        return view('registration.confirmation', compact('registration'));
    }
}
