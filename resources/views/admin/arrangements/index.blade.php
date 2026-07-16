@extends('layouts.app')

@section('content')
<div class="py-10">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        {{-- Header --}}
        <div class="mb-8 flex flex-col justify-between gap-4 md:flex-row md:items-end">
            <div>
                <p class="text-sm font-black uppercase text-[#f2a90f]">Back-office CAEI</p>
                <h1 class="mt-1 text-3xl font-black uppercase text-[#061743]">Gestion des paiements</h1>
                <p class="mt-2 text-sm text-slate-600">
                    Validez les virements, paiements Orange Money, paiements Visa et demandes d'arrangement soumis par les participants.
                </p>
            </div>
            <a href="{{ route('admin.bank-settings.edit') }}"
               class="inline-flex items-center gap-2 rounded-lg border border-slate-200 bg-white px-4 py-2 text-sm font-bold text-[#061743] hover:bg-slate-50">
                🏦 Coordonnées bancaires CAEI
            </a>
        </div>

        {{-- Flash messages --}}
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

        {{-- Filters --}}
        <form method="GET" class="mb-6 rounded-xl border border-slate-200 bg-white p-5 shadow-sm">
            <div class="grid gap-4 md:grid-cols-4">
                <div>
                    <label class="mb-1 block text-xs font-bold uppercase tracking-wider text-slate-500">Méthode</label>
                    <select name="payment_method" class="w-full rounded-md border border-slate-200 bg-slate-50 px-3 py-2 text-sm text-slate-800 focus:border-[#061743] focus:outline-none">
                        <option value="">Toutes les méthodes</option>
                        <option value="bank_transfer" {{ request('payment_method') == 'bank_transfer' ? 'selected' : '' }}>🏦 Virement bancaire</option>
                        <option value="orange_money" {{ request('payment_method') == 'orange_money' ? 'selected' : '' }}>Orange Money</option>
                        <option value="card" {{ request('payment_method') == 'card' ? 'selected' : '' }}>💳 Carte Visa/Mastercard</option>
                        <option value="visa" {{ request('payment_method') == 'visa' ? 'selected' : '' }}>💳 Carte (legacy)</option>
                        <option value="arrangement" {{ request('payment_method') == 'arrangement' ? 'selected' : '' }}>🤝 Arrangement</option>
                    </select>
                </div>
                <div>
                    <label class="mb-1 block text-xs font-bold uppercase tracking-wider text-slate-500">Statut</label>
                    <select name="status" class="w-full rounded-md border border-slate-200 bg-slate-50 px-3 py-2 text-sm text-slate-800 focus:border-[#061743] focus:outline-none">
                        <option value="">Tous les statuts</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>🟡 En attente (virement/orange/visa)</option>
                        <option value="arrangement_pending" {{ request('status') == 'arrangement_pending' ? 'selected' : '' }}>🟠 En attente (arrangement)</option>
                        <option value="paid" {{ request('status') == 'paid' ? 'selected' : '' }}>🟢 Validé (paid)</option>
                        <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>🟢 Validé (approved)</option>
                        <option value="rejected" {{ request('status') == 'rejected' ? 'selected' : '' }}>❌ Refusé</option>
                    </select>
                </div>
                <div>
                    <label class="mb-1 block text-xs font-bold uppercase tracking-wider text-slate-500">Séminaire</label>
                    <select name="seminar_id" class="w-full rounded-md border border-slate-200 bg-slate-50 px-3 py-2 text-sm text-slate-800 focus:border-[#061743] focus:outline-none">
                        <option value="">Tous les séminaires</option>
                        @foreach($seminars as $seminar)
                            <option value="{{ $seminar->id }}" {{ request('seminar_id') == $seminar->id ? 'selected' : '' }}>{{ $seminar->theme }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex items-end gap-2">
                    <button type="submit" class="rounded-md bg-[#f2a90f] px-4 py-2 text-sm font-bold text-[#061743] hover:bg-[#ffd071]">
                        Filtrer
                    </button>
                    @if(request()->hasAny(['status', 'seminar_id', 'payment_method']))
                        <a href="{{ route('admin.arrangements.index') }}" class="rounded-md border border-slate-200 bg-white px-4 py-2 text-sm font-bold text-slate-600 hover:bg-slate-50">
                            Réinitialiser
                        </a>
                    @endif
                </div>
            </div>
        </form>

        {{-- Table --}}
        <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
            @if($payments->isEmpty())
                <div class="p-12 text-center">
                    <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-orange-50">
                        <svg class="h-7 w-7 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <p class="font-bold text-slate-700">Aucun paiement trouvé</p>
                    <p class="mt-1 text-sm text-slate-500">Les paiements soumis par les participants apparaîtront ici.</p>
                </div>
            @else
                <div class="divide-y divide-slate-100">
                    @foreach($payments as $payment)
                        @php
                            $isPending = in_array($payment->status, ['pending', 'arrangement_pending'], true);
                        @endphp
                        <div class="p-6 hover:bg-slate-50 transition-colors" x-data="{ showNote: false, showReject: false }">
                            <div class="flex flex-col gap-4 md:flex-row md:items-start md:justify-between">

                                {{-- Left: Info --}}
                                <div class="flex-1 space-y-3">
                                    {{-- Participant + status + method --}}
                                    <div class="flex items-center gap-3 flex-wrap">
                                        <div class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-full bg-[#061743] text-xs font-black text-white">
                                            {{ strtoupper(substr($payment->user->first_name, 0, 1) . substr($payment->user->last_name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <p class="font-bold text-[#061743]">
                                                {{ $payment->user->first_name }} {{ $payment->user->last_name }}
                                            </p>
                                            <p class="text-xs text-slate-500">{{ $payment->user->email }}</p>
                                        </div>
                                        <span class="inline-flex items-center gap-1 rounded-full border px-2.5 py-0.5 text-xs font-bold {{ $payment->statusBadgeClasses() }}">
                                            {{ $payment->statusEmoji() }} {{ $payment->statusLabel() }}
                                        </span>
                                        <span class="inline-flex items-center gap-1 rounded-full border border-slate-200 bg-slate-50 px-2.5 py-0.5 text-xs font-bold text-slate-600">
                                            {{ $payment->methodLabel() }}
                                        </span>
                                    </div>

                                    {{-- Seminar --}}
                                    <div class="flex items-center gap-2 text-sm">
                                        <svg class="h-4 w-4 text-[#f2a90f] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                        <span class="font-semibold text-slate-700">{{ $payment->seminar->theme }}</span>
                                        <span class="text-slate-400">·</span>
                                        <span class="text-slate-500">{{ $payment->seminar->country }}</span>
                                    </div>

                                    {{-- Détails selon la méthode --}}
                                    @if(in_array($payment->payment_method, ['bank_transfer', 'orange_money'], true))
                                        <div class="grid grid-cols-1 gap-2 rounded-lg bg-slate-50 p-3 text-sm sm:grid-cols-2 lg:grid-cols-3">
                                            <div>
                                                <p class="text-xs text-slate-400 uppercase font-bold">Réf. CAEI</p>
                                                <p class="font-mono font-semibold text-slate-700">{{ $payment->reference ?? '—' }}</p>
                                            </div>
                                            <div>
                                                <p class="text-xs text-slate-400 uppercase font-bold">Montant</p>
                                                <p class="font-semibold text-slate-700">{{ number_format($payment->amount, 2, ',', ' ') }} {{ $payment->currency }}</p>
                                            </div>
                                            <div>
                                                <p class="text-xs text-slate-400 uppercase font-bold">{{ $payment->payment_method === 'orange_money' ? 'Téléphone' : 'Date virement' }}</p>
                                                <p class="font-semibold text-slate-700">{{ $payment->payment_method === 'orange_money' ? ($payment->contact_phone ?? '—') : ($payment->transfer_date?->format('d/m/Y') ?? '—') }}</p>
                                            </div>
                                            <div>
                                                <p class="text-xs text-slate-400 uppercase font-bold">{{ $payment->payment_method === 'orange_money' ? 'Réf. Orange Money' : 'Réf. bancaire' }}</p>
                                                <p class="font-semibold text-slate-700">{{ $payment->transaction_reference ?? '—' }}</p>
                                            </div>
                                            <div>
                                                <p class="text-xs text-slate-400 uppercase font-bold">{{ $payment->payment_method === 'orange_money' ? 'Canal' : 'Banque émettrice' }}</p>
                                                <p class="font-semibold text-slate-700">{{ $payment->bank_name ?? '—' }}</p>
                                            </div>
                                            <div>
                                                <p class="text-xs text-slate-400 uppercase font-bold">Pays</p>
                                                <p class="font-semibold text-slate-700">{{ $payment->country ?? '—' }}</p>
                                            </div>
                                            <div>
                                                <p class="text-xs text-slate-400 uppercase font-bold">Soumis le</p>
                                                <p class="font-semibold text-slate-700">{{ $payment->created_at->format('d/m/Y H:i') }}</p>
                                            </div>
                                        </div>
                                        @if($payment->participant_note)
                                            <div class="rounded-lg border border-slate-200 p-3">
                                                <p class="text-xs font-bold uppercase text-slate-400 mb-1">Note participant</p>
                                                <p class="text-sm text-slate-700 whitespace-pre-line">{{ $payment->participant_note }}</p>
                                            </div>
                                        @endif

                                    @elseif(in_array($payment->payment_method, ['visa', 'card'], true))
                                        <div class="grid grid-cols-1 gap-2 rounded-lg bg-blue-50 p-3 text-sm sm:grid-cols-2 lg:grid-cols-3">
                                            <div>
                                                <p class="text-xs text-blue-400 uppercase font-bold">Montant</p>
                                                <p class="font-semibold text-slate-700">{{ number_format($payment->amount, 2, ',', ' ') }} {{ $payment->currency ?? 'EUR' }}</p>
                                            </div>
                                            <div>
                                                <p class="text-xs text-blue-400 uppercase font-bold">Pays</p>
                                                <p class="font-semibold text-slate-700">{{ $payment->country ?? '—' }}</p>
                                            </div>
                                            <div>
                                                <p class="text-xs text-blue-400 uppercase font-bold">Soumis le</p>
                                                <p class="font-semibold text-slate-700">{{ $payment->created_at->format('d/m/Y H:i') }}</p>
                                            </div>
                                        </div>
                                        <p class="text-xs text-slate-500 italic">Paiement Visa simulé — vérifiez la réception des fonds avant validation.</p>

                                    @elseif($payment->payment_method === 'arrangement')
                                        <div class="grid grid-cols-1 gap-2 rounded-lg bg-slate-50 p-3 text-sm sm:grid-cols-2 lg:grid-cols-3">
                                            <div>
                                                <p class="text-xs text-slate-400 uppercase font-bold">Type</p>
                                                <p class="font-semibold text-slate-700">{{ $payment->arrangementTypeLabel() }}</p>
                                            </div>
                                            <div>
                                                <p class="text-xs text-slate-400 uppercase font-bold">Organisme</p>
                                                <p class="font-semibold text-slate-700">{{ $payment->organization_name }}</p>
                                            </div>
                                            <div>
                                                <p class="text-xs text-slate-400 uppercase font-bold">Pays</p>
                                                <p class="font-semibold text-slate-700">{{ $payment->country ?? '—' }}</p>
                                            </div>
                                            <div>
                                                <p class="text-xs text-slate-400 uppercase font-bold">Responsable</p>
                                                <p class="font-semibold text-slate-700">{{ $payment->contact_person }}</p>
                                            </div>
                                            <div>
                                                <p class="text-xs text-slate-400 uppercase font-bold">Email</p>
                                                <p class="font-semibold text-slate-700">{{ $payment->contact_email }}</p>
                                            </div>
                                            <div>
                                                <p class="text-xs text-slate-400 uppercase font-bold">Téléphone</p>
                                                <p class="font-semibold text-slate-700">{{ $payment->contact_phone }}</p>
                                            </div>
                                        </div>
                                        @if($payment->arrangement_reason)
                                            <div class="rounded-lg border border-slate-200 p-3">
                                                <p class="text-xs font-bold uppercase text-slate-400 mb-1">Motif</p>
                                                <p class="text-sm text-slate-700 leading-relaxed">{{ $payment->arrangement_reason }}</p>
                                            </div>
                                        @endif
                                    @endif

                                    {{-- Admin note --}}
                                    @if($payment->admin_note)
                                        <div class="rounded-lg border border-amber-200 bg-amber-50 p-3">
                                            <p class="text-xs font-bold uppercase text-amber-600 mb-1">Note admin</p>
                                            <p class="text-sm text-amber-900">{{ $payment->admin_note }}</p>
                                        </div>
                                    @endif
                                </div>

                                {{-- Right: Actions --}}
                                <div class="flex flex-col gap-2 min-w-[180px]">

                                    {{-- Justificatif --}}
                                    @if($payment->transfer_receipt_path || $payment->arrangement_document)
                                        <a href="{{ route('admin.arrangements.justificatif', $payment) }}"
                                           class="inline-flex items-center justify-center gap-2 rounded-lg border border-slate-200 bg-white px-3 py-2 text-xs font-bold text-slate-700 transition hover:bg-slate-50">
                                            📎 Justificatif
                                        </a>
                                    @endif

                                    {{-- Docs générés (si validé) --}}
                                    @if($payment->isPaid())
                                        @if($payment->attestation_path)
                                            <a href="{{ route('admin.arrangements.document', [$payment, 'attestation']) }}"
                                               class="inline-flex items-center justify-center gap-2 rounded-lg bg-[#061743] px-3 py-2 text-xs font-bold text-white transition hover:bg-[#0a2060]">
                                                📄 Attestation
                                            </a>
                                        @endif
                                        @if($payment->invitation_path)
                                            <a href="{{ route('admin.arrangements.document', [$payment, 'invitation']) }}"
                                               class="inline-flex items-center justify-center gap-2 rounded-lg border border-[#061743] bg-white px-3 py-2 text-xs font-bold text-[#061743] transition hover:bg-slate-50">
                                                ✉️ Invitation
                                            </a>
                                        @endif
                                    @endif

                                    {{-- Valider (si en attente) --}}
                                    @if($isPending)
                                        <form method="POST" action="{{ route('admin.arrangements.approve', $payment) }}">
                                            @csrf
                                            <button type="submit"
                                                    onclick="return confirm('Valider ce paiement et confirmer l\'inscription ?')"
                                                    class="w-full inline-flex items-center justify-center gap-2 rounded-lg bg-emerald-600 px-3 py-2 text-xs font-bold text-white transition hover:bg-emerald-700">
                                                ✅ Valider le paiement
                                            </button>
                                        </form>

                                        <button @click="showReject = !showReject"
                                                class="inline-flex items-center justify-center gap-2 rounded-lg bg-red-50 px-3 py-2 text-xs font-bold text-red-600 transition hover:bg-red-100">
                                            ❌ Refuser
                                        </button>
                                    @endif

                                    <button @click="showNote = !showNote"
                                            class="inline-flex items-center justify-center gap-2 rounded-lg border border-slate-200 bg-white px-3 py-2 text-xs font-bold text-slate-600 transition hover:bg-slate-50">
                                        📝 Note
                                    </button>
                                </div>
                            </div>

                            {{-- Reject form --}}
                            <div x-show="showReject" x-cloak class="mt-4 rounded-xl border border-red-200 bg-red-50 p-4">
                                <form method="POST" action="{{ route('admin.arrangements.reject', $payment) }}">
                                    @csrf
                                    <label class="block text-xs font-bold uppercase text-red-600 mb-2">Motif du refus (optionnel)</label>
                                    <textarea name="admin_note" rows="2"
                                              placeholder="Expliquez la raison du refus..."
                                              class="w-full rounded-lg border border-red-200 bg-white px-3 py-2 text-sm text-slate-800 focus:outline-none focus:ring-2 focus:ring-red-400 resize-none"></textarea>
                                    <div class="mt-3 flex gap-2">
                                        <button type="submit"
                                                class="rounded-lg bg-red-600 px-4 py-2 text-xs font-bold text-white hover:bg-red-700">
                                            Confirmer le refus
                                        </button>
                                        <button type="button" @click="showReject = false"
                                                class="rounded-lg border border-slate-200 bg-white px-4 py-2 text-xs font-bold text-slate-600 hover:bg-slate-50">
                                            Annuler
                                        </button>
                                    </div>
                                </form>
                            </div>

                            {{-- Note form --}}
                            <div x-show="showNote" x-cloak class="mt-4 rounded-xl border border-amber-200 bg-amber-50 p-4">
                                <form method="POST" action="{{ route('admin.arrangements.note', $payment) }}">
                                    @csrf
                                    <label class="block text-xs font-bold uppercase text-amber-700 mb-2">Note administrative</label>
                                    <textarea name="admin_note" rows="2"
                                              placeholder="Ajoutez une note visible par le participant..."
                                              class="w-full rounded-lg border border-amber-200 bg-white px-3 py-2 text-sm text-slate-800 focus:outline-none focus:ring-2 focus:ring-amber-400 resize-none">{{ $payment->admin_note }}</textarea>
                                    <div class="mt-3 flex gap-2">
                                        <button type="submit"
                                                class="rounded-lg bg-amber-600 px-4 py-2 text-xs font-bold text-white hover:bg-amber-700">
                                            Enregistrer
                                        </button>
                                        <button type="button" @click="showNote = false"
                                                class="rounded-lg border border-slate-200 bg-white px-4 py-2 text-xs font-bold text-slate-600 hover:bg-slate-50">
                                            Annuler
                                        </button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    @endforeach
                </div>

                @if($payments->hasPages())
                    <div class="border-t border-slate-200 px-5 py-3 bg-white">
                        {{ $payments->links() }}
                    </div>
                @endif
            @endif
        </div>

        <div class="mt-6">
            <a href="{{ route('admin.dashboard') }}" class="text-sm font-bold text-[#061743] hover:text-[#f2a90f]">
                ← Retour au tableau de bord
            </a>
        </div>

    </div>
</div>
@endsection
