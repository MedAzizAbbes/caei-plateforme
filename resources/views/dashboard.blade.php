<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
            <div>
                <div class="flex items-center gap-2">
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full text-xs font-black bg-[#f2a90f] text-[#061743] uppercase tracking-wider">
                        ⚡ EXECUTIVE BI ANALYTICS
                    </span>
                    <span class="text-xs font-bold text-slate-500">v4.5 — Super-Console 7 Services</span>
                </div>
                <h2 class="font-black text-2xl uppercase tracking-tight text-[#061743] mt-1">
                    Tableau de bord BI Administrateur Global
                </h2>
            </div>
            @if(Auth::user()->isAdmin())
                <div class="flex items-center gap-2 flex-wrap">
                    {{-- 1. Séminaires (CAEI Navy) --}}
                    <a href="{{ route('admin.seminars.index') }}" class="inline-flex items-center gap-2 px-3 py-1.5 bg-[#061743] hover:bg-[#0a2060] text-white text-xs font-bold rounded-xl shadow transition">
                        🎓 Séminaires
                    </a>
                    {{-- 2. Call Center (CAEI Gold) --}}
                    <a href="{{ route('admin.callcenter.index') }}" class="inline-flex items-center gap-2 px-3 py-1.5 bg-[#f2a90f] hover:bg-[#d9950b] text-[#061743] text-xs font-black rounded-xl shadow transition">
                        📞 Call Center
                    </a>
                    {{-- 3. Médical (Crimson Rose) --}}
                    <a href="{{ route('admin.medical-requests.index') }}" class="inline-flex items-center gap-2 px-3 py-1.5 bg-rose-600 hover:bg-rose-700 text-white text-xs font-bold rounded-xl shadow transition">
                        🏥 Médical
                    </a>
                    {{-- 4. Digital Moov (Electric Cyan) --}}
                    <a href="{{ route('admin.digitalmoov.index') }}" class="inline-flex items-center gap-2 px-3 py-1.5 bg-cyan-600 hover:bg-cyan-700 text-white text-xs font-bold rounded-xl shadow transition">
                        🚀 Digital Moov
                    </a>
                    {{-- 5. Elite Training (Deep Indigo) --}}
                    <a href="{{ route('admin.elite-training.index') }}" class="inline-flex items-center gap-2 px-3 py-1.5 bg-indigo-600 hover:bg-indigo-700 text-white text-xs font-bold rounded-xl shadow transition">
                        🎓 Elite Exec
                    </a>
                    {{-- 6. Recrutement RH (Emerald Green) --}}
                    <a href="{{ route('admin.recrutements.index') }}" class="inline-flex items-center gap-2 px-3 py-1.5 bg-emerald-600 hover:bg-emerald-700 text-white text-xs font-bold rounded-xl shadow transition">
                        📄 Recrutement
                    </a>
                </div>
            @endif
        </div>
    </x-slot>

    <div class="py-8 bg-slate-100 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            {{-- Welcome Banner with Finance & Multi-Service Summary --}}
            <div class="bg-gradient-to-r from-[#061743] via-[#0c2b64] to-[#061743] rounded-3xl p-8 text-white shadow-2xl relative overflow-hidden">
                <div class="absolute -right-10 -bottom-10 opacity-10 text-9xl pointer-events-none select-none">📊</div>
                <div class="relative z-10 grid grid-cols-1 lg:grid-cols-3 gap-6 items-center">
                    <div class="lg:col-span-2 space-y-3">
                        <div class="inline-flex items-center gap-2 text-xs font-black uppercase tracking-widest text-[#f2a90f] bg-white/10 px-3 py-1 rounded-lg backdrop-blur-md">
                            <span>🏛️ CAEI GROUP ENTERPRISE BI — 7 SERVICES</span>
                        </div>
                        <h3 class="text-3xl font-black uppercase tracking-tight">Console Décisionnelle globale</h3>
                        <p class="text-slate-300 text-sm leading-relaxed max-w-2xl">
                            Supervisez la performance globale du groupe : Séminaires B2B, Chiffre d'Affaires encaissé, Call Center Outsourcing, CAEI Medical Center, Digital Moov, Elite Training & Candidatures RH.
                        </p>
                    </div>
                    <div class="bg-white/10 backdrop-blur-md rounded-2xl p-5 border border-white/15 text-center space-y-2">
                        <p class="text-xs font-bold uppercase tracking-wider text-slate-300">Chiffre d'Affaires Validé (CAEI)</p>
                        <p class="text-3xl font-black text-[#f2a90f]">
                            {{ number_format($totalRevenue ?? 0, 0, ',', ' ') }} €
                        </p>
                        <div class="flex justify-center items-center gap-2 text-[11px] font-semibold text-slate-200">
                            <span>En attente : {{ number_format($pendingRevenue ?? 0, 0, ',', ' ') }} €</span>
                        </div>
                    </div>
                </div>
            </div>

            @if(Auth::user()->isAdmin())
                {{-- 7 High-Density Executive KPI Cards Grid with Standardized Service Colors --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    
                    {{-- KPI 1: Finances & CA (Violet Theme) --}}
                    <div class="bg-white rounded-2xl p-5 border-l-4 border-l-purple-600 border-t border-r border-b border-slate-200 shadow-sm hover:shadow-md transition group">
                        <div class="flex items-center justify-between mb-3">
                            <span class="w-10 h-10 rounded-xl bg-purple-50 text-purple-600 flex items-center justify-center font-bold text-lg">💰</span>
                            <span class="text-[10px] font-black uppercase px-2 py-0.5 bg-purple-100 text-purple-800 rounded-md">Finances BI</span>
                        </div>
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">CA Séminaires Validé</p>
                        <div class="flex items-baseline justify-between mt-1">
                            <p class="text-2xl font-black text-slate-900">{{ number_format($totalRevenue ?? 0, 0, ',', ' ') }} €</p>
                        </div>
                        <p class="text-xs text-slate-500 mt-2">Paiements validés (Visa/Virement)</p>
                    </div>

                    {{-- KPI 2: Séminaires B2B (CAEI Navy Theme) --}}
                    <div class="bg-white rounded-2xl p-5 border-l-4 border-l-[#061743] border-t border-r border-b border-slate-200 shadow-sm hover:shadow-md transition group">
                        <div class="flex items-center justify-between mb-3">
                            <span class="w-10 h-10 rounded-xl bg-blue-50 text-[#061743] flex items-center justify-center font-bold text-lg">🎓</span>
                            <span class="text-[10px] font-black uppercase px-2 py-0.5 bg-blue-100 text-[#061743] rounded-md">Séminaires</span>
                        </div>
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Inscriptions & Présence</p>
                        <div class="flex items-baseline justify-between mt-1">
                            <p class="text-2xl font-black text-slate-900">{{ number_format($totalRegistrations ?? 0) }}</p>
                            <span class="text-xs font-bold text-emerald-600">{{ $attendanceRate ?? 0 }}% présent</span>
                        </div>
                        <div class="w-full bg-slate-100 h-1.5 rounded-full mt-3 overflow-hidden">
                            <div class="bg-[#061743] h-full rounded-full" style="width: {{ min(100, $attendanceRate ?? 0) }}%"></div>
                        </div>
                    </div>

                    {{-- KPI 3: Call Center RDV (CAEI Gold Theme) --}}
                    <div class="bg-white rounded-2xl p-5 border-l-4 border-l-[#f2a90f] border-t border-r border-b border-slate-200 shadow-sm hover:shadow-md transition group">
                        <div class="flex items-center justify-between mb-3">
                            <span class="w-10 h-10 rounded-xl bg-amber-50 text-[#f2a90f] flex items-center justify-center font-bold text-lg">📞</span>
                            <span class="text-[10px] font-black uppercase px-2 py-0.5 bg-amber-100 text-amber-900 rounded-md">Call Center</span>
                        </div>
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">RDV & Qualifications</p>
                        <div class="flex items-baseline justify-between mt-1">
                            <p class="text-2xl font-black text-slate-900">{{ number_format($totalCallCenterRDV ?? 0) }}</p>
                            <span class="text-xs font-bold text-amber-600">{{ $callCenterConversionRate ?? 0 }}% qualifié</span>
                        </div>
                        <div class="w-full bg-slate-100 h-1.5 rounded-full mt-3 overflow-hidden">
                            <div class="bg-[#f2a90f] h-full rounded-full" style="width: {{ min(100, $callCenterConversionRate ?? 0) }}%"></div>
                        </div>
                    </div>

                    {{-- KPI 4: CAEI Medical Center (Crimson Rose Theme) --}}
                    <div class="bg-white rounded-2xl p-5 border-l-4 border-l-rose-600 border-t border-r border-b border-slate-200 shadow-sm hover:shadow-md transition group">
                        <div class="flex items-center justify-between mb-3">
                            <span class="w-10 h-10 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center font-bold text-lg">🏥</span>
                            <span class="text-[10px] font-black uppercase px-2 py-0.5 bg-rose-100 text-rose-800 rounded-md">Médical</span>
                        </div>
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Demandes & Devis</p>
                        <div class="flex items-baseline justify-between mt-1">
                            <p class="text-2xl font-black text-slate-900">{{ number_format($totalMedicalRequests ?? 0) }}</p>
                            <span class="text-xs font-bold text-rose-600">{{ $totalClinics ?? 0 }} cliniques</span>
                        </div>
                        <p class="text-xs text-slate-500 mt-2">Volume Devis: {{ number_format($medicalDevisTotalSum ?? 0, 0, ',', ' ') }} €</p>
                    </div>

                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-4">
                    
                    {{-- KPI 5: Digital Moov (Cyan Theme) --}}
                    <div class="bg-white rounded-2xl p-5 border-l-4 border-l-cyan-600 border-t border-r border-b border-slate-200 shadow-sm hover:shadow-md transition group">
                        <div class="flex items-center justify-between mb-3">
                            <span class="w-10 h-10 rounded-xl bg-cyan-50 text-cyan-600 flex items-center justify-center font-bold text-lg">🚀</span>
                            <span class="text-[10px] font-black uppercase px-2 py-0.5 bg-cyan-100 text-cyan-800 rounded-md">Digital Moov</span>
                        </div>
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Leads Agence Web</p>
                        <div class="flex items-baseline justify-between mt-1">
                            <p class="text-2xl font-black text-slate-900">{{ number_format($totalDigitalMoovContacts ?? 0) }}</p>
                            <span class="text-xs font-bold text-cyan-600">Contacts Web</span>
                        </div>
                    </div>

                    {{-- KPI 6: Elite Training (Indigo Theme) --}}
                    <div class="bg-white rounded-2xl p-5 border-l-4 border-l-indigo-600 border-t border-r border-b border-slate-200 shadow-sm hover:shadow-md transition group">
                        <div class="flex items-center justify-between mb-3">
                            <span class="w-10 h-10 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center font-bold text-lg">🎓</span>
                            <span class="text-[10px] font-black uppercase px-2 py-0.5 bg-indigo-100 text-indigo-800 rounded-md">Elite Training</span>
                        </div>
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Demandes Exécutives</p>
                        <div class="flex items-baseline justify-between mt-1">
                            <p class="text-2xl font-black text-slate-900">{{ number_format($totalEliteAppointments ?? 0) }}</p>
                            <span class="text-xs font-bold text-indigo-600">{{ $totalFormationsElite ?? 0 }} programmes</span>
                        </div>
                    </div>

                    {{-- KPI 7: Recrutement & Écosystème (Emerald Theme) --}}
                    <div class="bg-white rounded-2xl p-5 border-l-4 border-l-emerald-600 border-t border-r border-b border-slate-200 shadow-sm hover:shadow-md transition group">
                        <div class="flex items-center justify-between mb-3">
                            <span class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold text-lg">📄</span>
                            <span class="text-[10px] font-black uppercase px-2 py-0.5 bg-emerald-100 text-emerald-800 rounded-md">RH & Utilisateurs</span>
                        </div>
                        <p class="text-[11px] font-bold text-slate-400 uppercase tracking-wider">Candidatures CV / Comptes</p>
                        <div class="flex items-baseline justify-between mt-1">
                            <p class="text-2xl font-black text-slate-900">{{ number_format($totalRecrutements ?? 0) }} CVs</p>
                            <span class="text-xs font-bold text-emerald-600">{{ number_format($totalUsers ?? 0) }} inscrits</span>
                        </div>
                    </div>

                </div>

                {{-- Interactive BI Visualizations Matrix --}}
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    
                    {{-- Chart 1: Call Center Qualification Breakdown (Gold Theme) --}}
                    <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm relative overflow-hidden">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="font-black text-[#061743] text-xs uppercase tracking-widest flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-[#f2a90f]"></span>
                                Call Center — Qualification RDV
                            </h3>
                            <span class="text-[10px] font-bold text-[#f2a90f] uppercase">Prospection</span>
                        </div>
                        <div class="relative h-64">
                            <canvas id="qualificationChart"></canvas>
                        </div>
                    </div>

                    {{-- Chart 2: Séminaires Attendance & Presences (Navy & Blue Theme) --}}
                    <div class="bg-white rounded-2xl p-6 lg:col-span-2 border border-slate-200 shadow-sm relative overflow-hidden">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="font-black text-[#061743] text-xs uppercase tracking-widest flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-[#061743]"></span>
                                Séminaires — Inscriptions vs Présences
                            </h3>
                            <span class="text-[10px] font-bold text-[#061743] uppercase">Assiduité B2B</span>
                        </div>
                        <div class="relative h-64">
                            <canvas id="seminarChart"></canvas>
                        </div>
                    </div>

                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    
                    {{-- Chart 3: Modes de Paiement Finance (Purple Theme) --}}
                    <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm relative overflow-hidden">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="font-black text-[#061743] text-xs uppercase tracking-widest flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-purple-600"></span>
                                Finances — Modes de Règlement
                            </h3>
                            <span class="text-[10px] font-bold text-purple-600 uppercase">Paiements</span>
                        </div>
                        <div class="relative h-64">
                            <canvas id="paymentsChart"></canvas>
                        </div>
                    </div>

                    {{-- Chart 4: Top 5 Institutions --}}
                    <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm relative overflow-hidden">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="font-black text-[#061743] text-xs uppercase tracking-widest flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-[#061743]"></span>
                                Top 5 Entreprises & Partenaires
                            </h3>
                            <span class="text-[10px] font-bold text-[#061743] uppercase">Institutions</span>
                        </div>
                        <div class="relative h-64">
                            <canvas id="institutionsChart"></canvas>
                        </div>
                    </div>

                    {{-- Chart 5: Répartition par Service (Harmonized Brand Palette) --}}
                    <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-sm relative overflow-hidden">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="font-black text-[#061743] text-xs uppercase tracking-widest flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-rose-500"></span>
                                Volume Général par Service
                            </h3>
                            <span class="text-[10px] font-bold text-slate-500 uppercase">Matrice Global</span>
                        </div>
                        <div class="relative h-64">
                            <canvas id="servicesVolumeChart"></canvas>
                        </div>
                    </div>

                </div>

                {{-- Unified Real-Time Operational Log & Audit Trail --}}
                <div x-data="{ 
                        activeTab: 'all',
                        searchQuery: '',
                        feed: {{ json_encode($unifiedActivityFeed) }},
                        formatDate(dateStr) {
                            if (!dateStr) return '—';
                            const d = new Date(dateStr);
                            return d.toLocaleDateString('fr-FR', { day: '2-digit', month: '2-digit', year: 'numeric', hour: '2-digit', minute: '2-digit' });
                        },
                        get filteredFeed() {
                            return this.feed.filter(item => {
                                const matchesTab = this.activeTab === 'all' || item.service_code === this.activeTab;
                                const matchesSearch = !this.searchQuery || 
                                    (item.name && item.name.toLowerCase().includes(this.searchQuery.toLowerCase())) ||
                                    (item.contact && item.contact.toLowerCase().includes(this.searchQuery.toLowerCase())) ||
                                    (item.detail && item.detail.toLowerCase().includes(this.searchQuery.toLowerCase())) ||
                                    (item.service && item.service.toLowerCase().includes(this.searchQuery.toLowerCase()));
                                return matchesTab && matchesSearch;
                            });
                        }
                     }" class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">

                    {{-- Journal Header --}}
                    <div class="p-6 border-b border-slate-100 flex flex-col md:flex-row md:items-center justify-between gap-4 bg-slate-50/50">
                        <div>
                            <div class="flex items-center gap-2">
                                <span class="text-xs font-black uppercase text-[#f2a90f] tracking-widest">REAL-TIME AUDIT TRAIL</span>
                                <span class="px-2 py-0.5 rounded-full text-[10px] font-black bg-[#061743] text-white" x-text="filteredFeed.length + ' événements'"></span>
                            </div>
                            <h3 class="text-lg font-black uppercase text-[#061743] mt-0.5">Journal d'Activité Multi-Services en Temps Réel</h3>
                        </div>

                        {{-- Live Search Input --}}
                        <div class="relative w-full md:w-80">
                            <input type="text" 
                                   x-model="searchQuery" 
                                   placeholder="🔍 Rechercher nom, contact, statut..." 
                                   class="w-full pl-9 pr-4 py-2 text-xs font-medium rounded-xl border border-slate-200 focus:border-[#061743] focus:ring-1 focus:ring-[#061743] transition shadow-2xs">
                        </div>
                    </div>

                    {{-- Filter Tabs Bar --}}
                    <div class="px-6 py-3 bg-slate-50 border-b border-slate-100 flex items-center gap-2 overflow-x-auto">
                        <button @click="activeTab = 'all'" 
                                :class="activeTab === 'all' ? 'bg-[#061743] text-white shadow-sm font-black' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200 font-bold'" 
                                class="px-3 py-1.5 rounded-xl text-xs transition cursor-pointer whitespace-nowrap">
                            Tous les services
                        </button>

                        <button @click="activeTab = 'callcenter'" 
                                :class="activeTab === 'callcenter' ? 'bg-[#f2a90f] text-[#061743] shadow-sm font-black' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200 font-bold'" 
                                class="px-3 py-1.5 rounded-xl text-xs transition cursor-pointer whitespace-nowrap">
                            📞 Call Center
                        </button>

                        <button @click="activeTab = 'medical'" 
                                :class="activeTab === 'medical' ? 'bg-rose-600 text-white shadow-sm font-black' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200 font-bold'" 
                                class="px-3 py-1.5 rounded-xl text-xs transition cursor-pointer whitespace-nowrap">
                            🏥 Médical
                        </button>

                        <button @click="activeTab = 'digitalmoov'" 
                                :class="activeTab === 'digitalmoov' ? 'bg-cyan-600 text-white shadow-sm font-black' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200 font-bold'" 
                                class="px-3 py-1.5 rounded-xl text-xs transition cursor-pointer whitespace-nowrap">
                            🚀 Digital Moov
                        </button>

                        <button @click="activeTab = 'elite'" 
                                :class="activeTab === 'elite' ? 'bg-indigo-600 text-white shadow-sm font-black' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200 font-bold'" 
                                class="px-3 py-1.5 rounded-xl text-xs transition cursor-pointer whitespace-nowrap">
                            🎓 Elite Exec
                        </button>

                        <button @click="activeTab = 'recrutement'" 
                                :class="activeTab === 'recrutement' ? 'bg-emerald-600 text-white shadow-sm font-black' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200 font-bold'" 
                                class="px-3 py-1.5 rounded-xl text-xs transition cursor-pointer whitespace-nowrap">
                            📄 Recrutement RH
                        </button>

                        <button @click="activeTab = 'finance'" 
                                :class="activeTab === 'finance' ? 'bg-purple-600 text-white shadow-sm font-black' : 'bg-white text-slate-600 hover:bg-slate-100 border border-slate-200 font-bold'" 
                                class="px-3 py-1.5 rounded-xl text-xs transition cursor-pointer whitespace-nowrap">
                            💰 Finances
                        </button>
                    </div>

                    {{-- Journal Table --}}
                    <div class="p-6">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-slate-200 text-xs">
                                <thead>
                                    <tr class="bg-slate-50 text-[10px] font-black uppercase text-slate-500">
                                        <th class="px-4 py-3 text-left">Pôle / Service</th>
                                        <th class="px-4 py-3 text-left">Nom / Prospect / Lead</th>
                                        <th class="px-4 py-3 text-left">Contact / Téléphone</th>
                                        <th class="px-4 py-3 text-left">Détail / Statut / Qualification</th>
                                        <th class="px-4 py-3 text-right">Date & Heure</th>
                                        <th class="px-4 py-3 text-right">Gestion</th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-slate-100 font-medium text-slate-700">
                                    <template x-for="item in filteredFeed" :key="item.service_code + '-' + item.id">
                                        <tr class="hover:bg-slate-50 transition">
                                            <td class="px-4 py-3.5 whitespace-nowrap">
                                                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md text-[10px] font-black border" :class="item.badge_class" x-text="item.service_badge"></span>
                                            </td>
                                            <td class="px-4 py-3.5 font-bold text-slate-900" x-text="item.name"></td>
                                            <td class="px-4 py-3.5 text-slate-600" x-text="item.contact"></td>
                                            <td class="px-4 py-3.5 whitespace-nowrap">
                                                <span class="inline-flex items-center px-2 py-0.5 rounded text-[11px] font-bold bg-slate-100 text-slate-700 border border-slate-200" x-text="item.detail"></span>
                                            </td>
                                            <td class="px-4 py-3.5 text-right text-slate-500 whitespace-nowrap" x-text="formatDate(item.date)"></td>
                                            <td class="px-4 py-3.5 text-right whitespace-nowrap">
                                                <a :href="item.action_url" class="inline-flex items-center gap-1 px-2.5 py-1 rounded-lg bg-slate-100 hover:bg-[#061743] hover:text-white text-[11px] font-bold text-slate-700 transition">
                                                    <span>Gérer</span>
                                                    <span>➔</span>
                                                </a>
                                            </td>
                                        </tr>
                                    </template>
                                    <template x-if="filteredFeed.length === 0">
                                        <tr>
                                            <td colspan="6" class="px-4 py-8 text-center text-slate-400 font-semibold">
                                                Aucun événement d'activité trouvé pour la recherche ou le filtre sélectionné.
                                            </td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif

        </div>
    </div>

    {{-- Senior BI Chart.js Scripts with Harmonized Service Palette --}}
    @if(Auth::user()->isAdmin())
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                
                // 1. Qualification Donut Chart (Call Center - Gold Palette)
                const qualCtx = document.getElementById('qualificationChart')?.getContext('2d');
                if (qualCtx) {
                    const qualData = {!! json_encode($qualificationStats ?? []) !!};
                    const labels = Object.keys(qualData);
                    const values = Object.values(qualData);

                    new Chart(qualCtx, {
                        type: 'doughnut',
                        data: {
                            labels: labels.length > 0 ? labels : ['En attente'],
                            datasets: [{
                                data: values.length > 0 ? values : [1],
                                backgroundColor: ['#f2a90f', '#10b981', '#3b82f6', '#ef4444', '#64748b', '#8b5cf6'],
                                borderWidth: 2,
                                borderColor: '#ffffff'
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: {
                                legend: { position: 'bottom', labels: { boxWidth: 10, font: { weight: 'bold', size: 10 } } }
                            },
                            cutout: '60%'
                        }
                    });
                }

                // 2. Seminar Chart (Double Bars - Navy & Blue)
                const semCtx = document.getElementById('seminarChart')?.getContext('2d');
                if (semCtx) {
                    const bySeminar = {!! json_encode($bySeminar ?? []) !!};
                    const themes = bySeminar.map(s => s.theme.length > 18 ? s.theme.substring(0, 15) + '...' : s.theme);
                    const inscriptions = bySeminar.map(s => s.registrations_count);
                    const presents = bySeminar.map(s => s.presents_count);

                    new Chart(semCtx, {
                        type: 'bar',
                        data: {
                            labels: themes.length > 0 ? themes : ['Aucun séminaire'],
                            datasets: [
                                { label: 'Inscriptions', data: inscriptions.length > 0 ? inscriptions : [0], backgroundColor: '#061743', borderRadius: 4 },
                                { label: 'Présences', data: presents.length > 0 ? presents : [0], backgroundColor: '#3b82f6', borderRadius: 4 }
                            ]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: { y: { beginAtZero: true, ticks: { precision: 0 } } },
                            plugins: { legend: { position: 'bottom', labels: { boxWidth: 10, font: { weight: 'bold', size: 10 } } } }
                        }
                    });
                }

                // 3. Modes de Paiement (Doughnut - Purple/Gold Palette)
                const payCtx = document.getElementById('paymentsChart')?.getContext('2d');
                if (payCtx) {
                    const paymentsData = {!! json_encode($paymentsByMethod ?? []) !!};
                    const methodLabels = {
                        'bank_transfer': 'Virement',
                        'card': 'Carte Visa',
                        'visa': 'Carte Visa',
                        'orange_money': 'Orange Money',
                        'arrangement': 'Arrangement'
                    };
                    const labels = Object.keys(paymentsData).map(k => methodLabels[k] || k);
                    const values = Object.values(paymentsData).map(v => v.count);

                    new Chart(payCtx, {
                        type: 'doughnut',
                        data: {
                            labels: labels.length > 0 ? labels : ['Aucun paiement'],
                            datasets: [{
                                data: values.length > 0 ? values : [1],
                                backgroundColor: ['#8b5cf6', '#3b82f6', '#f2a90f', '#10b981', '#ec4899'],
                                borderWidth: 2,
                                borderColor: '#ffffff'
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            plugins: { legend: { position: 'bottom', labels: { boxWidth: 10, font: { weight: 'bold', size: 10 } } } },
                            cutout: '60%'
                        }
                    });
                }

                // 4. Top Institutions (Horizontal Bar - Navy Palette)
                const instCtx = document.getElementById('institutionsChart')?.getContext('2d');
                if (instCtx) {
                    const topInst = {!! json_encode($topInstitutions ?? []) !!};
                    const instLabels = topInst.map(i => i.institution.length > 14 ? i.institution.substring(0, 11) + '...' : i.institution);
                    const instCounts = topInst.map(i => i.count);

                    new Chart(instCtx, {
                        type: 'bar',
                        data: {
                            labels: instLabels.length > 0 ? instLabels : ['Aucune institution'],
                            datasets: [{ label: 'Participants', data: instCounts.length > 0 ? instCounts : [0], backgroundColor: '#061743', borderRadius: 4 }]
                        },
                        options: {
                            indexAxis: 'y',
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: { x: { beginAtZero: true, ticks: { precision: 0 } } },
                            plugins: { legend: { display: false } }
                        }
                    });
                }

                // 5. Volume Général par Service (Harmonized Service Brand Palette)
                const servCtx = document.getElementById('servicesVolumeChart')?.getContext('2d');
                if (servCtx) {
                    new Chart(servCtx, {
                        type: 'bar',
                        data: {
                            labels: ['Séminaires', 'Call Center', 'Médical', 'Digital Moov', 'Elite Exec', 'RH / CVs'],
                            datasets: [{
                                label: 'Volume total enregistrés',
                                data: [
                                    {{ $totalRegistrations ?? 0 }},
                                    {{ $totalCallCenterRDV ?? 0 }},
                                    {{ $totalMedicalRequests ?? 0 }},
                                    {{ $totalDigitalMoovContacts ?? 0 }},
                                    {{ $totalEliteAppointments ?? 0 }},
                                    {{ $totalRecrutements ?? 0 }}
                                ],
                                backgroundColor: [
                                    '#061743', // Séminaires: CAEI Navy
                                    '#f2a90f', // Call Center: CAEI Gold
                                    '#e11d48', // Médical: Crimson Rose
                                    '#0891b2', // Digital Moov: Cyan
                                    '#4f46e5', // Elite Exec: Indigo
                                    '#059669'  // RH / CVs: Emerald
                                ],
                                borderRadius: 4
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: { y: { beginAtZero: true, ticks: { precision: 0 } } },
                            plugins: { legend: { display: false } }
                        }
                    });
                }

            });
        </script>
    @endif
</x-app-layout>
