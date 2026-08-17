<?php

namespace App\Http\Controllers\Clinic;

use App\Http\Controllers\Controller;
use App\Models\MedicalRequest;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $clinic = Auth::user()->clinicPartner;

        if (! $clinic) {
            abort(403, 'Profil clinique introuvable.');
        }

        // Mettre à jour le last_login_at
        $clinic->update(['last_login_at' => now()]);

        $stats = [
            'total'          => $clinic->medicalRequests()->count(),
            'pending_review' => $clinic->medicalRequests()->where('clinic_status', 'pending_review')->count(),
            'accepted'       => $clinic->medicalRequests()->where('clinic_status', 'accepted')->count(),
            'quoted'         => $clinic->medicalRequests()->where('clinic_status', 'quoted')->count(),
            'rejected'       => $clinic->medicalRequests()->where('clinic_status', 'rejected')->count(),
        ];

        $recentRequests = $clinic->medicalRequests()
            ->latest()
            ->take(5)
            ->get();

        return view('clinic.dashboard', compact('clinic', 'stats', 'recentRequests'));
    }
}
