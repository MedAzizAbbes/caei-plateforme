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

        // Données Utilisateurs (Agents & Partenaires avec leurs RDVs)
        $agents = User::where('role', 'callcenter_agent')
            ->with(['rendezVousAsAgent.prospect', 'rendezVousAsAgent.partenaire', 'rendezVousAsAgent.qualification'])
            ->latest()
            ->get();
            
        $partenaires = User::where('role', 'callcenter_partenaire')
            ->with(['rendezVousAsPartenaire.prospect', 'rendezVousAsPartenaire.agent', 'rendezVousAsPartenaire.qualification'])
            ->latest()
            ->get();

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

        // --- 📊 Analytics & Données Graphiques Chart.js ---
        $partenaireChartLabels = [];
        $partenaireQualifiedData = [];
        $partenairePendingData = [];

        foreach ($partenaires as $p) {
            $partenaireChartLabels[] = $p->fullName() ?: $p->email;
            $partenaireQualifiedData[] = RendezVous::where('partenaire_id', $p->id)->where('statut', 'qualifie')->count();
            $partenairePendingData[] = RendezVous::where('partenaire_id', $p->id)->where('statut', '!=', 'qualifie')->count();
        }

        $agentChartLabels = [];
        $agentRdvData = [];

        foreach ($agents as $a) {
            $agentChartLabels[] = $a->fullName() ?: $a->email;
            $agentRdvData[] = RendezVous::where('agent_id', $a->id)->count();
        }

        $monthlyTrendLabels = [];
        $monthlyCreatedData = [];
        $monthlyQualifiedData = [];

        for ($i = 5; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $monthlyTrendLabels[] = ucfirst($date->translatedFormat('M Y'));

            $monthlyCreatedData[] = RendezVous::whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();

            $monthlyQualifiedData[] = RendezVous::where('statut', 'qualifie')
                ->whereYear('created_at', $date->year)
                ->whereMonth('created_at', $date->month)
                ->count();
        }

        $analyticsCharts = [
            'partenaires' => [
                'labels'    => $partenaireChartLabels,
                'qualifies' => $partenaireQualifiedData,
                'en_cours'  => $partenairePendingData,
            ],
            'agents' => [
                'labels' => $agentChartLabels,
                'total'  => $agentRdvData,
            ],
            'monthly' => [
                'labels'    => $monthlyTrendLabels,
                'crees'     => $monthlyCreatedData,
                'qualifies' => $monthlyQualifiedData,
            ],
        ];

        return view('callcenter.admin.index', compact(
            'activeTab', 
            'rendezVousList', 
            'publicRequests', 
            'agents', 
            'partenaires', 
            'stats',
            'analyticsCharts'
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

        // 🔔 Notification en direct dans l'espace Laravel du Partenaire
        try {
            $partenaire->notify(new \App\Notifications\RendezVousAssignedNotification($rendezVous));
        } catch (\Throwable $e) {
            // Ignorer si la notification échoue silencieusement
        }

        return back()->with('success', "Le rendez-vous a été affecté avec succès au partenaire {$partenaire->fullName()} et une notification lui a été transmise dans son espace.");
    }

    /**
     * Exportation des Rendez-vous au format Excel (CSV UTF-8)
     */
    public function exportExcel(Request $request)
    {
        $fileName = 'callcenter_rdv_export_' . now()->format('Y-m-d_H-i') . '.csv';

        $query = RendezVous::with(['prospect', 'agent', 'partenaire', 'qualification']);

        if ($request->filled('statut')) {
            $query->where('statut', $request->statut);
        }
        if ($request->filled('agent_id')) {
            $query->where('agent_id', $request->agent_id);
        }
        if ($request->filled('partenaire_id')) {
            $query->where('partenaire_id', $request->partenaire_id);
        }

        $list = $query->orderBy('created_at', 'desc')->get();

        $headers = [
            'Content-Type'        => 'text/csv; charset=UTF-8',
            'Content-Disposition' => "attachment; filename=\"{$fileName}\"",
            'Pragma'              => 'no-cache',
            'Cache-Control'       => 'must-revalidate, post-check=0, pre-check=0',
            'Expires'             => '0',
        ];

        $callback = function () use ($list) {
            $file = fopen('php://output', 'w');
            // BOM UTF-8 pour Excel
            fprintf($file, chr(0xEF).chr(0xBB).chr(0xBF));

            fputcsv($file, [
                'ID RDV', 'Date RDV', 'Heure', 'Nom Prospect', 'Téléphone', 'Email', 
                'Société', 'Secteur', 'Agent Créateur', 'Partenaire Affecté', 
                'Statut RDV', 'Résultat Qualification', 'Niveau Potentiel'
            ], ';');

            foreach ($list as $rdv) {
                fputcsv($file, [
                    $rdv->id,
                    $rdv->date_rendez_vous ? $rdv->date_rendez_vous->format('d/m/Y') : '',
                    $rdv->heure_rendez_vous,
                    $rdv->prospect ? $rdv->prospect->nomComplet() : '',
                    $rdv->prospect ? $rdv->prospect->telephone : '',
                    $rdv->prospect ? $rdv->prospect->email : '',
                    $rdv->prospect ? $rdv->prospect->societe : '',
                    $rdv->prospect ? $rdv->prospect->secteur : '',
                    $rdv->agent ? $rdv->agent->fullName() : '',
                    $rdv->partenaire ? $rdv->partenaire->fullName() : 'Non affecté',
                    $rdv->statusLabel(),
                    $rdv->qualification ? $rdv->qualification->resultat : 'Non qualifié',
                    $rdv->qualification ? $rdv->qualification->potentiel : '',
                ], ';');
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    /**
     * Exportation du Rapport au format PDF
     */
    public function exportPdf(Request $request)
    {
        $query = RendezVous::with(['prospect', 'agent', 'partenaire', 'qualification']);

        if ($request->filled('statut')) {
            $query->where('statut', $request->statut);
        }

        $rendezVousList = $query->orderBy('created_at', 'desc')->get();

        if (class_exists('\Barryvdh\DomPDF\Facade\Pdf')) {
            $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('pdf.callcenter_report', compact('rendezVousList'));
            return $pdf->download('rapport_callcenter_' . now()->format('Y-m-d') . '.pdf');
        }

        return back()->with('error', 'Le module PDF n\'est pas actif sur le serveur.');
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

        $redirectUrl = url()->previous();
        if (!str_contains($redirectUrl, 'tab=')) {
            $separator = str_contains($redirectUrl, '?') ? '&' : '?';
            $redirectUrl .= "{$separator}tab=utilisateurs";
        }

        return redirect($redirectUrl)->with('success', "Le compte {$roleLabel} '{$user->fullName()}' a été créé avec succès.");
    }

    /**
     * Modification d'un compte Agent ou Partenaire
     */
    public function updateUser(Request $request, User $user)
    {
        // Sécurité : autoriser uniquement la modification des comptes call center
        if (!in_array($user->role, ['callcenter_agent', 'callcenter_partenaire'])) {
            return back()->with('error', "Opération non autorisée sur cet utilisateur.");
        }

        $request->validate([
            'first_name'  => 'required|string|max:255',
            'last_name'   => 'required|string|max:255',
            'email'       => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore($user->id)],
            'phone'       => 'nullable|string|max:50',
            'institution' => 'nullable|string|max:255',
            'role'        => 'required|in:callcenter_agent,callcenter_partenaire',
            'password'    => 'nullable|string|min:6',
        ]);

        $updateData = [
            'first_name'  => $request->first_name,
            'last_name'   => $request->last_name,
            'email'       => $request->email,
            'phone'       => $request->phone,
            'institution' => $request->institution,
            'role'        => $request->role,
        ];

        if ($request->filled('password')) {
            $updateData['password'] = Hash::make($request->password);
        }

        $user->update($updateData);

        $roleLabel = $user->role === 'callcenter_agent' ? 'Agent Call Center' : 'Partenaire Call Center';

        $redirectUrl = url()->previous();
        if (!str_contains($redirectUrl, 'tab=')) {
            $separator = str_contains($redirectUrl, '?') ? '&' : '?';
            $redirectUrl .= "{$separator}tab=utilisateurs";
        }

        return redirect($redirectUrl)->with('success', "Le compte {$roleLabel} '{$user->fullName()}' a été mis à jour avec succès.");
    }

    /**
     * Suppression d'un compte Agent ou Partenaire
     */
    public function destroyUser(Request $request, User $user)
    {
        // Sécurité : autoriser uniquement la suppression des comptes call center
        if (!in_array($user->role, ['callcenter_agent', 'callcenter_partenaire'])) {
            return back()->with('error', "Opération non autorisée sur cet utilisateur.");
        }

        $fullName = $user->fullName();
        $roleLabel = $user->role === 'callcenter_agent' ? 'Agent' : 'Partenaire';

        // Nettoyage des notifications associées
        \Illuminate\Support\Facades\DB::table('notifications')
            ->where('notifiable_type', User::class)
            ->where('notifiable_id', $user->id)
            ->delete();

        // Si partenaire, remettre les rendez-vous non qualifiés en attente pour réaffectation
        if ($user->role === 'callcenter_partenaire') {
            RendezVous::where('partenaire_id', $user->id)
                ->where('statut', '!=', 'qualifie')
                ->update([
                    'partenaire_id' => null,
                    'statut'        => 'en_attente_affectation'
                ]);
        }

        $user->delete();

        $redirectUrl = url()->previous();
        if (!str_contains($redirectUrl, 'tab=')) {
            $separator = str_contains($redirectUrl, '?') ? '&' : '?';
            $redirectUrl .= "{$separator}tab=utilisateurs";
        }

        return redirect($redirectUrl)->with('success', "Le compte {$roleLabel} '{$fullName}' a été supprimé avec succès.");
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
