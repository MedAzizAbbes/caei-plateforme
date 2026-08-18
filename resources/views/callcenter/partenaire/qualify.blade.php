<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h2 class="text-2xl font-black uppercase tracking-tight text-slate-900 flex items-center gap-2">
                    📋 Qualification Commerciale du RDV #{{ $rendezVous->id }}
                </h2>
                <p class="text-sm text-slate-500 font-medium">Saisie des résultats d'entretien et évaluation du potentiel prospect</p>
            </div>
            <div>
                <a href="{{ route('callcenter.partenaire.index') }}" class="inline-flex items-center gap-2 rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-xs font-bold text-slate-700 hover:bg-slate-50 transition shadow-sm">
                    ⬅ Retour à mes rendez-vous
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                <!-- Détails Prospect & RDV -->
                <div class="lg:col-span-1 space-y-6">
                    <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm space-y-4">
                        <div class="border-b border-slate-100 pb-3">
                            <h3 class="text-xs font-black uppercase tracking-wider text-slate-400">Prospect à qualifier</h3>
                            <h4 class="text-lg font-black text-slate-900 mt-1">{{ $rendezVous->prospect->nomComplet() }}</h4>
                            @if($rendezVous->prospect->societe)
                                <p class="text-xs font-bold text-slate-600 mt-0.5">🏢 {{ $rendezVous->prospect->societe }}</p>
                            @endif
                        </div>

                        <div class="space-y-2 text-xs">
                            <div><strong class="text-slate-700">Téléphone:</strong> <span class="text-slate-900 font-semibold">{{ $rendezVous->prospect->telephone }}</span></div>
                            @if($rendezVous->prospect->email)<div><strong class="text-slate-700">Email:</strong> <span class="text-slate-900">{{ $rendezVous->prospect->email }}</span></div>@endif
                            @if($rendezVous->prospect->secteur)<div><strong class="text-slate-700">Secteur:</strong> <span class="text-slate-900">{{ $rendezVous->prospect->secteur }}</span></div>@endif
                        </div>

                        <div class="border-t border-slate-100 pt-3 space-y-2 text-xs">
                            <div><strong class="text-slate-700">Date RDV:</strong> {{ \Carbon\Carbon::parse($rendezVous->date_rendez_vous)->format('d/m/Y') }} à {{ \Carbon\Carbon::parse($rendezVous->heure_rendez_vous)->format('H:i') }}</div>
                            <div><strong class="text-slate-700">Objet:</strong> {{ $rendezVous->objet }}</div>
                            <div><strong class="text-slate-700">Agent créateur:</strong> {{ $rendezVous->agent->fullName() }}</div>
                        </div>


                    </div>
                </div>

                <!-- Formulaire de Qualification -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-sm">
                        <h3 class="text-base font-black text-slate-900 uppercase tracking-tight mb-4 pb-2 border-b border-slate-100">
                            Résultat de l'entretien commercial
                        </h3>

                        <form method="POST" action="{{ route('callcenter.partenaire.qualify.store', $rendezVous) }}" class="space-y-5">
                            @csrf

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Résultat de la qualification *</label>
                                    @php
                                        $currentResultat = optional($rendezVous->qualification)->resultat;
                                    @endphp
                                    <select name="resultat" required class="w-full rounded-xl border-slate-300 text-sm font-medium focus:border-[#061743] focus:ring-[#061743]">
                                        <option value="">-- Sélectionner --</option>
                                        <option value="Prospect qualifié" {{ $currentResultat === 'Prospect qualifié' ? 'selected' : '' }}>Prospect qualifié</option>
                                        <option value="Prospect intéressé" {{ ($currentResultat === 'Prospect intéressé' || $currentResultat === 'Intéressé') ? 'selected' : '' }}>Prospect intéressé</option>
                                        <option value="À rappeler" {{ $currentResultat === 'À rappeler' ? 'selected' : '' }}>À rappeler</option>
                                        <option value="Non intéressé" {{ $currentResultat === 'Non intéressé' ? 'selected' : '' }}>Non intéressé</option>
                                        <option value="Non joignable" {{ $currentResultat === 'Non joignable' ? 'selected' : '' }}>Non joignable</option>
                                        <option value="Refus" {{ $currentResultat === 'Refus' ? 'selected' : '' }}>Refus</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Niveau de Potentiel *</label>
                                    <select name="potentiel" required class="w-full rounded-xl border-slate-300 text-sm font-medium focus:border-[#061743] focus:ring-[#061743]">
                                        <option value="">-- Sélectionner --</option>
                                        <option value="Élevé" {{ optional($rendezVous->qualification)->potentiel == 'Élevé' ? 'selected' : '' }}>🔥 Élevé (Forte opportunité)</option>
                                        <option value="Moyen" {{ optional($rendezVous->qualification)->potentiel == 'Moyen' ? 'selected' : '' }}>⚡ Moyen (Opportunité standard)</option>
                                        <option value="Faible" {{ optional($rendezVous->qualification)->potentiel == 'Faible' ? 'selected' : '' }}>❄️ Faible (Opportunité secondaire)</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-1">Commentaires Commercial & Synthèse</label>
                                <textarea name="commentaire" rows="4" placeholder="Compte-rendu d'entretien, besoins détectés, prochaines actions..." class="w-full rounded-xl border-slate-300 text-sm focus:border-[#061743] focus:ring-[#061743]">{{ optional($rendezVous->qualification)->commentaire }}</textarea>
                            </div>

                            <div class="flex justify-end gap-3 pt-4 border-t border-slate-100">
                                <a href="{{ route('callcenter.partenaire.index') }}" class="rounded-xl border border-slate-300 px-4 py-2 text-xs font-bold text-slate-700 hover:bg-slate-50 transition">
                                    Annuler
                                </a>
                                <button type="submit" class="rounded-xl bg-[#061743] hover:bg-[#0a2060] px-5 py-2 text-xs font-black uppercase text-white shadow transition-all">
                                    Enregistrer la qualification
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
