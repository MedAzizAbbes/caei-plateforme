<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h2 class="text-2xl font-black uppercase tracking-tight text-slate-900 flex items-center gap-2">
                    🎧 Fiche Rendez-vous #{{ $rendezVous->id }}
                </h2>
                <p class="text-sm text-slate-500 font-medium">Consultation du prospect et résultat de la qualification commerciale</p>
            </div>
            <div class="flex items-center gap-2">
                <a href="{{ route('callcenter.agent.index') }}" class="inline-flex items-center gap-2 rounded-xl border border-slate-300 bg-white px-4 py-2.5 text-xs font-bold text-slate-700 hover:bg-slate-50 transition shadow-sm">
                    ⬅ Retour à mes rendez-vous
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- Card Informations Générales -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Details Prospect -->
                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-4">
                    <div class="border-b border-slate-100 pb-3 flex justify-between items-center">
                        <h3 class="text-xs font-black uppercase text-slate-400">👤 Prospect</h3>
                        <span class="text-xs font-bold text-slate-500">ID: #{{ $rendezVous->prospect->id }}</span>
                    </div>

                    <div>
                        <p class="text-lg font-black text-slate-900">{{ $rendezVous->prospect->nomComplet() }}</p>
                        @if($rendezVous->prospect->societe)
                            <p class="text-xs font-bold text-blue-900">🏢 {{ $rendezVous->prospect->societe }}</p>
                        @endif
                    </div>

                    <div class="space-y-1 text-xs text-slate-600">
                        <p>📞 <strong>Téléphone :</strong> {{ $rendezVous->prospect->telephone }}</p>
                        @if($rendezVous->prospect->email)<p>📧 <strong>Email :</strong> {{ $rendezVous->prospect->email }}</p>@endif
                        @if($rendezVous->prospect->secteur)<p>🏢 <strong>Secteur :</strong> {{ $rendezVous->prospect->secteur }}</p>@endif
                    </div>
                </div>

                <!-- Details RDV -->
                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-4">
                    <div class="border-b border-slate-100 pb-3 flex justify-between items-center">
                        <h3 class="text-xs font-black uppercase text-slate-400">📅 Entretien Planifié</h3>
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-[11px] font-bold border {{ $rendezVous->statusBadgeClasses() }}">
                            {{ $rendezVous->statusLabel() }}
                        </span>
                    </div>

                    <div>
                        <p class="text-sm font-bold text-slate-900">Date : {{ \Carbon\Carbon::parse($rendezVous->date_rendez_vous)->format('d/m/Y') }} à {{ \Carbon\Carbon::parse($rendezVous->heure_rendez_vous)->format('H:i') }}</p>
                        <p class="text-xs text-slate-600 mt-1"><strong>Objet :</strong> {{ $rendezVous->objet }}</p>
                    </div>

                    @if($rendezVous->notes)
                        <div class="p-3 bg-slate-50 rounded-xl text-xs text-slate-600 border border-slate-200">
                            <strong>Notes Agent :</strong> {{ $rendezVous->notes }}
                        </div>
                    @endif
                </div>

                <!-- Details Partenaire -->
                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm space-y-4">
                    <div class="border-b border-slate-100 pb-3">
                        <h3 class="text-xs font-black uppercase text-slate-400">🤝 Partenaire Commercial Affecté</h3>
                    </div>

                    @if($rendezVous->partenaire)
                        <div>
                            <p class="text-base font-black text-blue-900">{{ $rendezVous->partenaire->fullName() }}</p>
                            <p class="text-xs text-slate-500">{{ $rendezVous->partenaire->institution ?? 'Partenaire Commercial' }}</p>
                            <p class="text-xs text-slate-400 mt-1">Email: {{ $rendezVous->partenaire->email }}</p>
                        </div>
                    @else
                        <div class="p-4 rounded-xl bg-amber-50 border border-amber-200 text-xs font-bold text-amber-800">
                            ⏳ Rendez-vous en attente d'affectation par l'Administrateur.
                        </div>
                    @endif
                </div>
            </div>

            <!-- Résultat de la Qualification -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
                <div class="border-b border-slate-100 pb-4 mb-4 flex justify-between items-center">
                    <h3 class="text-sm font-black uppercase text-[#061743]">📋 Résultat de la Qualification par le Partenaire</h3>
                </div>

                @if($rendezVous->qualification)
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 bg-emerald-50/50 p-6 rounded-2xl border border-emerald-200">
                        <div>
                            <span class="block text-xs font-bold uppercase text-slate-500 mb-1">Résultat Commercial</span>
                            <span class="inline-flex items-center px-3 py-1 rounded-xl text-sm font-black bg-emerald-100 text-emerald-900 border border-emerald-300">
                                {{ $rendezVous->qualification->resultat }}
                            </span>
                        </div>

                        <div>
                            <span class="block text-xs font-bold uppercase text-slate-500 mb-1">Niveau de Potentiel</span>
                            <span class="inline-flex items-center px-3 py-1 rounded-xl text-sm font-bold {{ $rendezVous->qualification->potentielBadgeClasses() }}">
                                {{ $rendezVous->qualification->potentiel }}
                            </span>
                        </div>

                        <div>
                            <span class="block text-xs font-bold uppercase text-slate-500 mb-1">Date d'Évaluation</span>
                            <span class="text-xs font-bold text-slate-700">
                                {{ $rendezVous->qualification->qualified_at ? $rendezVous->qualification->qualified_at->format('d/m/Y H:i') : 'Enregistré' }}
                            </span>
                        </div>

                        @if($rendezVous->qualification->commentaire)
                            <div class="md:col-span-3 pt-4 border-t border-emerald-200/60">
                                <span class="block text-xs font-bold uppercase text-slate-500 mb-1">Commentaires du Partenaire :</span>
                                <p class="text-sm text-slate-700 bg-white p-4 rounded-xl border border-slate-200 font-medium">
                                    {{ $rendezVous->qualification->commentaire }}
                                </p>
                            </div>
                        @endif
                    </div>
                @else
                    <div class="p-8 text-center text-slate-400 bg-slate-50 rounded-2xl border border-dashed border-slate-200">
                        <p class="text-sm font-bold">Le partenaire n'a pas encore saisi la qualification de cet entretien.</p>
                        <p class="text-xs mt-1">Le résultat apparaîtra ici automatiquement dès que l'évaluation sera validée.</p>
                    </div>
                @endif
            </div>

            <!-- Historique des actions -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
                <h3 class="text-xs font-black uppercase text-slate-400 mb-4">📜 Historique du Workflow</h3>
                <ul class="space-y-3">
                    @foreach($rendezVous->histories as $history)
                        <li class="p-3 bg-slate-50 rounded-xl text-xs flex justify-between items-center border border-slate-200">
                            <div>
                                <span class="font-bold text-slate-900">{{ $history->description }}</span>
                                <span class="text-slate-400 ml-2">par {{ $history->user ? $history->user->fullName() : 'Système' }}</span>
                            </div>
                            <span class="text-[11px] font-semibold text-slate-400">{{ $history->created_at->format('d/m/Y H:i') }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
    </div>
</x-app-layout>
