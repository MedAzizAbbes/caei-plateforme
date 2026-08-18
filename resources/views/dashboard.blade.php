<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <div class="flex items-center gap-2">
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-black bg-[#f2a90f] text-[#061743] uppercase tracking-wider">
                        ⚡ EXECUTIVE BI ANALYTICS
                    </span>
                    <span class="text-xs font-bold text-slate-500">v3.4 — Données en temps réel</span>
                </div>
                <h2 class="font-black text-2xl uppercase tracking-tight text-[#061743] mt-1">
                    Tableau de bord BI Administrateur
                </h2>
            </div>
            @if(Auth::user()->isAdmin())
                <div class="flex items-center gap-2">
                    <a href="{{ route('admin.seminars.index') }}" class="inline-flex items-center gap-2 px-3.5 py-2 bg-[#061743] hover:bg-[#0a2060] text-white text-xs font-bold rounded-xl shadow transition">
                        🎓 Séminaires
                    </a>
                    <a href="{{ route('admin.callcenter.index') }}" class="inline-flex items-center gap-2 px-3.5 py-2 bg-[#f2a90f] hover:bg-[#d9950b] text-[#061743] text-xs font-black rounded-xl shadow transition">
                        📞 Call Center Admin
                    </a>
                </div>
            @endif
        </div>
    </x-slot>

    <div class="py-8 bg-slate-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            {{-- Welcome Banner --}}
            <div class="bg-gradient-to-r from-[#061743] via-[#0c2b64] to-[#061743] rounded-3xl p-8 text-white shadow-2xl relative overflow-hidden">
                <div class="absolute -right-10 -bottom-10 opacity-10 text-9xl pointer-events-none select-none">📊</div>
                <div class="relative z-10 grid grid-cols-1 lg:grid-cols-3 gap-6 items-center">
                    <div class="lg:col-span-2 space-y-3">
                        <div class="inline-flex items-center gap-2 text-xs font-black uppercase tracking-widest text-[#f2a90f] bg-white/10 px-3 py-1 rounded-lg backdrop-blur-md">
                            <span>🏛️ CAEI GROUP ENTERPRISE BI</span>
                        </div>
                        <h3 class="text-3xl font-black uppercase tracking-tight">Vue Consolidée Multi-Services</h3>
                        <p class="text-slate-300 text-sm leading-relaxed max-w-2xl">
                            Pilotez l'ensemble de l'écosystème CAEI : qualification Call Center, taux de présence des séminaires B2B, demandes médicales et activité globale des utilisateurs.
                        </p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-md rounded-2xl p-5 border border-white/15 text-center">
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-300">Taux global de qualification & présence</p>
                        <p class="text-4xl font-black text-[#f2a90f] mt-1">
                            @if(isset($attendanceRate) && isset($callCenterConversionRate))
                                {{ round(($attendanceRate + $callCenterConversionRate) / 2, 1) }}%
                            @else
                                --
                            @endif
                        </p>
                        <span class="inline-block mt-2 text-[11px] font-semibold text-emerald-400 bg-emerald-500/20 px-2.5 py-0.5 rounded-full">
                            ▲ Performance Écosystème
                        </span>
                    </div>
                </div>
            </div>

            @if(Auth::user()->isAdmin())
                {{-- 5 High-Density Executive KPI Cards --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-4">
                    {{-- KPI 1: Call Center RDV --}}
                    <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm hover:shadow-md transition group">
                        <div class="flex items-center justify-between mb-3">
                            <span class="w-10 h-10 rounded-xl bg-amber-50 text-[#f2a90f] flex items-center justify-center font-bold text-lg">📞</span>
                            <span class="text-[10px] font-black uppercase px-2 py-0.5 bg-amber-100 text-amber-800 rounded-md">Call Center</span>
                        </div>
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">RDV & Prospects</p>
                        <div class="flex items-baseline justify-between mt-1">
                            <p class="text-2xl font-black text-slate-900">{{ number_format($totalCallCenterRDV ?? 0) }}</p>
                            <span class="text-xs font-bold text-emerald-600">{{ $totalQualifiedRDV ?? 0 }} qualifiés</span>
                        </div>
                        <div class="w-full bg-slate-100 h-1.5 rounded-full mt-3 overflow-hidden">
                            <div class="bg-[#f2a90f] h-full rounded-full" style="width: {{ min(100, $callCenterConversionRate ?? 0) }}%"></div>
                        </div>
                    </div>

                    {{-- KPI 2: Séminaires Inscriptions --}}
                    <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm hover:shadow-md transition group">
                        <div class="flex items-center justify-between mb-3">
                            <span class="w-10 h-10 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center font-bold text-lg">🎓</span>
                            <span class="text-[10px] font-black uppercase px-2 py-0.5 bg-blue-100 text-blue-800 rounded-md">Séminaires</span>
                        </div>
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Inscriptions</p>
                        <div class="flex items-baseline justify-between mt-1">
                            <p class="text-2xl font-black text-slate-900">{{ number_format($totalRegistrations ?? 0) }}</p>
                            <span class="text-xs font-bold text-blue-600">{{ $totalSeminars ?? 0 }} séminaires</span>
                        </div>
                        <div class="w-full bg-slate-100 h-1.5 rounded-full mt-3 overflow-hidden">
                            <div class="bg-blue-600 h-full rounded-full" style="width: {{ min(100, $attendanceRate ?? 0) }}%"></div>
                        </div>
                    </div>

                    {{-- KPI 3: Présences enregistrées --}}
                    <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm hover:shadow-md transition group">
                        <div class="flex items-center justify-between mb-3">
                            <span class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold text-lg">✅</span>
                            <span class="text-[10px] font-black uppercase px-2 py-0.5 bg-emerald-100 text-emerald-800 rounded-md">Présences</span>
                        </div>
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Taux de présence</p>
                        <div class="flex items-baseline justify-between mt-1">
                            <p class="text-2xl font-black text-slate-900">{{ $attendanceRate ?? 0 }}%</p>
                            <span class="text-xs font-bold text-emerald-600">{{ $totalPresent ?? 0 }} présents</span>
                        </div>
                        <div class="w-full bg-slate-100 h-1.5 rounded-full mt-3 overflow-hidden">
                            <div class="bg-emerald-500 h-full rounded-full" style="width: {{ min(100, $attendanceRate ?? 0) }}%"></div>
                        </div>
                    </div>

                    {{-- KPI 4: Demandes Médicales --}}
                    <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm hover:shadow-md transition group">
                        <div class="flex items-center justify-between mb-3">
                            <span class="w-10 h-10 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center font-bold text-lg">🏥</span>
                            <span class="text-[10px] font-black uppercase px-2 py-0.5 bg-rose-100 text-rose-800 rounded-md">Médical</span>
                        </div>
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Demandes & Devis</p>
                        <div class="flex items-baseline justify-between mt-1">
                            <p class="text-2xl font-black text-slate-900">{{ number_format($totalMedicalRequests ?? 0) }}</p>
                            <span class="text-xs font-bold text-rose-600">{{ $totalClinics ?? 0 }} cliniques</span>
                        </div>
                        <div class="w-full bg-slate-100 h-1.5 rounded-full mt-3 overflow-hidden">
                            <div class="bg-rose-500 h-full rounded-full" style="width: {{ $totalMedicalRequests > 0 ? min(100, round(($processedMedicalRequests / $totalMedicalRequests) * 100)) : 0 }}%"></div>
                        </div>
                    </div>

                    {{-- KPI 5: Utilisateurs & Écosystème --}}
                    <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm hover:shadow-md transition group">
                        <div class="flex items-center justify-between mb-3">
                            <span class="w-10 h-10 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center font-bold text-lg">👥</span>
                            <span class="text-[10px] font-black uppercase px-2 py-0.5 bg-purple-100 text-purple-800 rounded-md">Écosystème</span>
                        </div>
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Utilisateurs actifs</p>
                        <div class="flex items-baseline justify-between mt-1">
                            <p class="text-2xl font-black text-slate-900">{{ number_format($totalUsers ?? 0) }}</p>
                            <span class="text-xs font-bold text-purple-600">{{ $institutionsCount ?? 0 }} inst.</span>
                        </div>
                        <div class="w-full bg-slate-100 h-1.5 rounded-full mt-3 overflow-hidden">
                            <div class="bg-purple-600 h-full rounded-full" style="width: 100%"></div>
                        </div>
                    </div>
                </div>

                {{-- Interactive BI Visualizations Grid --}}
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    
                    {{-- Chart 1: Call Center Qualification Breakdown --}}
                    <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm relative overflow-hidden">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="font-black text-[#061743] text-xs uppercase tracking-widest flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-[#f2a90f]"></span>
                                Call Center — Résultats Qualifications
                            </h3>
                            <span class="text-[10px] font-bold text-slate-400 uppercase">Données RDV</span>
                        </div>
                        <div class="relative h-64">
                            <canvas id="qualificationChart"></canvas>
                        </div>
                    </div>

                    {{-- Chart 2: Séminaires Attendance & Presences --}}
                    <div class="bg-white rounded-2xl p-6 lg:col-span-2 border border-slate-200 shadow-sm relative overflow-hidden">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="font-black text-[#061743] text-xs uppercase tracking-widest flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-blue-600"></span>
                                Séminaires — Inscriptions vs Présences
                            </h3>
                            <span class="text-[10px] font-bold text-slate-400 uppercase">B2B Seminars</span>
                        </div>
                        <div class="relative h-64">
                            <canvas id="seminarChart"></canvas>
                        </div>
                    </div>

                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    
                    {{-- Chart 3: Top 5 Institutions --}}
                    <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm relative overflow-hidden">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="font-black text-[#061743] text-xs uppercase tracking-widest flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-purple-600"></span>
                                Top 5 Institutions & Entreprises
                            </h3>
                            <span class="text-[10px] font-bold text-slate-400 uppercase">Partenaires</span>
                        </div>
                        <div class="relative h-64">
                            <canvas id="institutionsChart"></canvas>
                        </div>
                    </div>

                    {{-- Chart 4: Roles Utilisateurs Breakdown --}}
                    <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm relative overflow-hidden">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="font-black text-[#061743] text-xs uppercase tracking-widest flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
                                Répartition des Rôles Plateforme
                            </h3>
                            <span class="text-[10px] font-bold text-slate-400 uppercase">Écosystème</span>
                        </div>
                        <div class="relative h-64">
                            <canvas id="rolesChart"></canvas>
                        </div>
                    </div>

                    {{-- Chart 5: Secteurs de demandes Call Center --}}
                    <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm relative overflow-hidden">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="font-black text-[#061743] text-xs uppercase tracking-widest flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-rose-500"></span>
                                Statuts Demandes Site Web
                            </h3>
                            <span class="text-[10px] font-bold text-slate-400 uppercase">Demandes Web</span>
                        </div>
                        <div class="relative h-64">
                            <canvas id="secteursChart"></canvas>
                        </div>
                    </div>

                </div>

                {{-- Unified Operational Data Log (Activité Multi-Services en Temps Réel) --}}
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="p-6 border-b border-slate-100 flex flex-col md:flex-row md:items-center justify-between gap-4">
                        <div>
                            <span class="text-xs font-black uppercase text-[#f2a90f] tracking-widest">REAL-TIME MONITORING</span>
                            <h3 class="text-lg font-black uppercase text-[#061743] mt-0.5">Dernières Activités Multi-Services</h3>
                        </div>
                        <div class="flex items-center gap-2">
                            <a href="{{ route('admin.callcenter.index') }}" class="px-3 py-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-[#061743] text-xs font-bold transition">
                                📞 Call Center Log
                            </a>
                            <a href="{{ route('admin.seminars.index') }}" class="px-3 py-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-[#061743] text-xs font-bold transition">
                                🎓 Séminaires Log
                            </a>
                        </div>
                    </div>

                    <div class="p-6">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-slate-200 text-xs">
                                <thead>
                                    <tr class="bg-slate-50 text-[10px] font-black uppercase text-slate-500">
                                        <th class="px-4 py-3 text-left">Service</th>
                                        <th class="px-4 py-3 text-left">Nom / Prospect / Participant</th>
                                        <th class="px-4 py-3 text-left">Contact / Téléphone</th>
                                        <th class="px-4 py-3 text-left">Statut / Qualification</th>
                                        <th class="px-4 py-3 text-right">Date</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 font-medium text-slate-700">
                                    {{-- Recent Call Center RDVs --}}
                                    @if(isset($recentCallCenterRDV) && $recentCallCenterRDV->isNotEmpty())
                                        @foreach($recentCallCenterRDV as $rdv)
                                            <tr class="hover:bg-slate-50 transition">
                                                <td class="px-4 py-3 whitespace-nowrap">
                                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md text-[10px] font-black bg-amber-50 text-amber-800 border border-amber-200">
                                                        📞 Call Center
                                                    </span>
                                                </td>
                                                <td class="px-4 py-3 font-bold text-slate-900">{{ $rdv->nom_prospect }}</td>
                                                <td class="px-4 py-3 text-slate-600">{{ $rdv->telephone_prospect }}</td>
                                                <td class="px-4 py-3 whitespace-nowrap">
                                                    @if($rdv->qualification && $rdv->qualification->resultat)
                                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200">
                                                            {{ $rdv->qualification->resultat }}
                                                        </span>
                                                    @else
                                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-bold bg-slate-100 text-slate-600">
                                                            {{ ucfirst($rdv->statut) }}
                                                        </span>
                                                    @endif
                                                </td>
                                                <td class="px-4 py-3 text-right text-slate-500 whitespace-nowrap">{{ $rdv->created_at ? $rdv->created_at->format('d/m/Y H:i') : '-' }}</td>
                                            </tr>
                                        @endforeach
                                    @endif

                                    {{-- Recent Medical Requests --}}
                                    @if(isset($recentMedicalRequests) && $recentMedicalRequests->isNotEmpty())
                                        @foreach($recentMedicalRequests as $med)
                                            <tr class="hover:bg-slate-50 transition">
                                                <td class="px-4 py-3 whitespace-nowrap">
                                                    <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md text-[10px] font-black bg-rose-50 text-rose-800 border border-rose-200">
                                                        🏥 Médical
                                                    </span>
                                                </td>
                                                <td class="px-4 py-3 font-bold text-slate-900">{{ $med->fullname }}</td>
                                                <td class="px-4 py-3 text-slate-600">{{ $med->phone }}</td>
                                                <td class="px-4 py-3 whitespace-nowrap">
                                                    <span class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-bold bg-blue-50 text-blue-700 border border-blue-200">
                                                        {{ ucfirst($med->status) }}
                                                    </span>
                                                </td>
                                                <td class="px-4 py-3 text-right text-slate-500 whitespace-nowrap">{{ $med->created_at ? $med->created_at->format('d/m/Y H:i') : '-' }}</td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>

    {{-- Senior BI Chart.js Scripts --}}
    @if(Auth::user()->isAdmin())
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                
                // 1. Qualification Donut Chart
                const qualCtx = document.getElementById('qualificationChart')?.getContext('2d');
                if (qualCtx) {
                    const qualData = {!! json_encode($qualificationStats ?? []) !!};
                    const labels = Object.keys(qualData);
                    const values = Object.values(qualData);

                    new Chart(qualCtx, {
                        type: 'doughnut',
                        data: {
                            labels: labels.length > 0 ? labels : ['Aucune qualification'],
                            datasets: [{
                                data: values.length > 0 ? values : [1],
                                backgroundColor: ['#10b981', '#3b82f6', '#f2a90f', '#ef4444', '#64748b', '#8b5cf6'],
                                borderWidth: 2,
                                borderColor: '#ffffff'
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: { position: 'bottom', labels: { boxWidth: 10, font: { weight: 'bold', size: 10 } } }
                            },
                            cutout: '60%'
                        }
                    });
                }

                // 2. Seminar Chart (Double Bars)
                const semCtx = document.getElementById('seminarChart')?.getContext('2d');
                if (semCtx) {
                    const bySeminar = {!! json_encode($bySeminar ?? []) !!};
                    const themes = bySeminar.map(s => s.theme.length > 18 ? s.theme.substring(0, 15) + '...' : s.theme);
                    const inscriptions = bySeminar.map(s => s.registrations_count);
                    const presents = bySeminar.map(s => s.presents_count);

                    new Chart(semCtx, {
                        type: 'bar',
                        data: {
                            labels: themes,
                            datasets: [
                                { label: 'Inscriptions', data: inscriptions, backgroundColor: '#f2a90f', borderRadius: 4 },
                                { label: 'Présences', data: presents, backgroundColor: '#061743', borderRadius: 4 }
                            ]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: { y: { beginAtZero: true, ticks: { precision: 0 } } },
                            plugins: { legend: { position: 'bottom', labels: { boxWidth: 10, font: { weight: 'bold', size: 10 } } } }
                        }
                    });
                }

                // 3. Top Institutions (Horizontal Bar)
                const instCtx = document.getElementById('institutionsChart')?.getContext('2d');
                if (instCtx) {
                    const topInst = {!! json_encode($topInstitutions ?? []) !!};
                    const instLabels = topInst.map(i => i.institution.length > 14 ? i.institution.substring(0, 11) + '...' : i.institution);
                    const instCounts = topInst.map(i => i.count);

                    new Chart(instCtx, {
                        type: 'bar',
                        data: {
                            labels: instLabels,
                            datasets: [{ label: 'Participants', data: instCounts, backgroundColor: '#8b5cf6', borderRadius: 4 }]
                        },
                        options: {
                            indexAxis: 'y',
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: { x: { beginAtZero: true, ticks: { precision: 0 } } },
                            plugins: { legend: { display: false } }
                        }
                    });
                }

                // 4. Roles Breakdown (Doughnut)
                const rolesCtx = document.getElementById('rolesChart')?.getContext('2d');
                if (rolesCtx) {
                    const rolesData = {!! json_encode($usersByRole ?? []) !!};
                    new Chart(rolesCtx, {
                        type: 'doughnut',
                        data: {
                            labels: Object.keys(rolesData),
                            datasets: [{
                                data: Object.values(rolesData),
                                backgroundColor: ['#061743', '#f2a90f', '#10b981', '#3b82f6', '#ec4899', '#8b5cf6'],
                                borderWidth: 2,
                                borderColor: '#ffffff'
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: { legend: { position: 'bottom', labels: { boxWidth: 10, font: { weight: 'bold', size: 10 } } } },
                            cutout: '55%'
                        }
                    });
                }

                // 5. Call Center Secteurs (Bar Chart)
                const secCtx = document.getElementById('secteursChart')?.getContext('2d');
                if (secCtx) {
                    const secData = {!! json_encode($callCenterSecteurs ?? []) !!};
                    new Chart(secCtx, {
                        type: 'bar',
                        data: {
                            labels: Object.keys(secData).map(s => s.length > 12 ? s.substring(0, 9) + '...' : s),
                            datasets: [{ label: 'Demandes', data: Object.values(secData), backgroundColor: '#f43f5e', borderRadius: 4 }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: { y: { beginAtZero: true, ticks: { precision: 0 } } },
                            plugins: { legend: { display: false } }
                        }
                    });
                }

            });
        </script>
    @endif
</x-app-layout>
