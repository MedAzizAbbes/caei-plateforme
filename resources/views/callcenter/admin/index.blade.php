@extends('layouts.app')

@section('content')
<div class="flex min-h-screen -mt-8 -mx-4 sm:-mx-6 lg:-mx-8" style="background: linear-gradient(135deg, rgba(241, 245, 249, 0.85) 0%, rgba(226, 232, 240, 0.88) 100%), url('{{ asset('assets/img/service_callcenter_1786525651775.jpg') }}') center/cover fixed no-repeat;">
    {{-- Sidebar Admin --}}
    <x-admin-sidebar />

    {{-- Contenu Principal --}}
    <div class="flex-1 p-6 md:p-8 overflow-y-auto" x-data="{ 
        activeTab: '{{ old('tab', request('tab', 'overview')) }}',
        userSubTab: '{{ request('subtab', 'agents') }}',
        showCreateUserForm: false,
        selectedRdvs: [],
        setTab(t) {
            this.activeTab = t;
            const u = new URL(window.location);
            u.searchParams.set('tab', t);
            window.history.pushState({}, '', u);
        },
        editUserModal: false,
        editingUser: {
            id: '',
            first_name: '',
            last_name: '',
            email: '',
            phone: '',
            institution: '',
            role: 'callcenter_agent'
        },
        openEditUser(user) {
            this.editingUser = {
                id: user.id,
                first_name: user.first_name || '',
                last_name: user.last_name || '',
                email: user.email || '',
                phone: user.phone || '',
                institution: user.institution || '',
                role: user.role || 'callcenter_agent'
            };
            this.editUserModal = true;
        },
        closeEditUser() {
            this.editUserModal = false;
        },
        rdvListModal: false,
        rdvListUser: {
            id: null,
            name: '',
            role: '',
            role_label: '',
            email: '',
            phone: '',
            rdvs: []
        },
        openRdvList(user, rdvs, roleLabel) {
            this.rdvListUser = {
                id: user.id,
                name: ((user.first_name || '') + ' ' + (user.last_name || '')).trim(),
                role: user.role || '',
                role_label: roleLabel || '',
                email: user.email || '',
                phone: user.phone || '',
                rdvs: rdvs || []
            };
            this.rdvListModal = true;
        },
        closeRdvList() {
            this.rdvListModal = false;
        },
        requestModalOpen: false,
        currentRequest: {
            id: null,
            name: '',
            email: '',
            phone: '',
            subject: '',
            message: '',
            status: '',
            date: '',
            attachment: ''
        },
        openRequestModal(req) {
            let rawMessage = req.message || '';
            let entrepriseInfo = '';
            let realMessage = rawMessage;

            if (rawMessage.includes('--- Informations Entreprise ---')) {
                const parts = rawMessage.split('--- Message ---');
                realMessage = parts[1] ? parts[1].trim() : '';
                const infoPart = parts[0].replace('--- Informations Entreprise ---', '').trim();
                entrepriseInfo = infoPart;
            }

            this.currentRequest = {
                id: req.id,
                name: req.name || '',
                email: req.email || '',
                phone: req.phone || '',
                subject: req.subject || '',
                message: realMessage,
                entrepriseInfo: entrepriseInfo,
                status: req.status || '',
                date: req.date || '',
                attachment: req.attachment || ''
            };
            this.requestModalOpen = true;
        }
    }">

        {{-- En-tête Global --}}
        <div class="mb-6 rounded-2xl p-6 md:p-8 text-white shadow-xl flex flex-col md:flex-row md:items-center justify-between gap-6 relative overflow-hidden"
             style="background: linear-gradient(135deg, rgba(127, 5, 4, 0.92) 0%, rgba(70, 2, 2, 0.95) 100%), url('{{ asset('assets/img/service_callcenter_1786525651775.jpg') }}') center/cover no-repeat;">
            <div class="absolute -right-6 -bottom-8 opacity-20 text-8xl pointer-events-none select-none">🎧</div>
            <div class="relative z-10">
                <span class="inline-flex items-center gap-1.5 bg-red-100 text-xs font-black px-3 py-1 rounded-md uppercase tracking-wider mb-2" style="color: #7f0504;">
                    <span>📞</span> CAEI Call Center
                </span>
                <h1 class="text-2xl md:text-3xl font-black uppercase tracking-tight flex items-center gap-3">
                    <span>Administration Centralisée</span> 🎧
                </h1>
                <p class="mt-1 text-red-50 text-xs md:text-sm">Gestion unifiée du workflow RDV, des demandes web et des comptes utilisateurs.</p>
            </div>
            <div class="flex flex-wrap items-center gap-2.5 relative z-10">
                <a href="{{ route('admin.callcenter.export.excel', request()->only(['statut', 'agent_id', 'partenaire_id'])) }}" 
                   class="shrink-0 inline-flex items-center gap-1.5 bg-emerald-600 hover:bg-emerald-700 text-white font-bold text-xs px-3.5 py-2 rounded-xl shadow transition-all">
                    <span>📊 Exporter Excel</span>
                </a>
                <a href="{{ route('admin.callcenter.export.pdf', request()->only(['statut'])) }}" 
                   class="shrink-0 inline-flex items-center gap-1.5 bg-red-600 hover:bg-red-700 text-white font-bold text-xs px-3.5 py-2 rounded-xl shadow transition-all">
                    <span>📄 Exporter PDF</span>
                </a>
                <a href="{{ route('callcenter.index') }}" target="_blank"
                   class="shrink-0 inline-flex items-center gap-1.5 bg-white hover:bg-slate-50 font-bold text-xs px-3.5 py-2 rounded-xl shadow transition-all" style="color: #7f0504;">
                    <span>Voir le site 🌐</span>
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 rounded-xl border border-emerald-200 bg-emerald-50 text-sm font-bold text-emerald-800 flex items-center justify-between shadow-sm">
                <span>✅ {{ session('success') }}</span>
            </div>
        @endif

        @if(session('error'))
            <div class="mb-6 p-4 rounded-xl border border-rose-200 bg-rose-50 text-sm font-bold text-rose-800 flex items-center justify-between shadow-sm">
                <span>⚠️ {{ session('error') }}</span>
            </div>
        @endif

        @if($errors->any())
            <div class="mb-6 p-4 rounded-xl border border-rose-200 bg-rose-50 text-sm text-rose-800 shadow-sm">
                <p class="font-black mb-1">⚠️ Des erreurs sont survenues :</p>
                <ul class="list-disc list-inside text-xs space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- 🧭 Navigation Principale par Onglets Métiers -->
        <div class="mb-6 bg-white rounded-2xl p-2 shadow-sm border border-slate-200 flex flex-wrap items-center gap-2">
            <button type="button" 
                    @click="setTab('overview')" 
                    :style="activeTab === 'overview' ? 'background-color: #7f0504; color: #ffffff;' : ''"
                    :class="activeTab === 'overview' ? 'shadow-sm font-black text-white' : 'text-slate-600 hover:bg-slate-100 font-bold'"
                    class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-xs transition-all cursor-pointer">
                <span>📈 Vue d'Ensemble & Analytics</span>
            </button>

            <button type="button" 
                    @click="setTab('workflow')" 
                    :style="activeTab === 'workflow' ? 'background-color: #7f0504; color: #ffffff;' : ''"
                    :class="activeTab === 'workflow' ? 'shadow-sm font-black text-white' : 'text-slate-600 hover:bg-slate-100 font-bold'"
                    class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-xs transition-all cursor-pointer">
                <span>📊 Workflow RDVs</span>
                <span class="px-2 py-0.5 rounded-full text-[10px] font-black" 
                      :style="activeTab === 'workflow' ? 'background-color: rgba(255,255,255,0.25); color: #ffffff;' : 'background-color: #f1f5f9; color: #334155;'">
                    {{ $stats['total_rdv'] }}
                </span>
            </button>

            <button type="button" 
                    @click="setTab('demandes_web')" 
                    :style="activeTab === 'demandes_web' ? 'background-color: #7f0504; color: #ffffff;' : ''"
                    :class="activeTab === 'demandes_web' ? 'shadow-sm font-black text-white' : 'text-slate-600 hover:bg-slate-100 font-bold'"
                    class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-xs transition-all cursor-pointer">
                <span>📩 Demandes Web</span>
                @if($stats['demandes_nouvelles'] > 0)
                    <span class="bg-red-500 text-white font-black px-2 py-0.5 rounded-full text-[10px]">
                        {{ $stats['demandes_nouvelles'] }}
                    </span>
                @else
                    <span class="px-2 py-0.5 rounded-full text-[10px] font-black" 
                          :style="activeTab === 'demandes_web' ? 'background-color: rgba(255,255,255,0.25); color: #ffffff;' : 'background-color: #f1f5f9; color: #334155;'">
                        {{ $stats['total_demandes_site'] }}
                    </span>
                @endif
            </button>

            <button type="button" 
                    @click="setTab('utilisateurs')" 
                    :style="activeTab === 'utilisateurs' ? 'background-color: #7f0504; color: #ffffff;' : ''"
                    :class="activeTab === 'utilisateurs' ? 'shadow-sm font-black text-white' : 'text-slate-600 hover:bg-slate-100 font-bold'"
                    class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-xs transition-all cursor-pointer">
                <span>👥 Gestion des Comptes</span>
                <span class="px-2 py-0.5 rounded-full text-[10px] font-black" 
                      :style="activeTab === 'utilisateurs' ? 'background-color: rgba(255,255,255,0.25); color: #ffffff;' : 'background-color: #f1f5f9; color: #334155;'">
                    {{ count($agents) + count($partenaires) }}
                </span>
            </button>
        </div>

        <!-- ================================================================================== -->
        <!-- TAB 1 : VUE D'ENSEMBLE & ANALYTICS -->
        <!-- ================================================================================== -->
        <div x-show="activeTab === 'overview'" class="space-y-6">
            <!-- Bannière de Statistiques KPI -->
            <div class="grid grid-cols-2 md:grid-cols-6 gap-4">
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

            <!-- Graphiques Analytics Chart.js -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
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

            <!-- Raccourcis d'Accès Rapide -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pt-2">
                <div @click="setTab('workflow')" class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition cursor-pointer flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-red-50 text-red-700 font-black text-2xl flex items-center justify-center shrink-0">📊</div>
                    <div>
                        <h4 class="font-black text-slate-900 text-sm">Gestion des RDVs & Workflow</h4>
                        <p class="text-xs text-slate-500 mt-0.5">Affecter les partenaires, suivre la qualification des prospects.</p>
                    </div>
                </div>

                <div @click="setTab('demandes_web')" class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition cursor-pointer flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-amber-50 text-amber-700 font-black text-2xl flex items-center justify-center shrink-0">📩</div>
                    <div>
                        <h4 class="font-black text-slate-900 text-sm">Demandes en Ligne</h4>
                        <p class="text-xs text-slate-500 mt-0.5">Consulter et traiter les requêtes reçues depuis le site public.</p>
                    </div>
                </div>

                <div @click="setTab('utilisateurs')" class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition cursor-pointer flex items-center gap-4">
                    <div class="w-12 h-12 rounded-2xl bg-blue-50 text-blue-700 font-black text-2xl flex items-center justify-center shrink-0">👥</div>
                    <div>
                        <h4 class="font-black text-slate-900 text-sm">Comptes Agents & Partenaires</h4>
                        <p class="text-xs text-slate-500 mt-0.5">Créer, modifier ou consulter le bilan d'activité de chaque utilisateur.</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- ================================================================================== -->
        <!-- TAB 2 : WORKFLOW RDV & PARTENAIRES -->
        <!-- ================================================================================== -->
        <div x-show="activeTab === 'workflow'" class="space-y-6">
            <!-- Barre d'Action Flottante pour Affectation en Masse -->
            <div x-show="selectedRdvs.length > 0" x-cloak
                 class="fixed bottom-6 left-1/2 transform -translate-x-1/2 z-50 bg-[#061743] text-white px-6 py-3.5 rounded-2xl shadow-2xl border border-blue-400/30 flex items-center gap-5 transition-all">
                <div class="flex items-center gap-2 text-xs font-black">
                    <span class="bg-[#f2a90f] text-[#061743] font-black px-2.5 py-1 rounded-lg text-xs" x-text="selectedRdvs.length"></span>
                    <span>RDV(s) sélectionné(s)</span>
                </div>
                
                <form method="POST" action="{{ route('admin.callcenter.bulk_assign') }}" class="flex items-center gap-2">
                    @csrf
                    <template x-for="id in selectedRdvs" :key="id">
                        <input type="hidden" name="rdv_ids[]" :value="id">
                    </template>
                    <select name="partenaire_id" required class="text-xs rounded-xl border-0 bg-white px-3 py-2 text-slate-800 font-bold focus:ring-2 focus:ring-[#f2a90f] shadow-sm">
                        <option value="" class="text-slate-500">-- Choisir le Partenaire --</option>
                        @foreach($partenaires as $p)
                            <option value="{{ $p->id }}" class="text-slate-800 font-medium">{{ $p->fullName() }} ({{ $p->institution ?? 'Partenaire' }})</option>
                        @endforeach
                    </select>
                    <button type="submit" class="bg-[#f2a90f] hover:bg-[#d99405] text-[#061743] font-black text-xs px-4 py-2 rounded-xl shadow cursor-pointer transition">
                        ⚡ Affecter en Masse
                    </button>
                </form>
                <button type="button" @click="selectedRdvs = []" class="text-xs text-slate-300 hover:text-white underline">
                    Annuler
                </button>
            </div>

            <!-- Filtres Workflow -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm">
                <form method="GET" action="{{ route('admin.callcenter.dashboard') }}" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-5 gap-4 items-end">
                    <input type="hidden" name="tab" value="workflow">

                    <div>
                        <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Statut RDV</label>
                        <select name="statut" class="w-full rounded-xl border-slate-200 bg-slate-50 text-sm text-slate-800 focus:border-[#7f0504]">
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
                        <select name="agent_id" class="w-full rounded-xl border-slate-200 bg-slate-50 text-sm text-slate-800 focus:border-[#7f0504]">
                            <option value="">Tous les agents</option>
                            @foreach($agents as $agent)
                                <option value="{{ $agent->id }}" {{ request('agent_id') == $agent->id ? 'selected' : '' }}>{{ $agent->fullName() }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Partenaire Commercial</label>
                        <select name="partenaire_id" class="w-full rounded-xl border-slate-200 bg-slate-50 text-sm text-slate-800 focus:border-[#7f0504]">
                            <option value="">Tous les partenaires</option>
                            @foreach($partenaires as $partenaire)
                                <option value="{{ $partenaire->id }}" {{ request('partenaire_id') == $partenaire->id ? 'selected' : '' }}>{{ $partenaire->fullName() }} ({{ $partenaire->institution ?? 'Partenaire' }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Date RDV</label>
                        <input type="date" name="date" value="{{ request('date') }}" class="w-full rounded-xl border-slate-200 bg-slate-50 text-sm text-slate-800 focus:border-[#7f0504]">
                    </div>

                    <div class="flex gap-2">
                        <button type="submit" class="w-full rounded-xl py-2.5 text-xs font-black uppercase text-white transition" style="background-color: #991b1b;">
                            Appliquer les filtres
                        </button>
                        <a href="{{ route('admin.callcenter.dashboard', ['tab' => 'workflow']) }}" class="rounded-xl border border-slate-300 px-3 py-2.5 text-xs font-bold text-slate-600 hover:bg-slate-100 transition flex items-center justify-center">
                            ↺
                        </a>
                    </div>
                </form>
            </div>

            <!-- Tableau Workflow RDV -->
            <div class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-100 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3 bg-gradient-to-r from-slate-50 to-white">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded-xl bg-red-100 text-red-800 flex items-center justify-center font-bold text-base">
                            📊
                        </div>
                        <div>
                            <h3 class="text-sm font-black uppercase tracking-wider text-slate-800">Workflow des Rendez-vous enregistrés ({{ $rendezVousList->total() }})</h3>
                            <p class="text-xs text-slate-500">Cochez plusieurs lignes pour déclencher l'affectation en masse</p>
                        </div>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse text-sm">
                        <thead>
                            <tr class="border-b border-slate-200 bg-slate-100/70 text-[11px] font-black uppercase tracking-wider text-slate-600">
                                <th class="py-3.5 px-4 w-10 text-center">
                                    <input type="checkbox" 
                                           @change="selectedRdvs = $event.target.checked ? [{{ $rendezVousList->pluck('id')->implode(',') }}] : []"
                                           :checked="selectedRdvs.length > 0 && selectedRdvs.length === {{ count($rendezVousList) }}"
                                           class="rounded border-slate-300 text-[#7f0504] focus:ring-[#7f0504] cursor-pointer">
                                </th>
                                <th class="py-3.5 px-4">Date & Heure</th>
                                <th class="py-3.5 px-4">Prospect / Client</th>
                                <th class="py-3.5 px-4">Agent Créateur</th>
                                <th class="py-3.5 px-4">Objet du RDV</th>
                                <th class="py-3.5 px-4">Partenaire Affecté</th>
                                <th class="py-3.5 px-4">Statut RDV</th>
                                <th class="py-3.5 px-4">Résultat Qualification</th>
                                <th class="py-3.5 px-4 text-right">Actions Admin</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100 font-medium text-slate-700">
                            @forelse($rendezVousList as $rdv)
                                <tr class="hover:bg-slate-50/80 transition" :class="selectedRdvs.includes({{ $rdv->id }}) ? 'bg-amber-50/60' : ''">
                                    <td class="py-3.5 px-4 text-center">
                                        <input type="checkbox" value="{{ $rdv->id }}" x-model.number="selectedRdvs" class="rounded border-slate-300 text-[#7f0504] focus:ring-[#7f0504] cursor-pointer">
                                    </td>

                                    <td class="py-3.5 px-4 whitespace-nowrap">
                                        <div class="font-bold text-slate-900 flex items-center gap-1.5">
                                            <span>📅</span> {{ \Carbon\Carbon::parse($rdv->date_rendez_vous)->format('d/m/Y') }}
                                        </div>
                                        <div class="text-xs text-slate-500 mt-0.5 flex items-center gap-1">
                                            <span>⏰</span> {{ \Carbon\Carbon::parse($rdv->heure_rendez_vous)->format('H:i') }}
                                        </div>
                                    </td>

                                    <td class="py-3.5 px-4">
                                        <div class="font-bold text-slate-900">{{ $rdv->prospect ? $rdv->prospect->nomComplet() : 'Prospect Inconnu' }}</div>
                                        @if($rdv->prospect)
                                            <div class="text-xs text-slate-500">📞 {{ $rdv->prospect->telephone }}</div>
                                            @if($rdv->prospect->societe)
                                                <div class="text-[11px] text-slate-400 font-semibold">🏢 {{ $rdv->prospect->societe }}</div>
                                            @endif
                                        @endif
                                    </td>

                                    <td class="py-3.5 px-4 whitespace-nowrap">
                                        @if($rdv->agent)
                                            <div class="font-bold text-slate-800 flex items-center gap-1">
                                                <span>🎧</span> {{ $rdv->agent->fullName() }}
                                            </div>
                                            <div class="text-[11px] text-slate-400">{{ $rdv->agent->email }}</div>
                                        @else
                                            <span class="text-xs text-slate-400 italic">Non renseigné</span>
                                        @endif
                                    </td>

                                    <td class="py-3.5 px-4">
                                        <div class="font-semibold text-slate-800 max-w-xs truncate" title="{{ $rdv->objet }}">{{ $rdv->objet }}</div>
                                    </td>

                                    <td class="py-3.5 px-4 whitespace-nowrap">
                                        @if($rdv->partenaire)
                                            <div class="font-bold text-[#7f0504] flex items-center gap-1">
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
                                        <div class="flex items-center justify-end gap-2">
                                            <form method="POST" action="{{ route('admin.callcenter.assign', $rdv->id) }}" class="flex items-center gap-1.5">
                                                @csrf
                                                <select name="partenaire_id" required class="text-xs rounded-xl border-slate-200 bg-slate-50 py-1.5 px-2 font-bold text-slate-800 focus:border-[#7f0504]">
                                                    <option value="">-- Affecter --</option>
                                                    @foreach($partenaires as $p)
                                                        <option value="{{ $p->id }}" {{ $rdv->partenaire_id == $p->id ? 'selected' : '' }}>
                                                            {{ $p->fullName() }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <button type="submit" class="px-2.5 py-1.5 rounded-xl bg-slate-900 hover:bg-black text-white text-xs font-bold transition cursor-pointer" title="Valider l'affectation">
                                                    ✔
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="p-8 text-center text-slate-400">
                                        Aucun rendez-vous ne correspond aux critères sélectionnés.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="p-4 border-t border-slate-100 bg-slate-50">
                    {{ $rendezVousList->appends(['tab' => 'workflow'])->links() }}
                </div>
            </div>
        </div>

        <!-- ================================================================================== -->
        <!-- TAB 3 : DEMANDES DU SITE PUBLIC -->
        <!-- ================================================================================== -->
        <div x-show="activeTab === 'demandes_web'" class="space-y-6">
            <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-100 flex justify-between items-center bg-slate-50">
                    <div>
                        <h3 class="text-sm font-black uppercase text-slate-800 flex items-center gap-2">
                            <span>📩</span> Demandes de Contact Web ({{ $publicRequests->total() }})
                        </h3>
                        <p class="text-xs text-slate-500">Demandes soumises depuis le formulaire en ligne du site Call Center</p>
                    </div>
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
                                        <form method="POST" action="{{ route('admin.callcenter.request.status', $req->id) }}">
                                            @csrf
                                            <select name="status" onchange="this.form.submit()" class="text-xs rounded-lg border-slate-300 py-1 px-2 font-bold text-slate-800">
                                                <option value="Non traité" {{ $req->status === 'Non traité' ? 'selected' : '' }}>🔴 Non traité</option>
                                                <option value="En cours de traitement" {{ $req->status === 'En cours de traitement' ? 'selected' : '' }}>🟡 En cours de traitement</option>
                                                <option value="Traité" {{ $req->status === 'Traité' ? 'selected' : '' }}>🟢 Traité</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td class="p-4 text-right whitespace-nowrap">
                                        <div class="flex items-center justify-end gap-2">
                                            <button type="button"
                                                @click="openRequestModal({
                                                    id: {{ $req->id }},
                                                    name: '{{ addslashes($req->name) }}',
                                                    email: '{{ addslashes($req->email) }}',
                                                    phone: '{{ addslashes($req->phone ?? '') }}',
                                                    subject: '{{ addslashes($req->subject) }}',
                                                    message: {{ json_encode($req->message) }},
                                                    status: '{{ $req->status }}',
                                                    date: '{{ $req->created_at->format('d/m/Y H:i') }}',
                                                    attachment: '{{ $req->attachment ? Storage::url($req->attachment) : '' }}'
                                                })"
                                                class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-bold text-white transition shadow-sm cursor-pointer"
                                                style="background-color: #7f0504;">
                                                ⚙️ Gérer
                                            </button>
                                            <form method="POST" action="{{ route('admin.callcenter.request.destroy', $req->id) }}" onsubmit="return confirm('Supprimer cette demande ?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-xs font-bold text-red-600 hover:underline">Supprimer</button>
                                            </form>
                                        </div>
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

                <div class="p-4 border-t border-slate-100 bg-slate-50">
                    {{ $publicRequests->appends(['tab' => 'demandes_web'])->links() }}
                </div>
            </div>
        </div>

        <!-- ================================================================================== -->
        <!-- TAB 4 : GESTION DES COMPTES (AGENTS & PARTENAIRES) -->
        <!-- ================================================================================== -->
        <div x-show="activeTab === 'utilisateurs'" class="space-y-6">
            <!-- Barre d'Action Création Compte -->
            <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm flex flex-col md:flex-row items-start md:items-center justify-between gap-4">
                <div>
                    <h3 class="text-base font-black uppercase text-[#7f0504]">👥 Gestion des Comptes Call Center</h3>
                    <p class="text-xs text-slate-500">Administration des accès pour les agents de prospection et partenaires commerciaux.</p>
                </div>
                <button type="button" @click="showCreateUserForm = !showCreateUserForm"
                        class="inline-flex items-center gap-2 rounded-xl px-5 py-2.5 text-xs font-black uppercase text-white shadow transition cursor-pointer"
                        style="background-color: #7f0504;">
                    <span x-text="showCreateUserForm ? '❌ Fermer la Saisie' : '➕ Nouveau Compte'"></span>
                </button>
            </div>

            <!-- Formulaire de Création (Dépliable) -->
            <div x-show="showCreateUserForm" x-cloak class="bg-white p-6 rounded-2xl border border-slate-200 shadow-md">
                <div class="border-b border-slate-100 pb-4 mb-6">
                    <h4 class="text-sm font-black uppercase text-slate-800">Saisie d'un nouvel Utilisateur</h4>
                    <p class="text-xs text-slate-400">Génération automatique des identifiants d'accès</p>
                </div>

                <form method="POST" action="{{ route('admin.callcenter.users.store') }}">
                    @csrf
                    <input type="hidden" name="tab" value="utilisateurs">

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-5">
                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Rôle du compte *</label>
                            <select name="role" required class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-800 focus:border-[#7f0504] focus:ring-[#7f0504]">
                                <option value="callcenter_agent">🎧 Agent Call Center (Créateur de RDV)</option>
                                <option value="callcenter_partenaire">🤝 Partenaire Commercial (Évaluateur / Qualificateur)</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Prénom *</label>
                            <input type="text" name="first_name" required placeholder="Ex: Karim" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-800 focus:border-[#7f0504] focus:ring-[#7f0504]">
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Nom *</label>
                            <input type="text" name="last_name" required placeholder="Ex: Mansour" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-800 focus:border-[#7f0504] focus:ring-[#7f0504]">
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Adresse Email *</label>
                            <input type="email" name="email" required placeholder="identifiant@caei.com" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-800 focus:border-[#7f0504] focus:ring-[#7f0504]">
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Téléphone</label>
                            <input type="text" name="phone" placeholder="+216 20 000 000" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-800 focus:border-[#7f0504] focus:ring-[#7f0504]">
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Société / Institution (Partenaire)</label>
                            <input type="text" name="institution" placeholder="Ex: Cabinet Audit Partner" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-800 focus:border-[#7f0504] focus:ring-[#7f0504]">
                        </div>

                        <div class="md:col-span-3">
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Mot de passe *</label>
                            <input type="password" name="password" required minlength="6" placeholder="Mot de passe de connexion" class="w-full md:w-1/3 rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-800 focus:border-[#7f0504] focus:ring-[#7f0504]">
                        </div>
                    </div>

                    <div class="mt-6 text-right border-t border-slate-100 pt-4 flex justify-end gap-3">
                        <button type="button" @click="showCreateUserForm = false" class="px-5 py-2.5 rounded-xl border border-slate-300 text-xs font-bold text-slate-600 hover:bg-slate-100 transition">
                            Annuler
                        </button>
                        <button type="submit" class="inline-flex items-center gap-2 rounded-xl px-6 py-2.5 text-xs font-black uppercase text-white shadow transition hover:opacity-95" style="background-color: #7f0504;">
                            <span>➕ Enregistrer l'utilisateur</span>
                        </button>
                    </div>
                </form>
            </div>

            <!-- Sous-Navigation Segmentée : Agents vs Partenaires -->
            <div class="flex flex-wrap items-center justify-between gap-4 bg-white p-3 rounded-2xl border border-slate-200 shadow-sm">
                <div class="flex items-center gap-2">
                    <button type="button" 
                            @click="userSubTab = 'agents'" 
                            :style="userSubTab === 'agents' ? 'background-color: #7f0504; color: #ffffff;' : 'background-color: #f8fafc; color: #1e293b; border-color: #e2e8f0;'"
                            :class="userSubTab === 'agents' ? 'shadow-sm font-black' : 'hover:bg-slate-100 font-bold border'"
                            class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-xs transition-all cursor-pointer">
                        <span>🎧</span>
                        <span :style="userSubTab === 'agents' ? 'color: #ffffff;' : 'color: #1e293b;'" class="font-bold">Agents Call Center</span>
                        <span class="px-2 py-0.5 rounded-full text-[10px] font-black" 
                              :style="userSubTab === 'agents' ? 'background-color: rgba(255,255,255,0.25); color: #ffffff;' : 'background-color: #fef3c7; color: #92400e;'">
                            {{ count($agents) }}
                        </span>
                    </button>

                    <button type="button" 
                            @click="userSubTab = 'partenaires'" 
                            :style="userSubTab === 'partenaires' ? 'background-color: #7f0504; color: #ffffff;' : 'background-color: #f8fafc; color: #1e293b; border-color: #e2e8f0;'"
                            :class="userSubTab === 'partenaires' ? 'shadow-sm font-black' : 'hover:bg-slate-100 font-bold border'"
                            class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-xs transition-all cursor-pointer">
                        <span>🤝</span>
                        <span :style="userSubTab === 'partenaires' ? 'color: #ffffff;' : 'color: #1e293b;'" class="font-bold">Partenaires Commerciaux</span>
                        <span class="px-2 py-0.5 rounded-full text-[10px] font-black" 
                              :style="userSubTab === 'partenaires' ? 'background-color: rgba(255,255,255,0.25); color: #ffffff;' : 'background-color: #dbeafe; color: #1e40af;'">
                            {{ count($partenaires) }}
                        </span>
                    </button>
                </div>

                <div class="text-xs text-slate-500 font-medium px-2">
                    <span x-show="userSubTab === 'agents'">Affichage de la liste des agents Call Center</span>
                    <span x-show="userSubTab === 'partenaires'">Affichage de la liste des partenaires commerciaux</span>
                </div>
            </div>

            <!-- Listes des Comptes Utilisateurs (Cartes Enrichies avec KPIs) -->
            <div class="space-y-6">
                <!-- 1. Liste des Agents -->
                <div x-show="userSubTab === 'agents'" x-cloak class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b border-slate-100 bg-slate-50 flex items-center justify-between">
                        <h3 class="text-sm font-black uppercase text-slate-800 flex items-center gap-2">
                            <span>🎧</span>
                            <span>Agents Call Center</span>
                        </h3>
                        <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-amber-100 text-amber-800">{{ count($agents) }} agent(s)</span>
                    </div>
                    <ul class="divide-y divide-slate-100 text-sm">
                        @forelse($agents as $agent)
                            @php
                                $agentRdvs = $agent->rendezVousAsAgent->map(function($r) {
                                    $statut = ($r->statut !== 'annule' && $r->qualification) ? 'qualifie' : $r->statut;
                                    return [
                                        'id' => $r->id,
                                        'date' => $r->date_rendez_vous ? \Carbon\Carbon::parse($r->date_rendez_vous)->format('d/m/Y') : '',
                                        'heure' => $r->heure_rendez_vous ? \Carbon\Carbon::parse($r->heure_rendez_vous)->format('H:i') : '',
                                        'objet' => $r->objet,
                                        'statut' => $statut,
                                        'status_label' => $r->statusLabel(),
                                        'prospect_nom' => $r->prospect ? $r->prospect->nomComplet() : '—',
                                        'prospect_phone' => $r->prospect ? $r->prospect->telephone : '',
                                        'prospect_societe' => $r->prospect ? $r->prospect->societe : '',
                                        'other_user_name' => $r->partenaire ? $r->partenaire->fullName() : 'Non affecté',
                                        'other_user_sub' => $r->partenaire && $r->partenaire->institution ? $r->partenaire->institution : '',
                                        'qualification_resultat' => $r->qualification ? $r->qualification->resultat : 'Non qualifié',
                                        'qualification_potentiel' => $r->qualification ? $r->qualification->potentiel : '',
                                    ];
                                })->values();

                                $agentTotalCount = count($agentRdvs);
                                $agentQualifiesCount = $agentRdvs->where('statut', 'qualifie')->count();
                                $agentRate = $agentTotalCount > 0 ? round(($agentQualifiesCount / $agentTotalCount) * 100) : 0;
                                $agentLatestRdv = $agent->rendezVousAsAgent->sortByDesc('created_at')->first();
                                $agentLastDate = $agentLatestRdv ? \Carbon\Carbon::parse($agentLatestRdv->created_at)->format('d/m/Y') : 'Aucun RDV';
                            @endphp
                            <li class="p-5 flex flex-col sm:flex-row sm:items-center justify-between gap-4 hover:bg-slate-50/80 transition">
                                <div class="flex items-start gap-3.5 min-w-0">
                                    <div class="w-11 h-11 rounded-2xl bg-amber-100 text-amber-800 font-black flex items-center justify-center text-sm shrink-0 shadow-xs">
                                        {{ strtoupper(substr($agent->first_name, 0, 1) . substr($agent->last_name, 0, 1)) ?: '🎧' }}
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <div class="font-bold text-slate-900 flex flex-wrap items-center gap-2">
                                            <span class="text-sm font-black">{{ $agent->fullName() }}</span>
                                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-black bg-amber-100 text-amber-800">Agent</span>
                                            <span class="px-2 py-0.5 rounded-full text-[10px] font-black bg-emerald-50 text-emerald-700 border border-emerald-200">🎯 {{ $agentRate }}% Qualifiés</span>
                                        </div>
                                        <div class="text-xs text-slate-600 mt-1 flex items-center gap-1.5 break-all">
                                            <span>📧</span>
                                            <span>{{ $agent->email }}</span>
                                        </div>
                                        @if($agent->phone)
                                            <div class="text-xs text-slate-500 mt-0.5 flex items-center gap-1.5">
                                                <span>📞</span>
                                                <span>{{ $agent->phone }}</span>
                                            </div>
                                        @endif
                                        <div class="text-[11px] text-slate-400 mt-1.5 flex items-center gap-3">
                                            <span>📅 <strong class="text-slate-700 font-bold">{{ $agentTotalCount }}</strong> RDV(s) créé(s)</span>
                                            <span>⏱️ Dernier RDV: <strong class="text-slate-700 font-bold">{{ $agentLastDate }}</strong></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex flex-wrap items-center gap-2 self-end sm:self-center shrink-0">
                                    <button type="button" 
                                            @click="openRdvList({{ json_encode($agent->only(['id', 'first_name', 'last_name', 'email', 'phone', 'role'])) }}, {{ json_encode($agentRdvs) }}, 'Agent Call Center')"
                                            class="inline-flex items-center gap-1.5 px-3 py-2 rounded-xl border border-indigo-200 bg-indigo-50 hover:bg-indigo-100 text-indigo-700 text-xs font-bold transition shadow-xs cursor-pointer"
                                            title="Voir la liste des rendez-vous">
                                        <span>📋</span>
                                        <span>Liste RDVs</span>
                                        <span class="px-1.5 py-0.2 text-[10px] rounded-md bg-indigo-200 text-indigo-900 font-black">{{ count($agentRdvs) }}</span>
                                    </button>

                                    <button type="button" 
                                            @click="openEditUser({
                                                id: {{ $agent->id }},
                                                first_name: '{{ addslashes($agent->first_name) }}',
                                                last_name: '{{ addslashes($agent->last_name) }}',
                                                email: '{{ addslashes($agent->email) }}',
                                                phone: '{{ addslashes($agent->phone ?? '') }}',
                                                institution: '{{ addslashes($agent->institution ?? '') }}',
                                                role: '{{ $agent->role }}'
                                            })"
                                            class="inline-flex items-center gap-1.5 px-3 py-2 rounded-xl border border-slate-200 bg-white hover:bg-slate-100 text-slate-700 text-xs font-bold transition shadow-xs cursor-pointer"
                                            title="Modifier l'agent">
                                        <span>✏️</span>
                                        <span>Modifier</span>
                                    </button>

                                    <form method="POST" action="{{ route('admin.callcenter.users.destroy', $agent->id) }}" 
                                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer définitivement le compte de l\'agent {{ addslashes($agent->fullName()) }} ?')" 
                                          class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="tab" value="utilisateurs">
                                        <button type="submit" 
                                                class="inline-flex items-center gap-1.5 px-3 py-2 rounded-xl border border-rose-200 bg-rose-50 hover:bg-rose-100 text-rose-700 text-xs font-bold transition shadow-xs cursor-pointer"
                                                title="Supprimer l'agent">
                                            <span>🗑️</span>
                                            <span>Supprimer</span>
                                        </button>
                                    </form>
                                </div>
                            </li>
                        @empty
                            <li class="p-8 text-center text-slate-400 text-sm">Aucun agent créé.</li>
                        @endforelse
                    </ul>
                </div>

                <!-- 2. Liste des Partenaires -->
                <div x-show="userSubTab === 'partenaires'" x-cloak class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
                    <div class="px-6 py-4 border-b border-slate-100 bg-slate-50 flex items-center justify-between">
                        <h3 class="text-sm font-black uppercase text-slate-800 flex items-center gap-2">
                            <span>🤝</span>
                            <span>Partenaires Commercial</span>
                        </h3>
                        <span class="px-2.5 py-1 rounded-full text-xs font-bold bg-blue-100 text-blue-800">{{ count($partenaires) }} partenaire(s)</span>
                    </div>
                    <ul class="divide-y divide-slate-100 text-sm">
                        @forelse($partenaires as $partenaire)
                            @php
                                $partenaireRdvs = $partenaire->rendezVousAsPartenaire->map(function($r) {
                                    $statut = ($r->statut !== 'annule' && $r->qualification) ? 'qualifie' : $r->statut;
                                    return [
                                        'id' => $r->id,
                                        'date' => $r->date_rendez_vous ? \Carbon\Carbon::parse($r->date_rendez_vous)->format('d/m/Y') : '',
                                        'heure' => $r->heure_rendez_vous ? \Carbon\Carbon::parse($r->heure_rendez_vous)->format('H:i') : '',
                                        'objet' => $r->objet,
                                        'statut' => $statut,
                                        'status_label' => $r->statusLabel(),
                                        'prospect_nom' => $r->prospect ? $r->prospect->nomComplet() : '—',
                                        'prospect_phone' => $r->prospect ? $r->prospect->telephone : '',
                                        'prospect_societe' => $r->prospect ? $r->prospect->societe : '',
                                        'other_user_name' => $r->agent ? $r->agent->fullName() : '—',
                                        'other_user_sub' => $r->agent ? $r->agent->email : '',
                                        'qualification_resultat' => $r->qualification ? $r->qualification->resultat : 'Non qualifié',
                                        'qualification_potentiel' => $r->qualification ? $r->qualification->potentiel : '',
                                    ];
                                })->values();

                                $partenaireTotalCount = count($partenaireRdvs);
                                $partenaireQualifiesCount = $partenaireRdvs->where('statut', 'qualifie')->count();
                                $partenaireRate = $partenaireTotalCount > 0 ? round(($partenaireQualifiesCount / $partenaireTotalCount) * 100) : 0;
                                $partenaireLatestRdv = $partenaire->rendezVousAsPartenaire->sortByDesc('updated_at')->first();
                                $partenaireLastDate = $partenaireLatestRdv ? \Carbon\Carbon::parse($partenaireLatestRdv->updated_at)->format('d/m/Y') : 'Aucun suivi';
                            @endphp
                            <li class="p-5 flex flex-col sm:flex-row sm:items-center justify-between gap-4 hover:bg-slate-50/80 transition">
                                <div class="flex items-start gap-3.5 min-w-0">
                                    <div class="w-11 h-11 rounded-2xl bg-blue-100 text-blue-800 font-black flex items-center justify-center text-sm shrink-0 shadow-xs">
                                        {{ strtoupper(substr($partenaire->first_name, 0, 1) . substr($partenaire->last_name, 0, 1)) ?: '🤝' }}
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <div class="font-bold text-slate-900 flex flex-wrap items-center gap-2">
                                            <span class="text-sm font-black">{{ $partenaire->fullName() }}</span>
                                            <span class="px-2.5 py-0.5 rounded-full text-[10px] font-black bg-blue-100 text-blue-800">Partenaire</span>
                                            <span class="px-2 py-0.5 rounded-full text-[10px] font-black bg-blue-50 text-blue-700 border border-blue-200">📈 {{ $partenaireRate }}% Qualifiés</span>
                                        </div>
                                        <div class="text-xs text-slate-600 mt-1 flex items-center gap-1.5 break-all">
                                            <span>📧</span>
                                            <span>{{ $partenaire->email }}</span>
                                        </div>
                                        @if($partenaire->phone)
                                            <div class="text-xs text-slate-500 mt-0.5 flex items-center gap-1.5">
                                                <span>📞</span>
                                                <span>{{ $partenaire->phone }}</span>
                                            </div>
                                        @endif
                                        @if($partenaire->institution)
                                            <div class="text-xs text-blue-800 font-bold mt-1 flex items-center gap-1.5">
                                                <span>🏢</span>
                                                <span>{{ $partenaire->institution }}</span>
                                            </div>
                                        @endif
                                        <div class="text-[11px] text-slate-400 mt-1.5 flex items-center gap-3">
                                            <span>🎯 <strong class="text-slate-700 font-bold">{{ $partenaireTotalCount }}</strong> RDV(s) attribué(s)</span>
                                            <span>⏱️ Dernier suivi: <strong class="text-slate-700 font-bold">{{ $partenaireLastDate }}</strong></span>
                                        </div>
                                    </div>
                                </div>

                                <div class="flex flex-wrap items-center gap-2 self-end sm:self-center shrink-0">
                                    <button type="button" 
                                            @click="openRdvList({{ json_encode($partenaire->only(['id', 'first_name', 'last_name', 'email', 'phone', 'role'])) }}, {{ json_encode($partenaireRdvs) }}, 'Partenaire Commercial')"
                                            class="inline-flex items-center gap-1.5 px-3 py-2 rounded-xl border border-indigo-200 bg-indigo-50 hover:bg-indigo-100 text-indigo-700 text-xs font-bold transition shadow-xs cursor-pointer"
                                            title="Voir la liste des rendez-vous">
                                        <span>📋</span>
                                        <span>Liste RDVs</span>
                                        <span class="px-1.5 py-0.2 text-[10px] rounded-md bg-indigo-200 text-indigo-900 font-black">{{ count($partenaireRdvs) }}</span>
                                    </button>

                                    <button type="button" 
                                            @click="openEditUser({
                                                id: {{ $partenaire->id }},
                                                first_name: '{{ addslashes($partenaire->first_name) }}',
                                                last_name: '{{ addslashes($partenaire->last_name) }}',
                                                email: '{{ addslashes($partenaire->email) }}',
                                                phone: '{{ addslashes($partenaire->phone ?? '') }}',
                                                institution: '{{ addslashes($partenaire->institution ?? '') }}',
                                                role: '{{ $partenaire->role }}'
                                            })"
                                            class="inline-flex items-center gap-1.5 px-3 py-2 rounded-xl border border-slate-200 bg-white hover:bg-slate-100 text-slate-700 text-xs font-bold transition shadow-xs cursor-pointer"
                                            title="Modifier le partenaire">
                                        <span>✏️</span>
                                        <span>Modifier</span>
                                    </button>

                                    <form method="POST" action="{{ route('admin.callcenter.users.destroy', $partenaire->id) }}" 
                                          onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer définitivement le compte du partenaire {{ addslashes($partenaire->fullName()) }} ?')" 
                                          class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="tab" value="utilisateurs">
                                        <button type="submit" 
                                                class="inline-flex items-center gap-1.5 px-3 py-2 rounded-xl border border-rose-200 bg-rose-50 hover:bg-rose-100 text-rose-700 text-xs font-bold transition shadow-xs cursor-pointer"
                                                title="Supprimer le partenaire">
                                            <span>🗑️</span>
                                            <span>Supprimer</span>
                                        </button>
                                    </form>
                                </div>
                            </li>
                        @empty
                            <li class="p-8 text-center text-slate-400 text-sm">Aucun partenaire créé.</li>
                        @endforelse
                    </ul>
                </div>
            </div>
        </div>

        {{-- ══════════════════════════════════════════════════════ --}}
        {{-- MODAL : DETAIL DEMANDE WEB                           --}}
        {{-- ══════════════════════════════════════════════════════ --}}
        <div x-show="requestModalOpen" x-cloak
             class="fixed inset-0 z-50 flex items-center justify-center p-4"
             style="background: rgba(15,23,42,0.65); backdrop-filter: blur(4px);">

            <div @click.away="requestModalOpen = false"
                 class="bg-white rounded-2xl shadow-2xl w-full max-w-md overflow-hidden border border-slate-200"
                 x-transition:enter="transition ease-out duration-200"
                 x-transition:enter-start="opacity-0 scale-95"
                 x-transition:enter-end="opacity-100 scale-100">

                <div class="relative px-4 py-3 overflow-hidden" style="background: linear-gradient(135deg, #7f0504 0%, #4a0202 100%);">
                    <div class="absolute -right-3 -top-3 w-14 h-14 rounded-full opacity-10 bg-white"></div>
                    <div class="relative flex items-center justify-between">
                        <div class="flex items-center gap-2">
                            <div class="w-8 h-8 rounded-lg bg-white/20 border border-white/30 flex items-center justify-center font-black text-white text-sm uppercase"
                                 x-text="currentRequest.name ? currentRequest.name.charAt(0).toUpperCase() : '?'">
                            </div>
                            <div>
                                <p class="text-white font-black text-xs leading-tight" x-text="currentRequest.name"></p>
                                <p class="text-white/60 text-[10px]" x-text="currentRequest.date"></p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full text-[10px] font-black border"
                                  :class="{
                                    'bg-red-100 text-red-700 border-red-300'            : currentRequest.status === 'Non traité',
                                    'bg-amber-100 text-amber-700 border-amber-300'      : currentRequest.status === 'En cours de traitement',
                                    'bg-emerald-100 text-emerald-700 border-emerald-300': currentRequest.status === 'Traité'
                                  }">
                                <span class="w-1.5 h-1.5 rounded-full"
                                      :class="{
                                        'bg-red-500'    : currentRequest.status === 'Non traité',
                                        'bg-amber-500'  : currentRequest.status === 'En cours de traitement',
                                        'bg-emerald-500': currentRequest.status === 'Traité'
                                      }"></span>
                                <span x-text="currentRequest.status"></span>
                            </span>
                            <button @click="requestModalOpen = false"
                                    class="w-6 h-6 rounded-lg bg-white/10 hover:bg-white/25 flex items-center justify-center text-white/80 hover:text-white transition cursor-pointer text-base leading-none">
                                &times;
                            </button>
                        </div>
                    </div>
                </div>

                <div class="px-4 py-3 space-y-2">
                    <div class="grid grid-cols-2 gap-2">
                        <div class="flex items-center gap-2 bg-slate-50 rounded-lg p-2 border border-slate-100">
                            <span class="text-sm shrink-0">📧</span>
                            <div class="min-w-0">
                                <p class="text-[9px] font-bold uppercase text-slate-400">Email</p>
                                <p class="text-[11px] font-bold text-slate-800 truncate" x-text="currentRequest.email"></p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2 bg-slate-50 rounded-lg p-2 border border-slate-100">
                            <span class="text-sm shrink-0">📞</span>
                            <div>
                                <p class="text-[9px] font-bold uppercase text-slate-400">Téléphone</p>
                                <p class="text-[11px] font-bold text-slate-800" x-text="currentRequest.phone || '—'"></p>
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center gap-2 bg-slate-50 rounded-lg p-2 border border-slate-100">
                        <span class="text-sm shrink-0">🏷️</span>
                        <div>
                            <p class="text-[9px] font-bold uppercase text-slate-400">Sujet</p>
                            <p class="text-[11px] font-black text-slate-800" x-text="currentRequest.subject"></p>
                        </div>
                    </div>

                    <div x-show="currentRequest.entrepriseInfo" class="bg-amber-50 border border-amber-100 rounded-lg p-2">
                        <p class="text-[9px] font-black uppercase text-amber-600 mb-1">🏢 Infos Entreprise</p>
                        <div class="space-y-0.5">
                            <template x-for="line in (currentRequest.entrepriseInfo || '').split('\n').filter(l => l.trim())">
                                <p class="text-[11px] font-semibold text-amber-900" x-text="line.replace('•', '').trim()"></p>
                            </template>
                        </div>
                    </div>

                    <div>
                        <p class="text-[9px] font-black uppercase text-slate-400 mb-1">💬 Message</p>
                        <div class="bg-slate-50 border border-slate-200 rounded-lg p-2.5 text-[11px] text-slate-700 leading-relaxed max-h-16 overflow-y-auto"
                             x-text="currentRequest.message">
                        </div>
                    </div>

                    <div x-show="currentRequest.attachment">
                        <a :href="currentRequest.attachment" target="_blank"
                           class="inline-flex items-center gap-2 px-4 py-2 rounded-xl border border-blue-200 bg-blue-50 text-xs font-bold text-blue-700 hover:bg-blue-100 transition">
                            📎 Télécharger la pièce jointe
                        </a>
                    </div>

                    <div class="border-t border-slate-100 pt-2">
                        <p class="text-[9px] font-black uppercase text-slate-400 mb-1.5">⚙️ Statut</p>
                        <form method="POST" :action="`/admin/callcenter-request-status/${currentRequest.id}`"
                              class="flex items-center gap-3">
                            @csrf
                            <select name="status"
                                    class="flex-1 rounded-xl border border-slate-200 bg-white px-3 py-2.5 text-sm font-bold text-slate-800 shadow-sm focus:border-[#7f0504] focus:ring-1 focus:ring-[#7f0504]">
                                <option value="Non traité"             :selected="currentRequest.status === 'Non traité'">🔴 Non traité</option>
                                <option value="En cours de traitement" :selected="currentRequest.status === 'En cours de traitement'">🟡 En cours de traitement</option>
                                <option value="Traité"                 :selected="currentRequest.status === 'Traité'">🟢 Traité</option>
                            </select>
                            <button type="submit"
                                    class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl text-xs font-black text-white shadow-md transition hover:opacity-90 cursor-pointer whitespace-nowrap"
                                    style="background: linear-gradient(135deg, #7f0504, #4a0202);">
                                ✔ Enregistrer
                            </button>
                        </form>
                    </div>

                </div>

                <div class="px-6 py-3 border-t border-slate-100 bg-slate-50 flex justify-between items-center">
                    <form method="POST" :action="`/admin/callcenter-request/${currentRequest.id}`"
                          onsubmit="return confirm('Supprimer définitivement cette demande ?')"
                          class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="inline-flex items-center gap-1.5 text-xs font-bold text-red-500 hover:text-red-700 transition cursor-pointer">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                            </svg>
                            Supprimer la demande
                        </button>
                    </form>
                    <button @click="requestModalOpen = false"
                            class="px-4 py-2 rounded-xl border border-slate-200 bg-white text-xs font-bold text-slate-600 hover:bg-slate-100 transition cursor-pointer shadow-sm">
                        Fermer
                    </button>
                </div>
            </div>
        </div>

        <!-- Modal de Modification d'un Compte Call Center -->
        <div x-show="editUserModal" x-cloak class="fixed inset-0 z-50 overflow-y-auto bg-slate-900/60 backdrop-blur-sm flex items-center justify-center p-4">
            <div @click.away="closeEditUser()" class="bg-white rounded-3xl max-w-2xl w-full shadow-2xl overflow-hidden transform transition-all">
                <div class="p-6 text-white flex justify-between items-center" style="background: linear-gradient(135deg, #7f0504 0%, #460202 100%);">
                    <div>
                        <h3 class="text-lg font-black uppercase flex items-center gap-2">
                            <span>✏️</span>
                            <span>Modifier le compte Call Center</span>
                        </h3>
                        <p class="text-xs text-red-100 mt-0.5">
                            Mise à jour des coordonnées et paramètres d'accès de <span class="font-bold text-white" x-text="editingUser.first_name + ' ' + editingUser.last_name"></span>
                        </p>
                    </div>
                    <button type="button" @click="closeEditUser()" class="text-white/70 hover:text-white text-2xl font-black transition leading-none cursor-pointer">&times;</button>
                </div>

                <form method="POST" :action="'{{ url('admin/callcenter-users') }}/' + editingUser.id" class="p-6 space-y-5">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="tab" value="utilisateurs">

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                        <div class="sm:col-span-2">
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Rôle du compte *</label>
                            <select name="role" x-model="editingUser.role" required class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-800 focus:border-[#7f0504] focus:ring-[#7f0504]">
                                <option value="callcenter_agent">🎧 Agent Call Center (Créateur de RDV)</option>
                                <option value="callcenter_partenaire">🤝 Partenaire Commercial (Évaluateur / Qualificateur)</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Prénom *</label>
                            <input type="text" name="first_name" x-model="editingUser.first_name" required class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-800 focus:border-[#7f0504] focus:ring-[#7f0504]">
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Nom *</label>
                            <input type="text" name="last_name" x-model="editingUser.last_name" required class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-800 focus:border-[#7f0504] focus:ring-[#7f0504]">
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Adresse Email *</label>
                            <input type="email" name="email" x-model="editingUser.email" required class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-800 focus:border-[#7f0504] focus:ring-[#7f0504]">
                        </div>

                        <div>
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Téléphone</label>
                            <input type="text" name="phone" x-model="editingUser.phone" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-800 focus:border-[#7f0504] focus:ring-[#7f0504]">
                        </div>

                        <div class="sm:col-span-2">
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Société / Institution (Partenaire)</label>
                            <input type="text" name="institution" x-model="editingUser.institution" placeholder="Ex: Cabinet Audit Partner" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-800 focus:border-[#7f0504] focus:ring-[#7f0504]">
                        </div>

                        <div class="sm:col-span-2 border-t border-slate-100 pt-3">
                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Nouveau mot de passe (Optionnel)</label>
                            <input type="password" name="password" minlength="6" placeholder="Laisser vide pour ne pas modifier" class="w-full rounded-xl border border-slate-200 bg-slate-50 px-4 py-2.5 text-sm text-slate-800 focus:border-[#7f0504] focus:ring-[#7f0504]">
                            <p class="text-[11px] text-slate-400 mt-1">Saisir uniquement en cas de réinitialisation du mot de passe de l'utilisateur.</p>
                        </div>
                    </div>

                    <div class="pt-4 border-t border-slate-100 flex justify-end gap-3">
                        <button type="button" @click="closeEditUser()" class="px-5 py-2.5 rounded-xl border border-slate-300 text-xs font-bold text-slate-600 hover:bg-slate-100 transition">
                            Annuler
                        </button>
                        <button type="submit" class="px-6 py-2.5 rounded-xl text-xs font-black uppercase text-white shadow transition hover:opacity-95" style="background-color: #7f0504;">
                            Enregistrer les modifications
                        </button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Modal Liste des RDVs associés à un Agent ou Partenaire -->
        <div x-show="rdvListModal" x-cloak class="fixed inset-0 z-50 overflow-y-auto bg-slate-900/60 backdrop-blur-sm flex items-center justify-center p-4">
            <div @click.away="closeRdvList()" class="bg-white rounded-3xl max-w-4xl w-full shadow-2xl overflow-hidden transform transition-all max-h-[85vh] flex flex-col">
                <div class="p-6 text-white flex justify-between items-center shrink-0" style="background: linear-gradient(135deg, #7f0504 0%, #460202 100%);">
                    <div class="flex items-center gap-3">
                        <div class="w-10 h-10 rounded-xl bg-white/20 flex items-center justify-center font-black text-lg">
                            📋
                        </div>
                        <div>
                            <div class="flex items-center gap-2">
                                <h3 class="text-lg font-black uppercase text-white" x-text="rdvListUser.name"></h3>
                                <span class="px-2.5 py-0.5 rounded-full text-[10px] font-black bg-white/20 text-white" x-text="rdvListUser.role_label"></span>
                            </div>
                            <p class="text-xs text-red-100 mt-0.5">
                                Liste des rendez-vous associés (<span class="font-bold text-white" x-text="rdvListUser.rdvs.length"></span> RDV au total)
                            </p>
                        </div>
                    </div>
                    <button type="button" @click="closeRdvList()" class="text-white/70 hover:text-white text-2xl font-black transition leading-none cursor-pointer">&times;</button>
                </div>

                <div class="p-6 overflow-y-auto flex-1">
                    <template x-if="rdvListUser.rdvs.length === 0">
                        <div class="text-center py-12 text-slate-400">
                            <div class="text-4xl mb-2">📭</div>
                            <p class="text-sm font-bold text-slate-600">Aucun rendez-vous trouvé pour ce compte.</p>
                            <p class="text-xs text-slate-400 mt-1">Cet utilisateur n'a pas encore de rendez-vous enregistré ou affecté.</p>
                        </div>
                    </template>

                    <template x-if="rdvListUser.rdvs.length > 0">
                        <div class="overflow-x-auto rounded-xl border border-slate-200 shadow-xs">
                            <table class="w-full text-left border-collapse text-xs">
                                <thead>
                                    <tr class="border-b border-slate-200 bg-slate-50 text-[10px] font-black uppercase tracking-wider text-slate-600">
                                        <th class="py-3 px-3.5">Date & Heure</th>
                                        <th class="py-3 px-3.5">Prospect</th>
                                        <th class="py-3 px-3.5">Objet</th>
                                        <th class="py-3 px-3.5" x-text="rdvListUser.role === 'callcenter_agent' ? 'Partenaire affecté' : 'Agent créateur'"></th>
                                        <th class="py-3 px-3.5">Statut</th>
                                        <th class="py-3 px-3.5">Qualification</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 font-medium text-slate-700">
                                    <template x-for="rdv in rdvListUser.rdvs" :key="rdv.id">
                                        <tr class="hover:bg-slate-50 transition-colors">
                                            <td class="py-3 px-3.5 whitespace-nowrap">
                                                <div class="font-bold text-slate-900 flex items-center gap-1.5">
                                                    <span>📅</span> <span x-text="rdv.date"></span>
                                                </div>
                                                <div class="mt-0.5 inline-block text-[11px] font-semibold text-slate-600 bg-slate-100 px-2 py-0.5 rounded border border-slate-200" x-text="'⏰ ' + rdv.heure"></div>
                                            </td>

                                            <td class="py-3 px-3.5">
                                                <div class="font-bold text-slate-900" x-text="rdv.prospect_nom"></div>
                                                <template x-if="rdv.prospect_phone">
                                                    <div class="text-[11px] text-slate-500 mt-0.5" x-text="'📞 ' + rdv.prospect_phone"></div>
                                                </template>
                                                <template x-if="rdv.prospect_societe">
                                                    <div class="text-[10px] text-slate-400 font-semibold" x-text="'🏢 ' + rdv.prospect_societe"></div>
                                                </template>
                                            </td>

                                            <td class="py-3 px-3.5 max-w-xs">
                                                <div class="font-semibold text-slate-800 truncate" :title="rdv.objet" x-text="rdv.objet || '—'"></div>
                                            </td>

                                            <td class="py-3 px-3.5 whitespace-nowrap">
                                                <div class="font-bold text-slate-900" x-text="rdv.other_user_name"></div>
                                                <template x-if="rdv.other_user_sub">
                                                    <div class="text-[10px] text-blue-700 font-semibold" x-text="rdv.other_user_sub"></div>
                                                </template>
                                            </td>

                                            <td class="py-3 px-3.5 whitespace-nowrap">
                                                <span class="inline-flex items-center px-2.5 py-1 rounded-full text-[10px] font-black"
                                                      :class="{
                                                          'bg-emerald-100 text-emerald-800': rdv.statut === 'qualifie',
                                                          'bg-blue-100 text-blue-800': rdv.statut === 'affecte',
                                                          'bg-amber-100 text-amber-800': rdv.statut === 'en_attente_affectation',
                                                          'bg-purple-100 text-purple-800': rdv.statut === 'qualification_en_cours',
                                                          'bg-rose-100 text-rose-800': rdv.statut === 'annule'
                                                      }"
                                                      x-text="rdv.status_label">
                                                </span>
                                            </td>

                                            <td class="py-3 px-3.5 whitespace-nowrap">
                                                <div class="font-bold text-slate-900" x-text="rdv.qualification_resultat"></div>
                                                <template x-if="rdv.qualification_potentiel">
                                                    <span class="inline-block mt-0.5 text-[10px] font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded border border-emerald-200" x-text="rdv.qualification_potentiel"></span>
                                                </template>
                                            </td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </div>
                    </template>
                </div>

                <div class="p-4 bg-slate-50 border-t border-slate-100 flex items-center justify-end shrink-0">
                    <button type="button" @click="closeRdvList()" class="px-5 py-2 rounded-xl border border-slate-300 text-xs font-bold text-slate-700 hover:bg-slate-200 transition cursor-pointer">
                        Fermer
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- Script Chart.js Analytics -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', () => {
        const chartData = @json($analyticsCharts);

        // 1. Performance Partenaires
        const ctxPartenaire = document.getElementById('ccPartenaireChart');
        if (ctxPartenaire && chartData.partenaires) {
            new Chart(ctxPartenaire, {
                type: 'bar',
                data: {
                    labels: chartData.partenaires.labels,
                    datasets: [
                        {
                            label: 'Qualifiés',
                            data: chartData.partenaires.qualifies,
                            backgroundColor: '#10b981',
                            borderRadius: 6,
                        },
                        {
                            label: 'En cours / Non qualifiés',
                            data: chartData.partenaires.en_cours,
                            backgroundColor: '#94a3b8',
                            borderRadius: 6,
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'bottom', labels: { font: { size: 10, weight: 'bold' } } }
                    },
                    scales: {
                        x: { grid: { display: false } },
                        y: { beginAtZero: true, ticks: { precision: 0 } }
                    }
                }
            });
        }

        // 2. Évolution Mensuelle
        const ctxMonthly = document.getElementById('ccMonthlyChart');
        if (ctxMonthly && chartData.monthly) {
            new Chart(ctxMonthly, {
                type: 'line',
                data: {
                    labels: chartData.monthly.labels,
                    datasets: [
                        {
                            label: 'RDV Créés',
                            data: chartData.monthly.crees,
                            borderColor: '#3b82f6',
                            backgroundColor: 'rgba(59, 130, 246, 0.1)',
                            fill: true,
                            tension: 0.3
                        },
                        {
                            label: 'RDV Qualifiés',
                            data: chartData.monthly.qualifies,
                            borderColor: '#10b981',
                            backgroundColor: 'transparent',
                            borderDash: [5, 5],
                            tension: 0.3
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'bottom', labels: { font: { size: 10, weight: 'bold' } } }
                    },
                    scales: {
                        x: { grid: { display: false } },
                        y: { beginAtZero: true, ticks: { precision: 0 } }
                    }
                }
            });
        }

        // 3. Activité Agents
        const ctxAgent = document.getElementById('ccAgentChart');
        if (ctxAgent && chartData.agents) {
            new Chart(ctxAgent, {
                type: 'doughnut',
                data: {
                    labels: chartData.agents.labels,
                    datasets: [{
                        data: chartData.agents.total,
                        backgroundColor: ['#f59e0b', '#3b82f6', '#10b981', '#6366f1', '#ec4899', '#8b5cf6'],
                        borderWidth: 2
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: { position: 'bottom', labels: { font: { size: 10, weight: 'bold' } } }
                    }
                }
            });
        }
    });
</script>
@endsection
