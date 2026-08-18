@extends('layouts.app')

@section('content')
<div class="flex min-h-screen -mt-8 -mx-4 sm:-mx-6 lg:-mx-8" style="background: linear-gradient(135deg, rgba(241, 245, 249, 0.85) 0%, rgba(226, 232, 240, 0.88) 100%), url('{{ asset('assets/img/service_callcenter_1786525651775.jpg') }}') center/cover fixed no-repeat;">
    {{-- Sidebar Admin --}}
    <x-admin-sidebar />

    {{-- Contenu Principal --}}
    <div class="flex-1 p-6 md:p-8 overflow-y-auto" x-data="{ 
        activeTab: '{{ request('tab', 'workflow') }}',
        setTab(t) {
            this.activeTab = t;
            const u = new URL(window.location);
            u.searchParams.set('tab', t);
            window.history.pushState({}, '', u);
        }
    }">

        {{-- En-tête --}}
        <div class="mb-8 rounded-2xl p-8 text-white shadow-xl flex flex-col md:flex-row md:items-center justify-between gap-6 relative overflow-hidden"
             style="background: linear-gradient(135deg, rgba(6, 23, 67, 0.88) 0%, rgba(0, 31, 63, 0.92) 100%), url('{{ asset('assets/img/service_callcenter_1786525651775.jpg') }}') center/cover no-repeat;">
            <div class="absolute -right-6 -bottom-8 opacity-20 text-8xl pointer-events-none select-none">🎧</div>
            <div class="relative z-10">
                <span class="inline-flex items-center gap-1.5 bg-white/20 text-white text-xs font-black px-3 py-1 rounded-md uppercase tracking-wider mb-2">
                    <span>📞</span> CAEI Call Center
                </span>
                <h1 class="text-3xl font-black uppercase tracking-tight flex items-center gap-3">
                    <span>Dashboard Administration Centralisé</span> 🎧
                </h1>
                <p class="mt-2 text-slate-300 text-sm">Gestion unifiée du workflow RDV, des demandes du site public et des comptes utilisateurs (Agents & Partenaires).</p>
            </div>
            <div class="flex flex-wrap items-center gap-3 relative z-10">
                <a href="{{ route('admin.callcenter.export.excel', request()->only(['statut', 'agent_id', 'partenaire_id'])) }}" 
                   class="shrink-0 inline-flex items-center gap-2 bg-emerald-600 hover:bg-emerald-700 text-white font-black text-xs px-4 py-2.5 rounded-xl shadow transition-all">
                    <span>📊 Exporter Excel (.csv)</span>
                </a>
                <a href="{{ route('admin.callcenter.export.pdf', request()->only(['statut'])) }}" 
                   class="shrink-0 inline-flex items-center gap-2 bg-red-600 hover:bg-red-700 text-white font-black text-xs px-4 py-2.5 rounded-xl shadow transition-all">
                    <span>📄 Exporter PDF</span>
                </a>
                <a href="{{ route('callcenter.index') }}" target="_blank"
                   class="shrink-0 inline-flex items-center gap-2 bg-white hover:bg-slate-100 text-[#061743] font-black text-xs px-4 py-2.5 rounded-xl shadow transition-all">
                    <span>Voir le site Call Center 🌐</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 rounded-xl border border-emerald-200 bg-emerald-50 text-sm font-bold text-emerald-800 flex items-center justify-between">
                <span>✅ {{ session('success') }}</span>
            </div>
        @endif

        <!-- 1. Bannière de Statistiques Unifiée -->
        <div class="grid grid-cols-2 md:grid-cols-6 gap-4 mb-6">
            <div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-sm">
                <p class="text-[11px] font-bold uppercase text-slate-400">Total RDV</p>
                <p class="text-2xl font-black text-slate-800 mt-1">{{ $stats['total_rdv'] }}</p>
            </div>
            <div class="bg-amber-50 p-4 rounded-2xl border border-amber-200 shadow-sm">
                <p class="text-[11px] font-bold uppercase text-amber-700">En attente affect.</p>
                <p class="text-2xl font-black text-amber-800 mt-1">{{ $stats['en_attente_affectation'] }}</p>
            </div>
            <div class="bg-emerald-50 p-4 rounded-2xl border border-emerald-200 shadow-sm">
                <p class="text-[11px] font-bold uppercase text-emerald-700">Qualifiés</p>
                <p class="text-2xl font-black text-emerald-800 mt-1">{{ $stats['qualifie'] }}</p>
            </div>
            <div class="bg-indigo-50 p-4 rounded-2xl border border-indigo-200 shadow-sm">
                <p class="text-[11px] font-bold uppercase text-indigo-700">Taux Qualif.</p>
                <p class="text-2xl font-black text-indigo-800 mt-1">{{ $stats['taux_qualification'] }}%</p>
            </div>
            <div class="bg-red-50 p-4 rounded-2xl border border-red-200 shadow-sm">
                <p class="text-[11px] font-bold uppercase text-red-700">Demandes Web Site</p>
                <p class="text-2xl font-black text-red-800 mt-1">{{ $stats['total_demandes_site'] }}</p>
            </div>
            <div class="bg-blue-50 p-4 rounded-2xl border border-blue-200 shadow-sm">
                <p class="text-[11px] font-bold uppercase text-blue-700">Agents / Partenaires</p>
                <p class="text-xl font-black text-blue-900 mt-1">{{ $stats['total_agents'] }} / {{ $stats['total_partenaires'] }}</p>
            </div>
        </div>

        <!-- 📈 Section Analytics & Graphiques de Performance (Chart.js) -->
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
            <!-- Graphique 1: Performance Partenaires -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm lg:col-span-1">
                <div class="flex items-center justify-between mb-4 pb-2 border-b border-slate-100">
                    <div>
                        <h3 class="text-xs font-black uppercase tracking-wider text-slate-800 flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-emerald-500"></span>
                            Performance par Partenaire
                        </h3>
                        <p class="text-[11px] text-slate-400 mt-0.5">RDV Qualifiés vs Non Qualifiés</p>
                    </div>
                </div>
                <div class="relative h-60">
                    <canvas id="ccPartenaireChart"></canvas>
                </div>
            </div>

            <!-- Graphique 2: Évolution Mensuelle -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm lg:col-span-1">
                <div class="flex items-center justify-between mb-4 pb-2 border-b border-slate-100">
                    <div>
                        <h3 class="text-xs font-black uppercase tracking-wider text-slate-800 flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-blue-500"></span>
                            Évolution Mensuelle des RDV
                        </h3>
                        <p class="text-[11px] text-slate-400 mt-0.5">Tendance sur les 6 derniers mois</p>
                    </div>
                </div>
                <div class="relative h-60">
                    <canvas id="ccMonthlyChart"></canvas>
                </div>
            </div>

            <!-- Graphique 3: Activité des Agents -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm lg:col-span-1">
                <div class="flex items-center justify-between mb-4 pb-2 border-b border-slate-100">
                    <div>
                        <h3 class="text-xs font-black uppercase tracking-wider text-slate-800 flex items-center gap-2">
                            <span class="w-2.5 h-2.5 rounded-full bg-amber-500"></span>
                            Volume RDV par Agent
                        </h3>
                        <p class="text-[11px] text-slate-400 mt-0.5">Total de rendez-vous générés</p>
                    </div>
                </div>
                <div class="relative h-60">
                    <canvas id="ccAgentChart"></canvas>
                </div>
            </div>
        </div>

        <!-- 2. Navigation par Onglets Centralisés (Tabs) -->
        <div class="bg-white p-2 rounded-2xl border border-slate-200 shadow-sm flex flex-wrap gap-2 mb-6">
            <button @click="setTab('workflow')" 
                    :class="activeTab === 'workflow' ? 'bg-[#061743] text-white shadow-md' : 'text-slate-600 hover:bg-slate-100'"
                    class="px-5 py-3 rounded-xl text-xs font-black uppercase transition flex items-center gap-2">
                <span>📊 Onglet 1 : Workflow RDV & Partenaires</span>
                @if($stats['en_attente_affectation'] > 0)
                    <span class="bg-amber-500 text-white text-[10px] font-black px-2 py-0.5 rounded-full">{{ $stats['en_attente_affectation'] }}</span>
                @endif
            </button>

            <button @click="setTab('demandes_web')" 
                    :class="activeTab === 'demandes_web' ? 'bg-[#061743] text-white shadow-md' : 'text-slate-600 hover:bg-slate-100'"
                    class="px-5 py-3 rounded-xl text-xs font-black uppercase transition flex items-center gap-2">
                <span>📩 Onglet 2 : Demandes de Contact du Site Public</span>
                @if($stats['demandes_nouvelles'] > 0)
                    <span class="bg-red-500 text-white text-[10px] font-black px-2 py-0.5 rounded-full">{{ $stats['demandes_nouvelles'] }}</span>
                @endif
            </button>

            <button @click="setTab('utilisateurs')" 
                    :class="activeTab === 'utilisateurs' ? 'bg-[#061743] text-white shadow-md' : 'text-slate-600 hover:bg-slate-100'"
                    class="px-5 py-3 rounded-xl text-xs font-black uppercase transition flex items-center gap-2">
                <span>👥 Onglet 3 : Gestion des Comptes (Agents & Partenaires)</span>
            </button>
        </div>

        <!-- ================================================================================== -->
        <!-- TAB 1 : WORKFLOW RDV & PARTENAIRES -->
        <!-- ================================================================================== -->
        <div x-show="activeTab === 'workflow'" class="space-y-6">
            <!-- Filtres Workflow -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
                <form method="GET" action="{{ route('callcenter.admin.dashboard') }}" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-4 items-end">
                    <input type="hidden" name="tab" value="workflow">

                    <div>
                        <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Statut RDV</label>
                        <select name="statut" class="w-full rounded-xl border-slate-200 bg-slate-50 text-sm text-slate-800 focus:border-[#061743]">
                            <option value="">Tous les statuts</option>
                            <option value="en_attente_affectation" {{ request('statut') == 'en_attente_affectation' ? 'selected' : '' }}>En attente d'affectation</option>
                            <option value="affecte" {{ request('statut') == 'affecte' ? 'selected' : '' }}>Affecté</option>
                            <option value="qualification_en_cours" {{ request('statut') == 'qualification_en_cours' ? 'selected' : '' }}>Qualification en cours</option>
                            <option value="qualifie" {{ request('statut') == 'qualifie' ? 'selected' : '' }}>Qualifié</option>
                            <option value="annule" {{ request('statut') == 'annule' ? 'selected' : '' }}>Annulé</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Agent Call Center</label>
                        <select name="agent_id" class="w-full rounded-xl border-slate-200 bg-slate-50 text-sm text-slate-800 focus:border-[#061743]">
                            <option value="">Tous les agents</option>
                            @foreach($agents as $agent)
                                <option value="{{ $agent->id }}" {{ request('agent_id') == $agent->id ? 'selected' : '' }}>{{ $agent->fullName() }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Partenaire Commercial</label>
                        <select name="partenaire_id" class="w-full rounded-xl border-slate-200 bg-slate-50 text-sm text-slate-800 focus:border-[#061743]">
                            <option value="">Tous les partenaires</option>
                            @foreach($partenaires as $partenaire)
                                <option value="{{ $partenaire->id }}" {{ request('partenaire_id') == $partenaire->id ? 'selected' : '' }}>{{ $partenaire->fullName() }} ({{ $partenaire->institution ?? 'Partenaire' }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Date RDV</label>
                        <input type="date" name="date" value="{{ request('date') }}" class="w-full rounded-xl border-slate-200 bg-slate-50 text-sm text-slate-800 focus:border-[#061743]">
                    </div>

                    <div class="flex gap-2">
                        <button type="submit" class="w-full rounded-xl bg-[#061743] py-2.5 text-xs font-black uppercase text-white hover:bg-[#0a2060] transition">
                            Filtrer
                        </button>
                        <a href="{{ route('callcenter.admin.dashboard', ['tab' => 'workflow']) }}" class="rounded-xl border border-slate-300 px-3 py-2.5 text-xs font-bold text-slate-600 hover:bg-slate-100 transition flex items-center justify-center">
                            ↺
                        </a>
                    </div>
                </form>
            </div>

            <!-- Tableau Workflow RDV -->
            <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-100 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 bg-gradient-to-r from-slate-50 to-white">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-xl bg-[#061743]/10 text-[#061743] flex items-center justify-center font-bold text-base">
                            📅
                        </div>
                        <div>
                            <h3 class="text-sm font-black uppercase tracking-wider text-slate-900">Prises de Rendez-vous & Qualifications</h3>
                            <p class="text-xs text-slate-500 font-medium">Gestion globale des rendez-vous et affectations partenaires</p>
                        </div>
                    </div>
                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-bold bg-slate-100 text-slate-700 border border-slate-200">
                        <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                        {{ $rendezVousList->total() }} RDV enregistrés
                    </span>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-sm">
                        <thead>
                            <tr class="border-b border-slate-200 bg-slate-50 text-[11px] font-black uppercase tracking-wider text-slate-600">
                                <th class="py-3.5 px-4">Date & Heure</th>
                                <th class="py-3.5 px-4">Prospect</th>
                                <th class="py-3.5 px-4">Agent créateur</th>
                                <th class="py-3.5 px-4">Objet</th>
                                <th class="py-3.5 px-4">Partenaire affecté</th>
                                <th class="py-3.5 px-4">Statut RDV</th>
                                <th class="py-3.5 px-4">Qualification</th>
                                <th class="py-3.5 px-4 text-right">Affectation</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 font-medium text-slate-700">
                            @forelse($rendezVousList as $rdv)
                                <tr class="hover:bg-slate-50/90 transition-colors">
                                    <td class="py-3.5 px-4 whitespace-nowrap">
                                        <div class="font-bold text-slate-900 flex items-center gap-1.5">
                                            <span>📅</span> {{ \Carbon\Carbon::parse($rdv->date_rendez_vous)->format('d/m/Y') }}
                                        </div>
                                        <div class="mt-0.5 inline-block text-xs font-semibold text-slate-600 bg-slate-100 px-2 py-0.5 rounded-md border border-slate-200">
                                            ⏰ {{ \Carbon\Carbon::parse($rdv->heure_rendez_vous)->format('H:i') }}
                                        </div>
                                    </td>

                                    <td class="py-3.5 px-4">
                                        <div class="flex items-start gap-2.5">
                                            <div class="w-8 h-8 rounded-lg bg-indigo-50 border border-indigo-100 text-indigo-700 font-black text-xs flex items-center justify-center shrink-0">
                                                {{ strtoupper(substr($rdv->prospect->nom ?? 'P', 0, 1) . substr($rdv->prospect->prenom ?? '', 0, 1)) }}
                                            </div>
                                            <div>
                                                <div class="font-bold text-slate-900 leading-snug">{{ $rdv->prospect->nomComplet() }}</div>
                                                <div class="text-xs font-semibold text-slate-500 flex items-center gap-1 mt-0.5">
                                                    <span>📞</span> <a href="tel:{{ $rdv->prospect->telephone }}" class="hover:underline hover:text-slate-800">{{ $rdv->prospect->telephone }}</a>
                                                </div>
                                                @if($rdv->prospect->societe)
                                                    <div class="text-[11px] text-slate-400 font-medium mt-0.5 flex items-center gap-1">
                                                        <span>🏢</span> {{ $rdv->prospect->societe }}
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </td>

                                    <td class="py-3.5 px-4 whitespace-nowrap">
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-lg text-xs font-semibold bg-slate-100 text-slate-700 border border-slate-200">
                                            🎧 {{ $rdv->agent->fullName() }}
                                        </span>
                                    </td>

                                    <td class="py-3.5 px-4">
                                        <div class="font-semibold text-slate-800 max-w-xs truncate" title="{{ $rdv->objet }}">{{ $rdv->objet }}</div>
                                    </td>

                                    <td class="py-3.5 px-4 whitespace-nowrap">
                                        @if($rdv->partenaire)
                                            <div class="font-bold text-[#061743] flex items-center gap-1">
                                                <span>🤝</span> {{ $rdv->partenaire->fullName() }}
                                            </div>
                                            <div class="text-[11px] text-slate-400 font-medium">{{ $rdv->partenaire->institution ?? 'Partenaire' }}</div>
                                        @else
                                            <span class="inline-flex items-center gap-1 text-xs font-bold text-amber-700 bg-amber-50 px-2.5 py-1 rounded-lg border border-amber-200">
                                                <span>⚠️</span> Non affecté
                                            </span>
                                        @endif
                                    </td>

                                    <td class="py-3.5 px-4 whitespace-nowrap">
                                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-bold border shadow-2xs {{ $rdv->statusBadgeClasses() }}">
                                            {{ $rdv->statusLabel() }}
                                        </span>
                                    </td>

                                    <td class="py-3.5 px-4">
                                        @if($rdv->qualification)
                                            <div class="space-y-1">
                                                <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-bold border {{ $rdv->qualification->resultatBadgeClasses() }}">
                                                    {{ $rdv->qualification->resultat }}
                                                </span>
                                                <div class="text-[11px] text-slate-500 font-medium">Potentiel: <strong class="text-slate-800">{{ $rdv->qualification->potentiel }}</strong></div>
                                            </div>
                                        @else
                                            <span class="inline-flex items-center gap-1 text-xs text-slate-400 bg-slate-50 px-2.5 py-1 rounded-lg border border-slate-200 italic font-medium">
                                                ⏳ En attente
                                            </span>
                                        @endif
                                    </td>

                                    <td class="py-3.5 px-4 text-right whitespace-nowrap">
                                        <form method="POST" action="{{ route('callcenter.admin.assign', $rdv) }}" class="inline-flex items-center gap-1.5">
                                            @csrf
                                            <select name="partenaire_id" required class="text-xs rounded-lg border-slate-300 py-1.5 px-2.5 text-slate-800 font-semibold focus:border-[#061743] focus:ring-1 focus:ring-[#061743] bg-white shadow-2xs">
                                                <option value="">-- Partenaire --</option>
                                                @foreach($partenaires as $p)
                                                    <option value="{{ $p->id }}" {{ $rdv->partenaire_id == $p->id ? 'selected' : '' }}>
                                                        {{ $p->fullName() }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            <button type="submit" class="rounded-lg bg-[#061743] px-3.5 py-1.5 text-xs font-black uppercase tracking-wider text-white hover:bg-[#0a2060] transition shadow-sm">
                                                {{ $rdv->partenaire_id ? 'Réaffecter' : 'Affecter' }}
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="p-8 text-center text-slate-400">
                                        Aucun rendez-vous enregistré pour le moment.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="p-4 border-t border-slate-100">
                    {{ $rendezVousList->appends(['tab' => 'workflow'])->links() }}
                </div>
            </div>
        </div>

        <!-- ================================================================================== -->
        <!-- TAB 2 : DEMANDES DU SITE PUBLIC -->
        <!-- ================================================================================== -->
        <div x-show="activeTab === 'demandes_web'" class="space-y-6">
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-100 flex justify-between items-center bg-slate-50">
                    <h3 class="text-sm font-black uppercase tracking-wider text-slate-800">Demandes de Contact Soumises en Ligne ({{ $publicRequests->total() }})</h3>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-sm">
                        <thead>
                            <tr class="border-b border-slate-200 bg-slate-100/70 text-[11px] font-black uppercase tracking-wider text-slate-600">
                                <th class="p-4">Date</th>
                                <th class="p-4">Nom & Contact</th>
                                <th class="p-4">Sujet</th>
                                <th class="p-4">Message</th>
                                <th class="p-4">Pièce jointe</th>
                                <th class="p-4">Statut</th>
                                <th class="p-4 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 font-medium text-slate-700">
                            @forelse($publicRequests as $req)
                                <tr class="hover:bg-slate-50/80 transition">
                                    <td class="p-4 whitespace-nowrap text-xs text-slate-400">
                                        {{ $req->created_at->format('d/m/Y H:i') }}
                                    </td>
                                    <td class="p-4">
                                        <div class="font-bold text-slate-900">{{ $req->name }}</div>
                                        <div class="text-xs text-slate-500">📧 {{ $req->email }}</div>
                                        <div class="text-xs text-slate-400">📞 {{ $req->phone }}</div>
                                    </td>
                                    <td class="p-4 font-semibold text-slate-800">
                                        {{ $req->subject }}
                                    </td>
                                    <td class="p-4">
                                        <div class="text-xs text-slate-600 max-w-xs truncate" title="{{ $req->message }}">{{ $req->message }}</div>
                                    </td>
                                    <td class="p-4 whitespace-nowrap">
                                        @if($req->attachment)
                                            <a href="{{ Storage::url($req->attachment) }}" target="_blank" class="inline-flex items-center gap-1 text-xs font-bold text-blue-600 hover:underline">
                                                📎 Fichier PDF/Doc
                                            </a>
                                        @else
                                            <span class="text-xs text-slate-400">—</span>
                                        @endif
                                    </td>
                                    <td class="p-4 whitespace-nowrap">
                                        <form method="POST" action="{{ route('callcenter.admin.request.status', $req->id) }}">
                                            @csrf
                                            <select name="status" onchange="this.form.submit()" class="text-xs rounded-lg border-slate-300 py-1 px-2 font-bold text-slate-800">
                                                <option value="Nouveau" {{ $req->status === 'Nouveau' ? 'selected' : '' }}>🔴 Nouveau</option>
                                                <option value="En cours" {{ $req->status === 'En cours' ? 'selected' : '' }}>🟡 En cours</option>
                                                <option value="Traité" {{ $req->status === 'Traité' ? 'selected' : '' }}>🟢 Traité</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td class="p-4 text-right whitespace-nowrap">
                                        <form method="POST" action="{{ route('callcenter.admin.request.destroy', $req->id) }}" onsubmit="return confirm('Supprimer cette demande ?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-xs font-bold text-red-600 hover:underline">Supprimer</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="p-8 text-center text-slate-400">Aucune demande en ligne enregistrée.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="p-4 border-t border-slate-100">
                    {{ $publicRequests->appends(['tab' => 'demandes_web'])->links() }}
                </div>
            </div>
        </div>

        <!-- ================================================================================== -->
        <!-- TAB 3 : GESTION DES COMPTES (AGENTS & PARTENAIRES) -->
        <!-- ================================================================================== -->
        <div x-show="activeTab === 'utilisateurs'" class="space-y-6">
            <!-- Formulaire de Création de Compte -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
                <div class="border-b border-slate-100 pb-4 mb-6">
                    <h3 class="text-base font-black uppercase text-[#061743]">➕ Créer un nouveau compte Call Center</h3>
                    <p class="text-xs text-slate-500">Génération automatique des identifiants d'accès pour les agents et les partenaires.</p>
                </div>

                <form method="POST" action="{{ route('callcenter.admin.users.store') }}">
                    @csrf
                    <input type="hidden" name="tab" value="utilisateurs">

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Rôle du compte *</label>
                            <select name="role" required class="w-full rounded-xl border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800 focus:border-[#061743]">
                                <option value="callcenter_agent">🎧 Agent Call Center (Créateur de RDV)</option>
                                <option value="callcenter_partenaire">🤝 Partenaire Commercial (Évaluateur / Qualificateur)</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Prénom *</label>
                            <input type="text" name="first_name" required placeholder="Ex: Karim" class="w-full rounded-xl border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800">
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Nom *</label>
                            <input type="text" name="last_name" required placeholder="Ex: Mansour" class="w-full rounded-xl border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800">
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Adresse Email *</label>
                            <input type="email" name="email" required placeholder="identifiant@caei.com" class="w-full rounded-xl border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800">
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Téléphone</label>
                            <input type="text" name="phone" placeholder="+216 20 000 000" class="w-full rounded-xl border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800">
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Société / Institution (Partenaire)</label>
                            <input type="text" name="institution" placeholder="Ex: Cabinet Audit Partner" class="w-full rounded-xl border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800">
                        </div>

                        <div class="md:col-span-3">
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Mot de passe *</label>
                            <input type="password" name="password" required minlength="6" placeholder="Mot de passe" class="w-full md:w-1/3 rounded-xl border-slate-200 bg-slate-50 px-4 py-3 text-sm text-slate-800">
                        </div>
                    </div>

                    <div class="mt-6 text-right border-t border-slate-100 pt-4">
                        <button type="submit" class="inline-flex rounded-xl bg-[#061743] px-6 py-3 text-xs font-black uppercase text-white hover:bg-[#0a2060] transition">
                            ➕ Générer le Compte
                        </button>
                    </div>
                </form>
            </div>

            <!-- Listes des Comptes -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Agents -->
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b border-slate-100 bg-slate-50">
                        <h3 class="text-sm font-black uppercase text-slate-800">🎧 Agents Call Center ({{ count($agents) }})</h3>
                    </div>
                    <ul class="divide-y divide-slate-100 text-sm">
                        @forelse($agents as $agent)
                            <li class="p-4 flex items-center justify-between hover:bg-slate-50">
                                <div>
                                    <div class="font-bold text-slate-900">{{ $agent->fullName() }}</div>
                                    <div class="text-xs text-slate-500">{{ $agent->email }}</div>
                                </div>
                                <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-amber-100 text-amber-800">Agent</span>
                            </li>
                        @empty
                            <li class="p-6 text-center text-slate-400">Aucun agent créé.</li>
                        @endforelse
                    </ul>
                </div>

                <!-- Partenaires -->
                <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b border-slate-100 bg-slate-50">
                        <h3 class="text-sm font-black uppercase text-slate-800">🤝 Partenaires Commercial ({{ count($partenaires) }})</h3>
                    </div>
                    <ul class="divide-y divide-slate-100 text-sm">
                        @forelse($partenaires as $partenaire)
                            <li class="p-4 flex items-center justify-between hover:bg-slate-50">
                                <div>
                                    <div class="font-bold text-slate-900">{{ $partenaire->fullName() }}</div>
                                    <div class="text-xs text-slate-500">{{ $partenaire->email }}</div>
                                    @if($partenaire->institution)<div class="text-[11px] text-blue-800 font-semibold">🏢 {{ $partenaire->institution }}</div>@endif
                                </div>
                                <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-blue-100 text-blue-800">Partenaire</span>
                            </li>
                        @empty
                            <li class="p-6 text-center text-slate-400">Aucun partenaire créé.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Script Chart.js Analytics -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        // 1. Graphique Partenaires (Qualifiés vs Non Qualifiés)
        const pCtx = document.getElementById('ccPartenaireChart');
        if (pCtx) {
            new Chart(pCtx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($analyticsCharts['partenaires']['labels'] ?? []) !!},
                    datasets: [
                        {
                            label: 'Qualifiés',
                            data: {!! json_encode($analyticsCharts['partenaires']['qualifies'] ?? []) !!},
                            backgroundColor: '#10b981',
                            borderRadius: 6
                        },
                        {
                            label: 'En cours / Non qualifié',
                            data: {!! json_encode($analyticsCharts['partenaires']['en_cours'] ?? []) !!},
                            backgroundColor: '#f59e0b',
                            borderRadius: 6
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'bottom', labels: { font: { size: 11, weight: 'bold' } } }
                    },
                    scales: { y: { beginAtZero: true, ticks: { precision: 0 } } }
                }
            });
        }

        // 2. Graphique Évolution Mensuelle
        const mCtx = document.getElementById('ccMonthlyChart');
        if (mCtx) {
            new Chart(mCtx, {
                type: 'line',
                data: {
                    labels: {!! json_encode($analyticsCharts['monthly']['labels'] ?? []) !!},
                    datasets: [
                        {
                            label: 'Total RDV Créés',
                            data: {!! json_encode($analyticsCharts['monthly']['crees'] ?? []) !!},
                            borderColor: '#3b82f6',
                            backgroundColor: 'rgba(59, 130, 246, 0.1)',
                            fill: true,
                            tension: 0.3
                        },
                        {
                            label: 'RDV Qualifiés',
                            data: {!! json_encode($analyticsCharts['monthly']['qualifies'] ?? []) !!},
                            borderColor: '#10b981',
                            backgroundColor: 'rgba(16, 185, 129, 0.1)',
                            fill: true,
                            tension: 0.3
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'bottom', labels: { font: { size: 11, weight: 'bold' } } }
                    },
                    scales: { y: { beginAtZero: true, ticks: { precision: 0 } } }
                }
            });
        }

        // 3. Graphique Activité Agents
        const aCtx = document.getElementById('ccAgentChart');
        if (aCtx) {
            new Chart(aCtx, {
                type: 'bar',
                data: {
                    labels: {!! json_encode($analyticsCharts['agents']['labels'] ?? []) !!},
                    datasets: [{
                        label: 'Total RDV Créés',
                        data: {!! json_encode($analyticsCharts['agents']['total'] ?? []) !!},
                        backgroundColor: '#061743',
                        borderRadius: 6
                    }]
                },
                options: {
                    indexAxis: 'y',
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { display: false }
                    },
                    scales: { x: { beginAtZero: true, ticks: { precision: 0 } } }
                }
            });
        }
    });
</script>
@endsection
