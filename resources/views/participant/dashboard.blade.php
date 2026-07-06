<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-black uppercase leading-tight text-slate-900">
            Mon espace participant
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="caei-card">
                <div class="border-b border-slate-200 bg-[#061743] p-6 text-white">
                    <p class="text-sm font-black uppercase text-[#ffbd45]">CAEI Company Group</p>
                    <h3 class="mt-2 text-2xl font-black">Mes seminaires</h3>
                </div>

                <div class="p-6 text-slate-900">
                    @if($registrations->isEmpty())
                        <p class="text-slate-600">Vous n'etes inscrit a aucun seminaire pour le moment.</p>
                    @else
                        <div class="space-y-4">
                            @foreach($registrations as $registration)
                                <div class="rounded-lg border border-slate-200 p-4">
                                    <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-start">
                                        <div>
                                            <h4 class="font-semibold">{{ $registration->seminar?->theme ?? 'Seminaire' }}</h4>
                                            <p class="text-sm text-slate-600">
                                                {{ $registration->seminar?->country ?? 'Pays non renseigne' }}
                                            </p>
                                            <p class="text-sm text-slate-600">
                                                Statut : <span class="font-medium">{{ $registration->status }}</span>
                                            </p>
                                        </div>
                                        <div class="rounded-md bg-[#061743]/5 px-3 py-2 text-sm text-slate-600">
                                            @if($registration->qrCode)
                                                <p>Code QR : {{ $registration->qrCode->code }}</p>
                                            @else
                                                <p>Code QR en preparation</p>
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
