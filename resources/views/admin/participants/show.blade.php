@extends('layouts.app')

@section('content')
<div class="py-8">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

        {{-- Back --}}
        <div class="mb-6">
            <a href="{{ route('admin.participants.index') }}"
               class="inline-flex items-center gap-1 text-sm font-bold text-[#061743] hover:text-[#f2a90f]">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Retour aux participants
            </a>
        </div>

        {{-- Profile card --}}
        <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
            {{-- Header banner --}}
            <div class="bg-[#061743] px-6 py-8">
                <div class="flex items-center gap-5">
                    <div class="flex h-16 w-16 flex-shrink-0 items-center justify-center rounded-full bg-[#f2a90f] text-xl font-black text-[#061743]">
                        {{ strtoupper(substr($participant->first_name, 0, 1) . substr($participant->last_name, 0, 1)) }}
                    </div>
                    <div>
                        <h1 class="text-2xl font-black text-white">{{ $participant->first_name }} {{ $participant->last_name }}</h1>
                        <p class="mt-0.5 text-sm text-white/65">{{ $participant->email }}</p>
                        @if($participant->institution)
                            <p class="mt-1 text-xs font-semibold text-[#f2a90f]">{{ $participant->institution }}</p>
                        @endif
                    </div>
                </div>
            </div>

            {{-- Details --}}
            <div class="divide-y divide-slate-100 px-6">
                <div class="grid grid-cols-2 gap-4 py-4 text-sm">
                    <div>
                        <p class="text-xs font-black uppercase text-slate-400">Prénom</p>
                        <p class="mt-1 font-semibold text-slate-800">{{ $participant->first_name }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-black uppercase text-slate-400">Nom</p>
                        <p class="mt-1 font-semibold text-slate-800">{{ $participant->last_name }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-black uppercase text-slate-400">Email</p>
                        <p class="mt-1 font-semibold text-slate-800">{{ $participant->email }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-black uppercase text-slate-400">Téléphone</p>
                        <p class="mt-1 font-semibold text-slate-800">{{ $participant->phone ?: '-' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-black uppercase text-slate-400">Pays</p>
                        <p class="mt-1 font-semibold text-slate-800">{{ $participant->pays ?: '-' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-black uppercase text-slate-400">Poste</p>
                        <p class="mt-1 font-semibold text-slate-800">{{ $participant->poste ?: '-' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-black uppercase text-slate-400">Institution</p>
                        <p class="mt-1 font-semibold text-slate-800">{{ $participant->institution ?: '-' }}</p>
                    </div>
                    <div>
                        <p class="text-xs font-black uppercase text-slate-400">Inscrit le</p>
                        <p class="mt-1 font-semibold text-slate-800">{{ $participant->created_at->format('d/m/Y') }}</p>
                    </div>
                </div>
            </div>
        </div>

        {{-- Séminaires inscrits --}}
        <div class="mt-6 overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
            <div class="flex items-center justify-between border-b border-slate-100 bg-[#061743]/5 px-6 py-4">
                <h2 class="text-sm font-black uppercase tracking-wide text-[#061743]">
                    Séminaires Inscrits
                    <span class="ml-2 rounded-full bg-[#f2a90f]/20 px-2 py-0.5 text-xs font-black text-[#061743]">
                        {{ $registrations->count() }}
                    </span>
                </h2>
            </div>

            @if($registrations->isEmpty())
                <div class="p-6 text-center text-sm text-slate-500">
                    Ce participant n'est inscrit à aucun séminaire.
                </div>
            @else
                <div class="divide-y divide-slate-100">
                    @foreach($registrations as $registration)
                        <div class="flex items-center justify-between px-6 py-3">
                            <div>
                                <p class="text-sm font-bold text-[#061743]">{{ $registration->seminar->theme }}</p>
                                <p class="text-xs text-slate-500">{{ $registration->seminar->country }} — {{ $registration->seminar->start_date?->format('d/m/Y') ?? 'À définir' }}</p>
                            </div>
                            <span class="rounded-full border border-slate-200 px-2.5 py-0.5 text-xs font-bold uppercase {{ $registration->status == 'present' ? 'text-emerald-600 bg-emerald-50' : 'text-slate-500 bg-slate-50' }}">
                                {{ ucfirst($registration->status) }}
                            </span>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        {{-- Action buttons --}}
        <div class="mt-6 flex items-center gap-3">
            <a href="{{ route('admin.participants.edit', $participant) }}"
               class="rounded-md bg-[#061743] px-4 py-2 text-sm font-bold text-white transition hover:bg-[#0a2060]">
                Modifier ce participant
            </a>
            <form method="POST" action="{{ route('admin.participants.destroy', $participant) }}"
                  onsubmit="return confirm('Supprimer définitivement ce participant et toutes ses inscriptions ?')">
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
