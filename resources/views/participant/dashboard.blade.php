<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-black uppercase leading-tight text-[#061743]">
            Mon espace participant
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            {{-- Section Mes séminaires --}}
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                <div class="bg-gradient-to-r from-[#061743] to-[#0d2a6e] p-6 sm:p-8 text-white">
                    <p class="text-xs font-black uppercase text-[#ffbd45] tracking-widest">CAEI Company Group</p>
                    <h3 class="mt-2 text-2xl font-black">Mes Séminaires</h3>
                </div>

                <div class="p-6 sm:p-8 text-slate-900 bg-white">
                    @if($registrations->isEmpty())
                        <div class="text-center py-12">
                            <div class="mx-auto w-16 h-16 rounded-full bg-slate-50 flex items-center justify-center mb-4">
                                <svg class="w-8 h-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                </svg>
                            </div>
                            <h4 class="text-slate-800 font-bold text-lg">Aucune inscription active</h4>
                            <p class="text-sm text-slate-500 mt-1">Vous n'êtes inscrit à aucun séminaire pour le moment.</p>
                        </div>
                    @else
                        <div class="space-y-8">
                            @foreach($registrations as $registration)
                                @php
                                    $portalUrl = $registration->qrCode?->portalUrl();
                                    $qrSvg = $portalUrl ? \App\Support\QrCodeSvg::render($portalUrl, 5) : null;
                                    $payment = $registration->payment;
                                @endphp
                                <div class="bg-white rounded-2xl border border-slate-100 p-6 shadow-sm hover:shadow-md transition-all duration-300">
                                    <div class="flex flex-col justify-between gap-6 md:flex-row md:items-start pb-6 border-b border-slate-100">
                                        <div class="space-y-3 flex-1">
                                            <h4 class="text-xl font-black text-[#061743] leading-tight">{{ $registration->seminar?->theme ?? 'Séminaire' }}</h4>
                                            
                                            <div class="flex flex-wrap items-center gap-3">
                                                <span class="inline-flex items-center gap-1 text-xs text-slate-500 font-semibold bg-slate-50 px-2.5 py-1 rounded-md border border-slate-100">
                                                    <svg class="w-3.5 h-3.5 text-[#f2a90f]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                                    </svg>
                                                    {{ $registration->seminar?->country ?? 'Pays non renseigné' }}
                                                </span>
                                                <span class="inline-flex items-center gap-1.5 rounded-full bg-slate-100 px-3 py-1 text-xs font-bold text-slate-700 border border-slate-200">
                                                    Statut : {{ $registration->status }}
                                                </span>
                                            </div>
                                        </div>

                                        {{-- Conteneur QR Code Premium --}}
                                        <div class="bg-white rounded-xl border border-slate-200/60 p-3 shadow-sm flex flex-col items-center justify-center shrink-0 w-full md:w-40 self-center md:self-start">
                                            @if($registration->qrCode && $qrSvg)
                                                <div class="w-24 h-24">
                                                    {!! $qrSvg !!}
                                                </div>
                                                <span class="mt-2 text-[10px] font-mono font-bold text-slate-400 bg-slate-50 px-2 py-0.5 rounded border border-slate-100">{{ $registration->qrCode->code }}</span>
                                            @else
                                                <div class="flex flex-col items-center gap-2 text-center text-slate-400 py-4">
                                                    <svg class="w-8 h-8 text-slate-300 animate-pulse" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"/>
                                                    </svg>
                                                    <span class="text-xs font-semibold">QR Code en préparation</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- Description -->
                                    @if($registration->seminar?->description)
                                        <p class="text-sm text-slate-500 font-medium leading-relaxed my-4 whitespace-pre-line line-clamp-2">{{ $registration->seminar->description }}</p>
                                    @endif

                                    <!-- Infos rapides -->
                                    <div class="grid grid-cols-2 sm:grid-cols-3 gap-4 my-4 p-4 bg-slate-50 rounded-xl border border-slate-100">
                                        <div>
                                            <span class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider">Code QR</span>
                                            <span class="text-sm font-black text-slate-700">
                                                @if($registration->qrCode)
                                                    {{ substr($registration->qrCode->code, 0, 8) }}...
                                                @else
                                                    <span class="text-slate-400 font-medium italic">En attente</span>
                                                @endif
                                            </span>
                                        </div>
                                        <div>
                                            <span class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider">Supports pédagogiques</span>
                                            <span class="text-sm font-extrabold text-[#061743] flex items-center gap-1.5">
                                                <svg class="w-4 h-4 text-[#f2a90f]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                                </svg>
                                                {{ $registration->seminar?->documents_count ?? 0 }} document(s)
                                            </span>
                                        </div>
                                        <div class="col-span-2 sm:col-span-1">
                                            <span class="block text-[10px] font-bold text-slate-400 uppercase tracking-wider">Dates</span>
                                            <span class="text-xs font-bold text-slate-800">
                                                Du {{ $registration->seminar?->start_date->format('d/m/Y') }} au {{ $registration->seminar?->end_date->format('d/m/Y') }}
                                            </span>
                                        </div>
                                    </div>

                                    {{-- Section Paiement --}}
                                    <div class="mb-5 rounded-xl border border-slate-100 bg-slate-50 p-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3 shadow-inner">
                                        <div class="flex items-center gap-2 flex-wrap">
                                            <span class="text-[10px] font-bold uppercase text-slate-400 tracking-wider">Règlement</span>
                                            @if($payment)
                                                <span class="inline-flex items-center gap-1 rounded-full border px-2.5 py-0.5 text-xs font-bold {{ $payment->statusBadgeClasses() }}">
                                                    {{ $payment->statusEmoji() }} {{ $payment->statusLabel() }}
                                                </span>
                                                @if($payment->payment_method)
                                                    <span class="text-xs text-slate-500 font-semibold">· {{ $payment->methodLabel() }}</span>
                                                @endif
                                            @else
                                                <span class="inline-flex items-center gap-1 rounded-full border border-red-200 bg-red-50 px-2.5 py-0.5 text-xs font-bold text-red-700">
                                                    🔴 Non payé
                                                </span>
                                            @endif
                                        </div>

                                        {{-- Bouton payer ou télécharger --}}
                                        @if(!$payment || $payment->isUnpaid() || $payment->isRejected())
                                            <a href="{{ route('participant.payment.show', $registration) }}"
                                               class="inline-flex items-center justify-center gap-1.5 rounded-lg bg-[#f2a90f] px-4 py-2 text-xs font-black text-[#061743] hover:bg-[#ffd071] transition shadow-sm">
                                                💳 Payer maintenant
                                            </a>
                                        @elseif($payment->isPaid())
                                            <a href="{{ route('participant.payment.show', $registration) }}"
                                               class="inline-flex items-center justify-center gap-1.5 rounded-lg bg-emerald-600 px-4 py-2 text-xs font-bold text-white hover:bg-emerald-700 transition shadow-sm">
                                                📄 Mes documents
                                            </a>
                                        @else
                                            <span class="text-xs text-slate-400 italic font-semibold">En attente de traitement</span>
                                        @endif
                                    </div>

                                    {{-- Infos arrangement ou note admin --}}
                                    @if($payment && (($payment->payment_method === 'arrangement' && $payment->organization_name) || $payment->admin_note))
                                        <div class="mt-2 space-y-2 border-t border-slate-100 pt-3">
                                            @if($payment->payment_method === 'arrangement' && $payment->organization_name)
                                                <p class="text-xs text-slate-500">
                                                    Organisme : <span class="font-bold text-slate-700">{{ $payment->organization_name }}</span>
                                                </p>
                                            @endif
                                            @if($payment->admin_note)
                                                <p class="text-xs text-amber-700 bg-amber-50 rounded-lg px-3 py-1.5 border border-amber-100 inline-block font-semibold">
                                                    Note administrative : {{ $payment->admin_note }}
                                                </p>
                                            @endif
                                        </div>
                                    @endif

                                    <!-- Boutons d'action -->
                                    <div class="flex flex-col sm:flex-row gap-3 mt-5">
                                        <a href="{{ route('participant.formation', $registration->seminar) }}" class="flex-1 inline-flex items-center justify-center px-4 py-2.5 border border-slate-200 rounded-xl text-xs font-bold text-slate-700 bg-white hover:bg-slate-50 transition-colors shadow-sm gap-2">
                                            <svg class="w-4 h-4 text-slate-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                                            </svg>
                                            Espace de Formation
                                        </a>
                                        <a href="{{ route('echange.index', $registration->seminar) }}" class="flex-1 inline-flex items-center justify-center px-4 py-2.5 border border-[#ffbd45]/30 rounded-xl text-xs font-bold text-[#061743] bg-[#ffbd45]/5 hover:bg-[#ffbd45]/15 transition-colors gap-2">
                                            <svg class="w-4 h-4 text-[#f2a90f] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                            </svg>
                                            Échange & Questions
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            {{-- Section Séminaires disponibles --}}
            <div class="bg-white rounded-2xl border border-slate-100 shadow-sm overflow-hidden">
                <div class="bg-gradient-to-r from-[#061743] to-[#0d2a6e] p-6 sm:p-8 text-white">
                    <p class="text-xs font-black uppercase text-[#ffbd45] tracking-widest">CAEI Company Group</p>
                    <h3 class="mt-2 text-2xl font-black">Séminaires disponibles</h3>
                </div>

                <div class="p-6 sm:p-8 text-slate-900 bg-white">
                    @if($availableSeminars->isEmpty())
                        <div class="text-center py-12 bg-slate-50/50 rounded-2xl border border-dashed border-slate-200">
                            <p class="text-slate-500 font-medium text-sm">Aucun autre séminaire n'est disponible pour le moment.</p>
                        </div>
                    @else
                        <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3">
                            @foreach($availableSeminars as $seminar)
                                <div class="bg-white rounded-2xl border border-slate-200/70 p-5 flex flex-col justify-between h-full shadow-sm hover:shadow-md transition-all duration-300 hover:-translate-y-1">
                                    <div>
                                        <div class="flex items-center justify-between gap-2 mb-3">
                                            <span class="inline-flex items-center rounded-full bg-emerald-50 px-2.5 py-0.5 text-xs font-bold text-emerald-700 border border-emerald-100">
                                                Disponible
                                            </span>
                                            <span class="text-xs text-slate-500 font-semibold flex items-center gap-1">
                                                <svg class="w-3.5 h-3.5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                </svg>
                                                {{ $seminar->start_date->diffInDays($seminar->end_date) + 1 }} j
                                                @if($seminar->hours) ({{ $seminar->hours }} h) @endif
                                            </span>
                                        </div>
                                        
                                        <h4 class="font-extrabold text-[#061743] text-lg mb-2 leading-snug line-clamp-2 h-12">{{ $seminar->theme }}</h4>
                                        
                                        <p class="text-sm text-slate-600 mb-3 flex items-center gap-1.5 font-semibold">
                                            <svg class="w-4 h-4 text-[#f2a90f] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                            </svg>
                                            {{ $seminar->country }}
                                        </p>

                                        @if($seminar->description)
                                            <p class="text-xs text-slate-500 mb-4 line-clamp-3 leading-relaxed font-medium">
                                                {{ $seminar->description }}
                                            </p>
                                        @endif

                                        <div class="text-xs text-slate-500 mb-2 flex items-center gap-1.5 font-semibold bg-slate-50 p-2.5 rounded-lg border border-slate-100">
                                            <svg class="w-4 h-4 text-[#f2a90f] shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            <span>Du {{ $seminar->start_date->format('d/m/Y') }} au {{ $seminar->end_date->format('d/m/Y') }}</span>
                                        </div>
                                    </div>

                                    <div class="mt-5 border-t border-slate-100 pt-4 flex gap-2">
                                        <a href="{{ route('seminaires.show', $seminar) }}" class="flex-1 inline-flex items-center justify-center px-3 py-2 border border-slate-200 rounded-lg text-xs font-bold text-slate-700 bg-white hover:bg-slate-50 transition shadow-sm">
                                            Détails
                                        </a>
                                        <a href="{{ route('registration.create', ['seminar_id' => $seminar->id]) }}" class="flex-1 inline-flex items-center justify-center px-3 py-2 rounded-lg text-xs font-black uppercase text-[#061743] bg-[#ffbd45] hover:bg-[#ffd071] transition shadow-sm">
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
