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
                                @php
                                    $portalUrl = $registration->qrCode?->portalUrl();
                                    $qrSvg = $portalUrl ? \App\Support\QrCodeSvg::render($portalUrl, 5) : null;
                                    $payment = $registration->payment;
                                @endphp
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
                                        <div class="w-full rounded-md bg-[#061743]/5 px-3 py-3 text-sm text-slate-600 sm:w-40">
                                            @if($registration->qrCode && $qrSvg)
                                                <div class="mx-auto w-28">
                                                    {!! $qrSvg !!}
                                                </div>
                                                <p class="mt-2 text-center font-mono text-xs font-semibold">{{ $registration->qrCode->code }}</p>
                                            @else
                                                <p>Code QR en preparation</p>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Description -->
                                    @if($registration->seminar?->description)
                                        <p class="text-sm text-gray-600 mb-4 line-clamp-2">{{ $registration->seminar->description }}</p>
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
                                            <p class="text-sm font-semibold text-purple-600">{{ $registration->seminar?->documents_count ?? 0 }} document(s)</p>
                                        </div>
                                    </div>

                                    {{-- Section Paiement --}}
                                    <div class="mb-4 rounded-lg border border-slate-200 bg-slate-50 px-4 py-3">
                                        <div class="flex items-center justify-between flex-wrap gap-2">
                                            <div class="flex items-center gap-2">
                                                <span class="text-xs font-bold uppercase text-slate-400">Paiement</span>
                                                @if($payment)
                                                    <span class="inline-flex items-center gap-1 rounded-full border px-2.5 py-0.5 text-xs font-bold {{ $payment->statusBadgeClasses() }}">
                                                        {{ $payment->statusEmoji() }} {{ $payment->statusLabel() }}
                                                    </span>
                                                    @if($payment->payment_method)
                                                        <span class="text-xs text-slate-500">· {{ $payment->methodLabel() }}</span>
                                                    @endif
                                                @else
                                                    <span class="inline-flex items-center gap-1 rounded-full border border-slate-200 bg-slate-100 px-2.5 py-0.5 text-xs font-bold text-slate-600">
                                                        🔴 Non payé
                                                    </span>
                                                @endif
                                            </div>

                                            {{-- Bouton payer ou télécharger --}}
                                            @if(!$payment || $payment->isUnpaid() || $payment->isRejected())
                                                <a href="{{ route('participant.payment.show', $registration) }}"
                                                   class="inline-flex items-center gap-1.5 rounded-lg bg-[#f2a90f] px-3 py-1.5 text-xs font-black text-[#061743] transition hover:bg-[#ffd071]">
                                                    💳 Payer maintenant
                                                </a>
                                            @elseif($payment->isPaid())
                                                <a href="{{ route('participant.payment.show', $registration) }}"
                                                   class="inline-flex items-center gap-1.5 rounded-lg bg-emerald-600 px-3 py-1.5 text-xs font-bold text-white transition hover:bg-emerald-700">
                                                    📄 Mes documents
                                                </a>
                                            @else
                                                <span class="text-xs text-slate-400 italic">En attente de traitement</span>
                                            @endif
                                        </div>

                                        {{-- Infos arrangement si applicable --}}
                                        @if($payment && $payment->payment_method === 'arrangement' && $payment->organization_name)
                                            <p class="mt-1.5 text-xs text-slate-500">
                                                Organisme : <span class="font-semibold text-slate-700">{{ $payment->organization_name }}</span>
                                            </p>
                                        @endif

                                        {{-- Note admin --}}
                                        @if($payment && $payment->admin_note)
                                            <p class="mt-1.5 text-xs text-amber-700 bg-amber-50 rounded px-2 py-1">
                                                📝 {{ $payment->admin_note }}
                                            </p>
                                        @endif
                                    </div>

                                    <!-- Boutons d'action -->
                                    <div class="flex gap-3">
                                        <a href="{{ route('participant.formation', $registration->seminar) }}" class="flex-1 inline-flex items-center justify-center px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M9 2a1 1 0 000 2h2a1 1 0 100-2H9z"></path>
                                                <path fill-rule="evenodd" d="M4 5a2 2 0 012-2 1 1 0 000 2H6a6 6 0 016 6v3a1 1 0 11-2 0v-3a4 4 0 00-4-4H6a1 1 0 000 2H4a2 2 0 01-2-2V5zm12 4a1 1 0 100 2h1.586l-1.293 1.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 00-1.414 1.414L17.586 9H16z" clip-rule="evenodd"></path>
                                            </svg>
                                            Séminaire
                                        </a>
                                        <a href="{{ route('echange.index', $registration->seminar) }}" class="flex-1 inline-flex items-center justify-center px-4 py-2 border border-blue-300 rounded-lg text-sm font-medium text-blue-700 bg-blue-50 hover:bg-blue-100 transition-colors">
                                            <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M2 5a2 2 0 012-2h12a2 2 0 012 2v10a2 2 0 01-2 2H4a2 2 0 01-2-2V5z"></path>
                                                <path d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                            </svg>
                                            Échange
                                        </a>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    @endif
                </div>
            </div>

            {{-- Section Séminaires disponibles --}}
            <div class="caei-card mt-8">
                <div class="border-b border-slate-200 bg-[#061743] p-6 text-white">
                    <p class="text-sm font-black uppercase text-[#ffbd45]">CAEI Company Group</p>
                    <h3 class="mt-2 text-2xl font-black">Séminaires disponibles</h3>
                </div>

                <div class="p-6 text-slate-900">
                    @if($availableSeminars->isEmpty())
                        <p class="text-slate-600">Aucun autre séminaire n'est disponible pour le moment.</p>
                    @else
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                            @foreach($availableSeminars as $seminar)
                                <div class="rounded-lg border border-slate-200 p-5 flex flex-col justify-between h-full bg-white shadow-sm hover:shadow-md transition-shadow">
                                    <div>
                                        <div class="flex items-center justify-between gap-2 mb-2">
                                            <span class="inline-flex items-center rounded bg-green-50 px-2 py-1 text-xs font-bold text-green-700 border border-green-100">
                                                Disponible
                                            </span>
                                            <span class="text-xs text-slate-500 font-medium">
                                                {{ $seminar->start_date->diffInDays($seminar->end_date) + 1 }} jour(s) @if($seminar->hours) ({{ $seminar->hours }} h) @endif
                                            </span>
                                        </div>
                                        <h4 class="font-bold text-[#061743] text-lg mb-2 leading-snug">{{ $seminar->theme }}</h4>
                                        <p class="text-sm text-slate-600 mb-3 flex items-center gap-1.5">
                                            <svg class="w-4 h-4 text-[#f2a90f] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            </svg>
                                            {{ $seminar->country }}
                                        </p>
                                        @if($seminar->description)
                                            <p class="text-xs text-slate-600 mb-4 line-clamp-3 leading-relaxed">
                                                {{ $seminar->description }}
                                            </p>
                                        @endif
                                        <div class="text-xs text-slate-500 mb-4 flex items-center gap-1.5">
                                            <svg class="w-4 h-4 text-[#f2a90f] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            Du {{ $seminar->start_date->format('d/m/Y') }} au {{ $seminar->end_date->format('d/m/Y') }}
                                        </div>
                                    </div>
                                    <div class="mt-4 border-t border-slate-100 pt-4 flex gap-2">
                                        <a href="{{ route('seminaires.show', $seminar) }}" class="flex-1 inline-flex items-center justify-center px-3 py-2 border border-slate-300 rounded-lg text-xs font-bold text-slate-700 bg-white hover:bg-slate-50 transition-colors">
                                            Détails
                                        </a>
                                        <a href="{{ route('registration.create', ['seminar_id' => $seminar->id]) }}" class="flex-1 inline-flex items-center justify-center px-3 py-2 rounded-lg text-xs font-black uppercase text-[#061743] bg-[#ffbd45] hover:bg-[#ffd071] transition-colors">
                                            S'inscrire
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
