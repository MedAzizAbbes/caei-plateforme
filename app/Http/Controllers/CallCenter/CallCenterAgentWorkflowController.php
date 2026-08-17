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
        $this->authorize('view', $rendezVous);

        $rendezVous->load(['prospect', 'agent', 'partenaire', 'qualification.partenaire', 'histories.user']);

        return view('callcenter.agent.show', compact('rendezVous'));
    }

    /**
     * Exportation au format Agenda (.ics) pour Google Calendar / Outlook / iCal
     */
    public function exportIcs(RendezVous $rendezVous)
    {
        // 🔒 Sécurité RBAC Policy : Vérification de l'autorisation d'accès
        $this->authorize('exportIcs', $rendezVous);

        $dateStr = $rendezVous->date_rendez_vous ? $rendezVous->date_rendez_vous->format('Y-m-d') : now()->format('Y-m-d');
        $timeStr = $rendezVous->heure_rendez_vous ?: '09:00';
        
        $start = \Carbon\Carbon::parse("{$dateStr} {$timeStr}");
        $end = (clone $start)->addHour();

        $prospectName = $rendezVous->prospect ? $rendezVous->prospect->nomComplet() : 'Prospect';
        $phone = $rendezVous->prospect ? $rendezVous->prospect->telephone : '';

        $icsContent = "BEGIN:VCALENDAR\r\n";
        $icsContent .= "VERSION:2.0\r\n";
        $icsContent .= "PRODID:-//CAEI Platforme//Call Center//FR\r\n";
        $icsContent .= "METHOD:REQUEST\r\n";
        $icsContent .= "BEGIN:VEVENT\r\n";
        $icsContent .= "UID:rdv-" . $rendezVous->id . "@caei-afri.com\r\n";
        $icsContent .= "DTSTAMP:" . now()->format('Ymd\THis\Z') . "\r\n";
        $icsContent .= "DTSTART:" . $start->format('Ymd\THis\Z') . "\r\n";
        $icsContent .= "DTEND:" . $end->format('Ymd\THis\Z') . "\r\n";
        $icsContent .= "SUMMARY:RDV Call Center CAEI - Prospect " . $prospectName . "\r\n";
        $icsContent .= "DESCRIPTION:Objet: " . addcslashes($rendezVous->objet, ",;") . "\\nTel Prospect: " . $phone . "\\nNotes: " . addcslashes((string)$rendezVous->notes, ",;") . "\r\n";
        $icsContent .= "STATUS:CONFIRMED\r\n";
        $icsContent .= "END:VEVENT\r\n";
        $icsContent .= "END:VCALENDAR\r\n";

        return response($icsContent, 200, [
            'Content-Type'        => 'text/calendar; charset=utf-8',
            'Content-Disposition' => 'attachment; filename="rdv_prospect_' . $rendezVous->id . '.ics"',
        ]);
    }
}
