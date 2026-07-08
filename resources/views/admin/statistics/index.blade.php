@extends('layouts.app')

@section('content')
<div class="py-8 bg-slate-50 min-h-screen">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        <!-- Header -->
        <div class="mb-8">
            <p class="text-xs font-black uppercase text-[#f2a90f]">Back-office CAEI</p>
            <h1 class="text-3xl font-black text-[#061743] mt-1">Tableau de bord statistique</h1>
            <p class="text-sm text-slate-600">Visualisez les taux d'inscription, de présence et les institutions participantes.</p>
        </div>

        <!-- Key Indicators -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 flex items-center justify-between">
                <div>
                    <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Participants</p>
                    <p class="text-2xl font-black text-[#061743] mt-2">{{ $totalParticipants }}</p>
                </div>
                <div class="p-3 bg-indigo-50 text-indigo-600 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 flex items-center justify-between">
                <div>
                    <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Inscriptions</p>
                    <p class="text-2xl font-black text-emerald-600 mt-2">{{ $totalRegistrations }}</p>
                </div>
                <div class="p-3 bg-emerald-50 text-emerald-600 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                    </svg>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 flex items-center justify-between">
                <div>
                    <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Taux de présence</p>
                    <p class="text-2xl font-black text-blue-600 mt-2">{{ $attendanceRate }}%</p>
                </div>
                <div class="p-3 bg-blue-50 text-blue-600 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
            </div>

            <div class="bg-white rounded-xl shadow-sm border border-slate-200 p-6 flex items-center justify-between">
                <div>
                    <p class="text-xs font-bold text-slate-500 uppercase tracking-wider">Institutions uniques</p>
                    <p class="text-2xl font-black text-purple-600 mt-2">{{ $institutionsCount }}</p>
                </div>
                <div class="p-3 bg-purple-50 text-purple-600 rounded-lg">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
            </div>

        </div>

        <!-- Premium Charts Grid -->
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
@endsection
