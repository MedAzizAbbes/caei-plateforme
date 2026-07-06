<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Espace formateur</h2>
                <p class="text-sm text-gray-600 mt-1">Gestion des séminaires, participants et contenus</p>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if($seminars->isEmpty())
                <div class="bg-white rounded-lg shadow-sm p-12 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                    </svg>
                    <h3 class="mt-4 text-lg font-medium text-gray-900">Aucun séminaire</h3>
                    <p class="mt-2 text-sm text-gray-600">Vous n'intervenez sur aucun séminaire pour le moment.</p>
                </div>
            @else
                <div class="space-y-8">
                    @foreach($seminars as $seminar)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <!-- En-tête du séminaire -->
                            <div class="bg-gradient-to-r from-indigo-500 to-indigo-600 px-6 py-4">
                                <div class="flex items-start justify-between">
                                    <div>
                                        <h3 class="text-xl font-semibold text-white">{{ $seminar->theme }}</h3>
                                        <p class="text-indigo-100 text-sm mt-1">
                                            📍 {{ $seminar->country ?? 'Pays non renseigné' }} • 📅 
                                            @if($seminar->start_date && $seminar->end_date)
                                                {{ $seminar->start_date->format('d/m/Y') }} - {{ $seminar->end_date->format('d/m/Y') }}
                                            @else
                                                Dates à définir
                                            @endif
                                        </p>
                                    </div>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-white text-indigo-600">
                                        {{ $seminar->status ?? 'draft' }}
                                    </span>
                                </div>
                            </div>

                            <!-- Statistiques -->
                            <div class="px-6 py-4 bg-gray-50 border-b border-gray-200 grid grid-cols-3 gap-4">
                                <div class="text-center">
                                    <p class="text-2xl font-bold text-gray-900">{{ $seminar->participants_count }}</p>
                                    <p class="text-xs text-gray-600 mt-1">Participant(s)</p>
                                </div>
                                <div class="text-center">
                                    <p class="text-2xl font-bold text-gray-900">{{ $seminar->documents_count }}</p>
                                    <p class="text-xs text-gray-600 mt-1">Document(s)</p>
                                </div>
                                <div class="text-center">
                                    <p class="text-2xl font-bold text-gray-900">
                                        {{ $seminar->registrations->where('status', 'present')->count() }}/{{ $seminar->participants_count }}
                                    </p>
                                    <p class="text-xs text-gray-600 mt-1">Présent(s)</p>
                                </div>
                            </div>

                            <!-- Description -->
                            @if($seminar->description)
                                <div class="px-6 py-4 border-b border-gray-200">
                                    <p class="text-sm text-gray-700">{{ $seminar->description }}</p>
                                </div>
                            @endif

                            <!-- Contenu: Participants -->
                            <div class="px-6 py-4 border-b border-gray-200">
                                <h4 class="font-semibold text-gray-900 mb-3 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM9 6a3 3 0 11-6 0 3 3 0 016 0zM9 13a6 6 0 1112 0 6 6 0 01-12 0zM9 13a6 6 0 1112 0 6 6 0 01-12 0z"></path>
                                    </svg>
                                    Suivi des participants
                                </h4>
                                @if($seminar->registrations->isEmpty())
                                    <p class="text-sm text-gray-600">Aucun participant inscrit.</p>
                                @else
                                    <div class="space-y-2 max-h-64 overflow-y-auto">
                                        @foreach($seminar->registrations as $registration)
                                            <div class="flex items-center justify-between bg-gray-50 p-3 rounded-lg">
                                                <div class="flex-1">
                                                    <p class="text-sm font-medium text-gray-900">
                                                        {{ $registration->user->first_name }} {{ $registration->user->last_name }}
                                                    </p>
                                                    <p class="text-xs text-gray-600">{{ $registration->user->email }}</p>
                                                </div>
                                                <div class="flex items-center gap-2">
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium 
                                                        @if($registration->status === 'present') 
                                                            bg-green-100 text-green-800
                                                        @elseif($registration->status === 'absent') 
                                                            bg-red-100 text-red-800
                                                        @else 
                                                            bg-blue-100 text-blue-800
                                                        @endif">
                                                        {{ ucfirst($registration->status) }}
                                                    </span>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                            <!-- Contenu: Documents -->
                            <div class="px-6 py-4 border-b border-gray-200">
                                <h4 class="font-semibold text-gray-900 mb-3 flex items-center">
                                    <svg class="w-5 h-5 mr-2 text-indigo-600" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M4 3a2 2 0 012-2h6a1 1 0 01.707.293l6 6a1 1 0 01.293.707v8a2 2 0 01-2 2H4a2 2 0 01-2-2V3z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                    </svg>
                                    Contenus et supports
                                </h4>
                                @if($seminar->documents->isEmpty())
                                    <p class="text-sm text-gray-600 mb-3">Aucun document pour le moment.</p>
                                @else
                                    <div class="space-y-2 max-h-64 overflow-y-auto">
                                        @foreach($seminar->documents->groupBy('day_number') as $dayNumber => $documents)
                                            <div class="mb-3">
                                                <p class="text-xs font-semibold text-gray-600 uppercase mb-1">Jour {{ $dayNumber }}</p>
                                                <div class="space-y-1">
                                                    @foreach($documents as $document)
                                                        <div class="flex items-center justify-between bg-gray-50 p-2 rounded">
                                                            <span class="text-sm text-gray-700">
                                                                📄 {{ $document->title }}
                                                            </span>
                                                            <span class="text-xs text-gray-500">
                                                                @if($document->size_kb > 1024)
                                                                    {{ number_format($document->size_kb / 1024, 2) }} MB
                                                                @else
                                                                    {{ $document->size_kb }} KB
                                                                @endif
                                                            </span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                            <!-- Actions -->
                            <div class="px-6 py-4 bg-gray-50 flex gap-3">
                                <a href="{{ route('formateur.documents.index', $seminar) }}" 
                                   class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Ajouter contenu
                                </a>
                                <a href="{{ route('checkin.index') }}" 
                                   class="inline-flex items-center px-4 py-2 border border-indigo-300 rounded-lg text-sm font-medium text-indigo-700 bg-indigo-50 hover:bg-indigo-100 transition-colors">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Contrôle de présence
                                </a>
                                <a href="{{ route('participant.formation', $seminar) }}" 
                                   class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    Aperçu participant
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
