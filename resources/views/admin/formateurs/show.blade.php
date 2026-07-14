@extends('layouts.app')

@section('content')
<div class="py-8">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

        {{-- Back --}}
        <div class="mb-6">
            <a href="{{ route('admin.formateurs.index') }}"
               class="inline-flex items-center gap-1 text-sm font-bold text-[#061743] hover:text-[#f2a90f]">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Retour aux formateurs
            </a>
        </div>

        {{-- Profile card --}}
        <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
            {{-- Header banner --}}
            <div class="bg-[#061743] px-6 py-8">
                <div class="flex items-center gap-5">
                    <div class="flex h-16 w-16 flex-shrink-0 items-center justify-center rounded-full bg-[#f2a90f] text-xl font-black text-[#061743]">
                        {{ strtoupper(substr($formateur->first_name, 0, 1) . substr($formateur->last_name, 0, 1)) }}
                    </div>
                    <div>
                        <h1 class="text-2xl font-black text-white">{{ $formateur->fullName() }}</h1>
                        <p class="mt-0.5 text-sm text-white/65">{{ $formateur->email }}</p>
                        @if($formateur->institution)
                            <p class="mt-1 text-xs font-semibold text-[#f2a90f]">{{ $formateur->institution }}</p>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Details --}}
            <div class="divide-y divide-slate-100 px-6">
                <div class="grid grid-cols-2 gap-4 py-4 text-sm">
                    <div>
                        <p class="text-xs font-black uppercase text-slate-400">Prénom</p>
                        <p class="mt-1 font-semibold text-slate-800">{{ $formateur->first_name }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-black uppercase text-slate-400">Nom</p>
                        <p class="mt-1 font-semibold text-slate-800">{{ $formateur->last_name }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-black uppercase text-slate-400">Email</p>
                        <p class="mt-1 font-semibold text-slate-800">{{ $formateur->email }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-black uppercase text-slate-400">Téléphone</p>
                        <p class="mt-1 font-semibold text-slate-800">{{ $formateur->phone ?: '—' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-black uppercase text-slate-400">Pays</p>
                        <p class="mt-1 font-semibold text-slate-800">{{ $formateur->pays ?: '—' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-black uppercase text-slate-400">Poste</p>
                        <p class="mt-1 font-semibold text-slate-800">{{ $formateur->poste ?: '—' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-black uppercase text-slate-400">Institution</p>
                        <p class="mt-1 font-semibold text-slate-800">{{ $formateur->institution ?: '—' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-black uppercase text-slate-400">Membre depuis</p>
                        <p class="mt-1 font-semibold text-slate-800">{{ $formateur->created_at->format('d/m/Y') }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Séminaires affectés --}}
        <div class="mt-6 overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
            <div class="flex items-center justify-between border-b border-slate-100 bg-[#061743]/5 px-6 py-4">
                <h2 class="text-sm font-black uppercase tracking-wide text-[#061743]">
                    Séminaires affectés
                    <span class="ml-2 rounded-full bg-[#f2a90f]/20 px-2 py-0.5 text-xs font-black text-[#061743]">
                        {{ $formateur->seminarsAsTrainer->count() }}
                    </span>
                </h2>
                <a href="{{ route('admin.formateurs.edit', $formateur) }}"
                   class="text-xs font-bold text-[#061743] hover:text-[#f2a90f]">
                    Gérer les affectations →
                </a>
            </div>

            @if($formateur->seminarsAsTrainer->isEmpty())
                <div class="p-6 text-center text-sm text-slate-500">
                    Ce formateur n'est affecté à aucun séminaire.
                    <a href="{{ route('admin.formateurs.edit', $formateur) }}" class="ml-1 font-bold text-[#061743] hover:underline">Affecter →</a>
                </div>
            @else
                <div class="divide-y divide-slate-100">
                    @foreach($formateur->seminarsAsTrainer as $seminar)
                        <div class="flex items-center justify-between px-6 py-3">
                            <div>
                                <p class="text-sm font-bold text-[#061743]">{{ $seminar->theme }}</p>
                                <p class="text-xs text-slate-500">{{ $seminar->country }} — {{ $seminar->start_date?->format('d/m/Y') ?? 'À définir' }}</p>
                            </div>
                            <span class="rounded-full border border-slate-200 px-2.5 py-0.5 text-xs font-bold uppercase text-slate-500">
                                {{ $seminar->status }}
                            </span>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        {{-- Action buttons --}}
        <div class="mt-6 flex items-center gap-3">
            <a href="{{ route('admin.formateurs.edit', $formateur) }}"
               class="rounded-md bg-[#061743] px-4 py-2 text-sm font-bold text-white transition hover:bg-[#0a2060]">
                Modifier ce formateur
            </a>
            <form method="POST" action="{{ route('admin.formateurs.destroy', $formateur) }}"
                  onsubmit="return confirm('Supprimer définitivement ce formateur ?')">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="rounded-md bg-red-50 px-4 py-2 text-sm font-bold text-red-600 transition hover:bg-red-100">
                    Supprimer
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
