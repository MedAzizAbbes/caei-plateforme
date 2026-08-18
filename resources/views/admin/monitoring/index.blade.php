@extends('layouts.app')

@section('content')
<div class="flex min-h-screen -mt-8 -mx-4 sm:-mx-6 lg:-mx-8" style="background: linear-gradient(135deg, rgba(241, 245, 249, 0.9) 0%, rgba(226, 232, 240, 0.92) 100%);">
    
    {{-- Sidebar Admin --}}
    <x-admin-sidebar />

    {{-- Monitoring Dashboard Content --}}
    <div class="flex-1 p-6 md:p-10 overflow-y-auto">
        
        {{-- Executive BI Control Banner --}}
        <div class="mb-8 rounded-2xl p-8 text-white shadow-xl flex flex-col md:flex-row md:items-center justify-between gap-6 relative overflow-hidden" style="background: linear-gradient(135deg, rgba(6, 23, 67, 0.95) 0%, rgba(2, 10, 30, 0.98) 100%);">
            <div class="absolute -right-6 -bottom-8 opacity-15 text-8xl pointer-events-none select-none">⚡</div>
            <div class="relative z-10 space-y-2">
                <div class="flex items-center gap-2">
                    <span class="inline-flex items-center gap-1.5 bg-[#f2a90f] text-[#061743] text-xs font-black px-3 py-1 rounded-md uppercase tracking-wider">
                        ⚡ SYSTEM MONITORING & HEALTH
                    </span>
                    <span class="inline-flex items-center gap-1.5 bg-emerald-500/20 text-emerald-300 text-xs font-bold px-2.5 py-0.5 rounded-full border border-emerald-500/30">
                        <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                        <span id="live-status-label">SYS_OK</span>
                    </span>
                </div>
                <h1 class="text-3xl font-black uppercase tracking-tight">Console de Monitoring Système & Serveur</h1>
                <p class="text-slate-300 text-sm">Surveillance en temps réel de la base de données, des performances serveur et de l'activité multi-services.</p>
            </div>
            
            <div class="shrink-0 flex items-center gap-3">
                <button id="btn-toggle-auto" onclick="toggleAutoRefresh()" class="inline-flex items-center gap-2 px-4 py-2.5 bg-emerald-500 hover:bg-emerald-400 text-[#061743] font-black text-xs rounded-xl shadow transition">
                    <span id="auto-spin" class="w-2 h-2 rounded-full bg-[#061743] animate-ping"></span>
                    <span id="auto-btn-text">Auto-Refresh : Actif (5s)</span>
                </button>
                <button onclick="manualRefresh()" class="inline-flex items-center gap-2 px-4 py-2.5 bg-white/10 hover:bg-white/20 text-white font-bold text-xs rounded-xl border border-white/20 transition">
                    🔄 Rafraîchir
                </button>
            </div>
        </div>

        {{-- 4 Health & Environment KPI Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
            {{-- DB Latency --}}
            <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm flex items-center justify-between">
                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Latence MySQL (Ping)</p>
                    <p class="text-2xl font-black text-slate-900 mt-1" id="db-latency-val">{{ $metrics['system']['db_latency_ms'] }} ms</p>
                    <span class="inline-block text-[10px] font-bold text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded mt-1" id="db-status-val">Statut: {{ $metrics['system']['db_status'] }}</span>
                </div>
                <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold text-xl">🗄️</div>
            </div>

            {{-- Memory Usage --}}
            <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm flex items-center justify-between">
                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Mémoire RAM (PHP)</p>
                    <p class="text-2xl font-black text-slate-900 mt-1" id="memory-val">{{ $metrics['system']['memory_usage'] }}</p>
                    <span class="inline-block text-[10px] font-bold text-blue-600 bg-blue-50 px-2 py-0.5 rounded mt-1">PHP {{ $metrics['system']['php_version'] }}</span>
                </div>
                <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center font-bold text-xl">💻</div>
            </div>

            {{-- Server Time --}}
            <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm flex items-center justify-between">
                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Heure Serveur</p>
                    <p class="text-lg font-black text-slate-900 mt-1" id="server-time-val">{{ $metrics['system']['server_time'] }}</p>
                    <span class="inline-block text-[10px] font-bold text-purple-600 bg-purple-50 px-2 py-0.5 rounded mt-1">Env: {{ $metrics['system']['environment'] }}</span>
                </div>
                <div class="w-12 h-12 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center font-bold text-xl">⏱️</div>
            </div>

            {{-- Platform Version --}}
            <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm flex items-center justify-between">
                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Framework Engine</p>
                    <p class="text-xl font-black text-slate-900 mt-1">Laravel v{{ $metrics['system']['laravel_version'] }}</p>
                    <span class="inline-block text-[10px] font-bold text-amber-700 bg-amber-50 px-2 py-0.5 rounded mt-1">CAEI Core 3.4</span>
                </div>
                <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center font-bold text-xl">⚡</div>
            </div>
        </div>

        {{-- Multi-Service Real-Time Metric Counters --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
            
            {{-- Section 1: Call Center Metrics --}}
            <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm">
                <div class="flex items-center justify-between mb-4 pb-3 border-b border-slate-100">
                    <h3 class="font-black text-[#061743] text-xs uppercase tracking-widest flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-[#f2a90f]"></span>
                        📞 Call Center Metrics
                    </h3>
                    <span class="text-[10px] font-bold text-amber-700 bg-amber-50 px-2 py-0.5 rounded">Real-time</span>
                </div>
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-3 bg-slate-50 rounded-xl">
                        <span class="text-xs font-bold text-slate-600">Total Rendez-Vous</span>
                        <span class="text-lg font-black text-slate-900" id="cnt-rdv-total">{{ number_format($metrics['counters']['rdv_total']) }}</span>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-amber-50 rounded-xl border border-amber-200">
                        <span class="text-xs font-bold text-amber-900">RDV En Attente Affectation</span>
                        <span class="text-lg font-black text-amber-700" id="cnt-rdv-pending">{{ number_format($metrics['counters']['rdv_pending']) }}</span>
                    </div>
                </div>
            </div>

            {{-- Section 2: Séminaires Metrics --}}
            <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm">
                <div class="flex items-center justify-between mb-4 pb-3 border-b border-slate-100">
                    <h3 class="font-black text-[#061743] text-xs uppercase tracking-widest flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-blue-600"></span>
                        🎓 Séminaires Metrics
                    </h3>
                    <span class="text-[10px] font-bold text-blue-700 bg-blue-50 px-2 py-0.5 rounded">B2B Courses</span>
                </div>
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-3 bg-slate-50 rounded-xl">
                        <span class="text-xs font-bold text-slate-600">Séminaires au Catalogue</span>
                        <span class="text-lg font-black text-slate-900" id="cnt-seminars">{{ number_format($metrics['counters']['seminars']) }}</span>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-blue-50 rounded-xl border border-blue-200">
                        <span class="text-xs font-bold text-blue-900">Total Inscriptions</span>
                        <span class="text-lg font-black text-blue-700" id="cnt-registrations">{{ number_format($metrics['counters']['registrations']) }}</span>
                    </div>
                </div>
            </div>

            {{-- Section 3: Médical & Utilisateurs --}}
            <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm">
                <div class="flex items-center justify-between mb-4 pb-3 border-b border-slate-100">
                    <h3 class="font-black text-[#061743] text-xs uppercase tracking-widest flex items-center gap-2">
                        <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
                        🏥 Médical & Utilisateurs
                    </h3>
                    <span class="text-[10px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded">Platform Hub</span>
                </div>
                <div class="space-y-4">
                    <div class="flex items-center justify-between p-3 bg-slate-50 rounded-xl">
                        <span class="text-xs font-bold text-slate-600">Comptes Utilisateurs Actifs</span>
                        <span class="text-lg font-black text-slate-900" id="cnt-users">{{ number_format($metrics['counters']['users']) }}</span>
                    </div>
                    <div class="flex items-center justify-between p-3 bg-rose-50 rounded-xl border border-rose-200">
                        <span class="text-xs font-bold text-rose-900">Demandes Devis Médicaux</span>
                        <span class="text-lg font-black text-rose-700" id="cnt-medical">{{ number_format($metrics['counters']['medical_requests']) }}</span>
                    </div>
                </div>
            </div>

        </div>

        {{-- Live Stream Console Activity Feed --}}
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="p-6 border-b border-slate-100 flex items-center justify-between">
                <div>
                    <span class="text-xs font-black uppercase text-[#f2a90f] tracking-widest">LIVE EVENT STREAM</span>
                    <h3 class="text-lg font-black uppercase text-[#061743] mt-0.5">Flux d'Activité Système en Temps Réel</h3>
                </div>
                <span class="text-xs font-bold text-slate-400">Flux instantané (WebSocket/AJAX)</span>
            </div>
            
            <div class="p-6 bg-slate-950 text-slate-200 font-mono text-xs overflow-x-auto rounded-b-2xl min-h-[220px]" id="activity-log-container">
                @foreach($metrics['recent_activity'] as $act)
                    <div class="py-2 border-b border-slate-800 flex items-center justify-between gap-4 hover:bg-slate-900 px-2 rounded transition">
                        <div class="flex items-center gap-3">
                            <span class="text-emerald-400 font-bold">[MONITOR]</span>
                            <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase bg-slate-800 text-amber-400">{{ $act['type'] }}</span>
                            <span class="text-slate-100 font-semibold">{{ $act['title'] }}</span>
                            <span class="text-slate-400">({{ $act['detail'] }})</span>
                        </div>
                        <span class="text-slate-500 shrink-0 text-[11px]">{{ $act['time'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
</div>

<script>
    let autoRefreshActive = true;
    let refreshInterval = null;

    function toggleAutoRefresh() {
        autoRefreshActive = !autoRefreshActive;
        const btnText = document.getElementById('auto-btn-text');
        const spin = document.getElementById('auto-spin');
        
        if (autoRefreshActive) {
            btnText.textContent = "Auto-Refresh : Actif (5s)";
            spin.classList.add('animate-ping');
            startPolling();
        } else {
            btnText.textContent = "Auto-Refresh : Inactif";
            spin.classList.remove('animate-ping');
            if (refreshInterval) clearInterval(refreshInterval);
        }
    }

    async function manualRefresh() {
        try {
            const res = await fetch("{{ route('admin.monitoring.api') }}");
            if (!res.ok) return;
            const data = await res.json();
            
            // Update KPIs
            document.getElementById('db-latency-val').textContent = data.system.db_latency_ms + ' ms';
            document.getElementById('db-status-val').textContent = 'Statut: ' + data.system.db_status;
            document.getElementById('memory-val').textContent = data.system.memory_usage;
            document.getElementById('server-time-val').textContent = data.system.server_time;

            document.getElementById('cnt-rdv-total').textContent = data.counters.rdv_total;
            document.getElementById('cnt-rdv-pending').textContent = data.counters.rdv_pending;
            document.getElementById('cnt-seminars').textContent = data.counters.seminars;
            document.getElementById('cnt-registrations').textContent = data.counters.registrations;
            document.getElementById('cnt-users').textContent = data.counters.users;
            document.getElementById('cnt-medical').textContent = data.counters.medical_requests;

            // Render log feed
            const container = document.getElementById('activity-log-container');
            if (data.recent_activity && data.recent_activity.length > 0) {
                container.innerHTML = data.recent_activity.map(act => `
                    <div class="py-2 border-b border-slate-800 flex items-center justify-between gap-4 hover:bg-slate-900 px-2 rounded transition">
                        <div class="flex items-center gap-3">
                            <span class="text-emerald-400 font-bold">[MONITOR]</span>
                            <span class="px-2 py-0.5 rounded text-[10px] font-bold uppercase bg-slate-800 text-amber-400">${act.type}</span>
                            <span class="text-slate-100 font-semibold">${act.title}</span>
                            <span class="text-slate-400">(${act.detail})</span>
                        </div>
                        <span class="text-slate-500 shrink-0 text-[11px]">${act.time}</span>
                    </div>
                `).join('');
            }
        } catch (e) {
            console.error("Monitoring fetch failed", e);
        }
    }

    function startPolling() {
        if (refreshInterval) clearInterval(refreshInterval);
        refreshInterval = setInterval(manualRefresh, 5000);
    }

    document.addEventListener('DOMContentLoaded', () => {
        startPolling();
    });
</script>
@endsection
