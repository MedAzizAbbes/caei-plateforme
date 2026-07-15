<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /** Écran 03 — liste des séminaires du participant + séminaires disponibles. */
    public function index(Request $request)
    {
        $registrations = $request->user()
            ->registrations()
            ->with([
                'seminar' => fn($q) => $q->withCount('documents'),
                'qrCode',
                'attendances',
                'payment',
            ])
            ->latest('registered_at')
            ->get();

        $registeredSeminarIds = $registrations->pluck('seminar_id');

        $availableSeminars = \App\Models\Seminar::where('status', 'published')
            ->whereNotIn('id', $registeredSeminarIds)
            ->orderBy('start_date')
            ->get();

        return view('participant.dashboard', compact('registrations', 'availableSeminars'));
    }
}
