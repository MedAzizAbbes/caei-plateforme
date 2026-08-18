<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Registration;
use App\Models\Seminar;
use App\Models\Document;
use App\Models\Payment;
use App\Models\RendezVous;
use App\Models\Qualification;
use App\Models\CallCenterRequest;
use App\Models\MedicalRequest;
use App\Models\ClinicPartner;
use App\Models\DigitalMoovContact;
use App\Models\EliteTrainingAppointment;
use App\Models\Formation;
use App\Models\Recrutement;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    /**
     * Display the Executive BI Admin Dashboard.
     */
    public function index()
    {
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            return view('dashboard');
        }

        // --- 1. SÉMINAIRES & FORMATIONS B2B ---
        $totalParticipants = User::where('role', 'participant')->count();
        $totalRegistrations = Registration::count();
        $totalPresent = Registration::where('status', 'present')->count();
        $totalAbsent = Registration::where('status', 'absent')->count();
        $totalInscribedOnly = max(0, $totalRegistrations - ($totalPresent + $totalAbsent));
        $attendanceRate = $totalRegistrations > 0 ? round(($totalPresent / $totalRegistrations) * 100, 1) : 0;

        $totalSeminars = Seminar::count();
        $publishedSeminars = Seminar::where('status', 'published')->count();
        $totalSeminarDocuments = Document::count();

        $institutionsCount = User::where('role', 'participant')
            ->whereNotNull('institution')
            ->where('institution', '!=', '')
            ->distinct('institution')
            ->count('institution');

        $topInstitutions = User::where('role', 'participant')
            ->whereNotNull('institution')
            ->where('institution', '!=', '')
            ->groupBy('institution')
            ->select('institution', DB::raw('count(*) as count'))
            ->orderByDesc('count')
            ->limit(5)
            ->get();

        $bySeminar = Seminar::withCount([
            'registrations',
            'registrations as presents_count' => fn($q) => $q->where('status', 'present')
        ])
        ->orderByDesc('registrations_count')
        ->limit(6)
        ->get();

        // --- 2. FINANCES & PAIEMENTS (REVENUE BI) ---
        $totalRevenue = Payment::whereIn('status', ['paid', 'approved'])->sum('amount');
        $pendingRevenue = Payment::whereIn('status', ['pending', 'arrangement_pending'])->sum('amount');
        $paymentsByMethod = Payment::select('payment_method', DB::raw('count(*) as count'), DB::raw('sum(amount) as total_amount'))
            ->groupBy('payment_method')
            ->get()
            ->keyBy('payment_method')
            ->toArray();

        // --- 3. CALL CENTER OUTSOURCING ---
        $totalCallCenterRDV = RendezVous::count();
        $totalQualifiedRDV = Qualification::where('resultat', 'Prospect qualifié')->count();
        $totalInterestedRDV = Qualification::where('resultat', 'Prospect intéressé')->count();
        $totalPendingRDV = RendezVous::whereIn('statut', ['en_attente_affectation', 'en_attente'])->count();
        $totalCallCenterRequests = CallCenterRequest::count();
        $callCenterConversionRate = $totalCallCenterRDV > 0 ? round((($totalQualifiedRDV + $totalInterestedRDV) / $totalCallCenterRDV) * 100, 1) : 0;

        $qualificationStats = Qualification::select('resultat', DB::raw('count(*) as count'))
            ->groupBy('resultat')
            ->pluck('count', 'resultat')
            ->toArray();

        $callCenterSecteurs = CallCenterRequest::select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();

        // --- 4. CAEI MEDICAL CENTER & CLINICS ---
        $totalMedicalRequests = MedicalRequest::count();
        $pendingMedicalRequests = MedicalRequest::where('status', 'en_attente')->count();
        $processedMedicalRequests = MedicalRequest::whereIn('status', ['traite', 'affecte'])->count();
        $totalClinics = ClinicPartner::count();
        $medicalDevisTotalSum = MedicalRequest::whereNotNull('devis_amount')->sum('devis_amount');

        // --- 5. DIGITAL MOOV (AGENCE MARKETING DIGITAL) ---
        $totalDigitalMoovContacts = DigitalMoovContact::count();
        $digitalMoovByStatus = DigitalMoovContact::select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();

        // --- 6. ELITE TRAINING (EXECUTIVE EDUCATION) ---
        $totalEliteAppointments = EliteTrainingAppointment::count();
        $eliteByMode = EliteTrainingAppointment::select('participation_mode', DB::raw('count(*) as count'))
            ->groupBy('participation_mode')
            ->pluck('count', 'participation_mode')
            ->toArray();
        $totalFormationsElite = Formation::count();

        // --- 7. RECRUTEMENT & TALENT RH ---
        $totalRecrutements = Recrutement::count();

        // --- 8. ÉCOSYSTÈME UTILISATEURS ---
        $totalUsers = User::count();
        $usersByRole = User::select('role', DB::raw('count(*) as count'))
            ->groupBy('role')
            ->pluck('count', 'role')
            ->toArray();

        // --- 9. UNIFIED REAL-TIME OPERATIONAL LOG (ALL 7 SERVICES) ---
        $recentCallCenter = RendezVous::with(['prospect', 'qualification'])->latest()->limit(6)->get()->map(function($item) {
            return [
                'id' => $item->id,
                'service' => 'Call Center',
                'service_code' => 'callcenter',
                'service_badge' => '📞 Call Center',
                'badge_class' => 'bg-amber-50 text-amber-900 border-amber-300 font-black',
                'name' => $item->prospect ? $item->prospect->nomComplet() : 'Prospect',
                'contact' => $item->prospect ? $item->prospect->telephone : '—',
                'detail' => $item->qualification ? $item->qualification->resultat : $item->statusLabel(),
                'action_url' => route('admin.callcenter.index'),
                'date' => $item->created_at,
            ];
        });

        $recentMedical = MedicalRequest::latest()->limit(6)->get()->map(function($item) {
            return [
                'id' => $item->id,
                'service' => 'Médical',
                'service_code' => 'medical',
                'service_badge' => '🏥 Médical',
                'badge_class' => 'bg-rose-50 text-rose-900 border-rose-300 font-black',
                'name' => $item->fullname,
                'contact' => $item->phone ?? $item->email,
                'detail' => $item->devis_amount ? 'Devis émis: ' . number_format($item->devis_amount, 0) . ' €' : ($item->service_type ?? ucfirst($item->status ?? 'Nouveau')),
                'action_url' => route('admin.medical-requests.index'),
                'date' => $item->created_at,
            ];
        });

        $recentDigitalMoov = DigitalMoovContact::latest()->limit(6)->get()->map(function($item) {
            return [
                'id' => $item->id,
                'service' => 'Digital Moov',
                'service_code' => 'digitalmoov',
                'service_badge' => '🚀 Digital Moov',
                'badge_class' => 'bg-cyan-50 text-cyan-900 border-cyan-300 font-black',
                'name' => $item->name,
                'contact' => $item->email,
                'detail' => $item->subject ?? 'Demande Agence Web',
                'action_url' => route('admin.digitalmoov.index'),
                'date' => $item->created_at,
            ];
        });

        $recentElite = EliteTrainingAppointment::latest()->limit(6)->get()->map(function($item) {
            return [
                'id' => $item->id,
                'service' => 'Elite Training',
                'service_code' => 'elite',
                'service_badge' => '🎓 Elite Exec',
                'badge_class' => 'bg-indigo-50 text-indigo-900 border-indigo-300 font-black',
                'name' => $item->fullname,
                'contact' => $item->phone ?? $item->email,
                'detail' => $item->participation_mode ? 'Mode: ' . ucfirst($item->participation_mode) : 'RDV Exécutif',
                'action_url' => route('admin.elite-training.index'),
                'date' => $item->created_at,
            ];
        });

        $recentRecrutement = Recrutement::latest()->limit(6)->get()->map(function($item) {
            return [
                'id' => $item->id,
                'service' => 'Recrutement',
                'service_code' => 'recrutement',
                'service_badge' => '📄 Recrutement RH',
                'badge_class' => 'bg-emerald-50 text-emerald-900 border-emerald-300 font-black',
                'name' => $item->prenom . ' ' . $item->nom,
                'contact' => $item->telephone ?? $item->email,
                'detail' => 'Candidature CV: ' . ($item->domaine ?? 'Spécialité'),
                'action_url' => route('admin.recrutements.index'),
                'date' => $item->created_at,
            ];
        });

        $recentPayments = Payment::with(['user'])->latest()->limit(6)->get()->map(function($item) {
            return [
                'id' => $item->id,
                'service' => 'Finances',
                'service_code' => 'finance',
                'service_badge' => '💰 Finance',
                'badge_class' => 'bg-purple-50 text-purple-900 border-purple-300 font-black',
                'name' => $item->user ? $item->user->fullName() : ($item->contact_person ?? 'Participant'),
                'contact' => $item->contact_email ?? ($item->user ? $item->user->email : '—'),
                'detail' => 'Paiement: ' . number_format($item->amount, 0) . ' € (' . $item->methodLabel() . ') — ' . $item->statusLabel(),
                'action_url' => route('admin.arrangements.index'),
                'date' => $item->created_at,
            ];
        });

        $unifiedActivityFeed = collect()
            ->merge($recentCallCenter)
            ->merge($recentMedical)
            ->merge($recentDigitalMoov)
            ->merge($recentElite)
            ->merge($recentRecrutement)
            ->merge($recentPayments)
            ->sortByDesc('date')
            ->take(24);

        return view('dashboard', compact(
            'totalParticipants',
            'totalRegistrations',
            'totalPresent',
            'totalAbsent',
            'totalInscribedOnly',
            'attendanceRate',
            'totalSeminars',
            'publishedSeminars',
            'totalSeminarDocuments',
            'institutionsCount',
            'topInstitutions',
            'bySeminar',
            'totalRevenue',
            'pendingRevenue',
            'paymentsByMethod',
            'totalCallCenterRDV',
            'totalQualifiedRDV',
            'totalInterestedRDV',
            'totalPendingRDV',
            'totalCallCenterRequests',
            'callCenterConversionRate',
            'qualificationStats',
            'callCenterSecteurs',
            'totalMedicalRequests',
            'pendingMedicalRequests',
            'processedMedicalRequests',
            'totalClinics',
            'medicalDevisTotalSum',
            'totalDigitalMoovContacts',
            'digitalMoovByStatus',
            'totalEliteAppointments',
            'eliteByMode',
            'totalFormationsElite',
            'totalRecrutements',
            'totalUsers',
            'usersByRole',
            'unifiedActivityFeed'
        ));
    }
}
