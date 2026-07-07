<?php

namespace App\Http\Controllers;

use App\Mail\RegistrationQrCodeMail;
use App\Models\QrCode;
use App\Models\Registration;
use App\Models\Seminar;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class RegistrationController extends Controller
{
    /** Écran 01 — formulaire d'inscription public. */
    public function create()
    {
        $seminars = Seminar::where('status', 'published')
            ->orderBy('start_date')
            ->get(['id', 'theme', 'country', 'start_date', 'end_date']);

        return view('registration.create', compact('seminars'));
    }

    /**
     * Traite le formulaire : crée (ou réutilise) le compte participant,
     * crée l'inscription, génère le QR code. Écran 02 = résultat.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name'  => ['required', 'string', 'max:100'],
            'last_name'   => ['required', 'string', 'max:100'],
            'institution' => ['nullable', 'string', 'max:150'],
            'email'       => ['required', 'email', 'max:150'],
            'phone'       => ['nullable', 'string', 'max:30'],
            'seminar_id'  => ['required', 'exists:seminars,id'],
        ]);

        $registration = DB::transaction(function () use ($data) {
            $user = User::firstOrCreate(
                ['email' => $data['email']],
                [
                    'first_name'  => $data['first_name'],
                    'last_name'   => $data['last_name'],
                    'institution' => $data['institution'] ?? null,
                    'phone'       => $data['phone'] ?? null,
                    'role'        => 'participant',
                ]
            );

            $registration = Registration::firstOrCreate([
                'user_id'    => $user->id,
                'seminar_id' => $data['seminar_id'],
            ], [
                'status'        => 'inscrit',
                'registered_at' => now(),
            ]);

            if (! $registration->qrCode) {
                QrCode::generateFor($registration);
            }

            return $registration;
        });

        $registration->load('user', 'seminar', 'qrCode');

        try {
            Mail::to($registration->user->email)
                ->send(new RegistrationQrCodeMail($registration));
        } catch (\Throwable $exception) {
            Log::warning('Unable to send registration QR code email.', [
                'registration_id' => $registration->id,
                'email' => $registration->user?->email,
                'message' => $exception->getMessage(),
            ]);
        }

        return redirect()->route('registration.confirmation', $registration);
    }

    /** Écran 02 — confirmation + affichage du QR code. */
    public function confirmation(Registration $registration)
    {
        $registration->load('user', 'seminar', 'qrCode');

        return view('registration.confirmation', compact('registration'));
    }
}
