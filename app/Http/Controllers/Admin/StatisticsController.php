<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registration;
use App\Models\Seminar;
use App\Models\User;

class StatisticsController extends Controller
{
    public function index()
    {
        $totalParticipants = User::where('role', 'participant')->count();

        $totalRegistrations = Registration::count();
        $totalPresent = Registration::where('status', 'present')->count();
        $totalAbsent = Registration::where('status', 'absent')->count();
        $totalInscribedOnly = $totalRegistrations - ($totalPresent + $totalAbsent);

        $attendanceRate = $totalRegistrations > 0
            ? round(($totalPresent / $totalRegistrations) * 100, 1)
            : 0;

        $institutionsCount = User::where('role', 'participant')
            ->whereNotNull('institution')
            ->where('institution', '!=', '')
            ->distinct('institution')
            ->count('institution');

        // Top 5 Institutions
        $topInstitutions = User::where('role', 'participant')
            ->whereNotNull('institution')
            ->where('institution', '!=', '')
            ->groupBy('institution')
            ->select('institution', \DB::raw('count(*) as count'))
            ->orderByDesc('count')
            ->limit(5)
            ->get();

        // Stats by Seminar: Theme, total registrations, present participants
        $bySeminar = Seminar::withCount([
            'registrations',
            'registrations as presents_count' => fn($q) => $q->where('status', 'present')
        ])
        ->orderByDesc('registrations_count')
        ->get();

        return view('admin.statistics.index', compact(
            'totalParticipants',
            'totalRegistrations',
            'totalPresent',
            'totalAbsent',
            'totalInscribedOnly',
            'attendanceRate',
            'institutionsCount',
            'topInstitutions',
            'bySeminar'
        ));
    }
}
