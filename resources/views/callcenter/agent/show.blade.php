<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <div class="flex items-center gap-2">
                    <h2 class="text-2xl font-black uppercase tracking-tight text-slate-900">
                        <span style="color: #7f0504;">🎧 Dossier RDV #{{ $rendezVous->id }}</span>
                    </h2>
                    <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-black border shadow-2xs {{ $rendezVous->statusBadgeClasses() }}">
                        {{ $rendezVous->statusLabel() }}
                    </span>
                </div>
                <p class="text-xs text-slate-500 font-medium mt-1">Fiche prospect et résultats de qualification commerciale</p>
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

                <a href="{{ route('callcenter.agent.index') }}" class="inline-flex items-center gap-2 rounded-xl border border-red-200 bg-red-50 px-4 py-2 text-xs font-bold text-red-900 hover:bg-red-100 transition shadow-2xs">
                    ⬅ Retour à mes rendez-vous
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            <!-- 1. Cartes Synthétiques 3 Colonnes (Thème Rouge Call Center) -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Card 1 : Details Prospect -->
                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-2xs space-y-4 hover:border-red-200 transition">
                    <div class="border-b border-slate-100 pb-3 flex justify-between items-center">
                        <h3 class="text-xs font-black uppercase tracking-wider text-slate-400 flex items-center gap-1.5">
                            <span>👤</span>
                            <span>Prospect Client</span>
                        </h3>
                        <span class="text-[11px] font-bold text-red-800 bg-red-50 px-2 py-0.5 rounded-md border border-red-100">ID #{{ $rendezVous->prospect->id }}</span>
                    </div>

                    <div class="flex items-center gap-3">
                        <div class="w-12 h-12 rounded-2xl bg-red-100 text-[#7f0504] font-black flex items-center justify-center text-sm shrink-0 shadow-2xs">
                            {{ strtoupper(substr($rendezVous->prospect->nom, 0, 1) . substr($rendezVous->prospect->prenom, 0, 1)) ?: '👤' }}
                        </div>
                        <div>
                            <p class="text-base font-black text-slate-900 leading-tight">{{ $rendezVous->prospect->nomComplet() }}</p>
                            @if($rendezVous->prospect->societe)
                                <p class="text-xs font-bold text-red-800 mt-0.5">🏢 {{ $rendezVous->prospect->societe }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="space-y-2 text-xs text-slate-600 border-t border-slate-100 pt-3">
                        <p class="flex items-center gap-2">
                            <span class="font-bold text-slate-400">📞 Téléphone :</span>
                            <a href="tel:{{ $rendezVous->prospect->telephone }}" class="font-black text-[#7f0504] hover:underline">
                                {{ $rendezVous->prospect->telephone }}
                            </a>
                        </p>
                        @if($rendezVous->prospect->email)
                            <p class="flex items-center gap-2">
                                <span class="font-bold text-slate-400">📧 Email :</span>
                                <strong class="text-slate-800 break-all">{{ $rendezVous->prospect->email }}</strong>
                            </p>
                        @endif
                        @if($rendezVous->prospect->secteur)
                            <p class="flex items-center gap-2">
                                <span class="font-bold text-slate-400">🏢 Secteur :</span>
                                <strong class="text-slate-800">{{ $rendezVous->prospect->secteur }}</strong>
                            </p>
                        @endif
                    </div>
                </div>

                <!-- Card 2 : Details Entretien -->
                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-2xs space-y-4 hover:border-red-200 transition">
                    <div class="border-b border-slate-100 pb-3 flex justify-between items-center">
                        <h3 class="text-xs font-black uppercase tracking-wider text-slate-400 flex items-center gap-1.5">
                            <span>📅</span>
                            <span>Entretien Planifié</span>
                        </h3>
                        <span class="inline-flex items-center px-2 py-0.5 rounded-full text-[10px] font-black border {{ $rendezVous->statusBadgeClasses() }}">
                            {{ $rendezVous->statusLabel() }}
                        </span>
                    </div>

                    <div class="bg-slate-50 p-4 rounded-xl border border-slate-100 space-y-1.5">
                        <p class="text-sm font-black text-slate-900 flex items-center gap-2">
                            <span>📅</span> {{ \Carbon\Carbon::parse($rendezVous->date_rendez_vous)->format('d/m/Y') }}
                            <span class="text-slate-400">|</span>
                            <span>⏰</span> {{ \Carbon\Carbon::parse($rendezVous->heure_rendez_vous)->format('H:i') }}
                        </p>
                        <p class="text-xs text-slate-700 font-semibold pt-1">
                            <strong class="text-slate-500">Objet :</strong> {{ $rendezVous->objet }}
                        </p>
                    </div>

                    @if($rendezVous->notes)
                        <div class="p-3 bg-red-50/60 rounded-xl text-xs text-red-900 border border-red-200/60">
                            <strong class="font-black text-red-800">📝 Notes de l'Agent :</strong>
                            <p class="mt-1 font-medium leading-relaxed">{{ $rendezVous->notes }}</p>
                        </div>
                    @endif
                </div>

                <!-- Card 3 : Details Partenaire -->
                <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-2xs space-y-4 hover:border-red-200 transition">
                    <div class="border-b border-slate-100 pb-3">
                        <h3 class="text-xs font-black uppercase tracking-wider text-slate-400 flex items-center gap-1.5">
                            <span>🤝</span>
                            <span>Partenaire Commercial</span>
                        </h3>
                    </div>

                    @if($rendezVous->partenaire)
                        <div class="flex items-start gap-3">
                            <div class="w-10 h-10 rounded-xl bg-blue-100 text-blue-900 font-black flex items-center justify-center text-sm shrink-0">
                                🤝
                            </div>
                            <div>
                                <p class="text-base font-black text-blue-950">{{ $rendezVous->partenaire->fullName() }}</p>
                                <p class="text-xs text-slate-500 font-semibold">{{ $rendezVous->partenaire->institution ?? 'Partenaire Commercial' }}</p>
                                <p class="text-[11px] text-slate-400 mt-1">📧 {{ $rendezVous->partenaire->email }}</p>
                            </div>
                        </div>
                    @else
                        <div class="p-4 rounded-xl bg-amber-50 border border-amber-200 text-xs font-bold text-amber-800 flex items-center gap-2">
                            <span class="text-base">⏳</span>
                            <span>En attente d'affectation par l'Administrateur.</span>
                        </div>
                    @endif
                </div>
            </div>

            <!-- 2. Bloc Résultat de la Qualification -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-2xs">
                <div class="border-b border-slate-100 pb-4 mb-4 flex justify-between items-center">
                    <h3 class="text-sm font-black uppercase flex items-center gap-2" style="color: #7f0504;">
                        <span>📋</span>
                        <span>Résultat de la Qualification Commerciale</span>
                    </h3>
                </div>

                @if($rendezVous->qualification)
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 bg-emerald-50/50 p-6 rounded-2xl border border-emerald-200">
                        <div>
                            <span class="block text-xs font-bold uppercase text-slate-500 mb-1">Résultat Commercial</span>
                            <span class="inline-flex items-center px-3.5 py-1.5 rounded-xl text-xs font-black bg-emerald-100 text-emerald-900 border border-emerald-300 shadow-2xs">
                                {{ $rendezVous->qualification->resultat }}
                            </span>
                        </div>

                        <div>
                            <span class="block text-xs font-bold uppercase text-slate-500 mb-1">Niveau de Potentiel</span>
                            <span class="inline-flex items-center px-3.5 py-1.5 rounded-xl text-xs font-bold shadow-2xs {{ $rendezVous->qualification->potentielBadgeClasses() }}">
                                {{ $rendezVous->qualification->potentiel }}
                            </span>
                        </div>

                        <div>
                            <span class="block text-xs font-bold uppercase text-slate-500 mb-1">Date d'Évaluation</span>
                            <span class="text-xs font-bold text-slate-700 flex items-center gap-1.5 mt-1">
                                <span>📅</span>
                                <span>{{ $rendezVous->qualification->qualified_at ? $rendezVous->qualification->qualified_at->format('d/m/Y H:i') : 'Enregistré' }}</span>
                            </span>
                        </div>

                        @if($rendezVous->qualification->commentaire)
                            <div class="md:col-span-3 pt-4 border-t border-emerald-200/60">
                                <span class="block text-xs font-bold uppercase text-slate-500 mb-1">Commentaires du Partenaire :</span>
                                <p class="text-sm text-slate-700 bg-white p-4 rounded-xl border border-slate-200 font-medium leading-relaxed shadow-2xs">
                                    {{ $rendezVous->qualification->commentaire }}
                                </p>
                            </div>
                        @endif
                    </div>
                @else
                    <div class="p-8 text-center text-slate-400 bg-slate-50 rounded-2xl border border-dashed border-slate-200">
                        <div class="text-3xl mb-2">⏳</div>
                        <p class="text-sm font-bold text-slate-700">Le partenaire n'a pas encore qualifié cet entretien.</p>
                        <p class="text-xs text-slate-400 mt-1">Le résultat et les évaluations apparaîtront ici automatiquement dès validation.</p>
                    </div>
                @endif
            </div>

            <!-- 3. Timeline d'Historique des Actions -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-2xs">
                <h3 class="text-xs font-black uppercase text-slate-400 mb-4 flex items-center gap-2">
                    <span>📜</span>
                    <span>Historique du Workflow RDV</span>
                </h3>
                <div class="relative border-l-2 border-slate-100 ml-3 space-y-4">
                    @foreach($rendezVous->histories as $history)
                        <div class="relative pl-6">
                            <span class="absolute -left-[9px] top-1 w-4 h-4 rounded-full bg-red-200 border-2 border-white ring-2 ring-red-100 flex items-center justify-center text-[8px]"></span>
                            <div class="p-3 bg-slate-50 rounded-xl text-xs flex justify-between items-center border border-slate-200/80">
                                <div>
                                    <span class="font-bold text-slate-900">{{ $history->description }}</span>
                                    <span class="text-slate-400 ml-2">par <strong>{{ $history->user ? $history->user->fullName() : 'Système' }}</strong></span>
                                </div>
                                <span class="text-[11px] font-semibold text-slate-400 whitespace-nowrap ml-4">{{ $history->created_at->format('d/m/Y H:i') }}</span>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
