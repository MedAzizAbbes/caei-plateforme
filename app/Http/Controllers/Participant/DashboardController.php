<?php

namespace App\Http\Controllers\Participant;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /** Écran 03 — liste des séminaires du participant + statut + accès rapide. */
    public function index(Request $request)
    {
        $registrations = $request->user()
            ->registrations()
            ->with('seminar', 'qrCode')
            ->latest('registered_at')
            ->get();

        return view('participant.dashboard', compact('registrations'));
    }
}
