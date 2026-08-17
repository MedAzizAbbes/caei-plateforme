<?php

namespace App\Http\Controllers\CallCenter;

use App\Http\Controllers\Controller;
use App\Models\Prospect;
use App\Models\RendezVous;
use App\Models\RendezVousHistory;
use Illuminate\Http\Request;

class CallCenterAgentWorkflowController extends Controller
{
    /**
     * Mes Rendez-vous (Agent)
     */
    public function index(Request $request)
    {
        $agent = auth()->user();

        $query = RendezVous::where('agent_id', $agent->id)
            ->with(['prospect', 'partenaire', 'qualification']);

        if ($request->filled('statut')) {
            $query->where('statut', $request->statut);
        }

        $rendezVousList = $query->orderBy('created_at', 'desc')->paginate(10);
        $prospects = Prospect::where('agent_id', $agent->id)->get();

        return view('callcenter.agent.index', compact('rendezVousList', 'prospects'));
    }

    /**
     * Enregistrer un prospect et planifier un Rendez-vous
     */
    public function store(Request $request)
    {
        $request->validate([
            // Prospect Data
            'nom'               => 'required|string|max:255',
            'prenom'            => 'nullable|string|max:255',
            'email'             => 'nullable|email|max:255',
            'telephone'         => 'required|string|max:50',
            'societe'           => 'nullable|string|max:255',
            'secteur'           => 'nullable|string|max:255',
            // Rendez-vous Data
            'date_rendez_vous'  => 'required|date|after_or_equal:today',
            'heure_rendez_vous' => 'required',
            'objet'             => 'required|string|max:255',
            'notes'             => 'nullable|string',
        ]);

        $agent = auth()->user();

        // 1. Créer le prospect
        $prospect = Prospect::create([
            'agent_id'  => $agent->id,
            'nom'       => $request->nom,
            'prenom'    => $request->prenom,
            'email'     => $request->email,
            'telephone' => $request->telephone,
            'societe'   => $request->societe,
            'secteur'   => $request->secteur,
            'notes'     => $request->notes,
        ]);

        // 2. Créer le rendez-vous (statut automatique : en_attente_affectation)
        $rdv = RendezVous::create([
            'prospect_id'       => $prospect->id,
            'agent_id'          => $agent->id,
            'partenaire_id'     => null,
            'date_rendez_vous'  => $request->date_rendez_vous,
            'heure_rendez_vous' => $request->heure_rendez_vous,
            'objet'             => $request->objet,
            'notes'             => $request->notes,
            'statut'            => 'en_attente_affectation',
        ]);

        // 3. Historique
        RendezVousHistory::log(
            $rdv->id, 
            $agent->id, 
            'creation', 
            "Rendez-vous créé pour le prospect '{$prospect->nomComplet()}' par l'agent {$agent->fullName()}"
        );

        return back()->with('success', 'Rendez-vous créé avec succès ! Il est actuellement en attente d\'affectation par l\'administrateur.');
    }

    /**
     * Afficher le détail d'un Rendez-vous & la qualification si disponible
     */
    public function show(RendezVous $rendezVous)
    {
        if ($rendezVous->agent_id !== auth()->id() && !auth()->user()->isAdmin()) {
            abort(403, 'Accès non autorisé à ce rendez-vous.');
        }

        $rendezVous->load(['prospect', 'agent', 'partenaire', 'qualification.partenaire', 'histories.user']);

        return view('callcenter.agent.show', compact('rendezVous'));
    }
}
