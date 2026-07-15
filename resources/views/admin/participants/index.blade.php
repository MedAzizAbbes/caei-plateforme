@extends('layouts.app')

@section('content')
<div class="py-10">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        
        {{-- Header Section --}}
        <div class="mb-8 flex flex-col justify-between gap-4 md:flex-row md:items-end">
            <div>
                <p class="text-sm font-black uppercase text-[#f2a90f]">Back-office CAEI</p>
                <h1 class="mt-1 text-3xl font-black uppercase text-[#061743]">Participants et Inscriptions</h1>
                <p class="mt-2 text-sm text-slate-600">Consultez la liste des participants, leurs inscriptions et leur statut de présence.</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('admin.participants.export.excel', request()->query()) }}" class="inline-flex items-center gap-2 rounded-md bg-[#10b981] px-4 py-2 text-sm font-bold text-white transition hover:bg-[#059669]">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Excel
                </a>
                <a href="{{ route('admin.participants.export.pdf', request()->query()) }}" class="inline-flex items-center gap-2 rounded-md bg-[#ef4444] px-4 py-2 text-sm font-bold text-white transition hover:bg-[#dc2626]">
                    <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    PDF
                </a>
            </div>
        </div>

        {{-- Search/Filter Form --}}
        <form method="GET" class="mb-6 rounded-xl border border-slate-200 bg-white p-6 shadow-sm">
            <div class="grid gap-4 md:grid-cols-4">
                <div>
                    <label class="mb-1 block text-xs font-bold uppercase tracking-wider text-slate-500">Nom</label>
                    <input type="text" name="name" value="{{ request('name') }}" class="w-full rounded-md border border-slate-200 bg-slate-50 px-3 py-2 text-sm text-slate-800 shadow-sm focus:border-[#061743] focus:bg-white focus:outline-none focus:ring-1 focus:ring-[#061743]" placeholder="Ex: Jean">
                </div>
                <div>
                    <label class="mb-1 block text-xs font-bold uppercase tracking-wider text-slate-500">Email</label>
                    <input type="text" name="email" value="{{ request('email') }}" class="w-full rounded-md border border-slate-200 bg-slate-50 px-3 py-2 text-sm text-slate-800 shadow-sm focus:border-[#061743] focus:bg-white focus:outline-none focus:ring-1 focus:ring-[#061743]" placeholder="Ex: jean@">
                </div>
                <div>
                    <label class="mb-1 block text-xs font-bold uppercase tracking-wider text-slate-500">Séminaire</label>
                    <select name="seminar_id" class="w-full rounded-md border border-slate-200 bg-slate-50 px-3 py-2 text-sm text-slate-800 shadow-sm focus:border-[#061743] focus:bg-white focus:outline-none focus:ring-1 focus:ring-[#061743]">
                        <option value="">Tous les séminaires</option>
                        @foreach($seminars as $seminar)
                            <option value="{{ $seminar->id }}" {{ request('seminar_id') == $seminar->id ? 'selected' : '' }}>{{ $seminar->theme }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="mb-1 block text-xs font-bold uppercase tracking-wider text-slate-500">Statut</label>
                    <select name="status" class="w-full rounded-md border border-slate-200 bg-slate-50 px-3 py-2 text-sm text-slate-800 shadow-sm focus:border-[#061743] focus:bg-white focus:outline-none focus:ring-1 focus:ring-[#061743]">
                        <option value="">Tous les statuts</option>
                        <option value="inscrit" {{ request('status') == 'inscrit' ? 'selected' : '' }}>Inscrit</option>
                        <option value="present" {{ request('status') == 'present' ? 'selected' : '' }}>Présent</option>
                        <option value="absent" {{ request('status') == 'absent' ? 'selected' : '' }}>Absent</option>
                    </select>
                </div>
                <div class="md:col-span-4 flex items-center justify-end gap-3 mt-2">
                    @if(request()->hasAny(['name', 'email', 'seminar_id', 'status']))
                        <a href="{{ route('admin.participants.index') }}" class="rounded-md border border-slate-200 bg-white px-4 py-2 text-sm font-bold text-slate-600 transition hover:bg-slate-50">Réinitialiser</a>
                    @endif
                    <button type="submit" class="rounded-md bg-[#f2a90f] px-4 py-2 text-sm font-bold text-[#061743] transition hover:bg-[#ffd071]">Filtrer</button>
                </div>
            </div>
        </form>

        {{-- Table --}}
        <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
            @if($registrations->isEmpty())
                <div class="p-12 text-center">
                    <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-[#061743]/5">
                        <svg class="h-7 w-7 text-[#061743]/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                    </div>
                    <p class="font-bold text-slate-700">Aucun participant trouvé</p>
                    <p class="mt-1 text-sm text-slate-500">Essayez de modifier vos critères de recherche.</p>
                </div>
            @else
                <table class="min-w-full divide-y divide-slate-200 text-left text-sm">
                    <thead class="bg-[#061743]">
                        <tr>
                            <th class="px-5 py-3 text-xs font-black uppercase tracking-wider text-white/70">Nom & Infos</th>
                            <th class="px-5 py-3 text-xs font-black uppercase tracking-wider text-white/70">Email</th>
                            <th class="px-5 py-3 text-xs font-black uppercase tracking-wider text-white/70">Institution</th>
                            <th class="px-5 py-3 text-xs font-black uppercase tracking-wider text-white/70">Séminaire</th>
                            <th class="px-5 py-3 text-xs font-black uppercase tracking-wider text-white/70">Statut</th>
                            <th class="px-5 py-3 text-xs font-black uppercase tracking-wider text-white/70">Paiement</th>
                            <th class="px-5 py-3 text-xs font-black uppercase tracking-wider text-white/70 text-right">Inscrit le</th>
                            <th class="px-5 py-3 text-xs font-black uppercase tracking-wider text-white/70 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($registrations as $registration)
                            <tr class="transition hover:bg-slate-50">
                                <td class="px-5 py-3">
                                    <div class="flex items-center gap-3">
                                        <div class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-full bg-[#061743] text-xs font-black text-white">
                                            {{ strtoupper(substr($registration->user->first_name, 0, 1) . substr($registration->user->last_name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <p class="font-bold text-[#061743]">{{ $registration->user->first_name }} {{ $registration->user->last_name }}</p>
                                            @if($registration->user->phone)
                                                <p class="text-xs text-slate-500">{{ $registration->user->phone }}</p>
                                            @endif
                                            @if($registration->user->pays || $registration->user->poste)
                                                <p class="text-xs text-slate-400">{{ implode(' - ', array_filter([$registration->user->poste, $registration->user->pays])) }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-3 text-slate-700">{{ $registration->user->email }}</td>
                                <td class="px-5 py-3 text-slate-600">{{ $registration->user->institution ?: '-' }}</td>
                                <td class="px-5 py-3 text-slate-600 font-semibold">{{ $registration->seminar->theme }}</td>
                                <td class="px-5 py-3">
                                    <span class="inline-flex items-center rounded-full px-2.5 py-0.5 text-xs font-black 
                                        {{ $registration->status == 'present' ? 'bg-[#10b981]/15 text-[#059669]' : 'bg-[#f2a90f]/15 text-[#b47a00]' }}">
                                        {{ ucfirst($registration->status) }}
                                    </span>
                                </td>
                                <td class="px-5 py-3">
                                    @php $pay = $registration->payment; @endphp
                                    @if($pay)
                                        <span class="inline-flex items-center gap-1 rounded-full border px-2.5 py-0.5 text-xs font-bold {{ $pay->statusBadgeClasses() }}">
                                            {{ $pay->statusEmoji() }} {{ $pay->statusLabel() }}
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1 rounded-full border border-slate-200 bg-slate-100 px-2.5 py-0.5 text-xs font-bold text-slate-500">
                                            🔴 Non payé
                                        </span>
                                    @endif
                                </td>
                                <td class="px-5 py-3 text-right text-slate-500">{{ $registration->registered_at->format('d/m/Y H:i') }}</td>
                                <td class="px-5 py-3">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('admin.participants.show', $registration->user) }}"
                                           class="rounded-md border border-slate-200 bg-white px-3 py-1.5 text-xs font-bold text-slate-600 transition hover:bg-slate-50"
                                           title="Voir">
                                            Voir
                                        </a>
                                        <a href="{{ route('admin.participants.edit', $registration->user) }}"
                                           class="rounded-md bg-[#061743] px-3 py-1.5 text-xs font-bold text-white transition hover:bg-[#0a2060]"
                                           title="Modifier">
                                            Modifier
                                        </a>
                                        <form method="POST" action="{{ route('admin.participants.destroy', $registration->user) }}"
                                              onsubmit="return confirm('Supprimer ce participant et toutes ses inscriptions ? Cette action est irréversible.')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    class="rounded-md bg-red-50 px-3 py-1.5 text-xs font-bold text-red-600 transition hover:bg-red-100">
                                                Supprimer
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                {{-- Pagination --}}
                @if($registrations->hasPages())
                    <div class="border-t border-slate-200 px-5 py-3 bg-white">
                        {{ $registrations->links() }}
                    </div>
                @endif
            @endif
        </div>

        {{-- Back --}}
        <div class="mt-6">
            <a href="{{ route('admin.dashboard') }}" class="text-sm font-bold text-[#061743] hover:text-[#f2a90f]">
                ← Retour au tableau de bord
            </a>
        </div>

    </div>
</div>
@endsection
