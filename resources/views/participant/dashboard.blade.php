<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ auth()->user()->first_name }}, bienvenue sur votre tableau de bord
                </h2>
                <p class="text-sm text-gray-600 mt-1">Gérez vos séminaires et accédez aux supports de formation</p>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Statistiques rapides -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">Séminaires inscrits</p>
                            <p class="text-3xl font-bold text-gray-900">{{ $registrations->count() }}</p>
                        </div>
                        <div class="bg-blue-100 rounded-full p-3">
                            <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C6.5 6.253 2 10.756 2 16.25s4.5 10 10 10 10-4.5 10-10c0-5.494-4.5-9.997-10-10z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">Présences confirmées</p>
                            <p class="text-3xl font-bold text-green-600">
                                {{ $registrations->filter(fn($r) => $r->status === 'present')->count() }}
                            </p>
                        </div>
                        <div class="bg-green-100 rounded-full p-3">
                            <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow p-6">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-gray-600 text-sm font-medium">Documents disponibles</p>
                            <p class="text-3xl font-bold text-purple-600">
                                {{ $registrations->sum(fn($r) => $r->seminar?->documents()->count() ?? 0) }}
                            </p>
                        </div>
                        <div class="bg-purple-100 rounded-full p-3">
                            <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sections des séminaires -->
            @if($registrations->isEmpty())
                <div class="bg-white rounded-lg shadow p-12 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C6.5 6.253 2 10.756 2 16.25s4.5 10 10 10 10-4.5 10-10c0-5.494-4.5-9.997-10-10z"></path>
                    </svg>
                    <h3 class="mt-4 text-lg font-medium text-gray-900">Aucun séminaire</h3>
                    <p class="mt-2 text-sm text-gray-600">Vous n'êtes inscrit à aucun séminaire pour le moment.</p>
                    <a href="/inscription" class="mt-6 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md shadow-sm text-white bg-blue-600 hover:bg-blue-700">
                        S'inscrire à un séminaire
                    </a>
                </div>
            @else
                <!-- Séminaires en cours / à venir -->
                <div class="mb-8">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4 flex items-center">
                        <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v2h16V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5H4v8a2 2 0 002 2h12a2 2 0 002-2V7h-2v1a1 1 0 11-2 0V7H9v1a1 1 0 11-2 0V7H6v1a1 1 0 11-2 0V7z" clip-rule="evenodd"></path>
                        </svg>
                        Mes séminaires
                    </h3>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                        @foreach($registrations as $registration)
                            @php
                                $seminar = $registration->seminar;
                                $documentCount = $seminar->documents()->count();
                                $statusColors = [
                                    'registered' => 'bg-blue-50 border-blue-200',
                                    'present' => 'bg-green-50 border-green-200',
                                    'absent' => 'bg-red-50 border-red-200',
                                    'cancelled' => 'bg-gray-50 border-gray-200',
                                ];
                                $statusBadges = [
                                    'registered' => 'bg-blue-100 text-blue-800',
                                    'present' => 'bg-green-100 text-green-800',
                                    'absent' => 'bg-red-100 text-red-800',
                                    'cancelled' => 'bg-gray-100 text-gray-800',
                                ];
                                $statusLabels = [
                                    'registered' => 'Inscrit',
                                    'present' => 'Présent',
                                    'absent' => 'Absent',
                                    'cancelled' => 'Annulé',
                                ];
                            @endphp
                            <div class="bg-white rounded-lg shadow-md border-l-4 border-blue-500 overflow-hidden hover:shadow-lg transition-shadow">
                                <div class="p-6">
                                    <!-- En-tête du séminaire -->
                                    <div class="flex items-start justify-between mb-4">
                                        <div class="flex-1">
                                            <h4 class="text-lg font-semibold text-gray-900">{{ $seminar->theme }}</h4>
                                            <p class="text-sm text-gray-600 mt-1">
                                                <svg class="w-4 h-4 inline mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L9.9 13.95a7 7 0 01-9.9-9.9zM9 11a2 2 0 110-4 2 2 0 010 4z" clip-rule="evenodd"></path>
                                                </svg>
                                                {{ $seminar->country ?? 'Pays non renseigné' }}
                                            </p>
                                        </div>
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $statusBadges[$registration->status] ?? 'bg-gray-100 text-gray-800' }}">
                                            {{ $statusLabels[$registration->status] ?? ucfirst($registration->status) }}
                                        </span>
                                    </div>

                                    <!-- Dates -->
                                    <div class="flex gap-4 text-sm text-gray-600 mb-4">
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v2h16V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5H4v8a2 2 0 002 2h12a2 2 0 002-2V7h-2v1a1 1 0 11-2 0V7H9v1a1 1 0 11-2 0V7H6v1a1 1 0 11-2 0V7z" clip-rule="evenodd"></path>
                                            </svg>
                                            @if($seminar->start_date)
                                                Du {{ $seminar->start_date->format('d/m/Y') }}
                                            @endif
                                        </div>
                                        <div class="flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"></path>
                                            </svg>
                                            @if($seminar->end_date)
                                                au {{ $seminar->end_date->format('d/m/Y') }}
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Description -->
                                    @if($seminar->description)
                                        <p class="text-sm text-gray-600 mb-4 line-clamp-2">{{ $seminar->description }}</p>
                                    @endif

                                    <!-- Infos rapides -->
                                    <div class="grid grid-cols-2 gap-3 mb-4 p-3 bg-gray-50 rounded-lg">
                                        <div>
                                            <p class="text-xs text-gray-600">Code QR</p>
                                            <p class="text-sm font-semibold text-gray-900">
                                                @if($registration->qrCode)
                                                    {{ substr($registration->qrCode->code, 0, 8) }}...
                                                @else
                                                    <span class="text-gray-500">En attente</span>
                                                @endif
                                            </p>
                                        </div>
                                        <div>
                                            <p class="text-xs text-gray-600">Supports</p>
                                            <p class="text-sm font-semibold text-purple-600">{{ $documentCount }} document(s)</p>
                                        </div>
                                    </div>

                                    <!-- Boutons d'action -->
                                    <div class="flex gap-3">
                                        @if($documentCount > 0)
                                            <a href="{{ route('participant.formation', $seminar) }}" class="flex-1 inline-flex items-center justify-center px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                                                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                                                    <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 1 1 0 000 2H6a6 6 0 016 6v3a1 1 0 11-2 0v-3a4 4 0 00-4-4H6a1 1 0 000 2H4a2 2 0 01-2-2V5zm12 4a1 1 0 100 2h1.586l-1.293 1.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 00-1.414 1.414L17.586 9H16z" clip-rule="evenodd"></path>
                                                </svg>
                                                Supports
                                            </a>
                                        @endif
                                        <a href="{{ route('echange.index', $seminar) }}" class="flex-1 inline-flex items-center justify-center px-4 py-2 border border-blue-300 rounded-lg text-sm font-medium text-blue-700 bg-blue-50 hover:bg-blue-100 transition-colors">
                                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M2 5a2 2 0 012-2h12a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V5z"></path>
                                                <path d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                            </svg>
                                            Échange
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
