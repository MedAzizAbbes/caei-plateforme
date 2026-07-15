<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-black uppercase leading-tight text-slate-900">
            Paiement — {{ $registration->seminar->theme }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            {{-- Back --}}
            <div class="mb-6">
                <a href="{{ route('participant.dashboard') }}"
                   class="inline-flex items-center gap-1 text-sm font-bold text-[#061743] hover:text-[#f2a90f]">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                    Retour à mon espace
                </a>
            </div>

            {{-- Success / Error messages --}}
            @if(session('success'))
                <div class="mb-6 rounded-xl border border-emerald-200 bg-emerald-50 px-5 py-4 text-sm font-semibold text-emerald-800">
                    ✅ {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="mb-6 rounded-xl border border-red-200 bg-red-50 px-5 py-4 text-sm font-semibold text-red-700">
                    ❌ {{ session('error') }}
                </div>
            @endif

            {{-- Seminar header --}}
            <div class="caei-card mb-6 overflow-hidden">
                <div class="bg-[#061743] px-6 py-5">
                    <p class="text-xs font-black uppercase text-[#f2a90f]">Séminaire</p>
                    <h3 class="mt-1 text-xl font-black text-white">{{ $registration->seminar->theme }}</h3>
                    <p class="mt-1 text-sm text-white/70">
                        {{ $registration->seminar->country }} —
                        Du {{ $registration->seminar->start_date->format('d/m/Y') }}
                        au {{ $registration->seminar->end_date->format('d/m/Y') }}
                    </p>
                </div>
                @if($registration->seminar->price)
                    <div class="flex items-center justify-between bg-[#f2a90f]/10 px-6 py-3">
                        <span class="text-sm font-bold text-slate-700">Frais d'inscription</span>
                        <span class="text-lg font-black text-[#061743]">
                            {{ number_format($registration->seminar->price, 0, ',', ' ') }} FCFA
                        </span>
                    </div>
                @endif
            </div>

            {{-- Current payment status (if any) --}}
            @if($registration->payment && !$registration->payment->isUnpaid())
                @php $payment = $registration->payment; @endphp
                <div class="mb-6 overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
                    <div class="flex items-center gap-3 border-b border-slate-100 bg-slate-50 px-6 py-4">
                        <svg class="h-5 w-5 text-[#061743]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <h4 class="font-black text-[#061743]">Statut de votre paiement</h4>
                    </div>
                    <div class="px-6 py-5 flex items-center justify-between flex-wrap gap-4">
                        <div>
                            <p class="text-sm text-slate-500">Mode de paiement</p>
                            <p class="font-semibold text-slate-800">{{ $payment->methodLabel() }}</p>
                        </div>
                        <div>
                            <span class="inline-flex items-center gap-1.5 rounded-full border px-3 py-1 text-sm font-bold {{ $payment->statusBadgeClasses() }}">
                                {{ $payment->statusEmoji() }} {{ $payment->statusLabel() }}
                            </span>
                        </div>
                    </div>
                    @if($payment->admin_note)
                        <div class="border-t border-slate-100 px-6 py-4 bg-slate-50">
                            <p class="text-xs font-bold uppercase text-slate-400">Note de l'administration</p>
                            <p class="mt-1 text-sm text-slate-700">{{ $payment->admin_note }}</p>
                        </div>
                    @endif
                    {{-- Download buttons if paid --}}
                    @if($payment->isPaid())
                        <div class="border-t border-slate-100 px-6 py-4 flex flex-wrap gap-3">
                            @if($payment->attestation_path)
                                <a href="{{ route('participant.payment.document.download', [$registration, 'attestation']) }}"
                                   class="inline-flex items-center gap-2 rounded-lg bg-[#061743] px-4 py-2 text-sm font-bold text-white transition hover:bg-[#0a2060]">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    Attestation de paiement
                                </a>
                            @endif
                            @if($payment->invitation_path)
                                <a href="{{ route('participant.payment.document.download', [$registration, 'invitation']) }}"
                                   class="inline-flex items-center gap-2 rounded-lg border border-[#061743] bg-white px-4 py-2 text-sm font-bold text-[#061743] transition hover:bg-slate-50">
                                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                    Lettre d'invitation
                                </a>
                            @endif
                        </div>
                    @endif
                </div>

                @if(!$registration->payment->isRejected())
                    <p class="text-center text-sm text-slate-500">Aucune action supplémentaire requise.</p>
                    @if(!$registration->payment->isPaid())
                        <p class="text-center text-xs text-slate-400 mt-1">L'administration traitera votre demande dans les meilleurs délais.</p>
                    @endif
                </div>
            </div>
            @php return; @endphp
                @endif
            @endif

            {{-- Payment options (x-data for tab switching) --}}
            <div x-data="{ tab: 'choice' }" class="space-y-4">

                {{-- STEP 1: Choose method --}}
                <div x-show="tab === 'choice'" class="caei-card overflow-hidden">
                    <div class="border-b border-slate-200 bg-[#061743] px-6 py-5">
                        <p class="text-xs font-black uppercase text-[#f2a90f]">Étape 1 sur 2</p>
                        <h3 class="mt-1 text-xl font-black text-white">Choisissez votre mode de paiement</h3>
                    </div>
                    <div class="p-6 space-y-3">

                        {{-- Bank transfer --}}
                        <button @click="tab = 'transfer'"
                                class="w-full flex items-center gap-4 rounded-xl border-2 border-slate-200 bg-white p-5 text-left transition hover:border-[#061743] hover:bg-slate-50 focus:outline-none">
                            <span class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-xl bg-[#061743]">
                                <svg class="h-6 w-6 text-[#f2a90f]" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                                </svg>
                            </span>
                            <div>
                                <p class="font-black text-[#061743]">Paiement par virement bancaire</p>
                                <p class="text-sm text-slate-500">Effectuez un virement vers notre compte et envoyez votre preuve</p>
                            </div>
                            <svg class="ml-auto h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>

                        {{-- Visa --}}
                        <button @click="tab = 'visa'"
                                class="w-full flex items-center gap-4 rounded-xl border-2 border-slate-200 bg-white p-5 text-left transition hover:border-[#1d4ed8] hover:bg-blue-50 focus:outline-none">
                            <span class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-xl bg-[#1d4ed8]">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"/>
                                </svg>
                            </span>
                            <div>
                                <p class="font-black text-[#1d4ed8]">Paiement par carte Visa</p>
                                <p class="text-sm text-slate-500">Payez en ligne avec votre carte bancaire internationale</p>
                            </div>
                            <svg class="ml-auto h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>

                        {{-- Arrangement --}}
                        <button @click="tab = 'arrangement'"
                                class="w-full flex items-center gap-4 rounded-xl border-2 border-slate-200 bg-white p-5 text-left transition hover:border-[#ea580c] hover:bg-orange-50 focus:outline-none">
                            <span class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-xl bg-[#ea580c]">
                                <svg class="h-6 w-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                            </span>
                            <div>
                                <p class="font-black text-[#ea580c]">Paiement avec arrangement</p>
                                <p class="text-sm text-slate-500">Prise en charge par entreprise, université, administration ou paiement différé</p>
                            </div>
                            <svg class="ml-auto h-5 w-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- ============================= --}}
                {{-- VIREMENT BANCAIRE             --}}
                {{-- ============================= --}}
                <div x-show="tab === 'transfer'" x-cloak class="space-y-4">
                    <button @click="tab = 'choice'" class="inline-flex items-center gap-1 text-sm font-bold text-[#061743] hover:text-[#f2a90f]">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                        Changer de méthode
                    </button>

                    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
                        <div class="bg-[#061743] px-6 py-5">
                            <p class="text-xs font-black uppercase text-[#f2a90f]">Virement bancaire</p>
                            <h3 class="mt-1 text-xl font-black text-white">Coordonnées bancaires CAEI</h3>
                        </div>
                        <div class="p-6">
                            <div class="rounded-xl bg-slate-50 border border-slate-200 p-5 space-y-3 font-mono text-sm">
                                <div class="flex justify-between">
                                    <span class="text-slate-500 font-sans font-bold text-xs uppercase">Bénéficiaire</span>
                                    <span class="font-semibold text-slate-800">CAEI Company Group</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-slate-500 font-sans font-bold text-xs uppercase">IBAN</span>
                                    <span class="font-semibold text-slate-800">TN59 1234 5678 9012 3456 7890</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-slate-500 font-sans font-bold text-xs uppercase">BIC / SWIFT</span>
                                    <span class="font-semibold text-slate-800">BIATTNTTXXX</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-slate-500 font-sans font-bold text-xs uppercase">Banque</span>
                                    <span class="font-semibold text-slate-800">BIAT Tunis</span>
                                </div>
                                <div class="flex justify-between">
                                    <span class="text-slate-500 font-sans font-bold text-xs uppercase">Référence</span>
                                    <span class="font-bold text-[#061743]">CAEI-{{ str_pad($registration->id, 6, '0', STR_PAD_LEFT) }}</span>
                                </div>
                            </div>

                            <div class="mt-4 rounded-lg bg-amber-50 border border-amber-200 p-4 text-sm text-amber-800">
                                <p class="font-bold mb-1">⚠️ Important</p>
                                <p>Mentionnez impérativement la référence <strong>CAEI-{{ str_pad($registration->id, 6, '0', STR_PAD_LEFT) }}</strong> dans le libellé de votre virement.</p>
                            </div>

                            <form method="POST" action="{{ route('participant.payment.transfer.store', $registration) }}" class="mt-6">
                                @csrf
                                <button type="submit"
                                        onclick="return confirm('Confirmez-vous avoir effectué le virement ?')"
                                        class="w-full rounded-xl bg-[#061743] py-3 text-sm font-black uppercase text-white transition hover:bg-[#0a2060]">
                                    J'ai effectué le virement
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- ============================= --}}
                {{-- CARTE VISA                    --}}
                {{-- ============================= --}}
                <div x-show="tab === 'visa'" x-cloak class="space-y-4">
                    <button @click="tab = 'choice'" class="inline-flex items-center gap-1 text-sm font-bold text-[#061743] hover:text-[#f2a90f]">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                        Changer de méthode
                    </button>

                    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
                        <div class="bg-[#1d4ed8] px-6 py-5">
                            <p class="text-xs font-black uppercase text-blue-300">Paiement sécurisé</p>
                            <h3 class="mt-1 text-xl font-black text-white">Carte bancaire internationale</h3>
                        </div>

                        {{-- Card visual --}}
                        <div class="px-6 pt-6">
                            <div x-data="{
                                    cardNum: '',
                                    cardName: '',
                                    expiry: '',
                                    formatted() {
                                        return this.cardNum.replace(/\s/g,'').replace(/(\d{4})/g,'$1 ').trim() || '•••• •••• •••• ••••';
                                    }
                                }"
                                 class="space-y-4">
                                {{-- Card mockup --}}
                                <div class="relative mx-auto h-44 w-full max-w-sm rounded-2xl bg-gradient-to-br from-[#1d4ed8] to-[#061743] p-6 shadow-xl">
                                    <div class="flex justify-between items-start">
                                        <span class="text-xl font-black text-white tracking-widest">VISA</span>
                                        <div class="flex gap-1">
                                            <div class="h-8 w-8 rounded-full bg-yellow-400/80"></div>
                                            <div class="h-8 w-8 rounded-full bg-yellow-400/50 -ml-4"></div>
                                        </div>
                                    </div>
                                    <div class="mt-6 font-mono text-lg font-bold tracking-widest text-white/90" x-text="formatted()"></div>
                                    <div class="mt-3 flex justify-between text-xs text-white/70">
                                        <span x-text="cardName.toUpperCase() || 'NOM PRÉNOM'"></span>
                                        <span x-text="expiry || 'MM/AA'"></span>
                                    </div>
                                </div>

                                {{-- Form --}}
                                <form method="POST" action="{{ route('participant.payment.visa.store', $registration) }}" class="space-y-4">
                                    @csrf
                                    <div>
                                        <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Nom du titulaire</label>
                                        <input type="text" name="card_name" x-model="cardName"
                                               placeholder="Jean Dupont"
                                               class="w-full rounded-lg border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 focus:border-[#1d4ed8] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#1d4ed8]/20">
                                        @error('card_name')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                                    </div>
                                    <div>
                                        <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Numéro de carte</label>
                                        <input type="text" name="card_number" x-model="cardNum"
                                               placeholder="1234 5678 9012 3456"
                                               maxlength="19"
                                               @input="cardNum = $event.target.value.replace(/\D/g,'').replace(/(\d{4})/g,'$1 ').trim()"
                                               class="w-full rounded-lg border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-mono text-slate-800 focus:border-[#1d4ed8] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#1d4ed8]/20">
                                        @error('card_number')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                                    </div>
                                    <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Date d'expiration</label>
                                            <input type="text" name="card_expiry" x-model="expiry"
                                                   placeholder="MM/AA" maxlength="5"
                                                   @input="let v=$event.target.value.replace(/\D/g,''); if(v.length>=2){v=v.slice(0,2)+'/'+v.slice(2,4);} expiry=v; $event.target.value=v;"
                                                   class="w-full rounded-lg border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-mono text-slate-800 focus:border-[#1d4ed8] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#1d4ed8]/20">
                                            @error('card_expiry')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                                        </div>
                                        <div>
                                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">CVV</label>
                                            <input type="password" name="card_cvv"
                                                   placeholder="•••"
                                                   maxlength="4"
                                                   class="w-full rounded-lg border border-slate-200 bg-slate-50 px-4 py-3 text-sm font-mono text-slate-800 focus:border-[#1d4ed8] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#1d4ed8]/20">
                                            @error('card_cvv')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                                        </div>
                                    </div>
                                    <div class="flex items-center gap-2 text-xs text-slate-500">
                                        <svg class="h-4 w-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                        </svg>
                                        Paiement sécurisé — Vos données sont protégées
                                    </div>
                                    <button type="submit"
                                            class="w-full rounded-xl bg-[#1d4ed8] py-3 text-sm font-black uppercase text-white transition hover:bg-[#1e40af]">
                                        Valider le paiement
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="p-6 pt-2"></div>
                    </div>
                </div>

                {{-- ============================= --}}
                {{-- ARRANGEMENT                   --}}
                {{-- ============================= --}}
                <div x-show="tab === 'arrangement'" x-cloak class="space-y-4">
                    <button @click="tab = 'choice'" class="inline-flex items-center gap-1 text-sm font-bold text-[#061743] hover:text-[#f2a90f]">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                        </svg>
                        Changer de méthode
                    </button>

                    <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
                        <div class="bg-[#ea580c] px-6 py-5">
                            <p class="text-xs font-black uppercase text-orange-200">Demande d'arrangement</p>
                            <h3 class="mt-1 text-xl font-black text-white">Prise en charge ou paiement différé</h3>
                            <p class="mt-1 text-sm text-orange-100">
                                Remplissez ce formulaire pour soumettre votre demande à l'administration.
                            </p>
                        </div>

                        <form method="POST"
                              action="{{ route('participant.payment.arrangement.store', $registration) }}"
                              enctype="multipart/form-data"
                              class="p-6 space-y-5">
                            @csrf

                            @if($errors->any())
                                <div class="rounded-lg border border-red-200 bg-red-50 p-4 text-sm text-red-700">
                                    <p class="font-bold mb-1">Veuillez corriger les erreurs suivantes :</p>
                                    <ul class="list-disc list-inside space-y-0.5">
                                        @foreach($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            {{-- Type d'arrangement --}}
                            <div>
                                <label class="block text-xs font-bold uppercase text-slate-500 mb-2">Type d'arrangement *</label>
                                <div class="grid grid-cols-2 gap-3 sm:grid-cols-4">
                                    @foreach([
                                        ['val' => 'entreprise', 'label' => 'Entreprise', 'icon' => '🏢'],
                                        ['val' => 'universite', 'label' => 'Université', 'icon' => '🎓'],
                                        ['val' => 'administration', 'label' => 'Administration', 'icon' => '🏛️'],
                                        ['val' => 'autre', 'label' => 'Autre', 'icon' => '📋'],
                                    ] as $type)
                                        <label class="relative flex cursor-pointer flex-col items-center gap-2 rounded-xl border-2 p-3 text-center transition
                                            {{ old('arrangement_type') == $type['val'] ? 'border-[#ea580c] bg-orange-50' : 'border-slate-200 bg-slate-50 hover:border-[#ea580c]' }}">
                                            <input type="radio" name="arrangement_type" value="{{ $type['val'] }}"
                                                   {{ old('arrangement_type') == $type['val'] ? 'checked' : '' }}
                                                   class="sr-only"
                                                   onclick="this.closest('.grid').querySelectorAll('label').forEach(l=>l.classList.remove('border-[#ea580c]','bg-orange-50'));this.closest('label').classList.add('border-[#ea580c]','bg-orange-50')">
                                            <span class="text-2xl">{{ $type['icon'] }}</span>
                                            <span class="text-xs font-bold text-slate-700">{{ $type['label'] }}</span>
                                        </label>
                                    @endforeach
                                </div>
                                @error('arrangement_type')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                            </div>

                            {{-- Nom de l'organisme --}}
                            <div>
                                <label for="organization_name" class="block text-xs font-bold uppercase text-slate-500 mb-1">
                                    Nom de l'organisme *
                                </label>
                                <input type="text" id="organization_name" name="organization_name"
                                       value="{{ old('organization_name') }}"
                                       placeholder="Ex : Ministère de l'Éducation, Université de Tunis..."
                                       class="w-full rounded-lg border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 focus:border-[#ea580c] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#ea580c]/20">
                                @error('organization_name')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                            </div>

                            {{-- Contact --}}
                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                <div>
                                    <label for="contact_person" class="block text-xs font-bold uppercase text-slate-500 mb-1">
                                        Nom du responsable *
                                    </label>
                                    <input type="text" id="contact_person" name="contact_person"
                                           value="{{ old('contact_person') }}"
                                           placeholder="Ex : M. Ahmed Ben Ali"
                                           class="w-full rounded-lg border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 focus:border-[#ea580c] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#ea580c]/20">
                                    @error('contact_person')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                                </div>
                                <div>
                                    <label for="contact_phone" class="block text-xs font-bold uppercase text-slate-500 mb-1">
                                        Téléphone *
                                    </label>
                                    <input type="text" id="contact_phone" name="contact_phone"
                                           value="{{ old('contact_phone') }}"
                                           placeholder="Ex : +216 XX XXX XXX"
                                           class="w-full rounded-lg border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 focus:border-[#ea580c] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#ea580c]/20">
                                    @error('contact_phone')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                                </div>
                            </div>

                            <div>
                                <label for="contact_email" class="block text-xs font-bold uppercase text-slate-500 mb-1">
                                    Email du responsable *
                                </label>
                                <input type="email" id="contact_email" name="contact_email"
                                       value="{{ old('contact_email') }}"
                                       placeholder="responsable@organisme.com"
                                       class="w-full rounded-lg border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 focus:border-[#ea580c] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#ea580c]/20">
                                @error('contact_email')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                            </div>

                            {{-- Motif --}}
                            <div>
                                <label for="arrangement_reason" class="block text-xs font-bold uppercase text-slate-500 mb-1">
                                    Motif de la demande *
                                </label>
                                <textarea id="arrangement_reason" name="arrangement_reason" rows="4"
                                          placeholder="Expliquez les raisons de votre demande d'arrangement..."
                                          class="w-full rounded-lg border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 focus:border-[#ea580c] focus:bg-white focus:outline-none focus:ring-2 focus:ring-[#ea580c]/20 resize-none">{{ old('arrangement_reason') }}</textarea>
                                @error('arrangement_reason')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                            </div>

                            {{-- Document upload --}}
                            <div>
                                <label class="block text-xs font-bold uppercase text-slate-500 mb-1">
                                    Document justificatif (facultatif)
                                </label>
                                <div x-data="{ fileName: '' }"
                                     class="relative">
                                    <label class="flex cursor-pointer flex-col items-center gap-3 rounded-xl border-2 border-dashed border-slate-300 p-6 transition hover:border-[#ea580c] hover:bg-orange-50"
                                           :class="fileName ? 'border-[#ea580c] bg-orange-50' : ''">
                                        <svg class="h-8 w-8 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-8l-4-4m0 0L8 8m4-4v12"/>
                                        </svg>
                                        <span x-text="fileName || 'Cliquez pour téléverser un document'"
                                              class="text-sm font-semibold text-slate-600"></span>
                                        <span class="text-xs text-slate-400">PDF, JPG ou PNG — Maximum 5 Mo</span>
                                        <input type="file" name="arrangement_document"
                                               accept=".pdf,.jpg,.jpeg,.png"
                                               @change="fileName = $event.target.files[0]?.name || ''"
                                               class="sr-only">
                                    </label>
                                </div>
                                @error('arrangement_document')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                            </div>

                            <div class="border-t border-slate-100 pt-4">
                                <button type="submit"
                                        class="w-full rounded-xl bg-[#ea580c] py-3.5 text-sm font-black uppercase text-white transition hover:bg-[#c2410c]">
                                    📤 Envoyer la demande d'arrangement
                                </button>
                                <p class="mt-2 text-center text-xs text-slate-400">
                                    L'administration examinera votre demande et vous contactera par email.
                                </p>
                            </div>
                        </form>
                    </div>
                </div>

            </div>{{-- /x-data --}}

        </div>
    </div>
</x-app-layout>
