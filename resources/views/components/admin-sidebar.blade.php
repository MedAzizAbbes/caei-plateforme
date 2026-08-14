<aside class="w-64 bg-[#061743] text-white shrink-0 min-h-screen border-r border-white/10 flex flex-col justify-between shadow-xl">
    <div>
        {{-- En-tête Sidebar --}}
        <div class="p-6 border-b border-white/10 flex items-center gap-3">
            <img src="{{ asset('images/logo.png') }}" alt="Logo CAEI" class="h-9 w-9 rounded-full object-cover border border-[#f2a90f]">
            <div>
                <span class="block text-xs font-black uppercase tracking-wider text-white">CAEI ADMIN</span>
                <span class="block text-[10px] font-bold text-slate-400">Tableau de bord</span>
            </div>
        </div>

        {{-- Menu Sidebar Simple --}}
        <nav class="p-4 space-y-4 text-xs font-bold">
            <div>
                <div class="px-3 text-[10px] uppercase font-black tracking-widest text-slate-400 mb-2">Navigation</div>
                <div class="space-y-1.5">
                    {{-- Lien Séminaires --}}
                    <a href="{{ route('admin.seminars.index') }}" 
                       class="flex items-center justify-between px-3.5 py-3 rounded-xl transition-all {{ request()->routeIs('admin.seminars.*') ? 'bg-[#f2a90f] text-[#061743]' : 'text-slate-200 hover:bg-white/10' }}">
                        <div class="flex items-center gap-3">
                            <span class="text-base">🎓</span>
                            <span>Séminaires</span>
                        </div>
                    </a>


                    {{-- Lien Medical Center --}}
                    <a href="{{ route('admin.medical-requests.index') }}" 
                       class="flex items-center justify-between px-3.5 py-3 rounded-xl transition-all {{ request()->routeIs('admin.medical-requests.*') ? 'bg-teal-500 text-white' : 'text-slate-200 hover:bg-white/10' }}">
                        <div class="flex items-center gap-3">
                            <span class="text-base">🏥</span>
                            <span>Medical Center</span>
                        </div>
                        @if(\App\Models\MedicalRequest::where('status', 'pending')->count() > 0)
                            <span class="bg-amber-500 text-white text-[10px] font-black px-2 py-0.5 rounded-full">
                                {{ \App\Models\MedicalRequest::where('status', 'pending')->count() }}
                            </span>
                        @endif
                    </a>

                    {{-- Lien Elite Training (RDV & Demandes) --}}
                    <a href="{{ route('admin.elite-training.index') }}" 
                       class="flex items-center justify-between px-3.5 py-3 rounded-xl transition-all {{ request()->routeIs('admin.elite-training.*') ? 'bg-[#f2a90f] text-[#061743]' : 'text-slate-200 hover:bg-white/10' }}">
                        <div class="flex items-center gap-3">
                            <span class="text-base">🏆</span>
                            <span>Elite (RDV & Inscriptions)</span>
                        </div>
                        @if(\App\Models\EliteTrainingAppointment::where('status', 'pending')->count() > 0)
                            <span class="bg-amber-500 text-white text-[10px] font-black px-2 py-0.5 rounded-full">
                                {{ \App\Models\EliteTrainingAppointment::where('status', 'pending')->count() }}
                            </span>
                        @endif
                    </a>

                    {{-- Lien Formations Catalogue --}}
                    <a href="{{ route('admin.formations.index') }}" 
                       class="flex items-center justify-between px-3.5 py-3 rounded-xl transition-all {{ request()->routeIs('admin.formations.*') ? 'bg-[#f2a90f] text-[#061743]' : 'text-slate-200 hover:bg-white/10' }}">
                        <div class="flex items-center gap-3">
                            <span class="text-base">📚</span>
                            <span>Catalogue Formations</span>
                        </div>
                        @if(\Illuminate\Support\Facades\Schema::hasTable('formations') && \App\Models\Formation::count() > 0)
                            <span class="bg-white/20 text-white text-[10px] font-bold px-2 py-0.5 rounded-full">
                                {{ \App\Models\Formation::count() }}
                            </span>
                        @endif
                    </a>
                </div>
            </div>

            {{-- Emplacement Extensible pour futurs ajouts --}}
            <div class="pt-4 border-t border-white/10">
                <div class="px-3 text-[10px] uppercase font-black tracking-widest text-slate-400 mb-2">Autres Modules</div>
                <div class="space-y-1.5">
                    <a href="{{ route('admin.recrutements.index') }}"
                       class="flex items-center justify-between px-3.5 py-3 rounded-xl transition-all {{ request()->routeIs('admin.recrutements.*') ? 'bg-blue-600 text-white' : 'text-slate-300 hover:bg-white/10' }}">
                        <div class="flex items-center gap-3">
                            <span class="text-base">💼</span>
                            <span class="font-bold text-xs">Recrutements</span>
                        </div>
                        @php 
                            try {
                                $recNew = \Illuminate\Support\Facades\Schema::hasTable('recrutements') 
                                    ? \App\Models\Recrutement::count() 
                                    : 0;
                            } catch (\Throwable $e) {
                                $recNew = 0;
                            }
                        @endphp
                        @if($recNew > 0)
                            <span class="bg-blue-500 text-white text-[10px] font-black px-2 py-0.5 rounded-full">{{ $recNew }}</span>
                        @endif
                    </a>
                    <a href="{{ route('admin.digitalmoov.index') }}"
                       class="flex items-center justify-between px-3.5 py-3 rounded-xl transition-all {{ request()->routeIs('admin.digitalmoov.*') ? 'bg-orange-500 text-white' : 'text-slate-300 hover:bg-white/10' }}">
                        <div class="flex items-center gap-3">
                            <span class="text-base">📱</span>
                            <span class="font-bold text-xs">Digital Moov</span>
                        </div>
                        @php 
                            try {
                                $dmNew = \Illuminate\Support\Facades\Schema::hasTable('digital_moov_contacts') 
                                    ? \App\Models\DigitalMoovContact::where('status','new')->count() 
                                    : 0;
                            } catch (\Throwable $e) {
                                $dmNew = 0;
                            }
                        @endphp
                        @if($dmNew > 0)
                            <span class="bg-orange-400 text-white text-[10px] font-black px-2 py-0.5 rounded-full">{{ $dmNew }}</span>
                        @endif
                    </a>

                    <a href="{{ route('admin.callcenter.index') }}"
                       class="flex items-center justify-between px-3.5 py-3 rounded-xl transition-all {{ request()->routeIs('admin.callcenter.*') ? 'bg-red-500 text-white' : 'text-slate-300 hover:bg-white/10' }}">
                        <div class="flex items-center gap-3">
                            <span class="text-base">📞</span>
                            <span class="font-bold text-xs">Call Center</span>
                        </div>
                        @php 
                            try {
                                $ccNew = \Illuminate\Support\Facades\Schema::hasTable('call_center_requests') 
                                    ? \App\Models\CallCenterRequest::where('status','Nouveau')->count() 
                                    : 0;
                            } catch (\Throwable $e) {
                                $ccNew = 0;
                            }
                        @endphp
                        @if($ccNew > 0)
                            <span class="bg-red-400 text-white text-[10px] font-black px-2 py-0.5 rounded-full">{{ $ccNew }}</span>
                        @endif
                    </a>

                    

                    {{-- Lien Gestion Mailing --}}
                    <a href="https://mailing.caei-afri.com/dashboard"
                       class="flex items-center justify-between px-3.5 py-3 rounded-xl transition-all text-slate-300 hover:bg-white/10 hover:text-white group">
                        <div class="flex items-center gap-3">
                            <span class="text-base">📧</span>
                            <span class="font-bold text-xs">Gestion Mailing</span>
                        </div>
                        <span class="bg-purple-500/30 text-purple-200 text-[10px] font-semibold px-2 py-0.5 rounded-full">OVH</span>
                    </a>
                    >

                    {{-- Lien Gestion Mailing --}}
                    <a href="https://mailing.caei-afri.com/dashboard" class="flex items-center justify-between px-3.5 py-3 rounded-xl transition-all text-slate-300 hover:bg-white/10 hover:text-white group">
                        <div class="flex items-center gap-3">
                            <span class="text-base">📧</span>
                            <span class="font-bold text-xs">Gestion Mailing</span>
                        </div>
                        <span class="bg-purple-500/30 text-purple-200 text-[10px] font-semibold px-2 py-0.5 rounded-full">OVH</span>
                    </a>
                </div>
            </div>
        </nav>
    </div>

    {{-- Profil Admin en bas --}}
    <div class="p-4 border-t border-white/10 bg-[#040e2b] flex items-center justify-between text-xs">
        <div class="flex items-center gap-2">
            <div class="w-7 h-7 rounded-full bg-[#f2a90f] text-[#061743] font-black flex items-center justify-center text-xs">
                {{ strtoupper(substr(Auth::user()->first_name ?? 'A', 0, 1)) }}
            </div>
            <span class="font-bold text-white truncate max-w-[100px]">{{ Auth::user()->first_name }}</span>
        </div>
        <a href="{{ route('home') }}" title="Voir site public" class="text-slate-400 hover:text-[#f2a90f]">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
        </a>
    </div>
</aside>
