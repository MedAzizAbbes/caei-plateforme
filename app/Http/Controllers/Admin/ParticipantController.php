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

    /** View Participant Details */
    public function show(\App\Models\User $participant)
    {
        // Fetch all registrations for this participant
        $registrations = Registration::with('seminar')
            ->where('user_id', $participant->id)
            ->latest('registered_at')
            ->get();

        return view('admin.participants.show', compact('participant', 'registrations'));
    }

    /** Edit Participant */
    public function edit(\App\Models\User $participant)
    {
        return view('admin.participants.edit', compact('participant'));
    }

    /** Update Participant */
    public function update(Request $request, \App\Models\User $participant)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $participant->id,
            'phone' => 'nullable|string|max:255',
            'pays' => 'nullable|string|max:255',
            'poste' => 'nullable|string|max:255',
            'institution' => 'nullable|string|max:255',
        ]);

        $participant->update($validated);

        return redirect()->route('admin.participants.show', $participant)->with('success', 'Participant mis à jour avec succès.');
    }

    /** Delete Participant */
    public function destroy(\App\Models\User $participant)
    {
        // Supprimer toutes les inscriptions de ce participant
        Registration::where('user_id', $participant->id)->delete();
        
        $participant->delete();

        return redirect()->route('admin.participants.index')->with('success', 'Participant supprimé avec succès.');
    }
}
