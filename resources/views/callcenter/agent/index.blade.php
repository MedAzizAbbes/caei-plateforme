<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h2 class="text-2xl font-black uppercase tracking-tight text-slate-900 flex items-center gap-2">
                    <span style="color: #7f0504;">🎧 Espace Agent Call Center</span>
                </h2>
                <p class="text-xs text-slate-500 font-medium">Saisie des prospects et suivi des rendez-vous commerciaux</p>
            </div>
            <div class="flex items-center gap-3">
                <!-- Centre de Notifications Agent -->
                <div x-data="{ openNotifications: false }" class="relative">
                    <button type="button" @click="openNotifications = !openNotifications"
                            class="relative inline-flex items-center gap-2 bg-white border border-red-200 text-slate-800 text-xs font-bold px-3.5 py-2 rounded-xl shadow-2xs hover:bg-red-50 transition cursor-pointer">
                        <span>🔔 Notifications</span>
                        @if(auth()->user()->unreadNotifications->count() > 0)
                            <span class="bg-red-600 text-white font-black text-[10px] px-2 py-0.5 rounded-full animate-bounce">
                                {{ auth()->user()->unreadNotifications->count() }}
                            </span>
                        @else
                            <span class="bg-slate-100 text-slate-500 font-bold text-[10px] px-2 py-0.5 rounded-full">
                                0
                            </span>
                        @endif
                    </button>

                    <!-- Dropdown Notifications -->
                    <div x-show="openNotifications" @click.away="openNotifications = false" x-cloak
                         class="absolute right-0 mt-2 w-80 sm:w-96 bg-white rounded-2xl shadow-2xl border border-slate-200 z-50 overflow-hidden"
                         x-transition>
                        <div class="p-4 text-white flex justify-between items-center" style="background: linear-gradient(135deg, #7f0504 0%, #4a0202 100%);">
                            <div class="flex items-center gap-2">
                                <span class="text-base">🔔</span>
                                <h4 class="font-black text-xs uppercase text-white">Centre de Notifications</h4>
                            </div>
                            @if(auth()->user()->unreadNotifications->count() > 0)
                                <form method="POST" action="{{ route('callcenter.agent.notifications.read') }}">
                                    @csrf
                                    <button type="submit" class="text-[10px] font-bold text-red-200 hover:text-white underline cursor-pointer">
                                        Tout marquer comme lu
                                    </button>
                                </form>
                            @endif
                        </div>

                        <div class="max-h-80 overflow-y-auto divide-y divide-slate-100 text-xs">
                            @forelse(auth()->user()->notifications->take(10) as $notification)
                                <div class="p-4 hover:bg-slate-50 transition {{ $notification->read_at ? 'opacity-60' : 'bg-red-50/30' }}">
                                    <div class="flex items-start justify-between gap-2">
                                        <p class="font-black text-slate-900 leading-snug">{{ $notification->data['title'] ?? 'Notification' }}</p>
                                        <span class="text-[9px] text-slate-400 font-bold whitespace-nowrap">{{ $notification->created_at->diffForHumans() }}</span>
                                    </div>
                                    <p class="text-slate-600 text-[11px] mt-1 leading-relaxed">{{ $notification->data['message'] ?? '' }}</p>
                                    @if(isset($notification->data['url']))
                                        <a href="{{ $notification->data['url'] }}" class="inline-flex items-center gap-1 text-[10px] font-bold text-[#7f0504] hover:underline mt-2">
                                            <span>Consulter la fiche RDV</span> ➔
                                        </a>
                                    @endif
                                </div>
                            @empty
                                <div class="p-6 text-center text-slate-400 text-xs">
                                    Aucune notification reçue pour le moment.
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <span class="inline-flex items-center gap-2 bg-red-50 border border-red-200 text-red-900 text-xs font-bold px-3.5 py-2 rounded-xl shadow-2xs">
                    <span class="w-2.5 h-2.5 rounded-full bg-red-600 animate-ping"></span>
                    <span>En Prospection Active — {{ auth()->user()->fullName() }}</span>
                </span>
            </div>
        </div>
    </x-slot>

    <div class="py-8" x-data="{ showNewModal: false, displayMode: 'cards' }">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if(session('success'))
                <div class="p-4 rounded-2xl border border-emerald-200 bg-emerald-50 text-sm font-bold text-emerald-800 flex items-center justify-between shadow-2xs">
                    <div class="flex items-center gap-2">
                        <span class="text-base">✅</span>
                        <span>{{ session('success') }}</span>
                    </div>
                </div>
            @endif

            <!-- 1. Bannière d'Accueil Rouge Thématisée Call Center -->
            <div class="rounded-3xl p-8 text-white shadow-xl flex flex-col md:flex-row items-start md:items-center justify-between gap-6 relative overflow-hidden"
                 style="background: linear-gradient(135deg, rgba(127, 5, 4, 0.95) 0%, rgba(153, 27, 27, 0.95) 50%, rgba(74, 2, 2, 0.98) 100%), url('{{ asset('assets/img/service_callcenter_1786525651775.jpg') }}') center/cover fixed no-repeat;">
                <div class="absolute -right-6 -bottom-10 opacity-20 text-9xl pointer-events-none select-none">🎧</div>
                <div class="relative z-10 max-w-2xl">
                    <span class="inline-flex items-center gap-1.5 bg-white/20 backdrop-blur-md text-white text-[11px] font-black px-3.5 py-1 rounded-lg uppercase tracking-wider mb-3 border border-white/30">
                        📞 Module Prospection Client Call Center
                    </span>
                    <h3 class="text-2xl md:text-3xl font-black tracking-tight uppercase">Fixer un Nouveau Rendez-vous Client</h3>
                    <p class="mt-2 text-xs md:text-sm text-red-50 leading-relaxed font-normal">
                        Saisissez les coordonnées du prospect et planifiez la date de l'entretien. Le rendez-vous sera transmis immédiatement à l'administration pour affectation partenaire.
                    </p>
                </div>
                <button @click="showNewModal = true" 
                        class="shrink-0 inline-flex items-center gap-2 bg-[#f2a90f] hover:bg-[#d99405] text-[#061743] font-black text-xs px-6 py-3.5 rounded-2xl shadow-lg hover:scale-105 transition-all cursor-pointer">
                    <span class="text-base">➕</span>
                    <span>Nouveau Rendez-vous</span>
                </button>
            </div>

            <!-- 2. Cartes KPI d'Activité de l'Agent -->
            @php
                $allRdvsCollection = $rendezVousList->getCollection();
                $totalCount = $rendezVousList->total();
                $pendingCount = $allRdvsCollection->where('statut', 'en_attente_affectation')->count();
                $assignedCount = $allRdvsCollection->whereIn('statut', ['affecte', 'qualification_en_cours'])->count();
                $qualifiedCount = $allRdvsCollection->filter(fn($r) => $r->statut === 'qualifie' || $r->qualification !== null)->count();
                $qualifRate = $totalCount > 0 ? round(($qualifiedCount / $totalCount) * 100) : 0;
            @endphp

            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-2xs flex items-center gap-4 hover:border-red-200 transition">
                    <div class="w-12 h-12 rounded-2xl bg-red-50 text-[#7f0504] font-black text-xl flex items-center justify-center shrink-0">
                        📞
                    </div>
                    <div>
                        <p class="text-[11px] font-bold uppercase text-slate-400">Total RDV Saisis</p>
                        <p class="text-2xl font-black text-slate-900 mt-0.5">{{ $totalCount }}</p>
                    </div>
                </div>

                <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-2xs flex items-center gap-4 hover:border-amber-200 transition">
                    <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-800 font-black text-xl flex items-center justify-center shrink-0">
                        ⏳
                    </div>
                    <div>
                        <p class="text-[11px] font-bold uppercase text-slate-400">En Attente Admin</p>
                        <p class="text-2xl font-black text-amber-800 mt-0.5">{{ $pendingCount }}</p>
                    </div>
                </div>

                <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-2xs flex items-center gap-4 hover:border-blue-200 transition">
                    <div class="w-12 h-12 rounded-2xl bg-blue-50 text-blue-800 font-black text-xl flex items-center justify-center shrink-0">
                        🤝
                    </div>
                    <div>
                        <p class="text-[11px] font-bold uppercase text-slate-400">Pris en Charge</p>
                        <p class="text-2xl font-black text-blue-900 mt-0.5">{{ $assignedCount }}</p>
                    </div>
                </div>

                <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-2xs flex items-center gap-4 hover:border-emerald-200 transition">
                    <div class="w-12 h-12 rounded-2xl bg-emerald-50 text-emerald-800 font-black text-xl flex items-center justify-center shrink-0">
                        🎯
                    </div>
                    <div>
                        <p class="text-[11px] font-bold uppercase text-slate-400">Qualifiés & Taux</p>
                        <p class="text-2xl font-black text-emerald-800 mt-0.5">{{ $qualifiedCount }} <span class="text-xs font-bold text-emerald-600">({{ $qualifRate }}%)</span></p>
                    </div>
                </div>
            </div>

            <!-- 3. Navigation d'affichage & Informations -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 bg-white p-4 rounded-2xl border border-slate-200 shadow-2xs">
                <div class="flex items-center gap-2">
                    <span class="text-xs font-bold text-slate-500 uppercase mr-1">Mode d'affichage :</span>
                    <button type="button" 
                            @click="displayMode = 'cards'" 
                            :style="displayMode === 'cards' ? 'background-color: #7f0504; color: #ffffff;' : ''"
                            :class="displayMode === 'cards' ? 'shadow-2xs font-black' : 'bg-slate-100 text-slate-600 hover:bg-slate-200 font-bold'"
                            class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-xl text-xs transition cursor-pointer">
                        <span>🎴 Fiches Prospect</span>
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
                    Affichage de <strong class="text-slate-900">{{ count($rendezVousList) }}</strong> sur <strong class="text-slate-900">{{ $rendezVousList->total() }}</strong> rendez-vous
                </div>
            </div>

            <!-- 4A. MODE FICHES PROSPECT (CARTE D'APPEL PROSPECTION) -->
            <div x-show="displayMode === 'cards'" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                @forelse($rendezVousList as $rdv)
                    <div class="bg-white rounded-2xl border border-slate-200 shadow-2xs p-5 hover:shadow-md hover:border-red-200 transition flex flex-col justify-between space-y-4">
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

                            <!-- Card Prospect Contact Info -->
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

                            <!-- Card RDV Info -->
                            <div class="mt-3 bg-slate-50 p-3 rounded-xl border border-slate-100 space-y-1">
                                <div class="text-xs font-black text-slate-900 flex items-center gap-2">
                                    <span>📅 {{ \Carbon\Carbon::parse($rdv->date_rendez_vous)->format('d/m/Y') }}</span>
                                    <span class="text-slate-400">|</span>
                                    <span>⏰ {{ \Carbon\Carbon::parse($rdv->heure_rendez_vous)->format('H:i') }}</span>
                                </div>
                                <p class="text-xs text-slate-600 truncate font-medium" title="{{ $rdv->objet }}">
                                    <strong>Objet :</strong> {{ $rdv->objet }}
                                </p>
                            </div>

                            <!-- Partenaire et Qualification Info -->
                            <div class="mt-3 pt-3 border-t border-slate-100 flex items-center justify-between text-xs">
                                <div>
                                    <span class="block text-[10px] font-bold uppercase text-slate-400">Partenaire</span>
                                    @if($rdv->partenaire)
                                        <span class="font-bold text-blue-900 flex items-center gap-1">🤝 {{ $rdv->partenaire->fullName() }}</span>
                                    @else
                                        <span class="text-[11px] text-amber-700 font-bold">⚠️ Non affecté</span>
                                    @endif
                                </div>

                                <div class="text-right">
                                    <span class="block text-[10px] font-bold uppercase text-slate-400">Qualification</span>
                                    @if($rdv->qualification)
                                        <span class="inline-flex items-center px-2 py-0.5 rounded-md text-[10px] font-bold border {{ $rdv->qualification->resultatBadgeClasses() }}">
                                            {{ $rdv->qualification->resultat }}
                                        </span>
                                    @else
                                        <span class="text-[11px] text-slate-400 italic">⏳ En attente</span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Card Action Footer -->
                        <div class="pt-2 border-t border-slate-100 flex justify-end">
                            <a href="{{ route('callcenter.agent.show', $rdv) }}" 
                               class="w-full text-center py-2 rounded-xl text-white text-xs font-bold transition shadow-2xs hover:opacity-95"
                               style="background-color: #7f0504;">
                                👁️ Consulter la Fiche
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 bg-white p-12 text-center rounded-2xl border border-slate-200 text-slate-400">
                        <div class="text-4xl mb-2">📭</div>
                        <p class="text-sm font-bold text-slate-700">Aucun rendez-vous enregistré.</p>
                        <p class="text-xs text-slate-400 mt-1">Cliquez sur "Nouveau Rendez-vous" pour saisir votre premier entretien.</p>
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
                                <th class="p-4">Objet du RDV</th>
                                <th class="p-4">Partenaire Affecté</th>
                                <th class="p-4">Statut RDV</th>
                                <th class="p-4">Résultat Qualification</th>
                                <th class="p-4 text-right">Détails</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 font-medium text-slate-700">
                            @forelse($rendezVousList as $rdv)
                                <tr class="hover:bg-red-50/40 transition">
                                    <td class="p-4 whitespace-nowrap">
                                        <div class="font-bold text-slate-900 flex items-center gap-1.5">
                                            <span>📅</span> {{ \Carbon\Carbon::parse($rdv->date_rendez_vous)->format('d/m/Y') }}
                                        </div>
                                        <div class="text-xs text-slate-400 mt-0.5 flex items-center gap-1">
                                            <span>⏰</span> {{ \Carbon\Carbon::parse($rdv->heure_rendez_vous)->format('H:i') }}
                                        </div>
                                    </td>

                                    <td class="p-4">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-xl bg-red-100 text-[#7f0504] font-black flex items-center justify-center text-xs shrink-0">
                                                {{ strtoupper(substr($rdv->prospect->nom, 0, 1) . substr($rdv->prospect->prenom, 0, 1)) ?: '👤' }}
                                            </div>
                                            <div>
                                                <div class="font-bold text-slate-900">{{ $rdv->prospect->nomComplet() }}</div>
                                                <div class="text-xs text-slate-500">📞 {{ $rdv->prospect->telephone }}</div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="p-4">
                                        <div class="font-semibold text-slate-800 max-w-xs truncate" title="{{ $rdv->objet }}">{{ $rdv->objet }}</div>
                                    </td>

                                    <td class="p-4 whitespace-nowrap">
                                        @if($rdv->partenaire)
                                            <div class="font-bold text-blue-900 flex items-center gap-1">
                                                <span>🤝</span> {{ $rdv->partenaire->fullName() }}
                                            </div>
                                        @else
                                            <span class="inline-flex items-center gap-1 text-xs font-bold text-amber-700 bg-amber-50 px-2.5 py-1 rounded-lg border border-amber-200">
                                                <span>⚠️</span> En attente
                                            </span>
                                        @endif
                                    </td>

                                    <td class="p-4 whitespace-nowrap">
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold border {{ $rdv->statusBadgeClasses() }}">
                                            {{ $rdv->statusLabel() }}
                                        </span>
                                    </td>

                                    <td class="p-4">
                                        @if($rdv->qualification)
                                            <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-bold border {{ $rdv->qualification->resultatBadgeClasses() }}">
                                                {{ $rdv->qualification->resultat }}
                                            </span>
                                        @else
                                            <span class="text-xs text-slate-400 italic">⏳ En attente</span>
                                        @endif
                                    </td>

                                    <td class="p-4 text-right whitespace-nowrap">
                                        <a href="{{ route('callcenter.agent.show', $rdv) }}" 
                                           class="inline-flex items-center gap-1 px-3 py-1.5 rounded-xl border border-slate-200 bg-white hover:bg-slate-100 text-xs font-bold text-slate-800 transition">
                                            <span>👁️ Consulter</span> ➔
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="p-8 text-center text-slate-400">
                                        Aucun rendez-vous enregistré.
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

        <!-- 5. Modal Saisie Nouveau RDV Client (Thème Rouge Call Center) -->
        <div x-show="showNewModal" x-cloak class="fixed inset-0 z-50 overflow-y-auto bg-slate-950/70 backdrop-blur-sm flex items-center justify-center p-4">
            <div @click.away="showNewModal = false" class="bg-white rounded-3xl max-w-2xl w-full shadow-2xl overflow-hidden transform transition-all border border-slate-100">
                <div class="p-6 text-white flex justify-between items-center" style="background: linear-gradient(135deg, #7f0504 0%, #4a0202 100%);">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center font-black text-lg">
                            📞
                        </div>
                        <div>
                            <h3 class="text-lg font-black uppercase text-white">Nouveau RDV Prospect</h3>
                            <p class="text-xs text-red-100 mt-0.5">Saisie des coordonnées et planification de l'entretien</p>
                        </div>
                    </div>
                    <button @click="showNewModal = false" class="text-white/70 hover:text-white text-2xl font-black transition leading-none cursor-pointer">&times;</button>
                </div>

                <form method="POST" action="{{ route('callcenter.agent.store') }}" class="p-6 space-y-5">
                    @csrf

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Nom du Prospect *</label>
                            <input type="text" name="nom" required placeholder="Ex: Ben Ali" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-800 focus:border-[#7f0504] focus:ring-[#7f0504]">
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Prénom du Prospect</label>
                            <input type="text" name="prenom" placeholder="Ex: Mohamed" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-800 focus:border-[#7f0504] focus:ring-[#7f0504]">
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Téléphone *</label>
                            <input type="text" name="telephone" required placeholder="+216 20 123 456" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-800 focus:border-[#7f0504] focus:ring-[#7f0504]">
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Email Prospect</label>
                            <input type="email" name="email" placeholder="prospect@societe.com" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-800 focus:border-[#7f0504] focus:ring-[#7f0504]">
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Date du RDV *</label>
                            <input type="date" name="date_rendez_vous" min="{{ date('Y-m-d') }}" required class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-800 focus:border-[#7f0504] focus:ring-[#7f0504]">
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Heure du RDV *</label>
                            <input type="time" name="heure_rendez_vous" required class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-800 focus:border-[#7f0504] focus:ring-[#7f0504]">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Objet du Rendez-vous *</label>
                        <input type="text" name="objet" required placeholder="Ex: Présentation offre mutuelle santé entreprise" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-800 focus:border-[#7f0504] focus:ring-[#7f0504]">
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Notes & Contexte (Optionnel)</label>
                        <textarea name="notes" rows="3" placeholder="Informations complémentaires, disponibilités du client..." class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-800 focus:border-[#7f0504] focus:ring-[#7f0504]"></textarea>
                    </div>

                    <div class="pt-4 border-t border-slate-100 flex justify-end gap-3">
                        <button type="button" @click="showNewModal = false" class="px-5 py-2.5 rounded-xl border border-slate-300 text-xs font-bold text-slate-600 hover:bg-slate-100 transition">
                            Annuler
                        </button>
                        <button type="submit" class="px-6 py-2.5 rounded-xl text-xs font-black uppercase text-[#061743] bg-[#f2a90f] hover:bg-[#d99405] shadow transition cursor-pointer">
                            Enregistrer & Transmettre à l'Admin
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
