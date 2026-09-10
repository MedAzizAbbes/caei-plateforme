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

    <div class="py-8" x-data="{ displayMode: 'cards' }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if(session('success'))
                <div class="p-4 rounded-2xl border border-emerald-200 bg-emerald-50 text-sm font-bold text-emerald-800 flex items-center justify-between shadow-2xs">
                    <div class="flex items-center gap-2">
                        <span class="text-base">✅</span>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            {{-- Bandeau de Notifications en direct pour le Partenaire --}}
            @if(auth()->user()->unreadNotifications->count() > 0)
                <div class="p-6 rounded-3xl bg-amber-50 border-2 border-amber-300 shadow-md space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2.5">
                            <span class="text-2xl animate-bounce">🎯</span>
                            <div>
                                <h3 class="text-sm font-black uppercase text-amber-950">
                                    Nouveaux Rendez-vous Affectés : {{ auth()->user()->unreadNotifications->count() }} notification(s) !
                                </h3>
                                <p class="text-xs text-amber-800 font-medium">L'administrateur vous a attribué de nouveaux prospects à qualifier.</p>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 pt-2">
                        @foreach(auth()->user()->unreadNotifications as $notification)
                            <div class="p-3.5 bg-white rounded-2xl border border-amber-200 shadow-2xs flex flex-col justify-between gap-2 text-xs">
                                <div>
                                    <div class="flex items-center justify-between">
                                        <span class="font-black text-slate-900">{{ $notification->data['title'] ?? 'Nouveau RDV' }}</span>
                                        <span class="text-[9px] text-slate-400 font-bold">{{ $notification->created_at->diffForHumans() }}</span>
                                    </div>
                                    <p class="text-slate-600 text-[11px] mt-1 leading-relaxed">{{ $notification->data['message'] ?? '' }}</p>
                                </div>
                                @if(isset($notification->data['url']))
                                    <div class="text-right pt-1">
                                        <a href="{{ $notification->data['url'] }}" 
                                           class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-xl text-xs font-black uppercase text-white shadow-2xs hover:opacity-95"
                                           style="background-color: #7f0504;">
                                            <span>📋 Qualifier le prospect</span> ➔
                                        </a>
                                    </div>
                                @endif
                            </div>
                        @endforeach
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

            <!-- 2. Cartes KPI Synthétiques du Partenaire -->
            @php
                $allRdvsCollection = $rendezVousList->getCollection();
                $totalCount = $rendezVousList->total();
                $toQualifyCount = $allRdvsCollection->filter(fn($r) => !$r->qualification)->count();
                $qualifiedCount = $allRdvsCollection->filter(fn($r) => $r->qualification !== null)->count();
                $highPotentialCount = $allRdvsCollection->filter(fn($r) => optional($r->qualification)->potentiel === 'Élevé')->count();
            @endphp

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-2xs flex items-center gap-4 hover:border-blue-200 transition">
                    <div class="w-12 h-12 rounded-2xl bg-blue-50 text-blue-800 font-black text-xl flex items-center justify-center shrink-0">
                        🤝
                    </div>
                    <div>
                        <p class="text-[11px] font-bold uppercase text-slate-400">Total Attribués</p>
                        <p class="text-2xl font-black text-slate-900 mt-0.5">{{ $totalCount }}</p>
                    </div>
                </div>

                <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-2xs flex items-center gap-4 hover:border-amber-200 transition">
                    <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-800 font-black text-xl flex items-center justify-center shrink-0">
                        ⏳
                    </div>
                    <div>
                        <p class="text-[11px] font-bold uppercase text-slate-400">À Qualifier</p>
                        <p class="text-2xl font-black text-amber-800 mt-0.5">{{ $toQualifyCount }}</p>
                    </div>
                </div>

                <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-2xs flex items-center gap-4 hover:border-emerald-200 transition">
                    <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-800 font-black text-xl flex items-center justify-center shrink-0">
                        🎯
                    </div>
                    <div>
                        <p class="text-[11px] font-bold uppercase text-slate-400">RDV Qualifiés</p>
                        <p class="text-2xl font-black text-emerald-800 mt-0.5">{{ $qualifiedCount }}</p>
                    </div>
                </div>

                <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-2xs flex items-center gap-4 hover:border-amber-300 transition">
                    <div class="w-12 h-12 rounded-2xl bg-amber-100 text-amber-900 font-black text-xl flex items-center justify-center shrink-0">
                        🔥
                    </div>
                    <div>
                        <p class="text-[11px] font-bold uppercase text-slate-400">Potentiel Élevé</p>
                        <p class="text-2xl font-black text-amber-900 mt-0.5">{{ $highPotentialCount }}</p>
                    </div>
                </div>
            </div>

            <!-- 3. Navigation d'Affichage Fiches vs Tableau -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 bg-white p-4 rounded-2xl border border-slate-200 shadow-2xs">
                <div class="flex items-center gap-2">
                    <span class="text-xs font-bold text-slate-500 uppercase mr-1">Mode d'affichage :</span>
                    <button type="button" 
                            @click="displayMode = 'cards'" 
                            :style="displayMode === 'cards' ? 'background-color: #7f0504; color: #ffffff;' : ''"
                            :class="displayMode === 'cards' ? 'shadow-2xs font-black' : 'bg-slate-100 text-slate-600 hover:bg-slate-200 font-bold'"
                            class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl text-xs transition cursor-pointer">
                        <span>🎴 Fiches Opportunité</span>
                    </button>
                    <button type="button" 
                            @click="displayMode = 'table'" 
                            :style="displayMode === 'table' ? 'background-color: #7f0504; color: #ffffff;' : ''"
                            :class="displayMode === 'table' ? 'shadow-2xs font-black' : 'bg-slate-100 text-slate-600 hover:bg-slate-200 font-bold'"
                            class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl text-xs transition cursor-pointer">
                        <span>📑 Vue Tableau</span>
                    </button>
                </div>

                <div class="text-xs text-slate-500 font-semibold">
                    Affichage de <strong class="text-slate-900">{{ count($rendezVousList) }}</strong> sur <strong class="text-slate-900">{{ $rendezVousList->total() }}</strong> rendez-vous attribué(s)
                </div>
            </div>

            <!-- 4A. MODE FICHES OPPORTUNITÉ COMMERCIALES -->
            <div x-show="displayMode === 'cards'" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                @forelse($rendezVousList as $rdv)
                    <div class="bg-white rounded-2xl border {{ $rdv->isQualifie() ? 'border-emerald-300 ring-1 ring-emerald-200 bg-emerald-50/20' : 'border-slate-200' }} shadow-2xs p-5 hover:shadow-md hover:border-emerald-400 transition flex flex-col justify-between space-y-4">
                        <div>
                            <!-- Card Top Bar -->
                            <div class="flex items-start justify-between gap-3 border-b border-slate-100 pb-3">
                                <div class="flex items-center gap-3 min-w-0">
                                    <div class="w-10 h-10 rounded-2xl bg-red-100 text-[#7f0504] font-black flex items-center justify-center text-xs shrink-0 shadow-2xs">
                                        {{ strtoupper(substr($rdv->prospect->nom, 0, 1) . substr($rdv->prospect->prenom, 0, 1)) ?: '👤' }}
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <h4 class="font-black text-slate-900 text-sm leading-snug truncate">{{ $rdv->prospect->nomComplet() }}</h4>
                                        @if($rdv->prospect->societe)
                                            <p class="text-[11px] font-bold text-red-800 truncate">🏢 {{ $rdv->prospect->societe }}</p>
                                        @endif
                                    </div>
                                </div>
                                <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-black border shrink-0 {{ $rdv->statusBadgeClasses() }}">
                                    {{ $rdv->statusLabel() }}
                                </span>
                            </div>

                            <!-- Card Contact Prospect -->
                            <div class="mt-3 space-y-1.5 text-xs text-slate-600">
                                <a href="tel:{{ $rdv->prospect->telephone }}" class="inline-flex items-center gap-1.5 font-black text-[#7f0504] hover:underline bg-red-50 px-2.5 py-1 rounded-lg border border-red-100">
                                    <span>📞</span>
                                    <span>{{ $rdv->prospect->telephone }}</span>
                                </a>
                                @if($rdv->prospect->email)
                                    <div class="text-[11px] text-slate-500 truncate" title="{{ $rdv->prospect->email }}">
                                        📧 {{ $rdv->prospect->email }}
                                    </div>
                                @endif
                            </div>

                            <!-- Card RDV & Agent Info -->
                            <div class="mt-3 bg-slate-50 p-3 rounded-xl border border-slate-100 space-y-1">
                                <div class="text-xs font-black text-slate-900 flex items-center gap-2">
                                    <span>📅 {{ \Carbon\Carbon::parse($rdv->date_rendez_vous)->format('d/m/Y') }}</span>
                                    <span class="text-slate-400">|</span>
                                    <span>⏰ {{ \Carbon\Carbon::parse($rdv->heure_rendez_vous)->format('H:i') }}</span>
                                </div>
                                <p class="text-xs text-slate-600 truncate font-medium" title="{{ $rdv->objet }}">
                                    <strong>Objet :</strong> {{ $rdv->objet }}
                                </p>
                                <p class="text-[11px] text-slate-400 pt-0.5">
                                    Agent créateur : <strong class="text-slate-700 font-semibold">{{ $rdv->agent->fullName() }}</strong>
                                </p>
                            </div>

                            <!-- Card Qualification Status -->
                            <div class="mt-3 pt-3 border-t border-slate-100 flex items-center justify-between text-xs">
                                <span class="block text-[10px] font-bold uppercase text-slate-400">État Évaluation</span>
                                @if($rdv->qualification)
                                    <div class="text-right">
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[10px] font-bold border {{ $rdv->qualification->resultatBadgeClasses() }}">
                                            {{ $rdv->qualification->resultat }}
                                        </span>
                                        <div class="text-[10px] text-slate-500 mt-0.5">Potentiel: <strong class="text-slate-800">{{ $rdv->qualification->potentiel }}</strong></div>
                                    </div>
                                @else
                                    <span class="inline-flex items-center gap-1 text-[11px] font-bold text-amber-800 bg-amber-50 px-2.5 py-1 rounded-lg border border-amber-200">
                                        ⏳ À qualifier
                                    </span>
                                @endif
                            </div>
                        </div>

                        <!-- Card Action Footer -->
                        <div class="pt-2 border-t border-slate-100 flex justify-end">
                            <a href="{{ route('callcenter.partenaire.qualify', $rdv) }}" 
                               class="w-full text-center py-2 rounded-xl text-white text-xs font-black uppercase transition shadow-2xs hover:opacity-95"
                               style="background-color: #7f0504;">
                                📋 {{ $rdv->qualification ? 'Modifier Qualification' : 'Qualifier le prospect' }}
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 bg-white p-12 text-center rounded-2xl border border-slate-200 text-slate-400">
                        <div class="text-4xl mb-2">📭</div>
                        <p class="text-sm font-bold text-slate-700">Aucun rendez-vous attribué pour le moment.</p>
                        <p class="text-xs text-slate-400 mt-1">L'administrateur vous notifiera dès qu'un nouveau rendez-vous vous sera affecté.</p>
                    </div>
                @endforelse
            </div>

            <!-- 4B. MODE TABLEAU PRO (VUE DENSE) -->
            <div x-show="displayMode === 'table'" class="bg-white rounded-2xl border border-slate-200/80 shadow-2xs overflow-hidden">
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
                                <tr class="transition-colors {{ $rdv->isQualifie() ? 'bg-emerald-50 hover:bg-emerald-100/70 border-b border-emerald-100' : 'hover:bg-red-50/40' }}">
                                    <td class="p-4 whitespace-nowrap {{ $rdv->isQualifie() ? 'border-l-4 border-emerald-500' : 'border-l-4 border-transparent' }}">
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
                                                <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-bold border {{ $rdv->qualification->resultatBadgeClasses() }}">
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

        </div>
    </div>
</x-app-layout>
