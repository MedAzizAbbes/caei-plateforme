@extends('layouts.app')

@section('content')
<div class="flex min-h-screen -mt-8 -mx-4 sm:-mx-6 lg:-mx-8" style="background: linear-gradient(135deg, rgba(241, 245, 249, 0.85) 0%, rgba(226, 232, 240, 0.88) 100%), url('{{ asset('assets/img/company.jpg') }}') center/cover fixed no-repeat;">
    {{-- Sidebar Admin --}}
    <x-admin-sidebar />

    {{-- Contenu Principal --}}
    <div class="flex-1 p-6 md:p-8 overflow-y-auto">
        <div class="max-w-4xl mx-auto">
            {{-- Fil d'ariane & En-tête --}}
            <div class="mb-6 flex items-center justify-between">
                <div>
                    <a href="{{ route('admin.formations.index') }}" class="inline-flex items-center gap-2 text-xs font-bold text-slate-500 hover:text-[#ce9233] transition">
                        <span>← Retour à la liste des formations</span>
                    </a>
                    <h1 class="mt-2 text-2xl font-black text-[#061743]">Ajouter une Nouvelle Formation</h1>
                </div>
            </div>

            {{-- Formulaire --}}
            <div class="rounded-2xl bg-white p-8 shadow-sm border border-slate-200/80">
                <form method="POST" action="{{ route('admin.formations.store') }}" enctype="multipart/form-data" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        {{-- Code Formation --}}
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-600 mb-2">Code Formation (Optionnel)</label>
                            <input type="text" name="code" value="{{ old('code') }}" placeholder="ex: ACF-010, INT-001" class="w-full rounded-xl border-slate-200 text-sm focus:border-amber-500 focus:ring-amber-500">
                            @error('code') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>

                        {{-- Type de Formation --}}
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-600 mb-2">Type de Formation *</label>
                            <select name="type" required class="w-full rounded-xl border-slate-200 text-sm focus:border-amber-500 focus:ring-amber-500">
                                <option value="certifiante" {{ old('type') == 'certifiante' ? 'selected' : '' }}>📜 Certifiante </option>
                                <option value="diplomante" {{ old('type') == 'diplomante' ? 'selected' : '' }}>🎓 Diplômante </option>
                                <option value="cycle" {{ old('type') == 'cycle' ? 'selected' : '' }}>🔄 Cycle </option>
                                <option value="sur_mesure" {{ old('type') == 'sur_mesure' ? 'selected' : '' }}>🎯 Sur Mesure</option>
                                <option value="elearning" {{ old('type') == 'elearning' ? 'selected' : '' }}>💻 E-Learning</option>
                            </select>
                            @error('type') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>

                        {{-- Statut --}}
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-600 mb-2">Statut *</label>
                            <select name="status" required class="w-full rounded-xl border-slate-200 text-sm focus:border-amber-500 focus:ring-amber-500">
                                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>✅ Active </option>
                                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>🚫 Inactive </option>
                            </select>
                            @error('status') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    {{-- Intitulé de la formation --}}
                    <div>
                        <label class="block text-xs font-bold uppercase text-slate-600 mb-2">Intitulé de la formation *</label>
                        <input type="text" name="title" value="{{ old('title') }}" required placeholder="ex: Comptabilité financière & analyse des états financiers (normes IFRS)" class="w-full rounded-xl border-slate-200 text-sm focus:border-amber-500 focus:ring-amber-500">
                        @error('title') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                        {{-- Domaine / Catégorie --}}
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-600 mb-2">Domaine / Catégorie</label>
                            <input type="text" name="domain" value="{{ old('domain') }}" list="domains_list" placeholder="ex: Audit, Comptabilité & Finance" class="w-full rounded-xl border-slate-200 text-sm focus:border-amber-500 focus:ring-amber-500">
                            <datalist id="domains_list">
                                @foreach($domains as $dom)
                                    <option value="{{ $dom }}"></option>
                                @endforeach
                            </datalist>
                            @error('domain') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>

                        {{-- Date de début --}}
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-600 mb-2">Date de début</label>
                            <input type="date" name="start_date" value="{{ old('start_date') }}" class="w-full rounded-xl border-slate-200 text-sm focus:border-amber-500 focus:ring-amber-500">
                            @error('start_date') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>

                        {{-- Durée --}}
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-600 mb-2">Durée</label>
                            <input type="text" name="duration" value="{{ old('duration') }}" placeholder="ex: 1 semaine / 2 semaines / 6 mois" class="w-full rounded-xl border-slate-200 text-sm focus:border-amber-500 focus:ring-amber-500">
                            @error('duration') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>

                        {{-- Prix (€) --}}
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-600 mb-2">Prix (en € - Laisser vide pour sur devis)</label>
                            <input type="number" step="0.01" min="0" name="price" value="{{ old('price') }}" placeholder="ex: 1900.00 ou 3300.00" class="w-full rounded-xl border-slate-200 text-sm focus:border-amber-500 focus:ring-amber-500">
                            @error('price') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        {{-- Lieu / Modalité --}}
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-600 mb-2">Lieu / Modalités</label>
                            <input type="text" name="location" value="{{ old('location', 'Tunis, Tunisie & Classe virtuelle') }}" placeholder="ex: Tunis, Tunisie & Classe virtuelle" class="w-full rounded-xl border-slate-200 text-sm focus:border-amber-500 focus:ring-amber-500">
                            @error('location') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>

                        {{-- Image de présentation --}}
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-600 mb-2">Image d d'illustration (Optionnel)</label>
                            <input type="file" name="image" accept="image/*" class="w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-xs file:font-bold file:bg-amber-50 file:text-amber-700 hover:file:bg-amber-100">
                            @error('image') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    {{-- Description --}}
                    <div>
                        <label class="block text-xs font-bold uppercase text-slate-600 mb-2">Description synthétique</label>
                        <textarea name="description" rows="3" placeholder="Présentez les enjeux et le contenu général de la formation..." class="w-full rounded-xl border-slate-200 text-sm focus:border-amber-500 focus:ring-amber-500">{{ old('description') }}</textarea>
                        @error('description') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                    </div>

                    {{-- Objectifs pédagogiques --}}
                    <div>
                        <label class="block text-xs font-bold uppercase text-slate-600 mb-2">Objectifs pédagogiques</label>
                        <textarea name="objectives" rows="2" placeholder="Quels sont les acquis à la fin du cycle ?" class="w-full rounded-xl border-slate-200 text-sm focus:border-amber-500 focus:ring-amber-500">{{ old('objectives') }}</textarea>
                        @error('objectives') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                    </div>

                    {{-- Public Cible --}}
                    <div>
                        <label class="block text-xs font-bold uppercase text-slate-600 mb-2">Public Cible / Profils concernés</label>
                        <textarea name="target_audience" rows="2" placeholder="ex: Directeurs financiers, auditeurs, contrôleurs de gestion..." class="w-full rounded-xl border-slate-200 text-sm focus:border-amber-500 focus:ring-amber-500">{{ old('target_audience') }}</textarea>
                        @error('target_audience') <p class="mt-1 text-xs text-red-600">{{ $message }}</p> @enderror
                    </div>

                    {{-- Boutons d'action --}}
                    <div class="flex items-center justify-end gap-4 pt-4 border-t border-slate-100">
                        <a href="{{ route('admin.formations.index') }}" class="rounded-xl bg-slate-100 px-5 py-3 text-sm font-bold text-slate-600 hover:bg-slate-200 transition">
                            Annuler
                        </a>
                        <button type="submit" class="rounded-xl bg-gradient-to-r from-[#ce9233] to-[#f0b75a] px-6 py-3 text-sm font-bold text-[#061743] shadow-md hover:shadow-lg transition">
                            Enregistrer la formation
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
