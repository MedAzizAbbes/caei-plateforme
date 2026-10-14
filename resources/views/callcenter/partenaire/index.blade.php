<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h2 class="text-2xl font-black uppercase tracking-tight text-slate-900 flex items-center gap-2">
                    <span style="color: #7f0504;">🤝 Espace Partenaire Call Center</span>
                </h2>
                <p class="text-xs text-slate-500 font-medium">Gestion des opportunités attribuées et évaluation de la qualification commerciale</p>
            </div>
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center gap-2 bg-blue-50 border border-blue-200 text-blue-950 text-xs font-bold px-3.5 py-1.5 rounded-xl shadow-2xs">
                    <span>🤝 {{ auth()->user()->fullName() }}</span>
                    @if(auth()->user()->institution)
                        <span class="bg-blue-200 text-blue-900 px-2 py-0.5 rounded-md text-[10px] font-black">{{ auth()->user()->institution }}</span>
                    @endif
                </span>
            </div>
        </div>
    </x-slot>

    <div class="py-8" x-data="{
        modalOpen: false,
        modalData: {},
        showDetails(data) {
            this.modalData = data;
            this.modalOpen = true;
        }
    }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if(session('success'))
                <div class="p-4 rounded-2xl border border-emerald-200 bg-emerald-50 text-sm font-bold text-emerald-800 flex items-center justify-between shadow-2xs">
                    <div class="flex items-center gap-2">
                        <span class="text-base">✅</span>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            @if(session('error'))
                <div class="p-4 rounded-2xl border border-red-200 bg-red-50 text-sm font-bold text-red-800 flex items-center justify-between shadow-2xs">
                    <div class="flex items-center gap-2">
                        <span class="text-base">⚠️</span>
                        <span>{{ session('error') }}</span>
                    </div>
                </div>
            @endif



            <!-- 1. Bannière d'Accueil Rouge Call Center Partenaire -->
            <div class="rounded-3xl p-8 text-white shadow-xl flex flex-col md:flex-row items-start md:items-center justify-between gap-6 relative overflow-hidden"
                 style="background: linear-gradient(135deg, rgba(127, 5, 4, 0.95) 0%, rgba(153, 27, 27, 0.95) 50%, rgba(74, 2, 2, 0.98) 100%), url('{{ asset('assets/img/service_callcenter_1786525651775.jpg') }}') center/cover fixed no-repeat;">
                <div class="absolute -right-6 -bottom-10 opacity-20 text-9xl pointer-events-none select-none">🤝</div>
                <div class="relative z-10 max-w-2xl">
                    <span class="inline-flex items-center gap-1.5 bg-white/20 backdrop-blur-md text-white text-[11px] font-black px-3.5 py-1 rounded-lg uppercase tracking-wider mb-3 border border-white/30">
                        🤝 Suivi des opportunités commerciales
                    </span>
                    <h3 class="text-2xl md:text-3xl font-black tracking-tight uppercase">Vos Rendez-vous Prospects à Traiter</h3>
                    <p class="mt-2 text-xs md:text-sm text-red-50 leading-relaxed font-normal">
                        Consultez les informations des prospects transmis par l'administrateur, réalisez l'entretien et enregistrez le résultat de la qualification commerciale.
                    </p>
                </div>
            </div>

            @php
                $totalCount = $totalCount ?? auth()->user()->rendezVousAsPartenaire()->count();
                $toQualifyCount = $toQualifyCount ?? auth()->user()->rendezVousAsPartenaire()->doesntHave('qualification')->count();
                $qualifiedCount = $qualifiedCount ?? auth()->user()->rendezVousAsPartenaire()->has('qualification')->count();
                $highPotentialCount = $highPotentialCount ?? auth()->user()->rendezVousAsPartenaire()->whereHas('qualification', fn($q) => $q->where('potentiel', 'Élevé')->orWhere('potentiel', 'Eleve'))->count();
                $currentFilter = request('filtre');
            @endphp

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                {{-- Total Attribués --}}
                <a href="{{ route('callcenter.partenaire.index') }}"
                   class="bg-white p-5 rounded-2xl border shadow-2xs flex items-center gap-4 transition cursor-pointer
                          {{ !$currentFilter ? 'border-blue-400 ring-2 ring-blue-200' : 'border-slate-200 hover:border-blue-200' }}">
                    <div class="w-12 h-12 rounded-2xl {{ !$currentFilter ? 'bg-blue-100' : 'bg-blue-50' }} text-blue-800 font-black text-xl flex items-center justify-center shrink-0">
                        🤝
                    </div>
                    <div>
                        <p class="text-[11px] font-bold uppercase text-slate-400">Total Attribués</p>
                        <p class="text-2xl font-black text-slate-900 mt-0.5">{{ $totalCount }}</p>
                    </div>
                </a>

                {{-- À Qualifier --}}
                <a href="{{ route('callcenter.partenaire.index', ['filtre' => 'a_qualifier']) }}"
                   class="bg-white p-5 rounded-2xl border shadow-2xs flex items-center gap-4 transition cursor-pointer
                          {{ $currentFilter === 'a_qualifier' ? 'border-amber-400 ring-2 ring-amber-200' : 'border-slate-200 hover:border-amber-200' }}">
                    <div class="w-12 h-12 rounded-2xl {{ $currentFilter === 'a_qualifier' ? 'bg-amber-100' : 'bg-amber-50' }} text-amber-800 font-black text-xl flex items-center justify-center shrink-0">
                        ⏳
                    </div>
                    <div>
                        <p class="text-[11px] font-bold uppercase text-slate-400">À Qualifier</p>
                        <p class="text-2xl font-black text-amber-800 mt-0.5">{{ $toQualifyCount }}</p>
                    </div>
                </a>

                {{-- RDV Qualifiés --}}
                <a href="{{ route('callcenter.partenaire.index', ['filtre' => 'qualifie']) }}"
                   class="bg-white p-5 rounded-2xl border shadow-2xs flex items-center gap-4 transition cursor-pointer
                          {{ $currentFilter === 'qualifie' ? 'border-emerald-400 ring-2 ring-emerald-200' : 'border-slate-200 hover:border-emerald-200' }}">
                    <div class="w-12 h-12 rounded-2xl {{ $currentFilter === 'qualifie' ? 'bg-emerald-100' : 'bg-emerald-50' }} text-emerald-800 font-black text-xl flex items-center justify-center shrink-0">
                        🎯
                    </div>
                    <div>
                        <p class="text-[11px] font-bold uppercase text-slate-400">RDV Qualifiés</p>
                        <p class="text-2xl font-black text-emerald-800 mt-0.5">{{ $qualifiedCount }}</p>
                    </div>
                </a>

                {{-- Potentiel Élevé --}}
                <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-2xs flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-amber-100 text-amber-900 font-black text-xl flex items-center justify-center shrink-0">
                        🔥
                    </div>
                    <div>
                        <p class="text-[11px] font-bold uppercase text-slate-400">Potentiel Élevé</p>
                        <p class="text-2xl font-black text-amber-900 mt-0.5">{{ $highPotentialCount }}</p>
                    </div>
                </div>
            </div>

            {{-- Indicateur filtre actif --}}
            @if($currentFilter)
                <div class="flex items-center gap-3 px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-2xl text-xs font-bold text-slate-700">
                    <span>🔍 Filtre actif :
                        @if($currentFilter === 'a_qualifier') <span class="text-amber-700">À Qualifier</span>
                        @elseif($currentFilter === 'qualifie') <span class="text-emerald-700">RDV Qualifiés</span>
                        @endif
                    </span>
                    <a href="{{ route('callcenter.partenaire.index') }}" class="ml-auto inline-flex items-center gap-1 px-3 py-1 rounded-lg bg-slate-200 hover:bg-slate-300 text-slate-700 text-[11px] font-black transition">
                        ✕ Réinitialiser
                    </a>
                </div>
            @endif

            <div id="rdv-ajax-container">
            <!-- 3. Formulaire de filtres du tableau -->
            <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200/90 shadow-2xs mb-4">
                <form method="GET" action="{{ route('callcenter.partenaire.index') }}" id="rdv-filter-form" class="space-y-3">
                    @if(request('filtre'))
                        <input type="hidden" name="filtre" value="{{ request('filtre') }}">
                    @endif

                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-3">
                        {{-- Filtre par Nom / Prénom --}}
                        <div>
                            <label for="search_nom" class="block text-[11px] font-black uppercase text-slate-500 mb-1">
                                👤 Prospect
                            </label>
                            <input type="text"
                                   id="search_nom"
                                   name="search_nom"
                                   value="{{ request('search_nom') }}"
                                   placeholder="Nom ou prénom..."
                                   class="w-full text-xs rounded-xl border-slate-200 focus:border-[#7f0504] focus:ring-1 focus:ring-[#7f0504] placeholder:text-slate-400 py-2 px-3 shadow-2xs">
                        </div>

                        {{-- Filtre par Statut --}}
                        <div>
                            <label for="statut" class="block text-[11px] font-black uppercase text-slate-500 mb-1">
                                📌 Statut
                            </label>
                            <select id="statut"
                                    name="statut"
                                    class="w-full text-xs rounded-xl border-slate-200 focus:border-[#7f0504] focus:ring-1 focus:ring-[#7f0504] text-slate-700 py-2 px-3 shadow-2xs bg-white cursor-pointer">
                                <option value="">Tous les statuts</option>
                                <option value="a_qualifier" {{ request('statut') === 'a_qualifier' ? 'selected' : '' }}>⏳ À qualifier</option>
                                <option value="qualifie" {{ request('statut') === 'qualifie' ? 'selected' : '' }}>🎯 Qualifié</option>
                                <option value="qualification_en_cours" {{ request('statut') === 'qualification_en_cours' ? 'selected' : '' }}>📋 Qualification en cours</option>
                                <option value="affecte" {{ request('statut') === 'affecte' ? 'selected' : '' }}>🤝 Affecté</option>
                                <option value="annule" {{ request('statut') === 'annule' ? 'selected' : '' }}>❌ Annulé</option>
                                <option value="reporte" {{ request('statut') === 'reporte' ? 'selected' : '' }}>🔄 Reporté</option>
                                <option value="non_effectue" {{ request('statut') === 'non_effectue' ? 'selected' : '' }}>⚠️ Non effectué</option>
                            </select>
                        </div>

                        {{-- Filtre par Ville --}}
                        <div>
                            <label for="search_ville" class="block text-[11px] font-black uppercase text-slate-500 mb-1">
                                🏙️ Ville
                            </label>
                            <input type="text"
                                   id="search_ville"
                                   name="search_ville"
                                   value="{{ request('search_ville') }}"
                                   placeholder="Ex: Paris, Lyon..."
                                   class="w-full text-xs rounded-xl border-slate-200 focus:border-[#7f0504] focus:ring-1 focus:ring-[#7f0504] placeholder:text-slate-400 py-2 px-3 shadow-2xs">
                        </div>

                        {{-- Filtre par Code Postal --}}
                        <div>
                            <label for="search_code_postal" class="block text-[11px] font-black uppercase text-slate-500 mb-1">
                                📮 Code Postal
                            </label>
                            <input type="text"
                                   id="search_code_postal"
                                   name="search_code_postal"
                                   value="{{ request('search_code_postal') }}"
                                   placeholder="Ex: 75001, 59124..."
                                   class="w-full text-xs rounded-xl border-slate-200 focus:border-[#7f0504] focus:ring-1 focus:ring-[#7f0504] placeholder:text-slate-400 py-2 px-3 shadow-2xs">
                        </div>

                        {{-- Filtre par Date de début --}}
                        <div>
                            <label for="search_date_debut" class="block text-[11px] font-black uppercase text-slate-500 mb-1">
                                📅 Du (Date début)
                            </label>
                            <input type="date"
                                   id="search_date_debut"
                                   name="search_date_debut"
                                   value="{{ request('search_date_debut') }}"
                                   class="w-full text-xs rounded-xl border-slate-200 focus:border-[#7f0504] focus:ring-1 focus:ring-[#7f0504] py-2 px-3 shadow-2xs">
                        </div>

                        {{-- Filtre par Date de fin --}}
                        <div>
                            <label for="search_date_fin" class="block text-[11px] font-black uppercase text-slate-500 mb-1">
                                📅 Au (Date fin)
                            </label>
                            <input type="date"
                                   id="search_date_fin"
                                   name="search_date_fin"
                                   value="{{ request('search_date_fin') }}"
                                   class="w-full text-xs rounded-xl border-slate-200 focus:border-[#7f0504] focus:ring-1 focus:ring-[#7f0504] py-2 px-3 shadow-2xs">
                        </div>
                    </div>

                    <div class="flex flex-wrap items-center justify-between gap-2 pt-2 border-t border-slate-100">
                        <div class="flex items-center gap-2">
                            <button type="submit"
                                    class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl text-xs font-black text-white shadow-2xs hover:opacity-95 transition cursor-pointer"
                                    style="background-color: #7f0504;">
                                <span>🔍 Filtrer</span>
                            </button>

                            @if(request('search_nom') || request('statut') || request('search_ville') || request('search_code_postal') || request('search_date_debut') || request('search_date_fin'))
                                <a href="{{ route('callcenter.partenaire.index', array_filter(['filtre' => request('filtre')])) }}"
                                   class="inline-flex items-center gap-1 px-3 py-2 rounded-xl bg-slate-100 hover:bg-slate-200 text-slate-700 text-xs font-bold transition">
                                    ✕ Effacer les filtres
                                </a>
                            @endif
                        </div>

                        <span class="text-xs text-slate-500 font-semibold">
                            Affichage de <strong class="text-slate-900">{{ count($rendezVousList) }}</strong> sur <strong class="text-slate-900">{{ $rendezVousList->total() }}</strong> rendez-vous attribué(s)
                        </span>
                    </div>
                </form>
            </div>

            <!-- TABLEAU -->
            <div class="bg-white rounded-2xl border border-slate-200/80 shadow-2xs overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-sm">
                        <thead>
                            <tr class="border-b border-slate-200 bg-slate-100/70 text-[11px] font-black uppercase tracking-wider text-slate-600">
                                <th class="p-4">Date & Heure</th>
                                <th class="p-4">Nom Prénom</th>
                                <th class="p-4">Num Tél</th>
                                <th class="p-4">Num de rue</th>
                                <th class="p-4">Code Postal</th>
                                <th class="p-4">Ville</th>
                                <th class="p-4">Commentaire</th>
                                <th class="p-4 text-center">Qualifié</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 font-medium text-slate-700">
                            @forelse($rendezVousList as $rdv)
                                <tr class="{{ $rdv->qualificationRowClasses() }}" style="{{ $rdv->qualificationRowStyle() }}">
                                    {{-- 1. Date & Heure --}}
                                    <td class="p-4 whitespace-nowrap">
                                        <div class="font-bold text-slate-900">{{ \Carbon\Carbon::parse($rdv->date_rendez_vous)->format('d/m/Y') }}</div>
                                        <div class="text-xs text-slate-400 font-semibold">{{ \Carbon\Carbon::parse($rdv->heure_rendez_vous)->format('H:i') }}</div>
                                    </td>

                                    {{-- 2. Nom Prénom --}}
                                    <td class="p-4 whitespace-nowrap">
                                        <div class="font-bold text-slate-900">{{ $rdv->prospect->nomComplet() }}</div>
                                        @if($rdv->prospect->societe)
                                            <div class="text-[11px] text-slate-500 font-medium truncate max-w-[150px]" title="{{ $rdv->prospect->societe }}">🏢 {{ $rdv->prospect->societe }}</div>
                                        @endif
                                    </td>

                                    {{-- 3. Num Tél --}}
                                    <td class="p-4 whitespace-nowrap">
                                        <a href="tel:{{ $rdv->prospect->telephone }}" class="inline-flex items-center gap-1 text-xs font-bold text-[#7f0504] hover:underline bg-red-50/80 border border-red-100 px-2.5 py-1 rounded-lg">
                                            📞 {{ $rdv->prospect->telephone }}
                                        </a>
                                    </td>

                                    {{-- 4. Num de rue --}}
                                    <td class="p-4">
                                        <span class="text-xs text-slate-700 font-medium max-w-[160px] block truncate" title="{{ $rdv->prospect->adresse }}">
                                            {{ $rdv->prospect->adresse ?: '-' }}
                                        </span>
                                    </td>

                                    {{-- 5. Code Postal --}}
                                    <td class="p-4 whitespace-nowrap">
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-md text-xs font-bold bg-slate-100 text-slate-700">
                                            {{ $rdv->prospect->code_postal ?: '-' }}
                                        </span>
                                    </td>

                                    {{-- 6. Ville --}}
                                    <td class="p-4 whitespace-nowrap">
                                        <span class="text-xs font-bold text-slate-800">
                                            {{ $rdv->prospect->ville ?: '-' }}
                                        </span>
                                    </td>

                                    {{-- 7. Commentaire --}}
                                    <td class="p-4">
                                        @php
                                            $commentaireText = $rdv->qualification?->commentaire ?: ($rdv->notes ?: null);
                                        @endphp
                                        @if($commentaireText)
                                            <span class="text-xs text-slate-600 block max-w-[170px] truncate cursor-help" title="{{ $commentaireText }}">
                                                💬 {{ $commentaireText }}
                                            </span>
                                        @else
                                            <span class="text-xs text-slate-400 italic">-</span>
                                        @endif
                                    </td>

                                    {{-- 8. Qualifié (Statut & Actions : Voir, Modifier, Supprimer) --}}
                                    <td class="p-4 whitespace-nowrap">
                                        <div class="flex items-center justify-between gap-3">
                                            {{-- Statut / Résultat --}}
                                            <div>
                                                @if($rdv->qualification)
                                                    <div class="space-y-0.5">
                                                        <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[11px] font-bold {{ $rdv->qualification->resultatBadgeClasses() }}">
                                                            {{ $rdv->qualification->resultat }}
                                                        </span>
                                                        @if($rdv->qualification->potentiel)
                                                            <div class="text-[10px] text-slate-500 font-semibold">Potentiel: <strong class="text-slate-800">{{ $rdv->qualification->potentiel }}</strong></div>
                                                        @endif
                                                    </div>
                                                @else
                                                    <span class="inline-flex items-center text-[11px] font-bold text-amber-800 bg-amber-50 px-2.5 py-1 rounded-md border border-amber-200">
                                                        ⏳ À qualifier
                                                    </span>
                                                @endif
                                            </div>

                                            {{-- 3 Icônes : Voir, Modifier, Supprimer --}}
                                            <div class="flex items-center gap-1 shrink-0">
                                                {{-- 1. Icône Voir --}}
                                                <button type="button"
                                                        @click="showDetails(@js([
                                                            'id' => $rdv->id,
                                                            'date' => \Carbon\Carbon::parse($rdv->date_rendez_vous)->format('d/m/Y'),
                                                            'heure' => \Carbon\Carbon::parse($rdv->heure_rendez_vous)->format('H:i'),
                                                            'nom_complet' => $rdv->prospect->nomComplet(),
                                                            'telephone' => $rdv->prospect->telephone,
                                                            'email' => $rdv->prospect->email,
                                                            'adresse' => $rdv->prospect->adresse,
                                                            'code_postal' => $rdv->prospect->code_postal,
                                                            'ville' => $rdv->prospect->ville,
                                                            'societe' => $rdv->prospect->societe,
                                                            'secteur' => $rdv->prospect->secteur,
                                                            'agent' => $rdv->agent ? $rdv->agent->fullName() : '-',
                                                            'objet' => $rdv->objet,
                                                            'notes' => $rdv->notes,
                                                            'is_qualifie' => (bool) $rdv->qualification,
                                                            'resultat' => $rdv->qualification?->resultat,
                                                            'potentiel' => $rdv->qualification?->potentiel,
                                                            'commentaire' => $rdv->qualification?->commentaire,
                                                            'qualified_at' => $rdv->qualification?->qualified_at ? $rdv->qualification->qualified_at->format('d/m/Y H:i') : null,
                                                            'qualify_url' => route('callcenter.partenaire.qualify', $rdv)
                                                        ]))"
                                                        class="p-2 rounded-xl text-blue-600 bg-blue-50 hover:bg-blue-100 hover:text-blue-800 border border-blue-200 transition shadow-2xs cursor-pointer inline-flex items-center justify-center"
                                                        title="Voir les détails complets">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                                    </svg>
                                                </button>

                                                {{-- 2. Icône Modifier --}}
                                                <a href="{{ route('callcenter.partenaire.qualify', $rdv) }}"
                                                   class="p-2 rounded-xl text-amber-700 bg-amber-50 hover:bg-amber-100 hover:text-amber-900 border border-amber-200 transition shadow-2xs cursor-pointer inline-flex items-center justify-center"
                                                   title="{{ $rdv->qualification ? 'Modifier la qualification' : 'Qualifier ce rendez-vous' }}">
                                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                                    </svg>
                                                </a>

                                                {{-- 3. Icône Supprimer --}}
                                                @if($rdv->qualification)
                                                    <form method="POST" action="{{ route('callcenter.partenaire.qualification.destroy', $rdv) }}"
                                                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer la qualification de ce prospect ? Le rendez-vous sera remis à l\'état « À qualifier ».');"
                                                          class="inline">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                                class="p-2 rounded-xl text-red-600 bg-red-50 hover:bg-red-100 hover:text-red-800 border border-red-200 transition shadow-2xs cursor-pointer inline-flex items-center justify-center"
                                                                title="Supprimer la qualification">
                                                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                            </svg>
                                                        </button>
                                                    </form>
                                                @else
                                                    <button type="button" disabled
                                                            class="p-2 rounded-xl text-slate-300 bg-slate-50 border border-slate-200/60 cursor-not-allowed opacity-50 inline-flex items-center justify-center"
                                                            title="Aucune qualification à supprimer">
                                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                                        </svg>
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="p-8 text-center text-slate-500">
                                        Aucun rendez-vous ne vous est attribué pour le moment.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Pagination Personnalisée Call Center : |◀  ◀  [ 1 ]  ▶  ▶| --}}
                <div class="p-4 border-t border-slate-100 bg-slate-50 flex flex-col sm:flex-row items-center justify-between gap-3">
                    <div class="text-xs text-slate-500 font-semibold">
                        Affichage de <span class="font-bold text-slate-800">{{ $rendezVousList->firstItem() ?? 0 }}</span> à <span class="font-bold text-slate-800">{{ $rendezVousList->lastItem() ?? 0 }}</span> sur <span class="font-bold text-slate-800">{{ $rendezVousList->total() }}</span> rendez-vous attribué(s)
                    </div>

                    @if($rendezVousList->lastPage() > 1)
                        @php
                            $currentPage = $rendezVousList->currentPage();
                            $lastPage = $rendezVousList->lastPage();
                            $window = 2;
                            $startPage = max(1, $currentPage - $window);
                            $endPage = min($lastPage, $currentPage + $window);
                        @endphp

                        <div class="inline-flex items-center gap-1 bg-slate-200/70 p-1.5 rounded-xl border border-slate-300/80 shadow-2xs">
                            {{-- 1. Première page (|◀) --}}
                            @if($rendezVousList->onFirstPage())
                                <span class="w-8 h-8 rounded-lg flex items-center justify-center text-slate-400 cursor-not-allowed opacity-50 select-none" title="Première page">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M6 6h2.5v12H6zm3.5 6l8-6v12z"/>
                                    </svg>
                                </span>
                            @else
                                <a href="{{ $rendezVousList->url(1) }}" class="w-8 h-8 rounded-lg flex items-center justify-center text-slate-700 hover:bg-white hover:text-[#7f0504] hover:shadow-xs transition" title="Première page (page 1)">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M6 6h2.5v12H6zm3.5 6l8-6v12z"/>
                                    </svg>
                                </a>
                            @endif

                            {{-- 2. Page précédente (◀) --}}
                            @if($rendezVousList->onFirstPage())
                                <span class="w-8 h-8 rounded-lg flex items-center justify-center text-slate-400 cursor-not-allowed opacity-50 select-none" title="Page précédente">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M16 19V5l-11 7z"/>
                                    </svg>
                                </span>
                            @else
                                <a href="{{ $rendezVousList->previousPageUrl() }}" class="w-8 h-8 rounded-lg flex items-center justify-center text-slate-700 hover:bg-white hover:text-[#7f0504] hover:shadow-xs transition" title="Page précédente (page {{ $currentPage - 1 }})">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M16 19V5l-11 7z"/>
                                    </svg>
                                </a>
                            @endif

                            {{-- Ellipse de début si nécessaire --}}
                            @if($startPage > 1)
                                <a href="{{ $rendezVousList->url(1) }}" class="w-8 h-8 rounded-lg flex items-center justify-center text-xs font-bold text-slate-700 hover:bg-white transition">1</a>
                                @if($startPage > 2)
                                    <span class="w-6 text-center text-slate-400 text-xs">…</span>
                                @endif
                            @endif

                            {{-- 3. Numéros de page --}}
                            @for($page = $startPage; $page <= $endPage; $page++)
                                @if($page == $currentPage)
                                    <span class="w-8 h-8 rounded-lg bg-white border border-slate-300 shadow-xs flex items-center justify-center text-xs font-black text-[#7f0504]" title="Page courante">
                                        {{ $page }}
                                    </span>
                                @else
                                    <a href="{{ $rendezVousList->url($page) }}" class="w-8 h-8 rounded-lg flex items-center justify-center text-xs font-bold text-slate-700 hover:bg-white hover:text-slate-900 transition">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endfor

                            {{-- Ellipse de fin si nécessaire --}}
                            @if($endPage < $lastPage)
                                @if($endPage < $lastPage - 1)
                                    <span class="w-6 text-center text-slate-400 text-xs">…</span>
                                @endif
                                <a href="{{ $rendezVousList->url($lastPage) }}" class="w-8 h-8 rounded-lg flex items-center justify-center text-xs font-bold text-slate-700 hover:bg-white transition">{{ $lastPage }}</a>
                            @endif

                            {{-- 4. Page suivante (▶) --}}
                            @if($rendezVousList->hasMorePages())
                                <a href="{{ $rendezVousList->nextPageUrl() }}" class="w-8 h-8 rounded-lg flex items-center justify-center text-slate-700 hover:bg-white hover:text-[#7f0504] hover:shadow-xs transition" title="Page suivante (page {{ $currentPage + 1 }})">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </a>
                            @else
                                <span class="w-8 h-8 rounded-lg flex items-center justify-center text-slate-400 cursor-not-allowed opacity-50 select-none" title="Page suivante">
                                    <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M8 5v14l11-7z"/>
                                    </svg>
                                </span>
                            @endif

                            {{-- 5. Dernière page (▶|) --}}
                            @if($currentPage < $lastPage)
                                <a href="{{ $rendezVousList->url($lastPage) }}" class="w-8 h-8 rounded-lg flex items-center justify-center text-slate-700 hover:bg-white hover:text-[#7f0504] hover:shadow-xs transition" title="Dernière page (page {{ $lastPage }})">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M6 18l8-6-8-6v12zm9.5-12H18v12h-2.5z"/>
                                    </svg>
                                </a>
                            @else
                                <span class="w-8 h-8 rounded-lg flex items-center justify-center text-slate-400 cursor-not-allowed opacity-50 select-none" title="Dernière page">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M6 18l8-6-8-6v12zm9.5-12H18v12h-2.5z"/>
                                    </svg>
                                </span>
                            @endif
                        </div>
                    @endif
                </div>
            </div>

            </div>{{-- #rdv-ajax-container --}}

            <!-- MODAL DE CONSULTATION DU RENDEZ-VOUS -->
            <div x-show="modalOpen"
                 x-cloak
                 class="fixed inset-0 z-50 overflow-y-auto"
                 aria-labelledby="modal-title" role="dialog" aria-modal="true">
                
                <!-- Backdrop -->
                <div x-show="modalOpen"
                     x-transition:enter="ease-out duration-300"
                     x-transition:enter-start="opacity-0"
                     x-transition:enter-end="opacity-100"
                     x-transition:leave="ease-in duration-200"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     @click="modalOpen = false"
                     class="fixed inset-0 bg-slate-900/60 backdrop-blur-xs transition-opacity"></div>

                <div class="flex min-h-full items-center justify-center p-4 text-center sm:p-0">
                    <div x-show="modalOpen"
                         x-transition:enter="ease-out duration-300"
                         x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                         x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                         x-transition:leave="ease-in duration-200"
                         x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                         x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                         class="relative transform overflow-hidden rounded-3xl bg-white text-left shadow-2xl transition-all sm:my-8 sm:w-full sm:max-w-2xl border border-slate-200">
                        
                        <!-- Modal Header -->
                        <div class="px-6 py-4 flex items-center justify-between border-b border-slate-100"
                             style="background: linear-gradient(135deg, #7f0504 0%, #4a0202 100%);">
                            <div class="flex items-center gap-2 text-white">
                                <span class="text-xl">📋</span>
                                <div>
                                    <h3 class="text-base font-black uppercase text-white leading-tight">
                                        Détails Rendez-vous <span x-text="'#' + modalData.id"></span>
                                    </h3>
                                    <p class="text-xs text-red-200 font-medium">Fiche prospect et suivi de la qualification</p>
                                </div>
                            </div>
                            <button type="button" @click="modalOpen = false" class="text-white/80 hover:text-white text-xl font-bold p-1 rounded-lg hover:bg-white/10 transition cursor-pointer">
                                ✕
                            </button>
                        </div>

                        <!-- Modal Content -->
                        <div class="p-6 space-y-6 max-h-[75vh] overflow-y-auto text-sm text-slate-700">
                            <!-- 1. Prospect Info -->
                            <div class="bg-slate-50 rounded-2xl p-4 border border-slate-200/80 space-y-3">
                                <h4 class="text-xs font-black uppercase tracking-wider text-[#7f0504] flex items-center gap-1.5">
                                    <span>👤</span> Informations Prospect
                                </h4>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
                                    <div>
                                        <span class="text-slate-400 font-semibold block">Nom & Prénom</span>
                                        <span class="font-bold text-slate-900 text-sm" x-text="modalData.nom_complet"></span>
                                    </div>
                                    <div>
                                        <span class="text-slate-400 font-semibold block">Téléphone</span>
                                        <a :href="'tel:' + modalData.telephone" class="font-bold text-[#7f0504] hover:underline" x-text="modalData.telephone"></a>
                                    </div>
                                    <template x-if="modalData.email">
                                        <div>
                                            <span class="text-slate-400 font-semibold block">Email</span>
                                            <a :href="'mailto:' + modalData.email" class="font-semibold text-slate-800 hover:underline" x-text="modalData.email"></a>
                                        </div>
                                    </template>
                                    <template x-if="modalData.societe">
                                        <div>
                                            <span class="text-slate-400 font-semibold block">Société</span>
                                            <span class="font-semibold text-slate-800" x-text="modalData.societe"></span>
                                        </div>
                                    </template>
                                    <div class="sm:col-span-2">
                                        <span class="text-slate-400 font-semibold block">Numéro & Rue (Adresse)</span>
                                        <span class="font-semibold text-slate-800" x-text="modalData.adresse || 'Non renseigné'"></span>
                                    </div>
                                    <div>
                                        <span class="text-slate-400 font-semibold block">Code Postal</span>
                                        <span class="font-semibold text-slate-800" x-text="modalData.code_postal || '-'"></span>
                                    </div>
                                    <div>
                                        <span class="text-slate-400 font-semibold block">Ville</span>
                                        <span class="font-semibold text-slate-800" x-text="modalData.ville || '-'"></span>
                                    </div>
                                </div>
                            </div>

                            <!-- 2. RDV Details -->
                            <div class="bg-slate-50 rounded-2xl p-4 border border-slate-200/80 space-y-3">
                                <h4 class="text-xs font-black uppercase tracking-wider text-slate-600 flex items-center gap-1.5">
                                    <span>📅</span> Détails du Rendez-vous
                                </h4>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3 text-xs">
                                    <div>
                                        <span class="text-slate-400 font-semibold block">Date & Heure</span>
                                        <span class="font-bold text-slate-900" x-text="modalData.date + ' à ' + modalData.heure"></span>
                                    </div>
                                    <div>
                                        <span class="text-slate-400 font-semibold block">Agent Créateur</span>
                                        <span class="font-semibold text-slate-800" x-text="modalData.agent"></span>
                                    </div>
                                    <div class="sm:col-span-2">
                                        <span class="text-slate-400 font-semibold block">Objet</span>
                                        <span class="font-semibold text-slate-800" x-text="modalData.objet"></span>
                                    </div>
                                    <template x-if="modalData.notes">
                                        <div class="sm:col-span-2 bg-white p-3 rounded-xl border border-slate-200">
                                            <span class="text-slate-400 font-semibold block mb-1">Notes de l'Agent</span>
                                            <p class="text-slate-700 whitespace-pre-line" x-text="modalData.notes"></p>
                                        </div>
                                    </template>
                                </div>
                            </div>

                            <!-- 3. Qualification Info -->
                            <div class="rounded-2xl p-4 border space-y-3"
                                 :class="modalData.is_qualifie ? 'bg-emerald-50/50 border-emerald-200' : 'bg-amber-50/50 border-amber-200'">
                                <h4 class="text-xs font-black uppercase tracking-wider flex items-center justify-between"
                                    :class="modalData.is_qualifie ? 'text-emerald-800' : 'text-amber-800'">
                                    <span class="flex items-center gap-1.5">
                                        <span x-text="modalData.is_qualifie ? '🎯' : '⏳'"></span>
                                        <span>Statut de Qualification</span>
                                    </span>
                                    <span class="px-2 py-0.5 rounded-md text-[10px] font-black uppercase tracking-wider"
                                          :class="modalData.is_qualifie ? 'bg-emerald-200 text-emerald-900' : 'bg-amber-200 text-amber-900'"
                                          x-text="modalData.is_qualifie ? 'Qualifié' : 'À Qualifier'"></span>
                                </h4>

                                <template x-if="modalData.is_qualifie">
                                    <div class="space-y-3 text-xs">
                                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                            <div>
                                                <span class="text-slate-400 font-semibold block">Résultat</span>
                                                <span class="font-black text-slate-900 text-sm" x-text="modalData.resultat"></span>
                                            </div>
                                            <div>
                                                <span class="text-slate-400 font-semibold block">Potentiel</span>
                                                <span class="font-bold text-slate-900" x-text="modalData.potentiel || '-'"></span>
                                            </div>
                                        </div>
                                        <template x-if="modalData.commentaire">
                                            <div class="bg-white p-3 rounded-xl border border-emerald-100">
                                                <span class="text-slate-400 font-semibold block mb-1">Commentaire Partenaire</span>
                                                <p class="text-slate-700 whitespace-pre-line font-medium" x-text="modalData.commentaire"></p>
                                            </div>
                                        </template>
                                        <template x-if="modalData.qualified_at">
                                            <div class="text-[11px] text-slate-400">
                                                Qualifié le <span class="font-semibold text-slate-600" x-text="modalData.qualified_at"></span>
                                            </div>
                                        </template>
                                    </div>
                                </template>

                                <template x-if="!modalData.is_qualifie">
                                    <p class="text-xs text-amber-800 font-medium">
                                        Ce rendez-vous n'a pas encore été qualifié. Cliquez sur le bouton ci-dessous pour renseigner l'évaluation commerciale.
                                    </p>
                                </template>
                            </div>
                        </div>

                        <!-- Modal Footer -->
                        <div class="px-6 py-4 bg-slate-50 border-t border-slate-100 flex items-center justify-end gap-3">
                            <button type="button" @click="modalOpen = false" class="px-4 py-2 rounded-xl text-xs font-bold text-slate-700 bg-white border border-slate-200 hover:bg-slate-100 transition cursor-pointer">
                                Fermer
                            </button>
                            <a :href="modalData.qualify_url" class="inline-flex items-center gap-1.5 px-4 py-2 rounded-xl text-xs font-black text-white transition shadow-2xs hover:opacity-95"
                               style="background-color: #7f0504;">
                                <span>✏️</span>
                                <span x-text="modalData.is_qualifie ? 'Modifier la qualification' : 'Qualifier maintenant'"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script>
    (function () {
        function initAjaxTable() {
            const container = document.getElementById('rdv-ajax-container');
            if (!container) return;

            function loadUrl(url) {
                container.style.opacity = '0.5';
                container.style.pointerEvents = 'none';

                fetch(url, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
                    }
                })
                .then(res => res.text())
                .then(html => {
                    const parser = new DOMParser();
                    const doc = parser.parseFromString(html, 'text/html');
                    const newContainer = doc.getElementById('rdv-ajax-container');
                    if (newContainer) {
                        container.innerHTML = newContainer.innerHTML;
                        container.scrollIntoView({ behavior: 'smooth', block: 'start' });
                        if (window.Alpine) {
                            Alpine.initTree(container);
                        }
                        initAjaxTable();
                        window.history.pushState({}, '', url);
                    }
                })
                .catch(() => {
                    window.location.href = url;
                })
                .finally(() => {
                    container.style.opacity = '';
                    container.style.pointerEvents = '';
                });
            }

            // Gestion des clics sur les liens de pagination et d'effacement de filtres
            container.addEventListener('click', function (e) {
                const link = e.target.closest('a[href]');
                if (!link) return;

                const href = link.getAttribute('href');
                if (!href) return;

                // Liens de pagination ou effacer filtres
                if (href.includes('?page=') || href.includes('&page=') || link.textContent.includes('Effacer')) {
                    e.preventDefault();
                    loadUrl(href);
                }
            });

            // Gestion de la soumission du formulaire de recherche en AJAX
            const filterForm = container.querySelector('#rdv-filter-form');
            if (filterForm) {
                filterForm.addEventListener('submit', function (e) {
                    e.preventDefault();
                    const formData = new FormData(filterForm);
                    const params = new URLSearchParams();

                    for (const [key, value] of formData.entries()) {
                        if (value !== '' && value !== null) {
                            params.append(key, value);
                        }
                    }

                    const actionUrl = filterForm.getAttribute('action') || window.location.pathname;
                    const fullUrl = actionUrl + (params.toString() ? '?' + params.toString() : '');
                    loadUrl(fullUrl);
                });
            }
        }

        document.addEventListener('DOMContentLoaded', initAjaxTable);
    })();
    </script>

</x-app-layout>
