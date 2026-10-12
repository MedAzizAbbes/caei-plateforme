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

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if(session('success'))
                <div class="p-4 rounded-2xl border border-emerald-200 bg-emerald-50 text-sm font-bold text-emerald-800 flex items-center justify-between shadow-2xs">
                    <div class="flex items-center gap-2">
                        <span class="text-base">✅</span>
                        <span>{{ session('success') }}</span>
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
                $allRdvsCollection = $rendezVousList->getCollection();
                $totalCount = $rendezVousList->total();
                $toQualifyCount = $allRdvsCollection->filter(fn($r) => !$r->qualification)->count();
                $qualifiedCount = $allRdvsCollection->filter(fn($r) => $r->qualification !== null)->count();
                $highPotentialCount = $allRdvsCollection->filter(fn($r) => optional($r->qualification)->potentiel === 'Élevé')->count();
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
                    @if(request('statut'))
                        <input type="hidden" name="statut" value="{{ request('statut') }}">
                    @endif

                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-5 gap-3">
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

                            @if(request('search_nom') || request('search_ville') || request('search_code_postal') || request('search_date_debut') || request('search_date_fin'))
                                <a href="{{ route('callcenter.partenaire.index', array_filter(['filtre' => request('filtre'), 'statut' => request('statut')])) }}"
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
                                <th class="p-4">Prospect</th>
                                <th class="p-4">Agent créateur</th>
                                <th class="p-4">Objet</th>
                                <th class="p-4">Statut RDV</th>
                                <th class="p-4">Qualification</th>
                                <th class="p-4 text-right">Actions & Évaluation</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 font-medium text-slate-700">
                            @forelse($rendezVousList as $rdv)
                                <tr class="{{ $rdv->qualificationRowClasses() }}" style="{{ $rdv->qualificationRowStyle() }}">
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
                                        @if($rdv->prospect->ville || $rdv->prospect->code_postal)
                                            <div class="text-[11px] text-slate-400">📍 {{ trim(($rdv->prospect->code_postal ? $rdv->prospect->code_postal . ' ' : '') . ($rdv->prospect->ville ?? '')) }}</div>
                                        @endif
                                    </td>

                                    <td class="p-4 whitespace-nowrap">
                                        <span class="inline-flex items-center gap-1 px-2 py-1 rounded text-xs bg-slate-100 text-slate-700 font-semibold">
                                            🎧 {{ $rdv->agent->fullName() }}
                                        </span>
                                    </td>

                                    <td class="p-4">
                                        <div class="font-semibold text-slate-800 max-w-xs truncate">{{ $rdv->objet }}</div>
                                    </td>

                                    <td class="p-4 whitespace-nowrap">
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold border {{ $rdv->statusBadgeClasses() }}">
                                            {{ $rdv->statusLabel() }}
                                        </span>
                                    </td>

                                    <td class="p-4">
                                        @if($rdv->qualification)
                                            <div class="space-y-1">
                                                <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs {{ $rdv->qualification->resultatBadgeClasses() }}">
                                                    {{ $rdv->qualification->resultat }}
                                                </span>
                                                <div class="text-[11px] text-slate-500 font-medium">Potentiel: <strong class="text-slate-800">{{ $rdv->qualification->potentiel }}</strong></div>
                                            </div>
                                        @else
                                            <span class="text-xs font-bold text-amber-700 bg-amber-50 px-2.5 py-1 rounded-lg border border-amber-200">⏳ À qualifier</span>
                                        @endif
                                    </td>

                                    <td class="p-4 text-right whitespace-nowrap">
                                        <a href="{{ route('callcenter.partenaire.qualify', $rdv) }}" 
                                           class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-white text-xs font-black uppercase transition shadow-2xs hover:opacity-95"
                                           style="background-color: #7f0504;">
                                            <span>📋 {{ $rdv->qualification ? 'Modifier' : 'Qualifier' }}</span>
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="p-8 text-center text-slate-500">
                                        Aucun rendez-vous ne vous est attribué pour le moment.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="p-4 border-t border-slate-100 bg-slate-50">
                    {{ $rendezVousList->links() }}
                </div>
            </div>

            </div>{{-- #rdv-ajax-container --}}

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
