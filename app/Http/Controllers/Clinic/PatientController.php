<?php

namespace App\Http\Controllers\Clinic;

use App\Http\Controllers\Controller;
use App\Models\MedicalRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    private function getClinic()
    {
        $clinic = Auth::user()->clinicPartner;
        if (! $clinic) {
            abort(403, 'Profil clinique introuvable.');
        }
        return $clinic;
    }

    /**
     * Liste des patients affectés à cette clinique.
     */
    public function index(Request $request)
    {
        $clinic = $this->getClinic();

        $query = $clinic->medicalRequests()->latest();

        if ($request->filled('clinic_status')) {
            $query->where('clinic_status', $request->clinic_status);
        }

        if ($request->filled('search')) {
            $s = $request->search;
            $query->where(function ($q) use ($s) {
                $q->where('fullname', 'like', "%{$s}%")
                  ->orWhere('email', 'like', "%{$s}%")
                  ->orWhere('service_type', 'like', "%{$s}%");
            });
        }

        $patients = $query->paginate(15)->withQueryString();

        $stats = [
            'total'          => $clinic->medicalRequests()->count(),
            'pending_review' => $clinic->medicalRequests()->where('clinic_status', 'pending_review')->count(),
            'accepted'       => $clinic->medicalRequests()->where('clinic_status', 'accepted')->count(),
            'quoted'         => $clinic->medicalRequests()->where('clinic_status', 'quoted')->count(),
            'rejected'       => $clinic->medicalRequests()->where('clinic_status', 'rejected')->count(),
        ];

        return view('clinic.patients.index', compact('clinic', 'patients', 'stats'));
    }

    /**
     * Fiche détaillée d'un patient.
     */
    public function show(int $id)
    {
        $clinic  = $this->getClinic();
        $patient = $clinic->medicalRequests()->findOrFail($id);

        return view('clinic.patients.show', compact('clinic', 'patient'));
    }

    /**
     * Qualifier le dossier (accepter / refuser).
     */
    public function updateStatus(Request $request, int $id)
    {
        $clinic  = $this->getClinic();
        $patient = $clinic->medicalRequests()->findOrFail($id);

        $validated = $request->validate([
            'clinic_status' => 'required|in:pending_review,accepted,rejected',
            'clinic_notes'  => 'nullable|string|max:2000',
        ]);

        $updateData = $validated;
        if ($validated['clinic_status'] === 'accepted') {
            $updateData['status'] = 'completed'; // Automatiquement Traité / Devis Envoyé
        } elseif ($validated['clinic_status'] === 'pending_review') {
            $updateData['status'] = 'in_progress';
        }

        $patient->update($updateData);

        $label = match ($validated['clinic_status']) {
            'accepted' => 'accepté (statut passé à Traité)',
            'rejected' => 'refusé',
            default    => 'mis à jour',
        };

        return back()->with('success', 'Le dossier de ' . $patient->fullname . ' a été ' . $label . '.');
    }

    /**
     * Envoyer un devis au patient (via l'admin).
     */
    public function sendDevis(Request $request, int $id)
    {
        $clinic  = $this->getClinic();
        $patient = $clinic->medicalRequests()->findOrFail($id);

        $validated = $request->validate([
            'devis_amount'   => 'required|numeric|min:0',
            'devis_currency' => 'required|in:TND,EUR,USD',
            'devis_message'  => 'required|string|max:3000',
        ]);

        $patient->update([
            'devis_amount'   => $validated['devis_amount'],
            'devis_currency' => $validated['devis_currency'],
            'devis_message'  => $validated['devis_message'],
            'devis_sent_at'  => now(),
            'clinic_status'  => 'quoted',
            'status'         => 'completed', // Changement automatique du statut admin à "Traité"
        ]);

        return back()->with('success', 'Le devis de ' . number_format($validated['devis_amount'], 2) . ' ' . $validated['devis_currency'] . ' a été envoyé avec succès. Le dossier est désormais marqué comme Traité.');
    }
}
