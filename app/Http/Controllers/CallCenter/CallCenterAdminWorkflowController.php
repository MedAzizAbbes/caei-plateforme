<?php

namespace App\Http\Controllers\CallCenter;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\RendezVous;
use App\Models\Prospect;
use App\Models\Qualification;
use App\Models\RendezVousHistory;
use App\Models\CallCenterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class CallCenterAdminWorkflowController extends Controller
{
    /**
     * Tableau de Bord Centralisé Call Center Admin (Unified Master Dashboard)
     * Regroupe : 
     * 1. Workflow RDV & Qualifications
     * 2. Demandes du Site Public
     * 3. Gestion des Comptes (Agents & Partenaires)
     */
    public function index(Request $request)
    {
        $activeTab = $request->get('tab', 'workflow');

        // --- Tab 1: Workflow RDV ---
        $queryRdv = RendezVous::with(['prospect', 'agent', 'partenaire', 'qualification']);

        if ($request->filled('statut')) {
            $queryRdv->where('statut', $request->statut);
        }
        if ($request->filled('agent_id')) {
            $queryRdv->where('agent_id', $request->agent_id);
        }
        if ($request->filled('partenaire_id')) {
            $queryRdv->where('partenaire_id', $request->partenaire_id);
        }
        if ($request->filled('date')) {
            $queryRdv->whereDate('date_rendez_vous', $request->date);
        }

        $rendezVousList = $queryRdv->orderBy('created_at', 'desc')->paginate(10, ['*'], 'rdv_page');

        // Données Utilisateurs (Agents & Partenaires)
        $agents = User::where('role', 'callcenter_agent')->latest()->get();
        $partenaires = User::where('role', 'callcenter_partenaire')->latest()->get();

        // --- Tab 2: Demandes du Site Public ---
        $publicRequests = CallCenterRequest::latest()->paginate(10, ['*'], 'req_page');

        // --- Statistiques Globales Unifiées ---
        $stats = [
            'total_rdv'              => RendezVous::count(),
            'en_attente_affectation' => RendezVous::where('statut', 'en_attente_affectation')->count(),
            'affecte'                => RendezVous::where('statut', 'affecte')->count(),
            'qualifie'               => RendezVous::where('statut', 'qualifie')->count(),
            'annule'                 => RendezVous::where('statut', 'annule')->count(),
            'taux_qualification'     => RendezVous::count() > 0 
                                          ? round((RendezVous::where('statut', 'qualifie')->count() / RendezVous::count()) * 100, 1) 
                                          : 0,
            'total_demandes_site'    => CallCenterRequest::count(),
            'demandes_nouvelles'     => CallCenterRequest::where('status', 'Nouveau')->count(),
            'total_agents'           => count($agents),
            'total_partenaires'      => count($partenaires),
        ];

        return view('callcenter.admin.index', compact(
            'activeTab', 
            'rendezVousList', 
            'publicRequests', 
            'agents', 
            'partenaires', 
            'stats'
        ));
    }

    /**
     * Affecter un rendez-vous à un partenaire commercial
     */
    public function assignPartner(Request $request, RendezVous $rendezVous)
    {
        $request->validate([
            'partenaire_id' => ['required', Rule::exists('users', 'id')->where('role', 'callcenter_partenaire')],
        ]);

        $partenaire = User::findOrFail($request->partenaire_id);
        $oldPartenaire = $rendezVous->partenaire;

        $rendezVous->update([
            'partenaire_id' => $partenaire->id,
            'statut'        => 'affecte',
            'assigned_at'   => now(),
        ]);

        $action = $oldPartenaire ? 'modification_affectation' : 'affectation';
        $desc = $oldPartenaire 
            ? "Affectation modifiée de {$oldPartenaire->fullName()} vers {$partenaire->fullName()}"
            : "Rendez-vous affecté au partenaire {$partenaire->fullName()}";

        RendezVousHistory::log($rendezVous->id, auth()->id(), $action, $desc);

        return back()->with('success', "Le rendez-vous a été affecté avec succès au partenaire {$partenaire->fullName()}.");
    }

    /**
     * Mettre à jour le statut du RDV
     */
    public function updateStatus(Request $request, RendezVous $rendezVous)
    {
        $request->validate([
            'statut' => 'required|in:en_attente_affectation,affecte,qualification_en_cours,qualifie,annule,non_effectue,reporte',
        ]);

        $oldStatut = $rendezVous->statusLabel();
        $rendezVous->update(['statut' => $request->statut]);

        RendezVousHistory::log(
            $rendezVous->id, 
            auth()->id(), 
            'changement_statut', 
            "Statut modifié de '{$oldStatut}' vers '{$rendezVous->statusLabel()}'"
        );

        return back()->with('success', 'Statut du rendez-vous mis à jour.');
    }

    /**
     * Mettre à jour le statut d'une demande de contact du site public
     */
    public function updateRequestStatus(Request $request, $id)
    {
        $request->validate(['status' => 'required|in:Nouveau,En cours,Traité']);
        $callRequest = CallCenterRequest::findOrFail($id);
        $callRequest->update(['status' => $request->status]);

        return back()->with('success', 'Statut de la demande de contact mis à jour.');
    }

    /**
     * Supprimer une demande du site public
     */
    public function destroyRequest($id)
    {
        CallCenterRequest::findOrFail($id)->delete();
        return back()->with('success', 'Demande supprimée.');
    }

    /**
     * Création d'un compte Agent ou Partenaire
     */
    public function storeUser(Request $request)
    {
        $request->validate([
            'first_name'  => 'required|string|max:255',
            'last_name'   => 'required|string|max:255',
            'email'       => 'required|email|max:255|unique:users,email',
            'phone'       => 'nullable|string|max:50',
            'institution' => 'nullable|string|max:255',
            'role'        => 'required|in:callcenter_agent,callcenter_partenaire',
            'password'    => 'required|string|min:6',
        ]);

        $user = User::create([
            'first_name'  => $request->first_name,
            'last_name'   => $request->last_name,
            'email'       => $request->email,
            'phone'       => $request->phone,
            'institution' => $request->institution,
            'role'        => $request->role,
            'password'    => Hash::make($request->password),
        ]);

        $roleLabel = $user->role === 'callcenter_agent' ? 'Agent Call Center' : 'Partenaire Call Center';

        return back()->with('success', "Le compte {$roleLabel} '{$user->fullName()}' a été créé avec succès.");
    }

    /**
     * Vue spécifique Gestion des comptes (agents & partenaires)
     */
    public function users(Request $request)
    {
        $request->merge(['tab' => 'utilisateurs']);
        return $this->index($request);
    }
}
