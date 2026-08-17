@extends('layouts.app')

@section('content')
<div class="flex min-h-screen -mt-8 -mx-4 sm:-mx-6 lg:-mx-8" style="background: linear-gradient(135deg, rgba(241,245,249,0.85) 0%, rgba(226,232,240,0.88) 100%);">

    <x-admin-sidebar />

    <div class="flex-1 p-6 md:p-10 overflow-y-auto">

        {{-- En-tête --}}
        <div class="mb-8 rounded-2xl p-8 text-white shadow-xl flex flex-col md:flex-row md:items-center justify-between gap-6 relative overflow-hidden" style="background: linear-gradient(135deg, rgba(6,23,67,0.92) 0%, rgba(12,58,110,0.95) 100%);">
            <div class="absolute -right-6 -bottom-8 opacity-15 text-8xl pointer-events-none">🏥</div>
            <div class="relative z-10">
                <span class="inline-flex items-center gap-1.5 bg-[#f2a90f] text-[#061743] text-xs font-black px-3 py-1 rounded-md uppercase tracking-wider mb-2">
                    🏥 Partenaires Cliniques
                </span>
                <h1 class="text-3xl font-black uppercase tracking-tight">Gestion des Cliniques Partenaires</h1>
                <p class="mt-2 text-slate-200 text-sm">Créez et gérez les comptes des cliniques partenaires, générez leurs identifiants de connexion.</p>
            </div>
            <a href="{{ route('admin.cliniques.create') }}" class="shrink-0 inline-flex items-center gap-2 bg-teal-500 hover:bg-teal-400 text-[#061743] font-black text-sm px-5 py-3 rounded-xl shadow transition-all">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                Ajouter une clinique
            </a>
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
                                            <a href="{{ route('admin.cliniques.show', $clinic) }}" class="inline-flex items-center gap-1 text-xs font-bold text-[#061743] hover:text-[#f2a90f] bg-slate-100 hover:bg-slate-200 px-3 py-1.5 rounded-lg transition-all">
                                                Voir
                                            </a>
                                            <form action="{{ route('admin.cliniques.reset-password', $clinic) }}" method="POST" onsubmit="return confirm('Regénérer le mot de passe pour {{ addslashes($clinic->name) }} ?');">
                                                @csrf
                                                <button type="submit" class="text-xs font-bold text-indigo-600 hover:text-indigo-800 bg-indigo-50 hover:bg-indigo-100 px-3 py-1.5 rounded-lg transition-all">
                                                    🔑 Nouveau mdp
                                                </button>
                                            </form>
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
