<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-black uppercase leading-tight text-slate-900">
            Tableau de bord CAEI
        </h2>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="caei-card">
                <div class="grid gap-8 p-8 lg:grid-cols-[1fr_.7fr] lg:items-center">
                    <div>
                        <p class="text-sm font-black uppercase text-[#ffbd45]">Bienvenue</p>
                        <h3 class="mt-2 text-3xl font-black text-[#061743]">Votre espace CAEI est pret.</h3>
                        <p class="mt-4 max-w-2xl text-slate-600">
                            Accedez aux outils de gestion des seminaires, au suivi des participants et aux espaces des seminaires selon votre role.
                        </p>
                        <div class="mt-6 flex flex-wrap gap-3">
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
                    <div class="rounded-lg bg-[#061743] p-6 text-white">
                        <p class="text-sm font-bold uppercase text-white/60">CAEI Company Group</p>
                        <p class="mt-5 text-5xl font-black text-[#ffbd45]">{{ Auth::user()->role }}</p>
                        <p class="mt-3 text-white/75">{{ Auth::user()->fullName() ?: Auth::user()->email }}</p>
                    </div>
                </div>
            </div>
        </div>

        @if(Auth::user()->isAdmin())
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-8">
            <!-- Premium Charts Grid (Statistiques) -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                <!-- Global Attendance Status (Doughnut Chart) -->
                <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 lg:col-span-1">
                    <h3 class="font-bold text-slate-900 text-sm uppercase tracking-wider mb-4">Statut global des présences</h3>
                    <div class="relative h-64">
                        <canvas id="globalAttendanceChart"></canvas>
                    </div>
                </div>

                <!-- Inscriptions vs Presences per Seminar (Bar Chart) -->
                <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 lg:col-span-2">
                    <h3 class="font-bold text-slate-900 text-sm uppercase tracking-wider mb-4">Présences par séminaire</h3>
                    <div class="relative h-64">
                        <canvas id="seminarAttendanceChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Top Institutions (Horizontal Bar Chart) -->
                <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 lg:col-span-1">
                    <h3 class="font-bold text-slate-900 text-sm uppercase tracking-wider mb-4">Top 5 Institutions</h3>
                    <div class="relative h-64">
                        <canvas id="topInstitutionsChart"></canvas>
                    </div>
                </div>

                <!-- Detailed Table List -->
                <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 lg:col-span-2 overflow-hidden flex flex-col justify-between">
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
