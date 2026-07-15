<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-xl font-black uppercase leading-tight text-slate-900">Espace formateur</h2>
                <p class="text-xs text-slate-600 mt-1">Gestion des séminaires, participants et supports</p>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if($seminars->isEmpty())
                <div class="caei-card p-12 text-center bg-white">
                    <div class="mx-auto grid h-14 w-14 place-items-center rounded-lg bg-[#061743]/5 text-[#061743]">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6V4m0 2a2 2 0 100 4m0-4a2 2 0 110 4m-6 8a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4m6 6v10m6-2a2 2 0 100-4m0 4a2 2 0 110-4m0 4v2m0-6V4"></path>
                        </svg>
                    </div>
                    <h3 class="mt-4 text-lg font-black text-[#061743]">Aucun séminaire</h3>
                    <p class="mt-2 text-sm text-slate-600">Vous n'intervenez sur aucun séminaire pour le moment.</p>
                </div>
            @else
                <div class="space-y-8">
                    @foreach($seminars as $seminar)
                        <div class="caei-card">
                            <!-- En-tête du séminaire -->
                            <div class="bg-[#061743] px-6 py-5 text-white">
                                <div class="flex items-start justify-between flex-wrap gap-4">
                                    <div>
                                        <p class="text-xs font-black uppercase text-[#ffbd45]">Séminaire CAEI</p>
                                        <h3 class="text-xl font-black uppercase mt-1">{{ $seminar->theme }}</h3>
                                        <p class="text-slate-300 text-sm mt-2 flex items-center gap-3 flex-wrap">
                                            <span>📍 {{ $seminar->country ?? 'Pays non renseigné' }}</span>
                                            <span class="text-slate-400">•</span>
                                            <span>📅 
                                                @if($seminar->start_date && $seminar->end_date)
                                                    {{ $seminar->start_date->format('d/m/Y') }} — {{ $seminar->end_date->format('d/m/Y') }}
                                                @else
                                                    Dates à définir
                                                @endif
                                            </span>
                                        </p>
                                    </div>
                                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-bold uppercase tracking-wider bg-white/10 text-[#ffbd45] border border-[#ffbd45]/20">
                                        {{ $seminar->status ?? 'draft' }}
                                    </span>
                                </div>
                            </div>

                            <!-- Statistiques -->
                            <div class="px-6 py-4 bg-slate-50 border-b border-slate-200 grid grid-cols-3 gap-4">
                                <div class="text-center">
                                    <p class="text-2xl font-black text-[#061743]">{{ $seminar->participants_count }}</p>
                                    <p class="text-xs font-bold text-slate-500 uppercase mt-1">Participant(s)</p>
                                </div>
                                <div class="text-center">
                                    <p class="text-2xl font-black text-[#061743]">{{ $seminar->documents_count }}</p>
                                    <p class="text-xs font-bold text-slate-500 uppercase mt-1">Document(s)</p>
                                </div>
                                <div class="text-center">
                                    @php
                                        $presents = $seminar->registrations->where('status', 'present')->count();
                                    @endphp
                                    <p class="text-2xl font-black text-emerald-600">{{ $presents }}/{{ $seminar->participants_count }}</p>
                                    <p class="text-xs font-bold text-slate-500 uppercase mt-1">Présent(s)</p>
                                </div>
                            </div>

                            <!-- Description -->
                            @if($seminar->description)
                                <div class="px-6 py-4 border-b border-slate-200 bg-white">
                                    <p class="text-sm text-slate-700 leading-relaxed">{{ $seminar->description }}</p>
                                </div>
                            @endif

                            <!-- Contenu: Participants -->
                            <div class="px-6 py-5 border-b border-slate-200 bg-white">
                                <h4 class="font-black text-xs uppercase tracking-wider text-slate-500 mb-3 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-[#061743]" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM9 6a3 3 0 11-6 0 3 3 0 016 0zM9 13a6 6 0 1112 0 6 6 0 01-12 0zM9 13a6 6 0 1112 0 6 6 0 01-12 0z"></path>
                                    </svg>
                                    Suivi des participants
                                </h4>
                                @if($seminar->registrations->isEmpty())
                                    <p class="text-sm text-slate-500 italic">Aucun participant inscrit.</p>
                                @else
                                    <div class="space-y-2 max-h-64 overflow-y-auto pr-2">
                                        @foreach($seminar->registrations as $registration)
                                            <div class="flex items-center justify-between bg-slate-50 border border-slate-100 p-3 rounded-lg hover:bg-slate-100/50 transition">
                                                <div class="flex-1 min-w-0 mr-4">
                                                    <p class="text-sm font-bold text-slate-900 truncate">
                                                        {{ $registration->user->first_name }} {{ $registration->user->last_name }}
                                                    </p>
                                                    <p class="text-xs text-slate-600 truncate">{{ $registration->user->email }}</p>
                                                </div>
                                                <div class="flex items-center gap-2 flex-shrink-0">
                                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded text-xs font-bold uppercase tracking-wide
                                                        @if($registration->status === 'present') 
                                                            bg-emerald-50 text-emerald-700 border border-emerald-100
                                                        @elseif($registration->status === 'absent') 
                                                            bg-red-50 text-red-700 border border-red-100
                                                        @else 
                                                            bg-blue-50 text-blue-700 border border-blue-100
                                                        @endif">
                                                        {{ $registration->status }}
                                                    </span>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                            </div>

                            <!-- Contenu: Documents -->
                            <div class="px-6 py-5 border-b border-slate-200 bg-white">
                                <h4 class="font-black text-xs uppercase tracking-wider text-slate-500 mb-3 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-[#061743]" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M4 3a2 2 0 012-2h6a1 1 0 01.707.293l6 6a1 1 0 01.293.707v8a2 2 0 01-2 2H4a2 2 0 01-2-2V3z" clip-rule="evenodd" fill-rule="evenodd"></path>
                                    </svg>
                                    Contenus et supports du séminaire
                                </h4>
                                @if($seminar->documents->isEmpty())
                                    <p class="text-sm text-slate-500 italic mb-3">Aucun document pour le moment.</p>
                                @else
                                    <div class="space-y-4 max-h-64 overflow-y-auto pr-2">
                                        @foreach($seminar->documents->groupBy('day_number') as $dayNumber => $documents)
                                            <div class="border border-slate-100 rounded-lg p-3 bg-slate-50/50">
                                                <p class="text-xs font-black text-[#061743] uppercase tracking-wide mb-2">Jour {{ $dayNumber }}</p>
                                                <div class="space-y-1.5">
                                                    @foreach($documents as $document)
                                                        <div class="flex items-center justify-between bg-white border border-slate-100 p-2.5 rounded hover:bg-slate-50 transition">
                                                            <span class="text-sm text-slate-700 truncate font-semibold">
                                                                📄 {{ $document->title }}
                                                            </span>
                                                            <span class="text-xs text-slate-500 font-bold bg-slate-100 px-1.5 py-0.5 rounded flex-shrink-0">
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
                            <div class="px-6 py-4 bg-slate-50 flex flex-wrap gap-3">
                                <a href="{{ route('formateur.documents.index', $seminar) }}" 
                                   class="inline-flex items-center px-4 py-2 border border-slate-300 rounded-lg text-sm font-bold text-slate-700 bg-white hover:bg-slate-50 transition shadow-sm">
                                    <svg class="w-4 h-4 mr-2 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    Ajouter contenu
                                </a>
                                <a href="{{ route('formateur.presences.index', $seminar) }}" 
                                   class="inline-flex items-center px-4 py-2 border border-[#061743]/15 rounded-lg text-sm font-bold text-white bg-[#061743] hover:bg-[#0b245f] transition shadow-sm">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Gestion des présences
                                </a>
                                <a href="{{ route('echange.index', $seminar) }}" 
                                   class="inline-flex items-center px-4 py-2 border border-[#061743]/15 rounded-lg text-sm font-bold text-[#061743] bg-blue-50 hover:bg-blue-100 transition shadow-sm">
                                    <svg class="w-4 h-4 mr-2 text-[#061743]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                                    </svg>
                                    Discussions
                                </a>
                                <a href="{{ route('participant.formation', $seminar) }}" 
                                   class="inline-flex items-center px-4 py-2 border border-[#ffbd45]/30 rounded-lg text-sm font-black text-[#061743] bg-[#ffbd45] hover:bg-[#ffd071] transition shadow-sm uppercase">
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
