@extends('layouts.app')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <h1 class="text-2xl font-semibold mb-6">Statistiques</h1>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
            <!-- Total Participants -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="text-sm font-medium text-gray-500">Participants</p>
                    <p class="text-3xl font-semibold text-indigo-600 mt-2">{{ $totalParticipants }}</p>
                </div>
            </div>

            <!-- Total Registrations -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="text-sm font-medium text-gray-500">Inscriptions</p>
                    <p class="text-3xl font-semibold text-green-600 mt-2">{{ $totalRegistrations }}</p>
                </div>
            </div>

            <!-- Attendance Rate -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="text-sm font-medium text-gray-500">Taux de présence</p>
                    <p class="text-3xl font-semibold text-blue-600 mt-2">{{ $attendanceRate }}%</p>
                </div>
            </div>

            <!-- Institutions -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="text-sm font-medium text-gray-500">Institutions</p>
                    <p class="text-3xl font-semibold text-purple-600 mt-2">{{ $institutionsCount }}</p>
                </div>
            </div>
        </div>

        <!-- Registrations by Seminar -->
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h2 class="text-lg font-semibold mb-4">Inscriptions par séminaire</h2>
                
                @if($bySeminar->isEmpty())
                    <p class="text-gray-600">Aucune donnée disponible.</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Séminaire</th>
                                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Inscriptions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach($bySeminar as $seminar)
                                    <tr>
                                        <td class="px-4 py-3 text-sm text-gray-900">{{ $seminar->theme }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-600">{{ $seminar->registrations_count }}</td>
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
@endsection
