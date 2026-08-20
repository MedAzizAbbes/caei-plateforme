@extends('layouts.app')

@section('content')
<div class="flex min-h-screen -mt-8 -mx-4 sm:-mx-6 lg:-mx-8" style="background: linear-gradient(135deg, rgba(241,245,249,0.85) 0%, rgba(226,232,240,0.88) 100%);">
    <x-admin-sidebar />

    <div class="flex-1 p-6 md:p-10 overflow-y-auto">
        {{-- En-tête --}}
        <div class="mb-8 rounded-2xl p-8 text-white shadow-xl flex flex-col md:flex-row md:items-center justify-between gap-6 relative overflow-hidden" style="background: linear-gradient(135deg, rgba(6,23,67,0.92) 0%, rgba(12,58,110,0.95) 100%);">
            <div class="absolute -right-6 -bottom-8 opacity-15 text-8xl pointer-events-none">🎓</div>
            <div class="relative z-10">
                <span class="inline-flex items-center gap-1.5 bg-[#f2a90f] text-xs font-black px-3 py-1 rounded-md uppercase tracking-wider mb-2" style="color: #061743;">
                    🎓 Gestion & Statistiques des Séminaires
                </span>
                <h1 class="text-3xl font-black uppercase tracking-tight">Catalogue et Statistiques des Séminaires</h1>
                <p class="mt-2 text-slate-200 text-sm">Gérez les séminaires, analysez le taux de présence, les inscriptions et le suivi des institutions.</p>
            </div>
            <a href="{{ route('admin.seminars.create') }}" class="shrink-0 inline-flex items-center gap-2 bg-[#f2a90f] hover:bg-[#d9950b] font-black text-sm px-5 py-3 rounded-xl shadow transition-all" style="color: #061743;">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                Ajouter un séminaire
            </a>
        </div>

        @if(session('success'))
            <div class="mb-6 rounded-xl bg-emerald-50 border border-emerald-300 p-4 text-emerald-900 text-sm font-semibold flex items-center gap-3">
                <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                {{ session('success') }}
            </div>
        @endif

        {{-- KPI Stat Cards --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
            <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-blue-50 text-blue-600 flex items-center justify-center font-bold text-xl">👥</div>
                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Participants</p>
                    <p class="text-2xl font-black text-slate-900">{{ number_format($totalParticipants) }}</p>
                </div>
            </div>
            <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-amber-50 text-amber-600 flex items-center justify-center font-bold text-xl">📝</div>
                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Inscriptions</p>
                    <p class="text-2xl font-black text-slate-900">{{ number_format($totalRegistrations) }}</p>
                </div>
            </div>
            <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold text-xl">✅</div>
                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Présences / Taux</p>
                    <p class="text-2xl font-black text-slate-900">{{ number_format($totalPresent) }} <span class="text-xs font-bold text-emerald-600">({{ $attendanceRate }}%)</span></p>
                </div>
            </div>
            <div class="bg-white rounded-2xl p-5 border border-slate-200 shadow-sm flex items-center gap-4">
                <div class="w-12 h-12 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center font-bold text-xl">🏛️</div>
                <div>
                    <p class="text-xs font-bold uppercase tracking-wider text-slate-400">Institutions</p>
                    <p class="text-2xl font-black text-slate-900">{{ number_format($institutionsCount) }}</p>
                </div>
            </div>
        </div>

        {{-- Graphiques Dashboard --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
            {{-- Statut global des présences (Doughnut Chart) --}}
            <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm relative overflow-hidden">
                <h3 class="font-black text-[#061743] text-xs uppercase tracking-widest mb-6 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-[#f2a90f]"></span>
                    Statut global des présences
                </h3>
                <div class="relative h-64">
                    <canvas id="globalAttendanceChart"></canvas>
                </div>
            </div>

            {{-- Inscriptions vs Présences par séminaire (Bar Chart) --}}
            <div class="bg-white rounded-2xl p-6 lg:col-span-2 border border-slate-200 shadow-sm relative overflow-hidden">
                <h3 class="font-black text-[#061743] text-xs uppercase tracking-widest mb-6 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                    Présences par séminaire
                </h3>
                <div class="relative h-64">
                    <canvas id="seminarAttendanceChart"></canvas>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 mb-8">
            {{-- Top 5 Institutions --}}
            <div class="bg-white rounded-2xl p-6 lg:col-span-1 border border-slate-200 shadow-sm relative overflow-hidden">
                <h3 class="font-black text-[#061743] text-xs uppercase tracking-widest mb-6 flex items-center gap-2">
                    <span class="w-2 h-2 rounded-full bg-purple-500"></span>
                    Top 5 Institutions
                </h3>
                <div class="relative h-64">
                    <canvas id="topInstitutionsChart"></canvas>
                </div>
            </div>

            {{-- Aperçu Présences par Séminaire (Tableau Récapitulatif) --}}
            <div class="bg-white rounded-2xl p-6 lg:col-span-2 border border-slate-200 shadow-sm flex flex-col justify-between">
                <div>
                    <h3 class="font-black text-[#061743] text-xs uppercase tracking-widest mb-4 flex items-center gap-2">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                        Taux de participation par séminaire
                    </h3>
                    @if($bySeminar->isEmpty())
                        <p class="text-slate-500 text-sm">Aucune donnée disponible.</p>
                    @else
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-slate-200 text-xs">
                                <thead>
                                    <tr class="bg-slate-50 text-[10px] font-black uppercase text-slate-500">
                                        <th class="px-3 py-2.5 text-left">Séminaire</th>
                                        <th class="px-3 py-2.5 text-center">Inscriptions</th>
                                        <th class="px-3 py-2.5 text-center">Présences</th>
                                        <th class="px-3 py-2.5 text-center">Taux</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 font-medium text-slate-700">
                                    @foreach($bySeminar->take(5) as $sem)
                                        @php
                                            $rate = $sem->registrations_count > 0 
                                                ? round(($sem->presents_count / $sem->registrations_count) * 100, 1) 
                                                : 0;
                                        @endphp
                                        <tr class="hover:bg-slate-50">
                                            <td class="px-3 py-2.5 font-bold text-slate-900 truncate max-w-[200px]">{{ $sem->theme }}</td>
                                            <td class="px-3 py-2.5 text-center font-bold text-slate-600">{{ $sem->registrations_count }}</td>
                                            <td class="px-3 py-2.5 text-center font-bold text-emerald-600">{{ $sem->presents_count }}</td>
                                            <td class="px-3 py-2.5 text-center">
                                                <span class="px-2 py-0.5 rounded font-bold text-[11px] {{ $rate >= 75 ? 'bg-emerald-100 text-emerald-700' : ($rate >= 40 ? 'bg-amber-100 text-amber-700' : 'bg-rose-100 text-rose-700') }}">
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

        {{-- Tableau Catalogue des Séminaires --}}
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            <div class="p-6 text-gray-900">
                <div class="flex items-center justify-between mb-4">
                    <h2 class="text-lg font-black uppercase text-[#061743]">Tous les séminaires</h2>
                    <span class="text-xs text-slate-500 font-bold">Total : {{ $seminars->total() }} séminaires</span>
                </div>

                @if($seminars->isEmpty())
                    <p class="text-gray-600 text-center py-8">Aucun séminaire pour le moment.</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-sm">
                            <thead>
                                <tr class="bg-slate-50 text-[11px] font-black uppercase tracking-wider text-slate-600">
                                    <th class="px-4 py-3.5 text-left">Thème</th>
                                    <th class="px-4 py-3.5 text-left">Pays</th>
                                    <th class="px-4 py-3.5 text-left">Dates</th>
                                    <th class="px-4 py-3.5 text-left">Statut</th>
                                    <th class="px-4 py-3.5 text-left">Prix</th>
                                    <th class="px-4 py-3.5 text-left">Inscriptions</th>
                                    <th class="px-4 py-3.5 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white font-medium text-slate-700">
                                @foreach($seminars as $seminar)
                                    <tr class="hover:bg-slate-50 transition">
                                        <td class="px-4 py-3.5">
                                            <div class="font-bold text-slate-900">{{ $seminar->theme }}</div>
                                            @if($seminar->trainers->isNotEmpty())
                                                <div class="text-xs text-slate-500">Formateurs : {{ $seminar->trainers->pluck('first_name')->join(', ') }}</div>
                                            @else
                                                <div class="text-xs text-slate-400 italic">Aucun formateur assigné</div>
                                            @endif
                                        </td>
                                        <td class="px-4 py-3.5 whitespace-nowrap text-slate-600">{{ $seminar->country }}</td>
                                        <td class="px-4 py-3.5 whitespace-nowrap text-slate-600">{{ $seminar->start_date->format('d/m/Y') }} - {{ $seminar->end_date->format('d/m/Y') }}</td>
                                        <td class="px-4 py-3.5 whitespace-nowrap">
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold bg-slate-100 text-slate-800 border border-slate-200">
                                                {{ ucfirst($seminar->status) }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3.5 whitespace-nowrap font-bold text-slate-800">{{ $seminar->price ? $seminar->price . ' €' : 'Non défini' }}</td>
                                        <td class="px-4 py-3.5 whitespace-nowrap font-bold text-slate-800">{{ $seminar->registrations_count }}</td>
                                        <td class="px-4 py-3.5 whitespace-nowrap text-right">
                                            <div class="inline-flex items-center gap-1.5 justify-end">
                                                <a href="{{ route('echange.index', $seminar) }}" class="inline-flex items-center px-2.5 py-1 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-lg hover:bg-emerald-100 text-xs font-bold">
                                                    Discussions
                                                </a>
                                                <a href="{{ route('admin.documents.index', $seminar) }}" class="inline-flex items-center px-2.5 py-1 bg-indigo-50 border border-indigo-200 text-indigo-700 rounded-lg hover:bg-indigo-100 text-xs font-bold">
                                                    Contenus
                                                </a>
                                                <a href="{{ route('admin.seminars.edit', $seminar) }}" class="inline-flex items-center px-2.5 py-1 bg-blue-50 border border-blue-200 text-blue-700 rounded-lg hover:bg-blue-100 text-xs font-bold">
                                                    Modifier
                                                </a>
                                                <form method="POST" action="{{ route('admin.seminars.destroy', $seminar) }}" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="inline-flex items-center px-2.5 py-1 bg-rose-50 border border-rose-200 text-rose-700 rounded-lg hover:bg-rose-100 text-xs font-bold" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce séminaire ?')">
                                                        Supprimer
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $seminars->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

{{-- Script Chart.js --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // 1. Global Attendance Chart (Doughnut)
        const globalCtx = document.getElementById('globalAttendanceChart')?.getContext('2d');
        if (globalCtx) {
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
                            labels: { boxWidth: 12, font: { weight: 'bold', size: 11 } }
                        }
                    },
                    cutout: '65%'
                }
            });
        }

        // 2. Seminar Attendance Chart (Double Bars)
        const seminarCtx = document.getElementById('seminarAttendanceChart')?.getContext('2d');
        if (seminarCtx) {
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
                            backgroundColor: '#f2a90f',
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
                        y: { beginAtZero: true, ticks: { precision: 0 } }
                    },
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: { boxWidth: 12, font: { weight: 'bold', size: 11 } }
                        }
                    }
                }
            });
        }

        // 3. Top Institutions Chart (Horizontal Bar)
        const instCtx = document.getElementById('topInstitutionsChart')?.getContext('2d');
        if (instCtx) {
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
                        x: { beginAtZero: true, ticks: { precision: 0 } }
                    },
                    plugins: {
                        legend: { display: false }
                    }
                }
            });
        }
    });
</script>
@endsection
