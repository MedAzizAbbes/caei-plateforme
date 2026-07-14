@extends('layouts.app')

@section('content')
<div class="py-8">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

        {{-- Header --}}
        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <p class="text-xs font-black uppercase text-[#f2a90f]">Administration</p>
                <h1 class="text-2xl font-black text-[#061743]">Formateurs</h1>
                <p class="mt-1 text-sm text-slate-500">Gérer les comptes formateurs et leurs affectations aux séminaires.</p>
            </div>
            <a href="{{ route('admin.formateurs.create') }}"
               class="inline-flex items-center gap-2 rounded-md bg-[#061743] px-4 py-2 text-sm font-bold text-white transition hover:bg-[#0a2060]">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Ajouter un formateur
            </a>
        </div>

        {{-- Flash messages --}}
        @if(session('success'))
            <div class="mb-5 flex items-center gap-3 rounded-lg border border-green-100 bg-green-50 px-4 py-3 text-sm text-green-700">
                <svg class="h-5 w-5 flex-shrink-0 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                </svg>
                {{ session('success') }}
            </div>
        @endif

        {{-- Search bar --}}
        <form method="GET" action="{{ route('admin.formateurs.index') }}" class="mb-6">
            <div class="flex gap-3">
                <input type="text" name="q" value="{{ request('q') }}"
                       placeholder="Rechercher par nom, email ou institution..."
                       class="flex-1 rounded-md border border-slate-200 bg-white px-4 py-2 text-sm text-slate-800 shadow-sm focus:border-[#061743] focus:outline-none focus:ring-1 focus:ring-[#061743]">
                <button type="submit"
                        class="rounded-md bg-[#f2a90f] px-4 py-2 text-sm font-bold text-[#061743] transition hover:bg-[#ffd071]">
                    Rechercher
                </button>
                @if(request('q'))
                    <a href="{{ route('admin.formateurs.index') }}"
                       class="rounded-md border border-slate-200 bg-white px-4 py-2 text-sm text-slate-600 transition hover:bg-slate-50">
                        Réinitialiser
                    </a>
                @endif
            </div>
        </form>

        {{-- Table --}}
        <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
            @if($formateurs->isEmpty())
                <div class="p-12 text-center">
                    <div class="mx-auto mb-4 flex h-14 w-14 items-center justify-center rounded-full bg-[#061743]/5">
                        <svg class="h-7 w-7 text-[#061743]/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                  d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <p class="font-bold text-slate-700">Aucun formateur trouvé</p>
                    <p class="mt-1 text-sm text-slate-500">
                        @if(request('q'))
                            Aucun résultat pour « {{ request('q') }} ».
                        @else
                            Commencez par ajouter un formateur.
                        @endif
                    </p>
                    <a href="{{ route('admin.formateurs.create') }}"
                       class="mt-4 inline-flex items-center gap-2 rounded-md bg-[#061743] px-4 py-2 text-sm font-bold text-white hover:bg-[#0a2060]">
                        Ajouter un formateur
                    </a>
                </div>
            @else
                <table class="min-w-full divide-y divide-slate-200 text-left text-sm">
                    <thead class="bg-[#061743]">
                        <tr>
                            <th class="px-5 py-3 text-xs font-black uppercase tracking-wider text-white/70">Formateur</th>
                            <th class="px-5 py-3 text-xs font-black uppercase tracking-wider text-white/70">Email</th>
                            <th class="px-5 py-3 text-xs font-black uppercase tracking-wider text-white/70">Institution</th>
                            <th class="px-5 py-3 text-xs font-black uppercase tracking-wider text-white/70 text-center">Séminaires</th>
                            <th class="px-5 py-3 text-xs font-black uppercase tracking-wider text-white/70 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @foreach($formateurs as $formateur)
                            <tr class="transition hover:bg-slate-50">
                                <td class="px-5 py-3">
                                    <div class="flex items-center gap-3">
                                        <div class="flex h-9 w-9 flex-shrink-0 items-center justify-center rounded-full bg-[#061743] text-xs font-black text-white">
                                            {{ strtoupper(substr($formateur->first_name, 0, 1) . substr($formateur->last_name, 0, 1)) }}
                                        </div>
                                        <div>
                                            <p class="font-bold text-[#061743]">{{ $formateur->fullName() }}</p>
                                            @if($formateur->phone)
                                                <p class="text-xs text-slate-500">{{ $formateur->phone }}</p>
                                            @endif
                                            @if($formateur->pays || $formateur->poste)
                                                <p class="text-xs text-slate-400">{{ implode(' - ', array_filter([$formateur->poste, $formateur->pays])) }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="px-5 py-3 text-slate-700">{{ $formateur->email }}</td>
                                <td class="px-5 py-3 text-slate-600">{{ $formateur->institution ?: '—' }}</td>
                                <td class="px-5 py-3 text-center">
                                    <span class="inline-flex items-center rounded-full bg-[#f2a90f]/15 px-2.5 py-0.5 text-xs font-black text-[#061743]">
                                        {{ $formateur->seminars_as_trainer_count }}
                                    </span>
                                </td>
                                <td class="px-5 py-3">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('admin.formateurs.show', $formateur) }}"
                                           class="rounded-md border border-slate-200 bg-white px-3 py-1.5 text-xs font-bold text-slate-600 transition hover:bg-slate-50"
                                           title="Voir">
                                            Voir
                                        </a>
                                        <a href="{{ route('admin.formateurs.edit', $formateur) }}"
                                           class="rounded-md bg-[#061743] px-3 py-1.5 text-xs font-bold text-white transition hover:bg-[#0a2060]"
                                           title="Modifier">
                                            Modifier
                                        </a>
                                        <form method="POST" action="{{ route('admin.formateurs.destroy', $formateur) }}"
                                              onsubmit="return confirm('Supprimer ce formateur ? Cette action est irréversible.')">
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
                @if($formateurs->hasPages())
                    <div class="border-t border-slate-200 px-5 py-3">
                        {{ $formateurs->links() }}
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
