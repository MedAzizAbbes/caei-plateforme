<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-black uppercase leading-tight text-slate-900">
            Tableau de bord CAEI
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="caei-card overflow-hidden">
                <div class="grid gap-8 p-8 lg:grid-cols-[1fr_.7fr] lg:items-center bg-white relative">
                    <div class="absolute inset-0 bg-[radial-gradient(ellipse_at_top_right,_var(--tw-gradient-stops))] from-caei-gold/5 via-transparent to-transparent opacity-50 pointer-events-none"></div>
                    <div class="relative z-10">
                        <p class="text-sm font-black uppercase text-caei-gold tracking-widest">Bienvenue</p>
                        <h3 class="mt-2 text-3xl font-black text-caei-navy">Votre espace CAEI est prêt.</h3>
                        <p class="mt-4 max-w-2xl text-slate-600 leading-relaxed">
                            Accédez aux outils de gestion des séminaires, au suivi des participants et aux espaces des séminaires selon votre rôle.
                        </p>
                        <div class="mt-8 flex flex-wrap gap-4">
                            @if(Auth::user()->isAdmin())
                                <a href="{{ route('admin.dashboard') }}" class="caei-btn caei-btn-gold">Administration</a>
                            @endif
                            @if(Auth::user()->isParticipant())
                                <a href="{{ route('participant.dashboard') }}" class="caei-btn caei-btn-gold">Espace participant</a>
                            @endif
                            @if(Auth::user()->isFormateur())
                                <a href="{{ route('formateur.dashboard') }}" class="caei-btn caei-btn-gold">Espace formateur</a>
                            @endif
                        </div>
                    </div>
                    <div class="rounded-2xl bg-gradient-to-br from-caei-navy to-caei-navy-deep p-8 text-white shadow-2xl relative overflow-hidden transform transition-all duration-300 hover:scale-105 hover:shadow-caei-navy/30">
                        <div class="absolute -right-10 -top-10 w-40 h-40 bg-caei-gold/10 rounded-full blur-3xl"></div>
                        <p class="text-sm font-bold uppercase tracking-widest text-white/50">CAEI Company Group</p>
                        <p class="mt-6 text-5xl font-black text-transparent bg-clip-text bg-gradient-to-r from-caei-gold to-yellow-300">{{ Auth::user()->role }}</p>
                        <p class="mt-4 text-white/90 font-medium text-lg">{{ Auth::user()->fullName() ?: Auth::user()->email }}</p>
                    </div>
                </div>
            </div>
        </div>

        @if(Auth::user()->isAdmin())
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-10">
            <!-- Premium Charts Grid (Statistiques) -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8 animate-slide-up animate-delay-100">
                <!-- Global Attendance Status (Doughnut Chart) -->
                <div class="caei-card bg-white p-6 lg:col-span-1 border-0 shadow-lg relative overflow-hidden group">
                    <div class="absolute inset-0 bg-gradient-to-b from-slate-50 to-white opacity-50 z-0"></div>
                    <div class="relative z-10">
                        <h3 class="font-black text-caei-navy text-sm uppercase tracking-widest mb-6 flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-caei-gold"></span>
                            Statut global des présences
                        </h3>
                        <div class="relative h-64">
                            <canvas id="globalAttendanceChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Inscriptions vs Presences per Seminar (Bar Chart) -->
                <div class="caei-card bg-white p-6 lg:col-span-2 border-0 shadow-lg relative overflow-hidden group">
                    <div class="absolute inset-0 bg-gradient-to-b from-slate-50 to-white opacity-50 z-0"></div>
                    <div class="relative z-10">
                        <h3 class="font-black text-caei-navy text-sm uppercase tracking-widest mb-6 flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                            Présences par séminaire
                        </h3>
                        <div class="relative h-64">
                            <canvas id="seminarAttendanceChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 animate-slide-up animate-delay-200">
                <!-- Top Institutions (Horizontal Bar Chart) -->
                <div class="caei-card bg-white p-6 lg:col-span-1 border-0 shadow-lg relative overflow-hidden group">
                    <div class="absolute inset-0 bg-gradient-to-b from-slate-50 to-white opacity-50 z-0"></div>
                    <div class="relative z-10">
                        <h3 class="font-black text-caei-navy text-sm uppercase tracking-widest mb-6 flex items-center gap-2">
                            <span class="w-2 h-2 rounded-full bg-purple-500"></span>
                            Top 5 Institutions
                        </h3>
                        <div class="relative h-64">
                            <canvas id="topInstitutionsChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Detailed Table List -->
                <div class="caei-card bg-white p-0 lg:col-span-2 border-0 shadow-lg overflow-hidden flex flex-col justify-between">
                    <div>
                        <h3 class="font-bold text-slate-900 text-sm uppercase tracking-wider mb-4">Détails des séminaires</h3>
                        
                        @if($bySeminar->isEmpty())
                            <p class="text-slate-500 text-sm">Aucune donnée disponible.</p>
                        @else
                            <div class="overflow-x-auto">
                                <table class="min-w-full divide-y divide-slate-200">
                                    <thead>
                                        <tr class="bg-slate-50">
                                            <th class="px-4 py-3 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Séminaire</th>
                                            <th class="px-4 py-3 text-center text-xs font-bold text-slate-500 uppercase tracking-wider">Inscriptions</th>
                                            <th class="px-4 py-3 text-center text-xs font-bold text-slate-500 uppercase tracking-wider">Présences</th>
                                            <th class="px-4 py-3 text-center text-xs font-bold text-slate-500 uppercase tracking-wider">Taux</th>
                                        </tr>
                                    </thead>
                                    <tbody class="divide-y divide-slate-200 bg-white">
                                        @foreach($bySeminar as $seminar)
                                            @php
                                                $rate = $seminar->registrations_count > 0 
                                                    ? round(($seminar->presents_count / $seminar->registrations_count) * 100, 1) 
                                                    : 0;
                                            @endphp
                                            <tr class="hover:bg-slate-50 transition">
                                                <td class="px-4 py-3 text-sm font-bold text-slate-900">{{ $seminar->theme }}</td>
                                                <td class="px-4 py-3 text-sm text-center text-slate-600 font-semibold">{{ $seminar->registrations_count }}</td>
                                                <td class="px-4 py-3 text-sm text-center text-emerald-600 font-semibold">{{ $seminar->presents_count }}</td>
                                                <td class="px-4 py-3 text-sm text-center font-bold">
                                                    <span class="px-2 py-1 rounded text-xs {{ $rate >= 75 ? 'bg-emerald-50 text-emerald-700' : ($rate >= 40 ? 'bg-amber-50 text-amber-700' : 'bg-red-50 text-red-700') }}">
                                                        {{ $rate }}%
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- ChartJS Script -->
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

        <script>
            document.addEventListener('DOMContentLoaded', () => {
                // 1. Global Attendance Chart (Doughnut)
                const globalCtx = document.getElementById('globalAttendanceChart').getContext('2d');
                new Chart(globalCtx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Présents', 'Absents', 'En attente/Inscrits'],
                        datasets: [{
                            data: [{{ $totalPresent }}, {{ $totalAbsent }}, {{ $totalInscribedOnly }}],
                            backgroundColor: ['#10b981', '#ef4444', '#64748b'],
                            borderWidth: 2,
                            borderColor: '#ffffff'
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: {
                                    boxWidth: 12,
                                    font: { weight: 'bold', size: 11 }
                                }
                            }
                        },
                        cutout: '65%'
                    }
                });

                // 2. Seminar Attendance Chart (Double Bars)
                const seminarCtx = document.getElementById('seminarAttendanceChart').getContext('2d');
                const seminarThemes = {!! json_encode($bySeminar->pluck('theme')) !!};
                const seminarInscriptions = {!! json_encode($bySeminar->pluck('registrations_count')) !!};
                const seminarPresents = {!! json_encode($bySeminar->pluck('presents_count')) !!};

                new Chart(seminarCtx, {
                    type: 'bar',
                    data: {
                        labels: seminarThemes.map(theme => theme.length > 20 ? theme.substring(0, 17) + '...' : theme),
                        datasets: [
                            {
                                label: 'Inscriptions',
                                data: seminarInscriptions,
                                backgroundColor: '#ffbd45',
                                borderRadius: 4
                            },
                            {
                                label: 'Présences',
                                data: seminarPresents,
                                backgroundColor: '#061743',
                                borderRadius: 4
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: { precision: 0 }
                            }
                        },
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: {
                                    boxWidth: 12,
                                    font: { weight: 'bold', size: 11 }
                                }
                            }
                        }
                    }
                });

                // 3. Top Institutions Chart (Horizontal Bar)
                const instCtx = document.getElementById('topInstitutionsChart').getContext('2d');
                const topInstData = {!! json_encode($topInstitutions) !!};

                new Chart(instCtx, {
                    type: 'bar',
                    data: {
                        labels: topInstData.map(item => item.institution.length > 15 ? item.institution.substring(0, 12) + '...' : item.institution),
                        datasets: [{
                            label: 'Participants',
                            data: topInstData.map(item => item.count),
                            backgroundColor: '#8b5cf6',
                            borderRadius: 4
                        }]
                    },
                    options: {
                        indexAxis: 'y',
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            x: {
                                beginAtZero: true,
                                ticks: { precision: 0 }
                            }
                        },
                        plugins: {
                            legend: { display: false }
                        }
                    }
                });
            });
        </script>
        @endif
    </div>
</x-app-layout>
