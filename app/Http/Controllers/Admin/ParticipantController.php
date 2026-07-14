<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ParticipantsExport;
use App\Http\Controllers\Controller;
use App\Models\Registration;
use App\Models\Seminar;
use Illuminate\Http\Request;

class ParticipantController extends Controller
{
    /** Écran 08 — liste complète, filtrable par séminaire et par statut. */
    public function index(Request $request)
    {
        $registrations = Registration::with('user', 'seminar')
            ->when($request->filled('seminar_id'), fn ($q) => $q->where('seminar_id', $request->seminar_id))
            ->when($request->filled('status'), fn ($q) => $q->where('status', $request->status))
            ->when($request->filled('name'), function ($q) use ($request) {
                $q->whereHas('user', function ($u) use ($request) {
                    $u->where('first_name', 'like', '%' . $request->name . '%')
                      ->orWhere('last_name', 'like', '%' . $request->name . '%');
                });
            })
            ->when($request->filled('email'), function ($q) use ($request) {
                $q->whereHas('user', function ($u) use ($request) {
                    $u->where('email', 'like', '%' . $request->email . '%');
                });
            })
            ->latest('registered_at')
            ->paginate(30)
            ->withQueryString();

        $seminars = Seminar::orderBy('start_date')->get(['id', 'theme']);

        return view('admin.participants.index', compact('registrations', 'seminars'));
    }

    /** Export Excel (CSV) */
    public function exportExcel(Request $request)
    {
        return (new ParticipantsExport($request->only(['seminar_id', 'status', 'name', 'email'])))
            ->download('participants_caei_' . now()->format('Y-m-d') . '.csv');
    }

    /** Export PDF */
    public function exportPdf(Request $request)
    {
        $registrations = Registration::with('user', 'seminar')
            ->when($request->filled('seminar_id'), fn ($q) => $q->where('seminar_id', $request->seminar_id))
            ->when($request->filled('status'), fn ($q) => $q->where('status', $request->status))
            ->when($request->filled('name'), function ($q) use ($request) {
                $q->whereHas('user', function ($u) use ($request) {
                    $u->where('first_name', 'like', '%' . $request->name . '%')
                      ->orWhere('last_name', 'like', '%' . $request->name . '%');
                });
            })
            ->when($request->filled('email'), function ($q) use ($request) {
                $q->whereHas('user', function ($u) use ($request) {
                    $u->where('email', 'like', '%' . $request->email . '%');
                });
            })
            ->get();

        $html = view('admin.participants.export-pdf', compact('registrations'))->render();

        $pdfFacade = '\Barryvdh\\DomPDF\\Facade\\Pdf';
        if (class_exists($pdfFacade)) {
            $pdf = $pdfFacade::loadHTML($html)->setPaper('a4', 'landscape');

            return $pdf->download('participants_caei_' . now()->format('Y-m-d') . '.pdf');
        }

        return response($html, 200)
            ->header('Content-Type', 'text/html; charset=utf-8')
            ->header('Content-Disposition', 'attachment; filename="participants_caei_' . now()->format('Y-m-d') . '.html"');
    }
}
