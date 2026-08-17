<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h2 class="text-2xl font-black uppercase tracking-tight text-slate-900 flex items-center gap-2">
                    📋 Évaluation & Qualification du Rendez-vous #{{ $rendezVous->id }}
                </h2>
                <p class="text-sm text-slate-500 font-medium">Saisie du résultat commercial et qualification du prospect</p>
            </div>
            <div>
                <a href="{{ route('callcenter.partenaire.index') }}" class="inline-flex items-center gap-2 rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-xs font-bold text-slate-700 hover:bg-slate-50 transition shadow-sm">
                    ⬅ Retour à mes rendez-vous
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Fiche Synthèse Prospect -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h3 class="text-xs font-black uppercase text-slate-400 mb-2">👤 Coordonnées Prospect</h3>
                    <p class="text-lg font-black text-slate-900">{{ $rendezVous->prospect->nomComplet() }}</p>
                    @if($rendezVous->prospect->societe)
                        <p class="text-xs font-bold text-blue-900 mb-2">🏢 {{ $rendezVous->prospect->societe }}</p>
                    @endif
                    <div class="space-y-1 text-xs text-slate-600">
                        <p>📞 <strong>Téléphone :</strong> {{ $rendezVous->prospect->telephone }}</p>
                        @if($rendezVous->prospect->email)<p>📧 <strong>Email :</strong> {{ $rendezVous->prospect->email }}</p>@endif
                        @if($rendezVous->prospect->secteur)<p>🏢 <strong>Secteur :</strong> {{ $rendezVous->prospect->secteur }}</p>@endif
                    </div>
                </div>

                <div>
                    <h3 class="text-xs font-black uppercase text-slate-400 mb-2">📅 Détails de l'Entretien</h3>
                    <p class="text-sm font-bold text-slate-900">Date : {{ \Carbon\Carbon::parse($rendezVous->date_rendez_vous)->format('d/m/Y') }} à {{ \Carbon\Carbon::parse($rendezVous->heure_rendez_vous)->format('H:i') }}</p>
                    <p class="text-xs text-slate-600 mt-1"><strong>Objet :</strong> {{ $rendezVous->objet }}</p>
                    <p class="text-xs text-slate-500 mt-1"><strong>Agent créateur :</strong> {{ $rendezVous->agent->fullName() }}</p>
                    @if($rendezVous->notes)
                        <div class="mt-2 p-3 bg-slate-50 rounded-xl text-xs text-slate-600 border border-slate-200">
                            <strong>Notes de l'Agent :</strong> {{ $rendezVous->notes }}
                        </div>
                    @endif
                </div>
            </div>

            <!-- Formulaire de Qualification -->
            <div class="bg-white p-8 rounded-2xl border border-slate-200 shadow-sm space-y-6">
                <div class="border-b border-slate-100 pb-4">
                    <h3 class="text-base font-black uppercase text-[#061743]">📋 Formulaire de Qualification Commerciale</h3>
                    <p class="text-xs text-slate-500">Renseignez le résultat de votre entretien et évaluez l'opportunité pour l'agent et l'administrateur.</p>
                </div>

                <form method="POST" action="{{ route('callcenter.partenaire.qualify.store', $rendezVous) }}" class="space-y-6">
                    @csrf

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-700 mb-2">Résultat Commercial *</label>
                            <select name="resultat" required class="w-full rounded-xl border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 focus:border-[#061743]">
                                <option value="">-- Sélectionner le résultat --</option>
                                <option value="Prospect qualifié" {{ optional($rendezVous->qualification)->resultat == 'Prospect qualifié' ? 'selected' : '' }}>✅ Prospect qualifié (Opportunité validée)</option>
                                <option value="Intéressé" {{ optional($rendezVous->qualification)->resultat == 'Intéressé' ? 'selected' : '' }}>🟢 Intéressé (Devis à envoyer / Suite à donner)</option>
                                <option value="À rappeler" {{ optional($rendezVous->qualification)->resultat == 'À rappeler' ? 'selected' : '' }}>🟡 À rappeler (Relance nécessaire)</option>
                                <option value="Non intéressé" {{ optional($rendezVous->qualification)->resultat == 'Non intéressé' ? 'selected' : '' }}>🔴 Non intéressé</option>
                                <option value="Prospect non qualifié" {{ optional($rendezVous->qualification)->resultat == 'Prospect non qualifié' ? 'selected' : '' }}>❌ Prospect non qualifié (Hors cible)</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-700 mb-2">Niveau de Potentiel Prospect *</label>
                            <select name="potentiel" required class="w-full rounded-xl border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 focus:border-[#061743]">
                                <option value="">-- Sélectionner le potentiel --</option>
                                <option value="Élevé" {{ optional($rendezVous->qualification)->potentiel == 'Élevé' ? 'selected' : '' }}>🔥 Élevé (Forte valeur commercial)</option>
                                <option value="Moyen" {{ optional($rendezVous->qualification)->potentiel == 'Moyen' ? 'selected' : '' }}>⚡ Moyen (Valeur standard)</option>
                                <option value="Faible" {{ optional($rendezVous->qualification)->potentiel == 'Faible' ? 'selected' : '' }}>❄️ Faible (Faible intérêt)</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase text-slate-700 mb-2">Commentaires Commercial & Remarques (Optionnel)</label>
                        <textarea name="commentaire" rows="4" placeholder="Compte-rendu de l'entretien, besoins spécifiques exprimés par le prospect, prochaines étapes recommandées..." class="w-full rounded-xl border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800">{{ optional($rendezVous->qualification)->commentaire }}</textarea>
                    </div>

                    <div class="pt-4 border-t border-slate-100 flex justify-end gap-3">
                        <a href="{{ route('callcenter.partenaire.index') }}" class="px-5 py-3 rounded-xl border border-slate-300 text-xs font-bold text-slate-600 hover:bg-slate-100">
                            Annuler
                        </a>
                        <button type="submit" class="px-6 py-3 rounded-xl bg-[#061743] hover:bg-[#0a2060] text-xs font-black uppercase text-white shadow-lg transition">
                            💾 Enregistrer & Transmettre la Qualification
                        </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</x-app-layout>
