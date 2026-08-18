<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h2 class="text-2xl font-black uppercase tracking-tight text-slate-900 flex items-center gap-2">
                    🎧 Espace Agent Call Center — Mes Rendez-vous
                </h2>
                <p class="text-sm text-slate-500 font-medium">Saisie des prospects et planification des rendez-vous clients</p>
            </div>
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center gap-1.5 bg-amber-100 text-amber-800 text-xs font-bold px-3 py-1.5 rounded-xl border border-amber-200">
                    🎧 Compte Agent : {{ auth()->user()->fullName() }}
                </span>
            </div>
        </div>
    </x-slot>

    <div class="py-8" x-data="{ showNewModal: false }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if(session('success'))
                <div class="p-4 rounded-xl border border-emerald-200 bg-emerald-50 text-sm font-bold text-emerald-800 flex items-center justify-between">
                    <span>✅ {{ session('success') }}</span>
                </div>
            @endif

            <!-- Barre d'Action Principal Agent -->
            <div class="bg-[#061743] p-6 rounded-2xl text-white shadow-xl flex flex-col md:flex-row items-start md:items-center justify-between gap-6 relative overflow-hidden">
                <div class="relative z-10">
                    <span class="inline-flex items-center gap-1.5 bg-white/20 text-white text-xs font-black px-3 py-1 rounded-md uppercase tracking-wider mb-2">
                        📞 Prise de Contact Prospect
                    </span>
                    <h3 class="text-xl font-black uppercase tracking-tight">Fixer un Nouveau Rendez-vous Client</h3>
                    <p class="mt-1 text-xs text-slate-300">Saisissez les coordonnées du prospect et programmez la date. Le RDV sera transmis à l'administrateur pour affectation partenaire.</p>
                </div>
                <button @click="showNewModal = true" 
                        class="shrink-0 inline-flex items-center gap-2 bg-[#f2a90f] hover:bg-[#d99405] text-[#061743] font-black text-xs px-5 py-3 rounded-xl shadow-lg hover:scale-105 transition-all">
                    <span>➕ Nouveau Rendez-vous</span>
                </button>
            </div>

            <!-- Liste des Rendez-vous créés par l'Agent -->
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-100 flex justify-between items-center bg-slate-50">
                    <h3 class="text-sm font-black uppercase tracking-wider text-slate-800">Mes Rendez-vous Enregistrés ({{ $rendezVousList->total() }})</h3>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-sm">
                        <thead>
                            <tr class="border-b border-slate-200 bg-slate-100/70 text-[11px] font-black uppercase tracking-wider text-slate-600">
                                <th class="p-4">Date & Heure</th>
                                <th class="p-4">Prospect</th>
                                <th class="p-4">Objet du RDV</th>
                                <th class="p-4">Partenaire affecté</th>
                                <th class="p-4">Statut RDV</th>
                                <th class="p-4">Résultat Qualification</th>
                                <th class="p-4 text-right">Détails</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 font-medium text-slate-700">
                            @forelse($rendezVousList as $rdv)
                                <tr class="hover:bg-slate-50/80 transition">
                                    <td class="p-4 whitespace-nowrap">
                                        <div class="font-bold text-slate-900">{{ \Carbon\Carbon::parse($rdv->date_rendez_vous)->format('d/m/Y') }}</div>
                                        <div class="text-xs text-slate-400">{{ \Carbon\Carbon::parse($rdv->heure_rendez_vous)->format('H:i') }}</div>
                                    </td>

                                    <td class="p-4">
                                        <div class="font-bold text-slate-900">{{ $rdv->prospect->nomComplet() }}</div>
                                        <div class="text-xs text-slate-500">📞 {{ $rdv->prospect->telephone }}</div>
                                        @if($rdv->prospect->societe)
                                            <div class="text-[11px] text-slate-400">🏢 {{ $rdv->prospect->societe }}</div>
                                        @endif
                                    </td>

                                    <td class="p-4">
                                        <div class="font-semibold text-slate-800 max-w-xs truncate">{{ $rdv->objet }}</div>
                                    </td>

                                    <td class="p-4 whitespace-nowrap">
                                        @if($rdv->partenaire)
                                            <div class="font-bold text-blue-900">🤝 {{ $rdv->partenaire->fullName() }}</div>
                                            <div class="text-[11px] text-slate-400">{{ $rdv->partenaire->institution ?? 'Partenaire' }}</div>
                                        @else
                                            <span class="text-xs font-bold text-amber-600 bg-amber-50 px-2.5 py-1 rounded-md border border-amber-200">En attente d'affectation</span>
                                        @endif
                                    </td>

                                    <td class="p-4 whitespace-nowrap">
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold border {{ $rdv->statusBadgeClasses() }}">
                                            {{ $rdv->statusLabel() }}
                                        </span>
                                    </td>

                                    <td class="p-4">
                                        @if($rdv->qualification)
                                            <div class="space-y-1">
                                                <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-bold border {{ $rdv->qualification->resultatBadgeClasses() }}">
                                                    {{ $rdv->qualification->resultat }}
                                                </span>
                                                <div class="text-[11px] text-slate-500 font-medium">Potentiel: <strong class="text-slate-800">{{ $rdv->qualification->potentiel }}</strong></div>
                                            </div>
                                        @else
                                            <span class="text-xs text-slate-400 italic">Non qualifié</span>
                                        @endif
                                    </td>

                                    <td class="p-4 text-right whitespace-nowrap">
                                        <a href="{{ route('callcenter.agent.show', $rdv) }}" class="inline-flex items-center gap-1 text-xs font-bold text-blue-700 hover:underline">
                                            <span>Consulter</span> ➔
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="p-8 text-center text-slate-400">
                                        Vous n'avez pas encore saisi de rendez-vous. Cliquez sur "Nouveau Rendez-vous" pour commencer.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="p-4 border-t border-slate-100">
                    {{ $rendezVousList->links() }}
                </div>
            </div>
        </div>

        <!-- Modal Saisie Nouveau RDV -->
        <div x-show="showNewModal" x-cloak class="fixed inset-0 z-50 overflow-y-auto bg-slate-900/60 backdrop-blur-sm flex items-center justify-center p-4">
            <div @click.away="showNewModal = false" class="bg-white rounded-3xl max-w-2xl w-full shadow-2xl overflow-hidden transform transition-all">
                <div class="bg-[#061743] p-6 text-white flex justify-between items-center">
                    <div>
                        <h3 class="text-lg font-black uppercase">📞 Nouveau Rendez-vous Client</h3>
                        <p class="text-xs text-slate-300">Coordonnées du prospect et planification de l'entretien</p>
                    </div>
                    <button @click="showNewModal = false" class="text-slate-400 hover:text-white text-xl font-black">&times;</button>
                </div>

                <form method="POST" action="{{ route('callcenter.agent.store') }}" class="p-6 space-y-4">
                    @csrf

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Nom du Prospect *</label>
                            <input type="text" name="nom" required placeholder="Ex: Ben Ali" class="w-full rounded-xl border-slate-200 bg-slate-50 text-sm">
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Prénom du Prospect</label>
                            <input type="text" name="prenom" placeholder="Ex: Mohamed" class="w-full rounded-xl border-slate-200 bg-slate-50 text-sm">
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Téléphone *</label>
                            <input type="text" name="telephone" required placeholder="+216 20 123 456" class="w-full rounded-xl border-slate-200 bg-slate-50 text-sm">
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Email Prospect</label>
                            <input type="email" name="email" placeholder="prospect@societe.com" class="w-full rounded-xl border-slate-200 bg-slate-50 text-sm">
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Société / Entreprise</label>
                            <input type="text" name="societe" placeholder="Ex: SARL Commerce" class="w-full rounded-xl border-slate-200 bg-slate-50 text-sm">
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Secteur d'activité</label>
                            <input type="text" name="secteur" placeholder="Ex: Assurance, Énergie, Tech" class="w-full rounded-xl border-slate-200 bg-slate-50 text-sm">
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Date du RDV *</label>
                            <input type="date" name="date_rendez_vous" min="{{ date('Y-m-d') }}" required class="w-full rounded-xl border-slate-200 bg-slate-50 text-sm">
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Heure du RDV *</label>
                            <input type="time" name="heure_rendez_vous" required class="w-full rounded-xl border-slate-200 bg-slate-50 text-sm">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Objet du Rendez-vous *</label>
                        <input type="text" name="objet" required placeholder="Ex: Présentation offre mutuelle santé entreprise" class="w-full rounded-xl border-slate-200 bg-slate-50 text-sm">
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Notes & Contexte (Optionnel)</label>
                        <textarea name="notes" rows="3" placeholder="Informations complémentaires, disponibilités du client..." class="w-full rounded-xl border-slate-200 bg-slate-50 text-sm"></textarea>
                    </div>

                    <div class="pt-4 border-t border-slate-100 flex justify-end gap-3">
                        <button type="button" @click="showNewModal = false" class="px-5 py-2.5 rounded-xl border border-slate-300 text-xs font-bold text-slate-600 hover:bg-slate-100">
                            Annuler
                        </button>
                        <button type="submit" class="px-6 py-2.5 rounded-xl bg-[#061743] text-xs font-black uppercase text-white hover:bg-[#0a2060]">
                            Enregistrer & Transmettre à l'Admin
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
