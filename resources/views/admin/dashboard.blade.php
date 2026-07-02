@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="mb-8">
            <h1 class="text-3xl font-bold text-gray-900">Tableau de bord administrateur</h1>
            <p class="text-gray-600 mt-2">Bienvenue {{ Auth::user()->first_name }}! Gérez les séminaires, participants et statistiques.</p>
        </div>

        <!-- Main Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Séminaires Card -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">Séminaires</h3>
                        <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <p class="text-gray-600 text-sm mb-4">Créer, modifier et gérer les séminaires.</p>
                    <div class="space-y-2">
                        <a href="{{ route('admin.seminars.index') }}" class="block text-indigo-600 hover:text-indigo-700 text-sm font-medium">
                            → Voir tous les séminaires
                        </a>
                        <a href="{{ route('admin.seminars.create') }}" class="block text-indigo-600 hover:text-indigo-700 text-sm font-medium">
                            → Créer un nouveau séminaire
                        </a>
                    </div>
                </div>
            </div>

            <!-- Participants Card -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">Participants</h3>
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 19H9a6 6 0 016-6v0a6 6 0 016 6v0"></path>
                        </svg>
                    </div>
                    <p class="text-gray-600 text-sm mb-4">Consulter la liste des participants et exporter.</p>
                    <div class="space-y-2">
                        <a href="{{ route('admin.participants.index') }}" class="block text-green-600 hover:text-green-700 text-sm font-medium">
                            → Voir les participants
                        </a>
                        <a href="{{ route('admin.participants.export.excel') }}" class="block text-green-600 hover:text-green-700 text-sm font-medium">
                            → Exporter en Excel
                        </a>
                        <a href="{{ route('admin.participants.export.pdf') }}" class="block text-green-600 hover:text-green-700 text-sm font-medium">
                            → Exporter en PDF
                        </a>
                    </div>
                </div>
            </div>

            <!-- Statistiques Card -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">Statistiques</h3>
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <p class="text-gray-600 text-sm mb-4">Consulter les statistiques et métriques.</p>
                    <div class="space-y-2">
                        <a href="{{ route('admin.statistics.index') }}" class="block text-blue-600 hover:text-blue-700 text-sm font-medium">
                            → Voir les statistiques
                        </a>
                    </div>
                </div>
            </div>

            <!-- Contenus Card -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">Contenus</h3>
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                        </svg>
                    </div>
                    <p class="text-gray-600 text-sm mb-4">Gérer les documents et contenus des séminaires.</p>
                    <div class="space-y-2">
                        <p class="text-gray-500 text-xs">Sélectionnez un séminaire pour gérer ses contenus.</p>
                    </div>
                </div>
            </div>

            <!-- Accueil Card -->
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-lg transition">
                <div class="p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900">Accueil</h3>
                        <svg class="w-8 h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-3m0 0l7-4 7 4M5 9v10a1 1 0 001 1h12a1 1 0 001-1V9m-9 11l4-4m0 0l4 4m-4-4v4"></path>
                        </svg>
                    </div>
                    <p class="text-gray-600 text-sm mb-4">Revenir à l'accueil.</p>
                    <div class="space-y-2">
                        <a href="{{ route('dashboard') }}" class="block text-orange-600 hover:text-orange-700 text-sm font-medium">
                            → Tableau de bord utilisateur
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Stats Section -->
        <div class="mt-12 grid grid-cols-1 md:grid-cols-4 gap-4">
            <div class="bg-gradient-to-br from-blue-500 to-blue-600 rounded-lg p-6 text-white">
                <p class="text-blue-100 text-sm">Participants</p>
                <p class="text-3xl font-bold mt-2">-</p>
            </div>
            <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-lg p-6 text-white">
                <p class="text-green-100 text-sm">Inscriptions</p>
                <p class="text-3xl font-bold mt-2">-</p>
            </div>
            <div class="bg-gradient-to-br from-purple-500 to-purple-600 rounded-lg p-6 text-white">
                <p class="text-purple-100 text-sm">Séminaires</p>
                <p class="text-3xl font-bold mt-2">-</p>
            </div>
            <div class="bg-gradient-to-br from-orange-500 to-orange-600 rounded-lg p-6 text-white">
                <p class="text-orange-100 text-sm">Taux présence</p>
                <p class="text-3xl font-bold mt-2">-</p>
            </div>
        </div>
    </div>
</div>
@endsection
