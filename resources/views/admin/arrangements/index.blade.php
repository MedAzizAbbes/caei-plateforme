@extends('layouts.app')

@section('content')
<div class="py-10">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        {{-- Header --}}
        <div class="mb-8 flex flex-col justify-between gap-4 md:flex-row md:items-end">
            <div>
                <p class="text-sm font-black uppercase text-[#f2a90f]">Back-office CAEI</p>
                <h1 class="mt-1 text-3xl font-black uppercase text-[#061743]">Demandes d'arrangement</h1>
                <p class="mt-2 text-sm text-slate-600">
                    Gérez les demandes de prise en charge soumises par les participants.
                </p>
            </div>
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
            <div class="grid gap-4 md:grid-cols-3">
                <div>
                    <label class="mb-1 block text-xs font-bold uppercase tracking-wider text-slate-500">Statut</label>
                    <select name="status" class="w-full rounded-md border border-slate-200 bg-slate-50 px-3 py-2 text-sm text-slate-800 focus:border-[#061743] focus:outline-none">
                        <option value="">Tous les statuts</option>
                        <option value="arrangement_pending" {{ request('status') == 'arrangement_pending' ? 'selected' : '' }}>🟠 En attente</option>
                        <option value="paid" {{ request('status') == 'paid' ? 'selected' : '' }}>🟢 Accepté</option>
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
                    @if(request()->hasAny(['status','seminar_id']))
                        <a href="{{ route('admin.arrangements.index') }}" class="rounded-md border border-slate-200 bg-white px-4 py-2 text-sm font-bold text-slate-600 hover:bg-slate-50">
                            Réinitialiser
                        </a>
                    @endif
                </div>
            </div>
        </form>

        {{-- Table --}}
        <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
            @if($arrangements->isEmpty())
                <div class="p-12 text-center">
                    <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-orange-50">
                        <svg class="h-7 w-7 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <p class="font-bold text-slate-700">Aucune demande d'arrangement trouvée</p>
                    <p class="mt-1 text-sm text-slate-500">Les demandes soumises par les participants apparaîtront ici.</p>
                </div>
            @else
                <div class="divide-y divide-slate-100">
                    @foreach($arrangements as $arrangement)
                        @php
                            $badgeClass = match($arrangement->status) {
                                'paid'                => 'bg-emerald-100 text-emerald-700 border-emerald-200',
                                'arrangement_pending' => 'bg-orange-100 text-orange-700 border-orange-200',
                                'rejected'            => 'bg-red-100 text-red-700 border-red-200',
                                default               => 'bg-slate-100 text-slate-600 border-slate-200',
                            };
                            $emoji = match($arrangement->status) {
                                'paid'                => '🟢',
                                'arrangement_pending' => '🟠',
                                'rejected'            => '❌',
                                default               => '⚪',
                            };
                        @endphp
                        <div class="p-6 hover:bg-slate-50 transition-colors" x-data="{ showNote: false, showReject: false }">
                            <div class="flex flex-col gap-4 md:flex-row md:items-start md:justify-between">

                                {{-- Left: Info --}}
                                <div class="flex-1 space-y-3">
                                    {{-- Participant + status --}}
                                    <div class="flex items-center gap-3 flex-wrap">
                                        <div class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-full bg-[#061743] text-xs font-black text-white">
                                            {{ strtoupper(substr($arrangement->user->first_name, 0, 1) . substr($arrangement->user->last_name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <p class="font-bold text-[#061743]">
                                                {{ $arrangement->user->first_name }} {{ $arrangement->user->last_name }}
                                            </p>
                                            <p class="text-xs text-slate-500">{{ $arrangement->user->email }}</p>
                                        </div>
                                        <span class="inline-flex items-center gap-1 rounded-full border px-2.5 py-0.5 text-xs font-bold {{ $badgeClass }}">
                                            {{ $emoji }} {{ $arrangement->statusLabel() }}
                                        </span>
                                    </div>

                                    {{-- Seminar --}}
                                    <div class="flex items-center gap-2 text-sm">
                                        <svg class="h-4 w-4 text-[#f2a90f] flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                        <span class="font-semibold text-slate-700">{{ $arrangement->seminar->theme }}</span>
                                        <span class="text-slate-400">·</span>
                                        <span class="text-slate-500">{{ $arrangement->seminar->country }}</span>
                                    </div>

                                    {{-- Arrangement details --}}
                                    <div class="grid grid-cols-1 gap-2 rounded-lg bg-slate-50 p-3 text-sm sm:grid-cols-2 lg:grid-cols-3">
                                        <div>
                                            <p class="text-xs text-slate-400 uppercase font-bold">Type</p>
                                            <p class="font-semibold text-slate-700">{{ $arrangement->arrangementTypeLabel() }}</p>
                                        </div>
                                        <div>
                                            <p class="text-xs text-slate-400 uppercase font-bold">Organisme</p>
                                            <p class="font-semibold text-slate-700">{{ $arrangement->organization_name }}</p>
                                        </div>
                                        <div>
                                            <p class="text-xs text-slate-400 uppercase font-bold">Responsable</p>
                                            <p class="font-semibold text-slate-700">{{ $arrangement->contact_person }}</p>
                                        </div>
                                        <div>
                                            <p class="text-xs text-slate-400 uppercase font-bold">Email</p>
                                            <p class="font-semibold text-slate-700">{{ $arrangement->contact_email }}</p>
                                        </div>
                                        <div>
                                            <p class="text-xs text-slate-400 uppercase font-bold">Téléphone</p>
                                            <p class="font-semibold text-slate-700">{{ $arrangement->contact_phone }}</p>
                                        </div>
                                        <div>
                                            <p class="text-xs text-slate-400 uppercase font-bold">Date de demande</p>
                                            <p class="font-semibold text-slate-700">{{ $arrangement->created_at->format('d/m/Y H:i') }}</p>
                                        </div>
                                    </div>

                                    {{-- Reason --}}
                                    @if($arrangement->arrangement_reason)
                                        <div class="rounded-lg border border-slate-200 p-3">
                                            <p class="text-xs font-bold uppercase text-slate-400 mb-1">Motif</p>
                                            <p class="text-sm text-slate-700 leading-relaxed">{{ $arrangement->arrangement_reason }}</p>
                                        </div>
                                    @endif

                                    {{-- Admin note --}}
                                    @if($arrangement->admin_note)
                                        <div class="rounded-lg border border-amber-200 bg-amber-50 p-3">
                                            <p class="text-xs font-bold uppercase text-amber-600 mb-1">Note admin</p>
                                            <p class="text-sm text-amber-900">{{ $arrangement->admin_note }}</p>
                                        </div>
                                    @endif
                                </div>

                                {{-- Right: Actions --}}
                                <div class="flex flex-col gap-2 min-w-[160px]">

                                    {{-- Document justificatif --}}
                                    @if($arrangement->arrangement_document)
                                        <a href="{{ route('admin.arrangements.justificatif', $arrangement) }}"
                                           class="inline-flex items-center justify-center gap-2 rounded-lg border border-slate-200 bg-white px-3 py-2 text-xs font-bold text-slate-700 transition hover:bg-slate-50">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/>
                                            </svg>
                                            Justificatif
                                        </a>
                                    @endif

                                    {{-- Docs générés (si approuvé) --}}
                                    @if($arrangement->status === 'paid')
                                        @if($arrangement->attestation_path)
                                            <a href="{{ route('admin.arrangements.document', [$arrangement, 'attestation']) }}"
                                               class="inline-flex items-center justify-center gap-2 rounded-lg bg-[#061743] px-3 py-2 text-xs font-bold text-white transition hover:bg-[#0a2060]">
                                                📄 Attestation
                                            </a>
                                        @endif
                                        @if($arrangement->invitation_path)
                                            <a href="{{ route('admin.arrangements.document', [$arrangement, 'invitation']) }}"
                                               class="inline-flex items-center justify-center gap-2 rounded-lg border border-[#061743] bg-white px-3 py-2 text-xs font-bold text-[#061743] transition hover:bg-slate-50">
                                                ✉️ Invitation
                                            </a>
                                        @endif
                                    @endif

                                    {{-- Accept (only if pending) --}}
                                    @if($arrangement->status === 'arrangement_pending')
                                        <form method="POST" action="{{ route('admin.arrangements.approve', $arrangement) }}">
                                            @csrf
                                            <button type="submit"
                                                    onclick="return confirm('Accepter cet arrangement et générer les documents ?')"
                                                    class="w-full inline-flex items-center justify-center gap-2 rounded-lg bg-emerald-600 px-3 py-2 text-xs font-bold text-white transition hover:bg-emerald-700">
                                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                                </svg>
                                                Accepter
                                            </button>
                                        </form>

                                        {{-- Reject button --}}
                                        <button @click="showReject = !showReject"
                                                class="inline-flex items-center justify-center gap-2 rounded-lg bg-red-50 px-3 py-2 text-xs font-bold text-red-600 transition hover:bg-red-100">
                                            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                            </svg>
                                            Refuser
                                        </button>
                                    @endif

                                    {{-- Note button --}}
                                    <button @click="showNote = !showNote"
                                            class="inline-flex items-center justify-center gap-2 rounded-lg border border-slate-200 bg-white px-3 py-2 text-xs font-bold text-slate-600 transition hover:bg-slate-50">
                                        📝 Note
                                    </button>
                                </div>
                            </div>

                            {{-- Reject form --}}
                            <div x-show="showReject" x-cloak class="mt-4 rounded-xl border border-red-200 bg-red-50 p-4">
                                <form method="POST" action="{{ route('admin.arrangements.reject', $arrangement) }}">
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
                                <form method="POST" action="{{ route('admin.arrangements.note', $arrangement) }}">
                                    @csrf
                                    @method('PATCH')
                                    <label class="block text-xs font-bold uppercase text-amber-700 mb-2">Note administrative</label>
                                    <textarea name="admin_note" rows="2"
                                              placeholder="Ajoutez une note visible par le participant..."
                                              class="w-full rounded-lg border border-amber-200 bg-white px-3 py-2 text-sm text-slate-800 focus:outline-none focus:ring-2 focus:ring-amber-400 resize-none">{{ $arrangement->admin_note }}</textarea>
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

                {{-- Pagination --}}
                @if($arrangements->hasPages())
                    <div class="border-t border-slate-200 px-5 py-3 bg-white">
                        {{ $arrangements->links() }}
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
