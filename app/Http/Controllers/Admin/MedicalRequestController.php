<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MedicalRequest;
use Illuminate\Http\Request;

class MedicalRequestController extends Controller
{
    /**
     * Liste des cliniques partenaires disponibles.
     */
    public static array $partnerClinics = [
        // Tunis
        'Clinique Beau Séjour (Tunis)',
        'Clinique La Marsa (Tunis)',
        'Clinique Taoufik (Tunis)',
        'Clinique El Manar (Tunis)',
        'Clinique Ennasr (Ariana)',
        'Clinique Ibn Khaldoun (Tunis)',
        'Clinique El Menzah (Tunis)',
        // Sfax
        'Clinique Les Oliviers (Sfax)',
        'Clinique Azzahra (Sfax)',
        // Sousse
        'Clinique Sahloul (Sousse)',
        'Clinique Bougatfa (Sousse)',
        // Monastir / Mahdia
        'Clinique Fattouma Bourguiba (Monastir)',
        // Hammamet
        'Clinique Hannibal (Hammamet)',
        // Autre
        'Autre partenaire (préciser dans les notes)',
    ];

    /**
     * Liste toutes les demandes de devis et rendez-vous médicaux.
     */
    public function index(Request $request)
    {
        $sort = $request->input('sort', 'desc');
        if (!in_array($sort, ['asc', 'desc'])) {
            $sort = 'desc';
        }

        $query = MedicalRequest::orderBy('created_at', $sort);

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

        $partnerClinics = \App\Models\ClinicPartner::where('is_active', true)->orderBy('name')->get();

        return view('admin.medical.index', compact('requests', 'stats', 'partnerClinics'));
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
     * Affecter un patient à un partenaire (clinique).
     */
    public function assignPartner(Request $request, MedicalRequest $medicalRequest)
    {
        $validated = $request->validate([
            'partner_clinic_id' => 'nullable|exists:clinic_partners,id',
        ]);

        $clinicId   = $validated['partner_clinic_id'] ?: null;
        $clinicName = null;

        if ($clinicId) {
            $clinic     = \App\Models\ClinicPartner::find($clinicId);
            $clinicName = $clinic?->name;
        }

        $medicalRequest->update([
            'partner_clinic_id' => $clinicId,
            'partner_clinic'    => $clinicName, // garder le string pour compatibilité
            'assigned_at'       => $clinicId ? now() : null,
            'status'            => $clinicId ? 'in_progress' : $medicalRequest->status,
            'clinic_status'     => $clinicId ? 'pending_review' : null,
        ]);

        if ($clinicId && isset($clinic) && $clinic->user) {
            try {
                $clinic->user->notify(new \App\Notifications\MedicalPatientAssignedNotification($medicalRequest));
            } catch (\Throwable $e) {
                // Ignore silent notification errors
            }
        }

        $message = $clinicId
            ? 'Le patient ' . $medicalRequest->fullname . ' a été affecté à ' . $clinicName . ' avec succès et une notification lui a été transmise.'
            : 'L\'affectation au partenaire a été retirée.';

        return back()->with('success', $message);
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
