<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MonitoringController extends Controller
{
    public function index()
    {
        $metrics = $this->gatherMetrics();
        return view('admin.monitoring.index', compact('metrics'));
    }

    public function api()
    {
        return response()->json($this->gatherMetrics());
    }

    private function gatherMetrics(): array
    {
        $startTime = microtime(true);
        $dbStatus = 'OK';
        $dbLatency = 0;

        try {
            DB::select('SELECT 1');
            $dbLatency = round((microtime(true) - $startTime) * 1000, 2);
        } catch (\Throwable $e) {
            $dbStatus = 'ERROR';
        }

        $totalUsers = \App\Models\User::count();
        $totalRendezVous = \App\Models\RendezVous::count();
        $pendingRendezVous = \App\Models\RendezVous::where('statut', 'en_attente')->count();
        $totalSeminars = \App\Models\Seminar::count();
        $totalRegistrations = \App\Models\Registration::count();
        $totalMedicalRequests = \App\Models\MedicalRequest::count();

        $recentActivity = [];

        $rdvs = \App\Models\RendezVous::with(['qualification'])->latest()->limit(4)->get();
        foreach ($rdvs as $rdv) {
            $recentActivity[] = [
                'type'     => 'Call Center RDV',
                'title'    => 'Prospect: ' . $rdv->nom_prospect,
                'detail'   => 'Statut: ' . ($rdv->qualification->resultat ?? $rdv->statut),
                'status'   => 'info',
                'time'     => $rdv->created_at ? $rdv->created_at->diffForHumans() : '-',
            ];
        }

        $meds = \App\Models\MedicalRequest::latest()->limit(4)->get();
        foreach ($meds as $med) {
            $recentActivity[] = [
                'type'     => 'Demande Médicale',
                'title'    => 'Devis: ' . $med->fullname,
                'detail'   => 'Statut: ' . $med->status,
                'status'   => 'warning',
                'time'     => $med->created_at ? $med->created_at->diffForHumans() : '-',
            ];
        }

        return [
            'system' => [
                'app_name'       => config('app.name', 'CAEI Plateforme'),
                'environment'    => app()->environment(),
                'php_version'    => PHP_VERSION,
                'laravel_version' => app()->version(),
                'db_status'      => $dbStatus,
                'db_latency_ms'  => $dbLatency,
                'server_time'    => now()->format('d/m/Y H:i:s'),
                'memory_usage'   => round(memory_get_usage(true) / 1024 / 1024, 2) . ' MB',
            ],
            'counters' => [
                'users'            => $totalUsers,
                'rdv_total'        => $totalRendezVous,
                'rdv_pending'      => $pendingRendezVous,
                'seminars'         => $totalSeminars,
                'registrations'    => $totalRegistrations,
                'medical_requests' => $totalMedicalRequests,
            ],
            'recent_activity' => $recentActivity,
        ];
    }
}
