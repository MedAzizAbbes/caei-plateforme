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
        $attendanceRate = $totalRegistrations > 0
            ? round(($totalPresent / $totalRegistrations) * 100, 1)
            : 0;

        $institutionsCount = User::where('role', 'participant')
            ->whereNotNull('institution')
            ->distinct('institution')
            ->count('institution');

        $bySeminar = Seminar::withCount('registrations')
            ->orderByDesc('registrations_count')
            ->get(['id', 'theme']);

        return view('admin.statistics.index', compact(
            'totalParticipants',
            'totalRegistrations',
            'attendanceRate',
            'institutionsCount',
            'bySeminar'
        ));
    }
}
