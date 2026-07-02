<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ParticipantsExport;
use App\Http\Controllers\Controller;
use App\Models\Registration;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    /** Écran 08 — liste complète, filtrable par séminaire et par statut. */
    public function index(Request $request)
    {
        $registrations = Registration::with('user', 'seminar')
            ->when($request->filled('seminar_id'), fn ($q) => $q->where('seminar_id', $request->seminar_id))
            ->when($request->filled('status'), fn ($q) => $q->where('status', $request->status))
            ->latest('registered_at')
            ->paginate(30);

        return view('admin.participants.index', compact('registrations'));
    }

    /** Export Excel (CSV) */
    public function exportExcel(Request $request)
    {
        return (new ParticipantsExport($request->only(['seminar_id', 'status'])))
            ->download('participants_caei_' . now()->format('Y-m-d') . '.csv');
    }

    /** Export PDF */
    public function exportPdf(Request $request)
    {
        $registrations = Registration::with('user', 'seminar')
            ->when($request->filled('seminar_id'), fn ($q) => $q->where('seminar_id', $request->seminar_id))
            ->when($request->filled('status'), fn ($q) => $q->where('status', $request->status))
            ->get();

        $html = view('admin.participants.export-pdf', compact('registrations'))->render();
        $pdf = \PDF::loadHTML($html);
        
        return $pdf->download('participants_caei_' . now()->format('Y-m-d') . '.pdf');
    }
}
