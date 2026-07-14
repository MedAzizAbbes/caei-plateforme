@extends('layouts.app')

@section('content')
<div class="py-8">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

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

        {{-- Header --}}
        <div class="mb-6">
            <h1 class="text-2xl font-black text-[#061743]">Modifier le participant</h1>
            <p class="mt-1 text-sm text-slate-500">Mettez à jour les informations du profil de ce participant.</p>
        </div>

        @if ($errors->any())
            <div class="mb-6 rounded-md bg-red-50 p-4">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd"
                                  d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z"
                                  clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">Il y a eu des erreurs avec votre soumission</h3>
                        <div class="mt-2 text-sm text-red-700">
                            <ul class="list-disc space-y-1 pl-5">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <form method="POST" action="{{ route('admin.participants.update', $participant) }}" class="space-y-6">
            @csrf
            @method('PUT')

            {{-- Informations personnelles --}}
            <div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">
                <div class="border-b border-slate-100 bg-[#061743]/5 px-6 py-4">
                    <h2 class="text-sm font-black uppercase tracking-wide text-[#061743]">Informations personnelles</h2>
                </div>
                <div class="grid grid-cols-1 gap-5 p-6 sm:grid-cols-2">
                    <div>
                        <label class="mb-1 block text-sm font-bold text-slate-700" for="first_name">Prénom <span class="text-red-500">*</span></label>
                        <input type="text" id="first_name" name="first_name"
                               value="{{ old('first_name', $participant->first_name) }}" required
                               class="w-full rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-800 focus:border-[#061743] focus:outline-none focus:ring-1 focus:ring-[#061743] @error('first_name') border-red-400 @enderror">
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-bold text-slate-700" for="last_name">Nom <span class="text-red-500">*</span></label>
                        <input type="text" id="last_name" name="last_name"
                               value="{{ old('last_name', $participant->last_name) }}" required
                               class="w-full rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-800 focus:border-[#061743] focus:outline-none focus:ring-1 focus:ring-[#061743] @error('last_name') border-red-400 @enderror">
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-bold text-slate-700" for="email">Email <span class="text-red-500">*</span></label>
                        <input type="email" id="email" name="email"
                               value="{{ old('email', $participant->email) }}" required
                               class="w-full rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-800 focus:border-[#061743] focus:outline-none focus:ring-1 focus:ring-[#061743] @error('email') border-red-400 @enderror">
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-bold text-slate-700" for="phone">Téléphone</label>
                        <input type="text" id="phone" name="phone"
                               value="{{ old('phone', $participant->phone) }}"
                               class="w-full rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-800 focus:border-[#061743] focus:outline-none focus:ring-1 focus:ring-[#061743]">
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-bold text-slate-700" for="pays">Pays</label>
                        <input type="text" id="pays" name="pays"
                               value="{{ old('pays', $participant->pays) }}"
                               class="w-full rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-800 focus:border-[#061743] focus:outline-none focus:ring-1 focus:ring-[#061743]">
                    </div>
                    <div>
                        <label class="mb-1 block text-sm font-bold text-slate-700" for="poste">Poste</label>
                        <input type="text" id="poste" name="poste"
                               value="{{ old('poste', $participant->poste) }}"
                               class="w-full rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-800 focus:border-[#061743] focus:outline-none focus:ring-1 focus:ring-[#061743]">
                    </div>
                    <div class="sm:col-span-2">
                        <label class="mb-1 block text-sm font-bold text-slate-700" for="institution">Institution / Organisation</label>
                        <input type="text" id="institution" name="institution"
                               value="{{ old('institution', $participant->institution) }}"
                               class="w-full rounded-md border border-slate-200 px-3 py-2 text-sm text-slate-800 focus:border-[#061743] focus:outline-none focus:ring-1 focus:ring-[#061743]">
                    </div>
                </div>
            </div>

            {{-- Actions --}}
            <div class="flex items-center justify-end gap-3">
                <a href="{{ route('admin.participants.index') }}"
                   class="rounded-md border border-slate-200 bg-white px-5 py-2 text-sm font-bold text-slate-700 transition hover:bg-slate-50">
                    Annuler
                </a>
                <button type="submit"
                        class="rounded-md bg-[#061743] px-5 py-2 text-sm font-bold text-white transition hover:bg-[#0a2060]">
                    Enregistrer les modifications
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
