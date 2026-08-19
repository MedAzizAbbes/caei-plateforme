@extends('layouts.app')

@section('content')
<div class="flex min-h-screen -mt-8 -mx-4 sm:-mx-6 lg:-mx-8" style="background: linear-gradient(135deg, rgba(241,245,249,0.85) 0%, rgba(226,232,240,0.88) 100%);">

    <x-admin-sidebar />

    <div class="flex-1 p-6 md:p-10 overflow-y-auto">

        {{-- En-tête Medical Center --}}
        <div class="mb-6 rounded-2xl p-8 text-white shadow-xl flex flex-col md:flex-row md:items-center justify-between gap-6 relative overflow-hidden" style="background: linear-gradient(135deg, rgba(17, 94, 89, 0.9) 0%, rgba(4, 47, 46, 0.95) 100%), url('{{ asset('assets/img/service_medical_1786525641121.jpg') }}') center/cover no-repeat;">
            <div class="absolute -right-6 -bottom-8 opacity-20 text-8xl pointer-events-none">🏥</div>
            <div class="relative z-10">
                <span class="inline-flex items-center gap-1.5 bg-teal-100 text-[#0f766e] text-xs font-black px-3 py-1 rounded-md uppercase tracking-wider mb-2">
                    <span>🩺</span> CAEI Medical Center • Partenaires
                </span>
                <h1 class="text-3xl font-black uppercase tracking-tight flex items-center gap-3">
                    <span>Gestion des Cliniques Partenaires</span> 🏥
                </h1>
                <p class="mt-2 text-[#ccfbf1] text-sm">Créez et gérez les comptes des cliniques partenaires, générez leurs identifiants de connexion (email & mot de passe).</p>
            </div>
            <div class="shrink-0 flex items-center gap-3 relative z-10">
                <a href="{{ route('admin.cliniques.create') }}" class="inline-flex items-center gap-2 bg-teal-600 hover:bg-teal-500 text-white font-black text-xs px-5 py-2.5 rounded-xl shadow transition-all">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                    <span>Ajouter une clinique</span>
                </a>
                <a href="{{ route('medical.services') }}" target="_blank" class="inline-flex items-center gap-2 bg-white/10 hover:bg-white/20 text-white font-bold text-xs px-4 py-2.5 rounded-xl transition-all">
                    <span>Site public 🩺 ↗</span>
                </a>
            </div>
        </div>

        {{-- Barre d'onglets Medical Center --}}
        @php
            $pendingMedRequests = \App\Models\MedicalRequest::where('status', 'pending')->count();
            $pendingClinicsReviews = \App\Models\MedicalRequest::where('clinic_status', 'pending_review')->whereNotNull('partner_clinic_id')->count();
        @endphp
        <div class="mb-6 bg-white rounded-2xl p-2 shadow-sm border border-slate-200 flex flex-wrap items-center justify-between gap-3">
            <div class="flex items-center gap-2">
                <a href="{{ route('admin.medical-requests.index') }}" 
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl font-bold text-xs transition-all text-slate-700 hover:bg-slate-100 hover:text-teal-900">
                    <span>📋</span>
                    <span>Devis & Rendez-vous</span>
                    @if($pendingMedRequests > 0)
                        <span class="bg-amber-100 text-amber-800 text-[10px] font-black px-2 py-0.5 rounded-full">
                            {{ $pendingMedRequests }} en attente
                        </span>
                    @endif
                </a>

                <a href="{{ route('admin.cliniques.index') }}" 
                   class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl font-black text-xs transition-all bg-teal-600 text-white shadow-sm">
                    <span>🏥</span>
                    <span>Cliniques Partenaires</span>
                    <span class="bg-teal-800 text-white text-[10px] font-bold px-2 py-0.5 rounded-full">
                        {{ $clinics->total() }}
                    </span>
                    @if($pendingClinicsReviews > 0)
                        <span class="bg-amber-400 text-slate-900 text-[10px] font-black px-2 py-0.5 rounded-full">
                            {{ $pendingClinicsReviews }} à valider
                        </span>
                    @endif
                </a>
            </div>

            <div class="flex items-center gap-2">
                <a href="{{ route('admin.cliniques.create') }}" 
                   class="inline-flex items-center gap-1.5 bg-teal-600 hover:bg-teal-700 text-white font-bold text-xs px-4 py-2.5 rounded-xl shadow-sm transition-all">
                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                    <span>Créer un compte clinique</span>
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="mb-6 rounded-xl bg-emerald-50 border border-emerald-300 p-4 text-emerald-900 text-sm font-semibold flex items-center gap-3">
                <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                {{ session('success') }}
            </div>
        @endif

        {{-- Table des cliniques --}}
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            @if($clinics->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-slate-700">
                        <thead class="bg-slate-50 text-xs font-black uppercase tracking-wider text-slate-600 border-b border-slate-200">
                            <tr>
                                <th class="p-4">Clinique</th>
                                <th class="p-4">Identifiants</th>
                                <th class="p-4">Patients</th>
                                <th class="p-4">En attente</th>
                                <th class="p-4">Statut</th>
                                <th class="p-4">Dernière connexion</th>
                                <th class="p-4 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @foreach($clinics as $clinic)
                                <tr class="hover:bg-slate-50 transition-colors">
                                    <td class="p-4">
                                        <div class="font-black text-slate-900">{{ $clinic->name }}</div>
                                        @if($clinic->city)<div class="text-xs text-slate-500">📍 {{ $clinic->city }}</div>@endif
                                        @if($clinic->specialty)<div class="text-xs text-teal-600 font-semibold mt-0.5">{{ $clinic->specialty }}</div>@endif
                                    </td>
                                    <td class="p-4">
                                        <div class="font-mono text-xs text-slate-600">{{ $clinic->user->email }}</div>
                                        <div class="text-[10px] text-slate-400 mt-0.5">Mot de passe masqué 🔒</div>
                                    </td>
                                    <td class="p-4">
                                        <span class="font-black text-slate-900 text-lg">{{ $clinic->medical_requests_count }}</span>
                                        <span class="text-slate-500 text-xs"> dossiers</span>
                                    </td>
                                    <td class="p-4">
                                        @if($clinic->pending_count > 0)
                                            <span class="bg-amber-100 text-amber-800 font-black text-sm px-3 py-1 rounded-full">{{ $clinic->pending_count }} ⏳</span>
                                        @else
                                            <span class="text-slate-300 text-sm italic">Aucun</span>
                                        @endif
                                    </td>
                                    <td class="p-4">
                                        @if($clinic->is_active)
                                            <span class="bg-emerald-100 text-emerald-800 text-xs font-bold px-2.5 py-1 rounded-full">● Active</span>
                                        @else
                                            <span class="bg-slate-100 text-slate-500 text-xs font-bold px-2.5 py-1 rounded-full">● Désactivée</span>
                                        @endif
                                    </td>
                                    <td class="p-4 text-xs text-slate-500">
                                        {{ $clinic->last_login_at ? $clinic->last_login_at->format('d/m/Y H:i') : 'Jamais connectée' }}
                                    </td>
                                    <td class="p-4 text-right">
                                        <div class="flex items-center justify-end gap-2">
                                            <a href="{{ route('admin.cliniques.show', $clinic) }}" class="inline-flex items-center gap-1 text-xs font-bold text-indigo-700 hover:text-indigo-900 bg-indigo-50 hover:bg-indigo-100 px-3 py-1.5 rounded-lg transition-all">
                                                <span>⚙️ Gérer & Accès</span>
                                            </a>
                                            <form action="{{ route('admin.cliniques.toggle-active', $clinic) }}" method="POST">
                                                @csrf
                                                <button type="submit" class="text-xs font-bold {{ $clinic->is_active ? 'text-amber-600 bg-amber-50 hover:bg-amber-100' : 'text-emerald-600 bg-emerald-50 hover:bg-emerald-100' }} px-3 py-1.5 rounded-lg transition-all">
                                                    {{ $clinic->is_active ? '⏸ Désactiver' : '▶ Activer' }}
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="p-4 border-t border-slate-200">{{ $clinics->links() }}</div>
            @else
                <div class="p-12 text-center text-slate-500">
                    <div class="text-5xl mb-3">🏥</div>
                    <p class="font-semibold text-base">Aucune clinique partenaire enregistrée.</p>
                    <a href="{{ route('admin.cliniques.create') }}" class="mt-4 inline-flex items-center gap-2 bg-[#061743] hover:bg-[#0a2569] text-white font-bold text-sm px-5 py-2.5 rounded-xl shadow transition-all">
                        + Ajouter la première clinique
                    </a>
                </div>
            @endif
        </div>

    </div>
</div>
@endsection
