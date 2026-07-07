@extends('layouts.app')

@section('content')
<div class="py-8">
    <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

        {{-- Header --}}
        <div class="mb-6">
            <a href="{{ route('admin.formateurs.index') }}"
               class="inline-flex items-center gap-1 text-sm font-bold text-[#061743] hover:text-[#f2a90f]">
                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Retour aux formateurs
            </a>
            <h1 class="mt-3 text-2xl font-black text-[#061743]">Ajouter un formateur</h1>
        </div>

        @if($errors->any())
            <div class="mb-5 rounded-lg border border-red-100 bg-red-50 p-4 text-sm text-red-700">
                <p class="font-bold">Veuillez corriger les erreurs suivantes :</p>
                <ul class="mt-2 list-disc pl-5 space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.formateurs.store') }}" class="space-y-6">
            @csrf

            {{-- Informations personnelles --}}
            <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
                <div class="border-b border-slate-100 bg-[#061743]/5 px-6 py-4">
                    <h2 class="text-sm font-black uppercase tracking-wide text-[#061743]">Informations personnelles</h2>
                </div>
                <div class="grid grid-cols-1 gap-5 p-6 sm:grid-cols-2">
                    <div>
                        <label class="mb-1 block text-sm font-bold text-slate-700" for="first_name">Prénom <span class="text-red-500">*</span></label>
                        <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" required
                               class="w-full rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-800 focus:border-[#061743] focus:outline-none focus:ring-1 focus:ring-[#061743] @error('first_name') border-red-400 @enderror">
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-bold text-slate-700" for="last_name">Nom <span class="text-red-500">*</span></label>
                        <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" required
                               class="w-full rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-800 focus:border-[#061743] focus:outline-none focus:ring-1 focus:ring-[#061743] @error('last_name') border-red-400 @enderror">
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-bold text-slate-700" for="email">Email <span class="text-red-500">*</span></label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required
                               class="w-full rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-800 focus:border-[#061743] focus:outline-none focus:ring-1 focus:ring-[#061743] @error('email') border-red-400 @enderror">
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-bold text-slate-700" for="phone">Téléphone</label>
                        <input type="text" id="phone" name="phone" value="{{ old('phone') }}"
                               class="w-full rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-800 focus:border-[#061743] focus:outline-none focus:ring-1 focus:ring-[#061743]">
                    </div>
                    <div class="sm:col-span-2">
                        <label class="mb-1 block text-sm font-bold text-slate-700" for="institution">Institution / Organisation</label>
                        <input type="text" id="institution" name="institution" value="{{ old('institution') }}"
                               class="w-full rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-800 focus:border-[#061743] focus:outline-none focus:ring-1 focus:ring-[#061743]">
                    </div>
                </div>
            </div>

            {{-- Mot de passe --}}
            <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
                <div class="border-b border-slate-100 bg-[#061743]/5 px-6 py-4">
                    <h2 class="text-sm font-black uppercase tracking-wide text-[#061743]">Accès à la plateforme</h2>
                </div>
                <div class="grid grid-cols-1 gap-5 p-6 sm:grid-cols-2">
                    <div>
                        <label class="mb-1 block text-sm font-bold text-slate-700" for="password">Mot de passe <span class="text-red-500">*</span></label>
                        <input type="password" id="password" name="password" required
                               class="w-full rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-800 focus:border-[#061743] focus:outline-none focus:ring-1 focus:ring-[#061743] @error('password') border-red-400 @enderror">
                        <p class="mt-1 text-xs text-slate-500">Minimum 8 caractères.</p>
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-bold text-slate-700" for="password_confirmation">Confirmer le mot de passe <span class="text-red-500">*</span></label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required
                               class="w-full rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-800 focus:border-[#061743] focus:outline-none focus:ring-1 focus:ring-[#061743]">
                    </div>
                </div>
            </div>

            {{-- Affectation séminaires --}}
            <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
                <div class="border-b border-slate-100 bg-[#061743]/5 px-6 py-4">
                    <h2 class="text-sm font-black uppercase tracking-wide text-[#061743]">Affectation aux séminaires</h2>
                    <p class="mt-0.5 text-xs text-slate-500">Sélectionnez les séminaires que ce formateur va présenter (optionnel).</p>
                </div>
                <div class="p-6">
                    @if($seminars->isEmpty())
                        <p class="text-sm text-slate-500">Aucun séminaire disponible.</p>
                    @else
                        <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
                            @foreach($seminars as $seminar)
                                <label class="flex cursor-pointer items-start gap-3 rounded-lg border border-slate-200 p-3 transition hover:border-[#061743]/30 hover:bg-[#061743]/5 has-[:checked]:border-[#061743] has-[:checked]:bg-[#061743]/5">
                                    <input type="checkbox" name="seminar_ids[]" value="{{ $seminar->id }}"
                                           {{ in_array($seminar->id, old('seminar_ids', [])) ? 'checked' : '' }}
                                           class="mt-0.5 h-4 w-4 rounded border-slate-300 text-[#061743] focus:ring-[#061743]">
                                    <div class="min-w-0">
                                        <p class="text-sm font-bold text-[#061743] truncate">{{ $seminar->theme }}</p>
                                        <p class="text-xs text-slate-500">{{ $seminar->country }} — {{ $seminar->start_date?->format('d/m/Y') ?? 'À définir' }}</p>
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

            {{-- Actions --}}
            <div class="flex items-center justify-end gap-3">
                <a href="{{ route('admin.formateurs.index') }}"
                   class="rounded-md border border-slate-200 bg-white px-5 py-2 text-sm font-bold text-slate-700 transition hover:bg-slate-50">
                    Annuler
                </a>
                <button type="submit"
                        class="rounded-md bg-[#061743] px-5 py-2 text-sm font-bold text-white transition hover:bg-[#0a2060]">
                    Créer le formateur
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
