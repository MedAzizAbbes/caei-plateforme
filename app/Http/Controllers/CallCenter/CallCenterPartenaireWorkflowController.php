<?php

namespace App\Http\Controllers\CallCenter;

use App\Http\Controllers\Controller;
use App\Models\RendezVous;
use App\Models\Qualification;
use App\Models\RendezVousHistory;
use Illuminate\Http\Request;

class CallCenterPartenaireWorkflowController extends Controller
{
    /**
     * Mes Rendez-vous affectés (Partenaire)
     */
    public function index(Request $request)
    {
        $partenaire = auth()->user();

        $query = RendezVous::where('partenaire_id', $partenaire->id)
            ->with(['prospect', 'agent', 'qualification']);

        if ($request->filled('statut')) {
            $query->where('statut', $request->statut);
        }

        $rendezVousList = $query->orderBy('date_rendez_vous', 'asc')->paginate(10);

        return view('callcenter.partenaire.index', compact('rendezVousList'));
    }

    /**
     * Formulaire de qualification pour un RDV affecté
     */
    public function showQualifyForm(RendezVous $rendezVous)
    {
        $partenaire = auth()->user();

        if ($rendezVous->partenaire_id !== $partenaire->id) {
            abort(403, 'Ce rendez-vous ne vous est pas affecté.');
        }

        if ($rendezVous->statut === 'affecte') {
            $rendezVous->update(['statut' => 'qualification_en_cours']);
            RendezVousHistory::log(
                $rendezVous->id, 
                $partenaire->id, 
                'changement_statut', 
                "Le partenaire {$partenaire->fullName()} a démarré l'évaluation de la qualification."
            );
        }

        $rendezVous->load(['prospect', 'agent', 'qualification']);

        return view('callcenter.partenaire.qualify', compact('rendezVous'));
    }

    /**
     * Enregistrer / Valider la Qualification
     */
    public function storeQualification(Request $request, RendezVous $rendezVous)
    {
        $partenaire = auth()->user();

        if ($rendezVous->partenaire_id !== $partenaire->id) {
            abort(403, 'Action non autorisée.');
        }

        $request->validate([
            'resultat'    => 'required|string|in:Intéressé,Non intéressé,À rappeler,Prospect qualifié,Prospect non qualifié',
            'potentiel'   => 'required|string|in:Faible,Moyen,Élevé',
            'commentaire' => 'nullable|string',
        ]);

        $qualification = Qualification::updateOrCreate(
            ['rendez_vous_id' => $rendezVous->id],
            [
                'partenaire_id' => $partenaire->id,
                'resultat'      => $request->resultat,
                'potentiel'     => $request->potentiel,
                'commentaire'   => $request->commentaire,
                'qualified_at'  => now(),
            ]
        );

        $rendezVous->update(['statut' => 'qualifie']);

        RendezVousHistory::log(
            $rendezVous->id, 
            $partenaire->id, 
            'qualification', 
            "Rendez-vous qualifié par le partenaire {$partenaire->fullName()} (Résultat: {$qualification->resultat}, Potentiel: {$qualification->potentiel})"
        );

        return redirect()->route('callcenter.partenaire.index')
            ->with('success', 'La qualification du prospect a été enregistrée avec succès ! L\'agent et l\'administrateur peuvent maintenant la consulter.');
    }
}
