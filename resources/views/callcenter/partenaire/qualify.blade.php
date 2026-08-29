<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h2 class="text-2xl font-black uppercase tracking-tight text-slate-900 flex items-center gap-2">
                    <span style="color: #7f0504;">📋 Qualification Commerciale — RDV #{{ $rendezVous->id }}</span>
                </h2>
                <p class="text-xs text-slate-500 font-medium">Saisie du compte-rendu d'entretien et évaluation du potentiel prospect</p>
            </div>
            <div>
                <a href="{{ route('callcenter.partenaire.index') }}" class="inline-flex items-center gap-2 rounded-xl border border-red-200 bg-red-50 px-4 py-2 text-xs font-bold text-red-900 hover:bg-red-100 transition shadow-2xs">
                    ⬅ Retour aux rendez-vous
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                <!-- 1. Colonne Gauche : Détails Prospect & Entretien -->
                <div class="lg:col-span-1 space-y-6">
                    <!-- Fiche Prospect -->
                    <div class="bg-white rounded-2xl border border-slate-200 p-6 shadow-2xs space-y-4 hover:border-red-200 transition">
                        <div class="border-b border-slate-100 pb-3 flex items-center justify-between">
                            <h3 class="text-xs font-black uppercase tracking-wider text-slate-400">👤 Prospect à Qualifier</h3>
                            <span class="text-[11px] font-bold text-red-800 bg-red-50 px-2 py-0.5 rounded-md border border-red-100">ID #{{ $rendezVous->prospect->id }}</span>
                        </div>

                        <div class="flex items-center gap-3">
                            <div class="w-11 h-11 rounded-2xl bg-red-100 text-[#7f0504] font-black flex items-center justify-center text-sm shrink-0 shadow-2xs">
                                {{ strtoupper(substr($rendezVous->prospect->nom, 0, 1) . substr($rendezVous->prospect->prenom, 0, 1)) ?: '👤' }}
                            </div>
                            <div>
                                <h4 class="text-base font-black text-slate-900 leading-tight">{{ $rendezVous->prospect->nomComplet() }}</h4>
                                @if($rendezVous->prospect->societe)
                                    <p class="text-xs font-bold text-red-800 mt-0.5">🏢 {{ $rendezVous->prospect->societe }}</p>
                                @endif
                            </div>
                        </div>

                        <div class="space-y-2 text-xs text-slate-600 border-t border-slate-100 pt-3">
                            <div class="flex items-center gap-2">
                                <span class="font-bold text-slate-400">📞 Téléphone :</span>
                                <a href="tel:{{ $rendezVous->prospect->telephone }}" class="font-black text-[#7f0504] hover:underline bg-red-50 px-2 py-0.5 rounded-md border border-red-100">
                                    {{ $rendezVous->prospect->telephone }}
                                </a>
                            </div>
                            @if($rendezVous->prospect->email)
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-slate-400">📧 Email :</span>
                                    <span class="text-slate-800 font-semibold break-all">{{ $rendezVous->prospect->email }}</span>
                                </div>
                            @endif
                            @if($rendezVous->prospect->secteur)
                                <div class="flex items-center gap-2">
                                    <span class="font-bold text-slate-400">🏢 Secteur :</span>
                                    <span class="text-slate-800 font-semibold">{{ $rendezVous->prospect->secteur }}</span>
                                </div>
                            @endif
                        </div>

                        <div class="border-t border-slate-100 pt-3 space-y-2 text-xs">
                            <div class="font-black text-slate-900 flex items-center gap-2">
                                <span>📅 {{ \Carbon\Carbon::parse($rendezVous->date_rendez_vous)->format('d/m/Y') }}</span>
                                <span class="text-slate-400">|</span>
                                <span>⏰ {{ \Carbon\Carbon::parse($rendezVous->heure_rendez_vous)->format('H:i') }}</span>
                            </div>
                            <div><strong class="text-slate-500">Objet du RDV :</strong> <span class="text-slate-800 font-semibold">{{ $rendezVous->objet }}</span></div>
                            <div><strong class="text-slate-500">Agent créateur :</strong> <span class="text-slate-800 font-semibold">🎧 {{ $rendezVous->agent->fullName() }}</span></div>
                        </div>

                        @if($rendezVous->notes)
                            <div class="p-3 bg-slate-50 rounded-xl text-xs text-slate-700 border border-slate-200">
                                <strong class="font-bold text-slate-900">📝 Notes transmises par l'agent :</strong>
                                <p class="mt-1 font-medium leading-relaxed text-slate-600">{{ $rendezVous->notes }}</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- 2. Colonne Droite : Formulaire d'Évaluation Commerciale -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-3xl border border-slate-200 p-6 sm:p-8 shadow-sm space-y-6">
                        <div class="border-b border-slate-100 pb-4 flex items-center justify-between">
                            <div>
                                <h3 class="text-lg font-black uppercase text-slate-900 tracking-tight flex items-center gap-2">
                                    <span>🎯</span>
                                    <span>Résultat de l'Entretien Commercial</span>
                                </h3>
                                <p class="text-xs text-slate-400 mt-0.5">Saisissez l'issue de l'entretien et votre appréciation du potentiel</p>
                            </div>
                        </div>

                        <form method="POST" action="{{ route('callcenter.partenaire.qualify.store', $rendezVous) }}" class="space-y-6">
                            @csrf

                            @php
                                $currentResultat = optional($rendezVous->qualification)->resultat;
                            @endphp

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Résultat de la qualification *</label>
                                    <select name="resultat" required class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm font-bold text-slate-800 focus:border-[#7f0504] focus:ring-[#7f0504]">
                                        <option value="">-- Sélectionner le résultat --</option>
                                        <option value="Prospect qualifié" {{ $currentResultat === 'Prospect qualifié' ? 'selected' : '' }}>🟢 Prospect qualifié (Opportunité validée)</option>
                                        <option value="Prospect intéressé" {{ ($currentResultat === 'Prospect intéressé' || $currentResultat === 'Intéressé') ? 'selected' : '' }}>🟡 Prospect intéressé (À relancer)</option>
                                        <option value="À rappeler" {{ $currentResultat === 'À rappeler' ? 'selected' : '' }}>⏰ À rappeler (Nouveau rdv nécessaire)</option>
                                        <option value="Non intéressé" {{ $currentResultat === 'Non intéressé' ? 'selected' : '' }}>🔴 Non intéressé (Hors cible)</option>
                                        <option value="Non joignable" {{ $currentResultat === 'Non joignable' ? 'selected' : '' }}>📞 Non joignable</option>
                                        <option value="Refus" {{ $currentResultat === 'Refus' ? 'selected' : '' }}>❌ Refus commercial</option>
                                    </select>
                                </div>

                                <div>
                                    <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Niveau de Potentiel *</label>
                                    <select name="potentiel" required class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm font-bold text-slate-800 focus:border-[#7f0504] focus:ring-[#7f0504]">
                                        <option value="">-- Sélectionner le potentiel --</option>
                                        <option value="Élevé" {{ optional($rendezVous->qualification)->potentiel == 'Élevé' ? 'selected' : '' }}>🔥 Élevé (Forte opportunité de transformation)</option>
                                        <option value="Moyen" {{ optional($rendezVous->qualification)->potentiel == 'Moyen' ? 'selected' : '' }}>⚡ Moyen (Opportunité standard)</option>
                                        <option value="Faible" {{ optional($rendezVous->qualification)->potentiel == 'Faible' ? 'selected' : '' }}>❄️ Faible (Opportunité secondaire)</option>
                                    </select>
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-bold text-slate-700 uppercase mb-2">Synthèse Commerciale & Commentaires</label>
                                <textarea name="commentaire" rows="5" placeholder="Rédigez ici le compte-rendu d'entretien, les besoins spécifiques du client, l'historique des échanges ou la date prévue pour la relance..." class="w-full rounded-2xl border border-slate-200 bg-slate-50 p-4 text-sm font-medium text-slate-800 focus:border-[#7f0504] focus:ring-[#7f0504] leading-relaxed">{{ optional($rendezVous->qualification)->commentaire }}</textarea>
                            </div>

                            <div class="flex justify-end gap-3 pt-4 border-t border-slate-100">
                                <a href="{{ route('callcenter.partenaire.index') }}" class="px-5 py-2.5 rounded-xl border border-slate-300 text-xs font-bold text-slate-700 hover:bg-slate-50 transition">
                                    Annuler
                                </a>
                                <button type="submit" class="px-6 py-2.5 rounded-xl text-xs font-black uppercase text-white shadow transition hover:opacity-95 cursor-pointer" style="background-color: #7f0504;">
                                    ✔ Enregistrer la Qualification
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>

        </div>
    </div>
</x-app-layout>
