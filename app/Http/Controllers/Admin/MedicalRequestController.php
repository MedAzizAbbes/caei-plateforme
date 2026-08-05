<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MedicalRequest;
use Illuminate\Http\Request;

class MedicalRequestController extends Controller
{
    /**
     * Liste toutes les demandes de devis et rendez-vous médicaux.
     */
    public function index(Request $request)
    {
        $query = MedicalRequest::orderBy('created_at', 'desc');

        // Filtre par statut
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Recherche par nom, email ou pays
        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('fullname', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('country', 'like', "%{$search}%")
                  ->orWhere('service_type', 'like', "%{$search}%");
            });
        }

        $requests = $query->paginate(15)->withQueryString();

        $stats = [
            'total'       => MedicalRequest::count(),
            'pending'     => MedicalRequest::where('status', 'pending')->count(),
            'in_progress' => MedicalRequest::where('status', 'in_progress')->count(),
            'completed'   => MedicalRequest::where('status', 'completed')->count(),
            'cancelled'   => MedicalRequest::where('status', 'cancelled')->count(),
        ];

        return view('admin.medical.index', compact('requests', 'stats'));
    }

    /**
     * Mettre à jour le statut ou les notes d'une demande médicale.
     */
    public function updateStatus(Request $request, MedicalRequest $medicalRequest)
    {
        $validated = $request->validate([
            'status'      => 'required|in:pending,in_progress,completed,cancelled',
            'admin_notes' => 'nullable|string|max:1000',
        ]);

        $medicalRequest->update($validated);

        return back()->with('success', 'La demande de devis médical #' . $medicalRequest->id . ' a été mise à jour.');
    }

    /**
     * Supprimer une demande médicale.
     */
    public function destroy(MedicalRequest $medicalRequest)
    {
        $medicalRequest->delete();

        return back()->with('success', 'La demande médicale a été supprimée avec succès.');
    }
}
