<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col lg:flex-row lg:items-center justify-between gap-4">
            <div>
                <div class="flex items-center gap-2">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-black bg-[#f2a90f] text-[#061743] uppercase tracking-wider shadow-sm">
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
                    <a href="{{ route('admin.seminars.index') }}" class="inline-flex items-center gap-1.5 px-3.5 py-2 bg-[#061743] hover:bg-[#0c2b64] text-white text-xs font-black rounded-xl shadow-sm transition-all duration-200 hover:scale-105 border border-[#061743]">
                        <span>🎓</span> Séminaires
                    </a>
                    {{-- 2. Call Center (CAEI Gold) --}}
                    <a href="{{ route('admin.callcenter.index') }}" class="inline-flex items-center gap-1.5 px-3.5 py-2 bg-[#f2a90f] hover:bg-[#e09b0b] text-[#061743] text-xs font-black rounded-xl shadow-sm transition-all duration-200 hover:scale-105 border border-[#f2a90f]">
                        <span>📞</span> Call Center
                    </a>
                    {{-- 3. Médical (Crimson Rose) --}}
                    <a href="{{ route('admin.medical-requests.index') }}" class="inline-flex items-center gap-1.5 px-3.5 py-2 bg-[#e11d48] hover:bg-[#be123c] text-white text-xs font-black rounded-xl shadow-sm transition-all duration-200 hover:scale-105 border border-[#e11d48]">
                        <span>🏥</span> Médical
                    </a>
                    {{-- 4. Digital Moov (Electric Cyan) --}}
                    <a href="{{ route('admin.digitalmoov.index') }}" class="inline-flex items-center gap-1.5 px-3.5 py-2 bg-[#0891b2] hover:bg-[#0e7490] text-white text-xs font-black rounded-xl shadow-sm transition-all duration-200 hover:scale-105 border border-[#0891b2]">
                        <span>🚀</span> Digital Moov
                    </a>
                    {{-- 5. Elite Training (Deep Indigo) --}}
                    <a href="{{ route('admin.elite-training.index') }}" class="inline-flex items-center gap-1.5 px-3.5 py-2 bg-[#4f46e5] hover:bg-[#4338ca] text-white text-xs font-black rounded-xl shadow-sm transition-all duration-200 hover:scale-105 border border-[#4f46e5]">
                        <span>🎓</span> Elite Exec
                    </a>
                    {{-- 6. Recrutement RH (Emerald Green) --}}
                    <a href="{{ route('admin.recrutements.index') }}" class="inline-flex items-center gap-1.5 px-3.5 py-2 bg-[#059669] hover:bg-[#047857] text-white text-xs font-black rounded-xl shadow-sm transition-all duration-200 hover:scale-105 border border-[#059669]">
                        <span>📄</span> Recrutement
                    </a>
                </div>
            @endif
        </div>
    </x-slot>

    <div class="py-8 bg-slate-100/90 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            {{-- Executive High-Contrast Hero Banner --}}
            <div class="bg-gradient-to-r from-[#061743] via-[#0c286e] to-[#061743] rounded-3xl p-8 text-white shadow-2xl relative overflow-hidden border border-slate-700/50">
                <div class="absolute -right-6 -bottom-6 opacity-10 text-9xl pointer-events-none select-none">📊</div>
                <div class="relative z-10 grid grid-cols-1 lg:grid-cols-3 gap-6 items-center">
                    <div class="lg:col-span-2 space-y-3">
                        <div class="inline-flex items-center gap-2 text-xs font-black uppercase tracking-widest text-[#f2a90f] bg-white/10 px-3.5 py-1.5 rounded-lg border border-white/15 backdrop-blur-md">
                            <span>🏛️ CAEI GROUP ENTERPRISE BI — 7 SERVICES</span>
                        </div>
                        <h3 class="text-3xl font-black uppercase tracking-tight text-white">Console Décisionnelle globale</h3>
                        <p class="text-slate-200 text-sm leading-relaxed max-w-2xl font-medium">
                            Supervisez la performance globale du groupe : Séminaires B2B, Chiffre d'Affaires encaissé, Call Center Outsourcing, CAEI Medical Center, Digital Moov, Elite Training & Candidatures RH.
                        </p>
                    </div>

                    {{-- High Contrast Revenue Card --}}
                    <div class="bg-slate-900/90 backdrop-blur-xl rounded-2xl p-6 border border-white/20 text-center shadow-xl space-y-2">
                        <p class="text-xs font-black uppercase tracking-widest text-[#f2a90f]">Chiffre d'Affaires Validé (CAEI)</p>
                        <p class="text-4xl font-black text-white tracking-tight">
                            {{ number_format($totalRevenue ?? 0, 0, ',', ' ') }} €
                        </p>
                        <div class="pt-1">
                            <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-xs font-black bg-amber-500/20 text-amber-300 border border-amber-500/40">
                                En attente : {{ number_format($pendingRevenue ?? 0, 0, ',', ' ') }} €
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            @if(Auth::user()->isAdmin())
                {{-- 7 High-Density Executive KPI Cards Grid with Standardized Service Colors --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
                    
                    {{-- KPI 1: Finances & CA (Violet Theme) --}}
                    <div class="bg-white rounded-2xl p-5 border-l-4 border-l-purple-600 border-t border-r border-b border-slate-200/80 shadow-sm hover:shadow-md transition-all duration-200 hover:-translate-y-0.5 group">
                        <div class="flex items-center justify-between mb-3">
                            <span class="w-10 h-10 rounded-xl bg-purple-50 text-purple-700 flex items-center justify-center font-bold text-lg border border-purple-100">💰</span>
                            <span class="text-[10px] font-black uppercase px-2.5 py-1 bg-purple-100 text-purple-900 rounded-md">Finances BI</span>
                        </div>
                        <p class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">CA Séminaires Validé</p>
                        <div class="flex items-baseline justify-between mt-1">
                            <p class="text-2xl font-black text-slate-900">{{ number_format($totalRevenue ?? 0, 0, ',', ' ') }} €</p>
                        </div>
                        <p class="text-xs font-semibold text-slate-500 mt-2">Paiements validés (Visa/Virement)</p>
                    </div>

                    {{-- KPI 2: Séminaires B2B (CAEI Navy Theme) --}}
                    <div class="bg-white rounded-2xl p-5 border-l-4 border-l-[#061743] border-t border-r border-b border-slate-200/80 shadow-sm hover:shadow-md transition-all duration-200 hover:-translate-y-0.5 group">
                        <div class="flex items-center justify-between mb-3">
                            <span class="w-10 h-10 rounded-xl bg-blue-50 text-[#061743] flex items-center justify-center font-bold text-lg border border-blue-100">🎓</span>
                            <span class="text-[10px] font-black uppercase px-2.5 py-1 bg-blue-100 text-[#061743] rounded-md">Séminaires</span>
                        </div>
                        <p class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Inscriptions & Présence</p>
                        <div class="flex items-baseline justify-between mt-1">
                            <p class="text-2xl font-black text-slate-900">{{ number_format($totalRegistrations ?? 0) }}</p>
                            <span class="text-xs font-black text-emerald-600 bg-emerald-50 px-2 py-0.5 rounded border border-emerald-200">{{ $attendanceRate ?? 0 }}% présent</span>
                        </div>
                        <div class="w-full bg-slate-100 h-2 rounded-full mt-3 overflow-hidden">
                            <div class="bg-[#061743] h-full rounded-full" style="width: {{ min(100, $attendanceRate ?? 0) }}%"></div>
                        </div>
                    </div>

                    {{-- KPI 3: Call Center RDV (CAEI Gold Theme) --}}
                    <div class="bg-white rounded-2xl p-5 border-l-4 border-l-[#f2a90f] border-t border-r border-b border-slate-200/80 shadow-sm hover:shadow-md transition-all duration-200 hover:-translate-y-0.5 group">
                        <div class="flex items-center justify-between mb-3">
                            <span class="w-10 h-10 rounded-xl bg-amber-50 text-[#f2a90f] flex items-center justify-center font-bold text-lg border border-amber-100">📞</span>
                            <span class="text-[10px] font-black uppercase px-2.5 py-1 bg-amber-100 text-amber-900 rounded-md">Call Center</span>
                        </div>
                        <p class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">RDV & Qualifications</p>
                        <div class="flex items-baseline justify-between mt-1">
                            <p class="text-2xl font-black text-slate-900">{{ number_format($totalCallCenterRDV ?? 0) }}</p>
                            <span class="text-xs font-black text-amber-700 bg-amber-50 px-2 py-0.5 rounded border border-amber-200">{{ $callCenterConversionRate ?? 0 }}% qualifié</span>
                        </div>
                        <div class="w-full bg-slate-100 h-2 rounded-full mt-3 overflow-hidden">
                            <div class="bg-[#f2a90f] h-full rounded-full" style="width: {{ min(100, $callCenterConversionRate ?? 0) }}%"></div>
                        </div>
                    </div>

                    {{-- KPI 4: CAEI Medical Center (Crimson Rose Theme) --}}
                    <div class="bg-white rounded-2xl p-5 border-l-4 border-l-rose-600 border-t border-r border-b border-slate-200/80 shadow-sm hover:shadow-md transition-all duration-200 hover:-translate-y-0.5 group">
                        <div class="flex items-center justify-between mb-3">
                            <span class="w-10 h-10 rounded-xl bg-rose-50 text-rose-600 flex items-center justify-center font-bold text-lg border border-rose-100">🏥</span>
                            <span class="text-[10px] font-black uppercase px-2.5 py-1 bg-rose-100 text-rose-900 rounded-md">Médical</span>
                        </div>
                        <p class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Demandes & Devis</p>
                        <div class="flex items-baseline justify-between mt-1">
                            <p class="text-2xl font-black text-slate-900">{{ number_format($totalMedicalRequests ?? 0) }}</p>
                            <span class="text-xs font-black text-rose-700 bg-rose-50 px-2 py-0.5 rounded border border-rose-200">{{ $totalClinics ?? 0 }} cliniques</span>
                        </div>
                        <p class="text-xs font-semibold text-slate-500 mt-2">Volume Devis: <span class="font-bold text-slate-900">{{ number_format($medicalDevisTotalSum ?? 0, 0, ',', ' ') }} €</span></p>
                    </div>

                </div>

                <div class="grid grid-cols-1 sm:grid-cols-3 gap-5">
                    
                    {{-- KPI 5: Digital Moov (Cyan Theme) --}}
                    <div class="bg-white rounded-2xl p-5 border-l-4 border-l-cyan-600 border-t border-r border-b border-slate-200/80 shadow-sm hover:shadow-md transition-all duration-200 hover:-translate-y-0.5 group">
                        <div class="flex items-center justify-between mb-3">
                            <span class="w-10 h-10 rounded-xl bg-cyan-50 text-cyan-600 flex items-center justify-center font-bold text-lg border border-cyan-100">🚀</span>
                            <span class="text-[10px] font-black uppercase px-2.5 py-1 bg-cyan-100 text-cyan-900 rounded-md">Digital Moov</span>
                        </div>
                        <p class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Leads Agence Web</p>
                        <div class="flex items-baseline justify-between mt-1">
                            <p class="text-2xl font-black text-slate-900">{{ number_format($totalDigitalMoovContacts ?? 0) }}</p>
                            <span class="text-xs font-bold text-cyan-700 bg-cyan-50 px-2 py-0.5 rounded border border-cyan-200">Contacts Web</span>
                        </div>
                    </div>

                    {{-- KPI 6: Elite Training (Indigo Theme) --}}
                    <div class="bg-white rounded-2xl p-5 border-l-4 border-l-indigo-600 border-t border-r border-b border-slate-200/80 shadow-sm hover:shadow-md transition-all duration-200 hover:-translate-y-0.5 group">
                        <div class="flex items-center justify-between mb-3">
                            <span class="w-10 h-10 rounded-xl bg-indigo-50 text-indigo-600 flex items-center justify-center font-bold text-lg border border-indigo-100">🎓</span>
                            <span class="text-[10px] font-black uppercase px-2.5 py-1 bg-indigo-100 text-indigo-900 rounded-md">Elite Training</span>
                        </div>
                        <p class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Demandes Exécutives</p>
                        <div class="flex items-baseline justify-between mt-1">
                            <p class="text-2xl font-black text-slate-900">{{ number_format($totalEliteAppointments ?? 0) }}</p>
                            <span class="text-xs font-bold text-indigo-700 bg-indigo-50 px-2 py-0.5 rounded border border-indigo-200">{{ $totalFormationsElite ?? 0 }} programmes</span>
                        </div>
                    </div>

                    {{-- KPI 7: Recrutement & Écosystème (Emerald Theme) --}}
                    <div class="bg-white rounded-2xl p-5 border-l-4 border-l-emerald-600 border-t border-r border-b border-slate-200/80 shadow-sm hover:shadow-md transition-all duration-200 hover:-translate-y-0.5 group">
                        <div class="flex items-center justify-between mb-3">
                            <span class="w-10 h-10 rounded-xl bg-emerald-50 text-emerald-600 flex items-center justify-center font-bold text-lg border border-emerald-100">📄</span>
                            <span class="text-[10px] font-black uppercase px-2.5 py-1 bg-emerald-100 text-emerald-900 rounded-md">RH & Utilisateurs</span>
                        </div>
                        <p class="text-[11px] font-bold text-slate-500 uppercase tracking-wider">Candidatures CV / Comptes</p>
                        <div class="flex items-baseline justify-between mt-1">
                            <p class="text-2xl font-black text-slate-900">{{ number_format($totalRecrutements ?? 0) }} CVs</p>
                            <span class="text-xs font-bold text-emerald-700 bg-emerald-50 px-2 py-0.5 rounded border border-emerald-200">{{ number_format($totalUsers ?? 0) }} inscrits</span>
                        </div>
                    </div>

                </div>

                {{-- Interactive BI Visualizations Matrix --}}
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    
                    {{-- Chart 1: Call Center Qualification Breakdown (Gold Theme) --}}
                    <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm relative overflow-hidden">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="font-black text-[#061743] text-xs uppercase tracking-widest flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-[#f2a90f]"></span>
                                Call Center — Qualification RDV
                            </h3>
                            <span class="text-[10px] font-black text-amber-700 bg-amber-50 px-2 py-0.5 rounded border border-amber-200 uppercase">Prospection</span>
                        </div>
                        <div class="relative h-64">
                            <canvas id="qualificationChart"></canvas>
                        </div>
                    </div>

                    {{-- Chart 2: Séminaires Attendance & Presences (Navy & Blue Theme) --}}
                    <div class="bg-white rounded-2xl p-6 lg:col-span-2 border border-slate-200/80 shadow-sm relative overflow-hidden">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="font-black text-[#061743] text-xs uppercase tracking-widest flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-[#061743]"></span>
                                Séminaires — Inscriptions vs Présences
                            </h3>
                            <span class="text-[10px] font-black text-[#061743] bg-blue-50 px-2 py-0.5 rounded border border-blue-200 uppercase">Assiduité B2B</span>
                        </div>
                        <div class="relative h-64">
                            <canvas id="seminarChart"></canvas>
                        </div>
                    </div>

                </div>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    
                    {{-- Chart 3: Modes de Paiement Finance (Purple Theme) --}}
                    <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm relative overflow-hidden">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="font-black text-[#061743] text-xs uppercase tracking-widest flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-purple-600"></span>
                                Finances — Modes de Règlement
                            </h3>
                            <span class="text-[10px] font-black text-purple-800 bg-purple-50 px-2 py-0.5 rounded border border-purple-200 uppercase">Paiements</span>
                        </div>
                        <div class="relative h-64">
                            <canvas id="paymentsChart"></canvas>
                        </div>
                    </div>

                    {{-- Chart 4: Top 5 Institutions --}}
                    <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm relative overflow-hidden">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="font-black text-[#061743] text-xs uppercase tracking-widest flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-[#061743]"></span>
                                Top 5 Entreprises & Partenaires
                            </h3>
                            <span class="text-[10px] font-black text-slate-700 bg-slate-100 px-2 py-0.5 rounded border border-slate-200 uppercase">Institutions</span>
                        </div>
                        <div class="relative h-64">
                            <canvas id="institutionsChart"></canvas>
                        </div>
                    </div>

                    {{-- Chart 5: Répartition par Service (Harmonized Brand Palette) --}}
                    <div class="bg-white rounded-2xl p-6 border border-slate-200/80 shadow-sm relative overflow-hidden">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="font-black text-[#061743] text-xs uppercase tracking-widest flex items-center gap-2">
                                <span class="w-2.5 h-2.5 rounded-full bg-rose-500"></span>
                                Volume Général par Service
                            </h3>
                            <span class="text-[10px] font-black text-slate-700 bg-slate-100 px-2 py-0.5 rounded border border-slate-200 uppercase">Matrice Global</span>
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
                     }" class="bg-white rounded-2xl border border-slate-200/80 shadow-sm overflow-hidden">

                    {{-- Journal Header --}}
                    <div class="p-6 border-b border-slate-100 flex flex-col md:flex-row md:items-center justify-between gap-4 bg-slate-50/80">
                        <div>
                            <div class="flex items-center gap-2">
                                <span class="text-xs font-black uppercase text-[#f2a90f] tracking-widest">REAL-TIME AUDIT TRAIL</span>
                                <span class="px-2.5 py-0.5 rounded-full text-[10px] font-black bg-[#061743] text-white" x-text="filteredFeed.length + ' événements'"></span>
                            </div>
                            <h3 class="text-lg font-black uppercase text-[#061743] mt-0.5">Journal d'Activité Multi-Services en Temps Réel</h3>
                        </div>

                        {{-- Live Search Input --}}
                        <div class="relative w-full md:w-80">
                            <input type="text" 
                                   x-model="searchQuery" 
                                   placeholder="🔍 Rechercher nom, contact, statut..." 
                                   class="w-full pl-9 pr-4 py-2.5 text-xs font-medium rounded-xl border border-slate-300 focus:border-[#061743] focus:ring-2 focus:ring-[#061743]/20 transition shadow-2xs">
                        </div>
                    </div>

                    {{-- Filter Tabs Bar --}}
                    <div class="px-6 py-3 bg-slate-50 border-b border-slate-100 flex items-center gap-2 overflow-x-auto">
                        <button @click="activeTab = 'all'" 
                                :class="activeTab === 'all' ? 'bg-[#061743] text-white shadow-sm font-black' : 'bg-white text-slate-700 hover:bg-slate-100 border border-slate-200 font-bold'" 
                                class="px-3.5 py-1.5 rounded-xl text-xs transition cursor-pointer whitespace-nowrap">
                            Tous les services
                        </button>

                        <button @click="activeTab = 'callcenter'" 
                                :class="activeTab === 'callcenter' ? 'bg-[#f2a90f] text-[#061743] shadow-sm font-black' : 'bg-white text-slate-700 hover:bg-slate-100 border border-slate-200 font-bold'" 
                                class="px-3.5 py-1.5 rounded-xl text-xs transition cursor-pointer whitespace-nowrap">
                            📞 Call Center
                        </button>

                        <button @click="activeTab = 'medical'" 
                                :class="activeTab === 'medical' ? 'bg-rose-600 text-white shadow-sm font-black' : 'bg-white text-slate-700 hover:bg-slate-100 border border-slate-200 font-bold'" 
                                class="px-3.5 py-1.5 rounded-xl text-xs transition cursor-pointer whitespace-nowrap">
                            🏥 Médical
                        </button>

                        <button @click="activeTab = 'digitalmoov'" 
                                :class="activeTab === 'digitalmoov' ? 'bg-cyan-600 text-white shadow-sm font-black' : 'bg-white text-slate-700 hover:bg-slate-100 border border-slate-200 font-bold'" 
                                class="px-3.5 py-1.5 rounded-xl text-xs transition cursor-pointer whitespace-nowrap">
                            🚀 Digital Moov
                        </button>

                        <button @click="activeTab = 'elite'" 
                                :class="activeTab === 'elite' ? 'bg-indigo-600 text-white shadow-sm font-black' : 'bg-white text-slate-700 hover:bg-slate-100 border border-slate-200 font-bold'" 
                                class="px-3.5 py-1.5 rounded-xl text-xs transition cursor-pointer whitespace-nowrap">
                            🎓 Elite Exec
                        </button>

                        <button @click="activeTab = 'recrutement'" 
                                :class="activeTab === 'recrutement' ? 'bg-emerald-600 text-white shadow-sm font-black' : 'bg-white text-slate-700 hover:bg-slate-100 border border-slate-200 font-bold'" 
                                class="px-3.5 py-1.5 rounded-xl text-xs transition cursor-pointer whitespace-nowrap">
                            📄 Recrutement RH
                        </button>

                        <button @click="activeTab = 'finance'" 
                                :class="activeTab === 'finance' ? 'bg-purple-600 text-white shadow-sm font-black' : 'bg-white text-slate-700 hover:bg-slate-100 border border-slate-200 font-bold'" 
                                class="px-3.5 py-1.5 rounded-xl text-xs transition cursor-pointer whitespace-nowrap">
                            💰 Finances
                        </button>
                    </div>

                    {{-- Journal Table --}}
                    <div class="p-6">
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y divide-slate-200 text-xs">
                                <thead>
                                    <tr class="bg-slate-100 text-[10px] font-black uppercase text-slate-700 tracking-wider">
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
                                                <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-md text-[10px] font-black border shadow-2xs" :class="item.badge_class" x-text="item.service_badge"></span>
                                            </td>
                                            <td class="px-4 py-3.5 font-bold text-slate-900" x-text="item.name"></td>
                                            <td class="px-4 py-3.5 text-slate-600 font-semibold" x-text="item.contact"></td>
                                            <td class="px-4 py-3.5 whitespace-nowrap">
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded text-[11px] font-bold bg-slate-100 text-slate-800 border border-slate-200" x-text="item.detail"></span>
                                            </td>
                                            <td class="px-4 py-3.5 text-right text-slate-500 font-semibold whitespace-nowrap" x-text="formatDate(item.date)"></td>
                                            <td class="px-4 py-3.5 text-right whitespace-nowrap">
                                                <a :href="item.action_url" class="inline-flex items-center gap-1 px-3 py-1 rounded-lg bg-slate-100 hover:bg-[#061743] hover:text-white text-[11px] font-black text-slate-700 border border-slate-200 transition">
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
                        'arrangement': 'Prise en charge',
                        'orange_money': 'Orange Money',
                        'visa': 'Carte Visa/Stripe'
                    };
                    const labels = Object.keys(paymentsData).map(m => methodLabels[m] || m);
                    const values = Object.values(paymentsData).map(p => p.count);

                    new Chart(payCtx, {
                        type: 'doughnut',
                        data: {
                            labels: labels.length > 0 ? labels : ['Aucun paiement'],
                            datasets: [{
                                data: values.length > 0 ? values : [1],
                                backgroundColor: ['#8b5cf6', '#f2a90f', '#f97316', '#061743'],
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

                // 4. Institutions Bar Chart
                const instCtx = document.getElementById('institutionsChart')?.getContext('2d');
                if (instCtx) {
                    const topInst = {!! json_encode($topInstitutions ?? []) !!};
                    const labels = topInst.map(i => i.institution.length > 15 ? i.institution.substring(0, 12) + '...' : i.institution);
                    const values = topInst.map(i => i.count);

                    new Chart(instCtx, {
                        type: 'bar',
                        data: {
                            labels: labels.length > 0 ? labels : ['Aucune institution'],
                            datasets: [{
                                label: 'Participants',
                                data: values.length > 0 ? values : [0],
                                backgroundColor: '#059669',
                                borderRadius: 4
                            }]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            indexAxis: 'y',
                            scales: { x: { beginAtZero: true, ticks: { precision: 0 } } },
                            plugins: { legend: { display: false } }
                        }
                    });
                }

                // 5. Volume Général par Service (Bar Multi-Colors)
                const servCtx = document.getElementById('servicesVolumeChart')?.getContext('2d');
                if (servCtx) {
                    new Chart(servCtx, {
                        type: 'bar',
                        data: {
                            labels: ['Call Center', 'Médical', 'Digital Moov', 'Elite Exec', 'RH CVs'],
                            datasets: [{
                                label: 'Volume d\'activité',
                                data: [
                                    {{ $totalCallCenterRDV ?? 0 }},
                                    {{ $totalMedicalRequests ?? 0 }},
                                    {{ $totalDigitalMoovContacts ?? 0 }},
                                    {{ $totalEliteAppointments ?? 0 }},
                                    {{ $totalRecrutements ?? 0 }}
                                ],
                                backgroundColor: ['#f2a90f', '#e11d48', '#0891b2', '#4f46e5', '#059669'],
                                borderRadius: 6
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
