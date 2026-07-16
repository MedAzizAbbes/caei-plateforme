<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-black uppercase leading-tight text-slate-900">
            Paiement de l'inscription
        </h2>
    </x-slot>

    @php
        $payment = $registration->payment;
        $generatedRef = \App\Models\Payment::generateReference($registration->seminar_id, $registration->user_id);
        $seminarPrice = $registration->seminar->price;
        $defaultTab = old('payment_method', request('method', 'virement'));
    @endphp

    <div class="py-8" x-data="{ activeTab: '{{ $defaultTab }}' }">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8 flex flex-col lg:flex-row gap-8">

            {{-- Colonne gauche : résumé séminaire --}}
            <div class="w-full lg:w-1/3 space-y-6">
                <div class="overflow-hidden rounded-2xl bg-white shadow-sm border border-slate-200">
                    <div class="bg-slate-50 px-6 py-5 border-b border-slate-100">
                        <p class="text-xs font-black uppercase text-slate-500">Séminaire choisi</p>
                        <h3 class="mt-1 text-lg font-black text-slate-800">{{ $registration->seminar->theme }}</h3>
                    </div>
                    <div class="p-6 space-y-4 text-sm text-slate-600">
                        <div class="flex items-center gap-3">
                            <span class="font-bold uppercase text-slate-800 w-24">Date</span>
                            <span>{{ \Carbon\Carbon::parse($registration->seminar->start_date)->translatedFormat('d M Y') }}</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <span class="font-bold uppercase text-slate-800 w-24">Lieu</span>
                            <span>{{ $registration->seminar->country }}</span>
                        </div>
                        <div class="pt-4 border-t border-slate-100 flex items-center justify-between">
                            <span class="font-bold uppercase text-slate-800">Montant</span>
                            <span class="text-xl font-black text-[#061743]">{{ number_format($seminarPrice, 2, ',', ' ') }} EUR</span>
                        </div>
                    </div>
                </div>

                {{-- Workflow --}}
                <div class="overflow-hidden rounded-2xl bg-slate-50 shadow-sm border border-slate-200 p-6">
                    <h3 class="text-sm font-black uppercase text-slate-800 mb-4">Comment ça marche ?</h3>
                    <ol class="list-decimal list-inside space-y-2 text-sm text-slate-600">
                        <li>Choisissez votre mode de paiement</li>
                        <li>Effectuez le paiement ou soumettez votre demande</li>
                        <li>L'administration CAEI vérifie</li>
                        <li>Inscription confirmée + documents</li>
                    </ol>
                </div>
            </div>

            {{-- Colonne droite --}}
            <div class="w-full lg:w-2/3">

                @if(session('success'))
                    <div class="mb-6 rounded-lg bg-emerald-50 p-4 border border-emerald-200 text-sm font-bold text-emerald-800">
                        ✅ {{ session('success') }}
                    </div>
                @endif
                @if(session('error'))
                    <div class="mb-6 rounded-lg bg-red-50 p-4 border border-red-200 text-sm font-bold text-red-800">
                        ❌ {{ session('error') }}
                    </div>
                @endif

                {{-- État : paiement validé --}}
                @if($payment && $payment->isPaid())
                    <div class="overflow-hidden rounded-2xl bg-white shadow-sm border border-emerald-200">
                        <div class="bg-emerald-600 px-6 py-5">
                            <p class="text-xs font-black uppercase text-emerald-100">Inscription confirmée</p>
                            <h3 class="mt-1 text-xl font-black text-white">Paiement validé par l'administration</h3>
                        </div>
                        <div class="p-6 md:p-8 space-y-6">
                            <div class="flex items-center gap-3">
                                <span class="inline-flex items-center gap-1 rounded-full border px-3 py-1 text-sm font-bold {{ $payment->statusBadgeClasses() }}">
                                    {{ $payment->statusEmoji() }} {{ $payment->statusLabel() }}
                                </span>
                                <span class="text-sm text-slate-500">via {{ $payment->methodLabel() }}</span>
                            </div>
                            <p class="text-sm text-slate-600">Votre inscription est confirmée. Téléchargez vos documents officiels ci-dessous.</p>
                            <div class="flex flex-wrap gap-3">
                                @if($payment->attestation_path)
                                    <a href="{{ route('participant.payment.document.download', [$registration, 'attestation']) }}"
                                       class="inline-flex items-center gap-2 rounded-xl bg-[#061743] px-5 py-3 text-sm font-black text-white hover:bg-[#0a2060]">
                                        📄 Attestation de paiement
                                    </a>
                                @endif
                                @if($payment->invitation_path)
                                    <a href="{{ route('participant.payment.document.download', [$registration, 'invitation']) }}"
                                       class="inline-flex items-center gap-2 rounded-xl border border-[#061743] px-5 py-3 text-sm font-black text-[#061743] hover:bg-slate-50">
                                        ✉️ Lettre d'invitation
                                    </a>
                                @endif
                            </div>
                            <a href="{{ route('participant.dashboard') }}" class="text-sm font-bold text-[#061743] hover:text-[#f2a90f]">← Retour à mon espace</a>
                        </div>
                    </div>

                {{-- État : en attente de validation --}}
                @elseif($payment && $payment->isPending())
                    <div class="overflow-hidden rounded-2xl bg-white shadow-sm border border-yellow-200">
                        <div class="bg-yellow-500 px-6 py-5">
                            <p class="text-xs font-black uppercase text-yellow-100">En cours de traitement</p>
                            <h3 class="mt-1 text-xl font-black text-white">Votre paiement est en attente de validation</h3>
                        </div>
                        <div class="p-6 md:p-8 space-y-4">
                            <div class="flex items-center gap-3">
                                <span class="inline-flex items-center gap-1 rounded-full border px-3 py-1 text-sm font-bold {{ $payment->statusBadgeClasses() }}">
                                    {{ $payment->statusEmoji() }} {{ $payment->statusLabel() }}
                                </span>
                                <span class="text-sm text-slate-500">via {{ $payment->methodLabel() }}</span>
                            </div>
                            <p class="text-sm text-slate-600">
                                @if($payment->payment_method === 'bank_transfer')
                                    Nous vérifions la réception de votre virement sur le compte CAEI. Vous serez notifié par email une fois validé.
                                @elseif(in_array($payment->payment_method, ['visa', 'card'], true))
                                    Votre paiement par carte est en attente de configuration.
                                @elseif($payment->payment_method === 'orange_money')
                                    Votre paiement Orange Money a été soumis. L'administration vérifie la transaction.
                                @else
                                    Votre demande d'arrangement a été soumise. L'administration vous contactera pour finaliser le transfert.
                                @endif
                            </p>
                            @if($payment->admin_note)
                                <div class="rounded-lg border border-amber-200 bg-amber-50 p-4">
                                    <p class="text-xs font-bold uppercase text-amber-600 mb-1">Message de l'administration</p>
                                    <p class="text-sm text-amber-900">{{ $payment->admin_note }}</p>
                                </div>
                            @endif
                            <a href="{{ route('participant.dashboard') }}" class="text-sm font-bold text-[#061743] hover:text-[#f2a90f]">← Retour à mon espace</a>
                        </div>
                    </div>

                {{-- État : choix du mode de paiement --}}
                @else
                    {{-- Onglets des 3 méthodes --}}
                    <div class="mb-6 flex flex-wrap gap-2">
                        <button type="button" @click="activeTab = 'virement'"
                                :class="activeTab === 'virement' ? 'bg-[#061743] text-white' : 'bg-white text-slate-600 border border-slate-200'"
                                class="rounded-xl px-4 py-2.5 text-xs font-black uppercase transition hover:opacity-90">
                            🏦 Virement bancaire
                        </button>
                        <button type="button" @click="activeTab = 'card'"
                                :class="activeTab === 'card' ? 'bg-[#061743] text-white' : 'bg-white text-slate-600 border border-slate-200'"
                                class="rounded-xl px-4 py-2.5 text-xs font-black uppercase transition hover:opacity-90">
                            💳 Carte Visa/Mastercard
                        </button>
                        <button type="button" @click="activeTab = 'orange_money'"
                                :class="activeTab === 'orange_money' ? 'bg-[#061743] text-white' : 'bg-white text-slate-600 border border-slate-200'"
                                class="rounded-xl px-4 py-2.5 text-xs font-black uppercase transition hover:opacity-90">
                            Orange Money
                        </button>
                    </div>

                    @if($payment && $payment->isRejected())
                        <div class="mb-6 rounded-lg bg-red-50 p-4 border border-red-200 text-sm text-red-800">
                            <p class="font-bold">Votre précédente demande a été refusée.</p>
                            @if($payment->admin_note)
                                <p class="mt-1">{{ $payment->admin_note }}</p>
                            @endif
                            <p class="mt-2">Vous pouvez soumettre un nouveau paiement ci-dessous.</p>
                        </div>
                    @endif

                    {{-- ===== VIREMENT BANCAIRE ===== --}}
                    <div x-show="activeTab === 'virement'" x-cloak>
                        <div class="overflow-hidden rounded-2xl bg-white shadow-sm border border-slate-200">
                            <div class="bg-[#061743] px-6 py-5">
                                <p class="text-xs font-black uppercase text-[#f2a90f]">Méthode 1</p>
                                <h3 class="mt-1 text-xl font-black text-white">Virement bancaire</h3>
                                <p class="mt-1 text-sm text-white/70">Effectuez un virement depuis votre banque, puis envoyez le reçu.</p>
                            </div>
                            <div class="p-6 md:p-8 space-y-8">
                                @include('participant.payment._bank_coordinates')

                                <div class="rounded-xl border border-emerald-100 bg-emerald-50 p-6">
                                    <h4 class="text-sm font-black uppercase text-emerald-800 mb-2">Référence obligatoire</h4>
                                    <p class="text-sm text-emerald-700 mb-4">Mentionnez cette référence dans le motif/libellé de votre virement.</p>
                                    <div class="flex items-center gap-4 bg-white p-3 rounded-lg border border-emerald-200">
                                        <span class="text-lg font-black tracking-widest text-[#061743]" id="payment-ref">{{ $generatedRef }}</span>
                                        <button type="button" onclick="copyRef()" class="ml-auto text-sm font-bold text-emerald-600 hover:text-emerald-800 bg-emerald-100 px-3 py-1.5 rounded-md transition">COPIER</button>
                                    </div>
                                </div>

                                <div class="pt-6 border-t border-slate-100">
                                    <h3 class="text-lg font-black text-slate-800 mb-6">Confirmez votre virement</h3>
                                    <form method="POST" action="{{ route('participant.payment.transfer.store', $registration) }}" enctype="multipart/form-data" class="space-y-6">
                                        @csrf
                                        <input type="hidden" name="payment_method" value="virement">

                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                            <div>
                                                <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Montant envoyé *</label>
                                                <input type="number" step="0.01" name="amount" value="{{ old('amount', $seminarPrice) }}" required
                                                       class="w-full rounded-lg border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 focus:border-[#061743]">
                                                @error('amount')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                                            </div>
                                            <div>
                                                <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Devise *</label>
                                                <select name="currency" required class="w-full rounded-lg border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 focus:border-[#061743]">
                                                    <option value="TND" {{ old('currency', $bankSetting?->currency ?? 'TND') == 'TND' ? 'selected' : '' }}>TND</option>
                                                    <option value="EUR" {{ old('currency') == 'EUR' ? 'selected' : '' }}>EUR</option>
                                                    <option value="USD" {{ old('currency') == 'USD' ? 'selected' : '' }}>USD</option>
                                                </select>
                                                @error('currency')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                            <div>
                                                <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Date du virement *</label>
                                                <input type="date" name="transfer_date" value="{{ old('transfer_date') }}" required
                                                       class="w-full rounded-lg border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 focus:border-[#061743]">
                                                @error('transfer_date')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                                            </div>
                                            <div>
                                                <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Référence bancaire *</label>
                                                <input type="text" name="transaction_reference" value="{{ old('transaction_reference') }}" required placeholder="Ex: TR-90983..."
                                                       class="w-full rounded-lg border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 focus:border-[#061743]">
                                                @error('transaction_reference')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                            <div>
                                                <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Votre banque *</label>
                                                <input type="text" name="bank_name" value="{{ old('bank_name') }}" required placeholder="Ex: Attijari Bank..."
                                                       class="w-full rounded-lg border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 focus:border-[#061743]">
                                                @error('bank_name')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                                            </div>
                                            <div>
                                                <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Pays de votre banque *</label>
                                                <input type="text" name="country" value="{{ old('country') }}" required placeholder="Ex: Tunisie, Sénégal..."
                                                       class="w-full rounded-lg border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 focus:border-[#061743]">
                                                @error('country')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                                            </div>
                                        </div>

                                        <div>
                                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Preuve de virement *</label>
                                            <p class="text-xs text-slate-500 mb-2">PDF, JPG ou PNG (max 5 Mo)</p>
                                            <input type="file" name="transfer_receipt" accept=".pdf,.jpg,.jpeg,.png" required
                                                   class="w-full rounded-lg border border-slate-200 bg-slate-50 px-4 py-2 text-sm text-slate-800">
                                            @error('transfer_receipt')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                                        </div>

                                        <div>
                                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Commentaire</label>
                                            <textarea name="participant_note" rows="2" placeholder="Informations complémentaires..."
                                                      class="w-full rounded-lg border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 focus:border-[#061743] resize-none">{{ old('participant_note') }}</textarea>
                                        </div>

                                        <button type="submit" class="w-full rounded-xl bg-[#061743] py-4 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#0a2060]">
                                            Envoyer ma confirmation de virement
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ===== CARTE VISA/MASTERCARD ===== --}}
                    <div x-show="activeTab === 'card'" x-cloak>
                        <div class="overflow-hidden rounded-2xl bg-white shadow-sm border border-slate-200">
                            <div class="bg-[#061743] px-6 py-5">
                                <p class="text-xs font-black uppercase text-[#f2a90f]">Méthode 2</p>
                                <h3 class="mt-1 text-xl font-black text-white">Paiement par carte Visa/Mastercard</h3>
                                <p class="mt-1 text-sm text-white/70">Interface de paiement non configurée pour le moment.</p>
                            </div>
                            <div class="p-6 md:p-8 space-y-6">
                                <div class="rounded-xl border border-blue-100 bg-blue-50 p-6 text-center">
                                    <p class="text-4xl mb-4">💳</p>
                                    <p class="text-lg font-black text-[#061743]">Bientôt disponible</p>
                                    <p class="mt-2 text-sm text-slate-600">
                                        Le paiement Visa/Mastercard n'est pas encore configuré.
                                        Utilisez le virement bancaire ou Orange Money pour finaliser votre inscription.
                                    </p>
                                    <p class="mt-4 text-sm text-blue-800">
                                        <strong>Montant :</strong> {{ number_format($seminarPrice, 2, ',', ' ') }} EUR
                                    </p>
                                </div>
                                <button type="button" disabled
                                        class="w-full cursor-not-allowed rounded-xl bg-slate-300 py-4 text-sm font-black uppercase tracking-wide text-white">
                                    Visa/Mastercard non disponible maintenant
                                </button>
                                <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                                    <button type="button" @click="activeTab = 'virement'"
                                            class="rounded-xl border border-[#061743] py-3 text-sm font-black uppercase tracking-wide text-[#061743] transition hover:bg-slate-50">
                                        Utiliser le virement
                                    </button>
                                    <button type="button" @click="activeTab = 'orange_money'"
                                            class="rounded-xl border border-orange-300 py-3 text-sm font-black uppercase tracking-wide text-orange-700 transition hover:bg-orange-50">
                                        Utiliser Orange Money
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- ===== ORANGE MONEY ===== --}}
                    <div x-show="activeTab === 'orange_money'" x-cloak>
                        <div class="overflow-hidden rounded-2xl bg-white shadow-sm border border-slate-200">
                            <div class="bg-[#061743] px-6 py-5">
                                <p class="text-xs font-black uppercase text-[#f2a90f]">Méthode 3</p>
                                <h3 class="mt-1 text-xl font-black text-white">Paiement Orange Money</h3>
                                <p class="mt-1 text-sm text-white/70">Effectuez le paiement Orange Money, puis envoyez la preuve.</p>
                            </div>
                            <div class="p-6 md:p-8 space-y-8">
                                <div class="rounded-xl border border-orange-100 bg-orange-50 p-5 text-sm text-orange-800">
                                    <p class="font-bold mb-2">Procédure Orange Money :</p>
                                    <ol class="list-decimal list-inside space-y-1">
                                        <li>Envoyez le montant avec Orange Money au numéro CAEI communiqué par l'administration</li>
                                        <li>Conservez la référence de transaction Orange Money</li>
                                        <li>Joignez une capture ou un reçu de paiement</li>
                                        <li>L'administration vérifie et valide votre inscription</li>
                                    </ol>
                                </div>

                                <div class="rounded-xl border border-emerald-100 bg-emerald-50 p-6">
                                    <h4 class="text-sm font-black uppercase text-emerald-800 mb-2">Référence obligatoire</h4>
                                    <div class="flex items-center gap-4 bg-white p-3 rounded-lg border border-emerald-200">
                                        <span class="text-lg font-black tracking-widest text-[#061743]">{{ $generatedRef }}</span>
                                    </div>
                                </div>

                                <div class="pt-6 border-t border-slate-100">
                                    <h3 class="text-lg font-black text-slate-800 mb-6">Confirmez votre paiement Orange Money</h3>
                                    <form method="POST" action="{{ route('participant.payment.orange-money.store', $registration) }}" enctype="multipart/form-data" class="space-y-6">
                                        @csrf
                                        <input type="hidden" name="payment_method" value="orange_money">

                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                            <div>
                                                <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Numéro Orange Money *</label>
                                                <input type="text" name="orange_phone" value="{{ old('orange_phone') }}" required placeholder="Ex: +221 77 000 00 00"
                                                       class="w-full rounded-lg border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 focus:border-[#061743]">
                                                @error('orange_phone')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                                            </div>
                                            <div>
                                                <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Pays *</label>
                                                <input type="text" name="country" value="{{ old('country') }}" required placeholder="Ex: Sénégal, Côte d'Ivoire..."
                                                       class="w-full rounded-lg border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 focus:border-[#061743]">
                                                @error('country')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                                            </div>
                                        </div>

                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                            <div>
                                                <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Montant envoyé *</label>
                                                <input type="number" step="0.01" name="amount" value="{{ old('amount', $seminarPrice) }}" required
                                                       class="w-full rounded-lg border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 focus:border-[#061743]">
                                                @error('amount')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                                            </div>
                                            <div>
                                                <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Devise *</label>
                                                <select name="currency" required class="w-full rounded-lg border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 focus:border-[#061743]">
                                                    <option value="EUR" {{ old('currency', 'EUR') == 'EUR' ? 'selected' : '' }}>EUR</option>
                                                    <option value="XOF" {{ old('currency') == 'XOF' ? 'selected' : '' }}>XOF</option>
                                                    <option value="TND" {{ old('currency') == 'TND' ? 'selected' : '' }}>TND</option>
                                                    <option value="USD" {{ old('currency') == 'USD' ? 'selected' : '' }}>USD</option>
                                                </select>
                                                @error('currency')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                                            </div>
                                        </div>

                                        <div>
                                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Référence Orange Money *</label>
                                            <input type="text" name="transaction_reference" value="{{ old('transaction_reference') }}" required placeholder="Ex: OM-123456789"
                                                   class="w-full rounded-lg border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 focus:border-[#061743]">
                                            @error('transaction_reference')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                                        </div>

                                        <div>
                                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Preuve Orange Money *</label>
                                            <p class="text-xs text-slate-500 mb-2">Capture, reçu PDF, JPG ou PNG (max 5 Mo)</p>
                                            <input type="file" name="transfer_receipt" accept=".pdf,.jpg,.jpeg,.png" required
                                                   class="w-full rounded-lg border border-slate-200 bg-slate-50 px-4 py-2 text-sm text-slate-800">
                                            @error('transfer_receipt')<p class="mt-1 text-xs text-red-600">{{ $message }}</p>@enderror
                                        </div>

                                        <div>
                                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Commentaire</label>
                                            <textarea name="participant_note" rows="2" placeholder="Informations complémentaires..."
                                                      class="w-full rounded-lg border border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 focus:border-[#061743] resize-none">{{ old('participant_note') }}</textarea>
                                        </div>

                                        <button type="submit" class="w-full rounded-xl bg-[#061743] py-4 text-sm font-black uppercase tracking-wide text-white transition hover:bg-[#0a2060]">
                                            Envoyer ma confirmation Orange Money
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        function copyRef() {
            var refText = document.getElementById("payment-ref").innerText;
            navigator.clipboard.writeText(refText).then(function() {
                alert("Référence copiée : " + refText);
            });
        }
    </script>
</x-app-layout>
