<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\QrCode;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AttendanceController extends Controller
{
    /** Écran 06 — interface de scan (poste d'accueil admin/formateur). */
    public function index()
    {
        return view('checkin.scan');
    }

    /**
     * Reçoit le code scanné (valeur du QR), retrouve l'inscription
     * correspondante et enregistre la présence (date, heure, séminaire).
     */
    public function scan(Request $request)
    {
        $data = $request->validate([
            'code' => ['required', 'string'],
        ]);

        $value = trim($data['code']);
        $token = null;

        if (Str::contains($value, '/p/')) {
            $token = Str::afterLast($value, '/p/');
            $token = Str::before($token, '?');
            $token = Str::before($token, '#');
        }

        $qrCode = QrCode::where('code', $value)
            ->orWhere('secure_token', $value)
            ->when($token, fn ($query) => $query->orWhere('secure_token', $token))
            ->first();

        if (! $qrCode) {
            return response()->json([
                'status' => 'not_found',
                'message' => 'Code QR introuvable.',
            ], 404);
        }

        $registration = $qrCode->registration;

        $attendance = Attendance::create([
            'registration_id' => $registration->id,
            'seminar_id'      => $registration->seminar_id,
            'scanned_by'      => $request->user()?->id,
            'method'          => 'qr',
            'scanned_at'      => now(),
        ]);

        $registration->markPresent();

        return response()->json([
            'status'      => 'ok',
            'participant' => $registration->user->fullName(),
            'seminar'     => $registration->seminar->theme,
            'scanned_at'  => $attendance->scanned_at->format('d/m/Y H:i'),
        ]);
    }
}
