<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
            <div>
                <h2 class="text-2xl font-black uppercase tracking-tight text-slate-900 flex items-center gap-2">
                    🤝 Espace Partenaire Call Center — Rendez-vous Affectés
                </h2>
                <p class="text-sm text-slate-500 font-medium">Gestion et évaluation des qualifications prospects attribués</p>
            </div>
            <div class="flex items-center gap-2">
                <span class="inline-flex items-center gap-1.5 bg-blue-100 text-blue-900 text-xs font-bold px-3 py-1.5 rounded-xl border border-blue-200">
                    🤝 Compte Partenaire : {{ auth()->user()->fullName() }} ({{ auth()->user()->institution ?? 'Partenaire Commercial' }})
                </span>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            @if(session('success'))
                <div class="p-4 rounded-xl border border-emerald-200 bg-emerald-50 text-sm font-bold text-emerald-800 flex items-center justify-between">
                    <span>✅ {{ session('success') }}</span>
                </div>
            @endif

            {{-- Notifications en direct dans l'Espace Laravel du Partenaire --}}
            @if(auth()->user()->unreadNotifications->count() > 0)
                <div class="p-6 rounded-2xl bg-amber-500/10 border-2 border-amber-500/40 space-y-3">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <span class="text-xl">🎯</span>
                            <h3 class="text-sm font-black uppercase text-amber-900">
                                Notifications en direct : {{ auth()->user()->unreadNotifications->count() }} nouveau(x) RDV affecté(s) !
                            </h3>
                        </div>
                    </div>
                    <div class="space-y-2">
                        @foreach(auth()->user()->unreadNotifications as $notification)
                            <div class="p-3 bg-white rounded-xl border border-amber-200 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 text-xs">
                                <div>
                                    <span class="font-black text-slate-900">{{ $notification->data['title'] ?? 'Nouveau RDV' }}</span>
                                    <p class="text-slate-600 mt-0.5">{{ $notification->data['message'] ?? '' }}</p>
                                </div>
                                @if(isset($notification->data['url']))
                                    <a href="{{ $notification->data['url'] }}" class="shrink-0 rounded-lg bg-[#061743] px-3 py-1.5 text-xs font-bold text-white hover:bg-[#0a2060]">
                                        📋 Qualifier le prospect ➔
                                    </a>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <!-- Banner Partenaire -->
            <div class="bg-[#061743] p-6 rounded-2xl text-white shadow-xl flex flex-col md:flex-row items-start md:items-center justify-between gap-6 relative overflow-hidden">
                <div class="relative z-10">
                    <span class="inline-flex items-center gap-1.5 bg-white/20 text-white text-xs font-black px-3 py-1 rounded-md uppercase tracking-wider mb-2">
                        🤝 Suivi des Opportunités Commerciales
                    </span>
                    <h3 class="text-xl font-black uppercase tracking-tight">Vos Rendez-vous à Traiter</h3>
                    <p class="mt-1 text-xs text-slate-300">Consultez les informations prospects transmis par l'administrateur, réalisez l'entretien et enregistrez le résultat de la qualification.</p>
                </div>
            </div>

            <!-- Liste des Rendez-vous attribués -->
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-100 flex justify-between items-center bg-slate-50">
                    <h3 class="text-sm font-black uppercase tracking-wider text-slate-800">Rendez-vous Attribués ({{ $rendezVousList->total() }})</h3>
                </div>

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
                                            <span class="text-xs font-bold text-amber-600 bg-amber-50 px-2.5 py-1 rounded-lg border border-amber-200">À qualifier</span>
                                        @endif
                                    </td>

                                    <td class="p-4 text-right whitespace-nowrap space-x-2">
                                        <a href="{{ route('callcenter.partenaire.qualify', $rdv) }}" class="inline-flex items-center gap-2 rounded-xl bg-[#061743] hover:bg-[#0a2060] px-4 py-2 text-xs font-black uppercase text-white shadow transition-all">
                                            <span>📋 {{ $rdv->qualification ? 'Modifier Qualif.' : 'Qualifier' }}</span>
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
