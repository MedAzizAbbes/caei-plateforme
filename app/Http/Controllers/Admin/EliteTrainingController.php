<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EliteTrainingAppointment;
use Illuminate\Http\Request;

class EliteTrainingController extends Controller
{
    public function index(Request $request)
    {
        $sort = $request->input('sort', 'desc');
        if (!in_array($sort, ['asc', 'desc'])) {
            $sort = 'desc';
        }

        $query = EliteTrainingAppointment::orderBy('created_at', $sort);

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('fullname', 'like', "%{$s}%")
                  ->orWhere('email', 'like', "%{$s}%")
                  ->orWhere('phone', 'like', "%{$s}%")
                  ->orWhere('subject', 'like', "%{$s}%")
                  ->orWhere('message', 'like', "%{$s}%");
            });
        }

        $appointments = $query->paginate(15)->withQueryString();

        $stats = [
            'total'       => EliteTrainingAppointment::count(),
            'pending'     => EliteTrainingAppointment::where('status', 'pending')->count(),
            'in_progress' => EliteTrainingAppointment::where('status', 'in_progress')->count(),
            'completed'   => EliteTrainingAppointment::where('status', 'completed')->count(),
            'cancelled'   => EliteTrainingAppointment::where('status', 'cancelled')->count(),
        ];

        return view('admin.elite-training.index', compact('appointments', 'stats'));
    }

    public function updateStatus(Request $request, EliteTrainingAppointment $appointment)
    {
        $request->validate([
            'status'      => 'required|in:pending,in_progress,completed,cancelled',
            'admin_notes' => 'nullable|string|max:1000',
        ]);

        $appointment->update([
            'status'      => $request->status,
            'admin_notes' => $request->admin_notes,
        ]);

        return back()->with('success', 'La demande de rendez-vous #' . $appointment->id . ' a été mise à jour.');
    }

    public function destroy(EliteTrainingAppointment $appointment)
    {
        $appointment->delete();
        return back()->with('success', 'La demande de rendez-vous a été supprimée.');
    }
}
