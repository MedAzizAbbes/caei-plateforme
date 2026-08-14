@extends('layouts.app')

@section('content')
<div class="flex min-h-screen -mt-8 -mx-4 sm:-mx-6 lg:-mx-8" style="background: linear-gradient(135deg, rgba(241, 245, 249, 0.85) 0%, rgba(226, 232, 240, 0.88) 100%), url('{{ asset('assets/img/company.jpg') }}') center/cover fixed no-repeat;">
    {{-- Sidebar Admin --}}
    <x-admin-sidebar />

    {{-- Contenu Principal --}}
    <div class="flex-1 p-6 md:p-8 overflow-y-auto">
        {{-- En-tête --}}
        <div class="mb-8 rounded-2xl p-8 text-white shadow-xl relative overflow-hidden" style="background: linear-gradient(135deg, rgba(6, 23, 67, 0.88) 0%, rgba(0, 31, 63, 0.92) 100%), url('{{ asset('assets/img/company.jpg') }}') center/cover no-repeat;">
            <div class="absolute -right-6 -bottom-8 opacity-20 text-8xl pointer-events-none select-none">📚</div>
            <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <span class="inline-flex items-center gap-2 rounded-full bg-amber-500/20 px-3 py-1 text-xs font-bold text-[#ffbd45] border border-amber-500/30">
                        <span>📜</span> CAEI ELITE TRAINING
                    </span>
                    <h1 class="mt-3 text-3xl font-black tracking-tight flex items-center gap-3">
                        <span>Gestion des Formations</span> 📚
                    </h1>
                    <p class="mt-2 text-sm text-slate-300">Gérez le catalogue des formations certifiantes, diplômantes (MBA/Doctorat), sur-mesure et e-learning.</p>
                </div>
                <div class="flex items-center gap-3">
                    <a href="{{ route('admin.elite-training.index') }}" class="inline-flex items-center gap-2 rounded-xl bg-white/10 hover:bg-white/20 px-4 py-3 text-sm font-bold text-white border border-white/20 transition-all">
                        <span>🏆 RDV & Inscriptions</span>
                    </a>
                    <a href="{{ route('admin.formations.create') }}" class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-[#ce9233] to-[#f0b75a] px-5 py-3 text-sm font-bold text-[#061743] shadow-lg hover:shadow-xl hover:scale-[1.02] transition-all">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                        <span>Nouvelle Formation</span>
                    </a>
                </div>
            </div>
        </div>

        {{-- Flash Success Message --}}
        @if(session('success'))
            <div class="mb-6 rounded-xl bg-emerald-500/10 border border-emerald-500/30 p-4 text-emerald-800 flex items-center gap-3">
                <span class="text-xl">✅</span>
                <span class="text-sm font-bold">{{ session('success') }}</span>
            </div>
        @endif

        {{-- Statistiques Rapides --}}
        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mb-8">
            <div class="rounded-xl bg-white p-5 shadow-sm border border-slate-200/80">
                <span class="text-xs font-bold text-slate-400 uppercase">Total Formations</span>
                <div class="mt-2 text-2xl font-black text-[#061743]">{{ $stats['total'] }}</div>
            </div>
            <div class="rounded-xl bg-white p-5 shadow-sm border border-slate-200/80">
                <span class="text-xs font-bold text-slate-400 uppercase">Certifiantes</span>
                <div class="mt-2 text-2xl font-black text-amber-600">{{ $stats['certifiantes'] }}</div>
            </div>
            <div class="rounded-xl bg-white p-5 shadow-sm border border-slate-200/80">
                <span class="text-xs font-bold text-slate-400 uppercase">Diplômantes (MBA/Doc)</span>
                <div class="mt-2 text-2xl font-black text-indigo-600">{{ $stats['diplomantes'] }}</div>
            </div>
            <div class="rounded-xl bg-white p-5 shadow-sm border border-slate-200/80">
                <span class="text-xs font-bold text-slate-400 uppercase">Actives sur le site</span>
                <div class="mt-2 text-2xl font-black text-emerald-600">{{ $stats['active'] }}</div>
            </div>
        </div>

        {{-- Barre de recherche et filtres --}}
        <div class="mb-6 rounded-xl bg-white p-5 shadow-sm border border-slate-200/80">
            <form method="GET" action="{{ route('admin.formations.index') }}" class="grid grid-cols-1 md:grid-cols-4 gap-4">
                {{-- Recherche textuelle --}}
                <div class="md:col-span-1">
                    <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Recherche</label>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Code, titre, domaine..." class="w-full rounded-lg border-slate-200 text-sm focus:border-amber-500 focus:ring-amber-500">
                </div>

                {{-- Filtre par Type --}}
                <div>
                    <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Type de Formation</label>
                    <select name="type" class="w-full rounded-lg border-slate-200 text-sm focus:border-amber-500 focus:ring-amber-500">
                        <option value="">Tous les types</option>
                        <option value="certifiante" {{ request('type') == 'certifiante' ? 'selected' : '' }}>Certifiante</option>
                        <option value="diplomante" {{ request('type') == 'diplomante' ? 'selected' : '' }}>Diplômante</option>
                        <option value="cycle" {{ request('type') == 'cycle' ? 'selected' : '' }}>Cycle & Séminaire</option>
                        <option value="sur_mesure" {{ request('type') == 'sur_mesure' ? 'selected' : '' }}>Sur Mesure</option>
                        <option value="elearning" {{ request('type') == 'elearning' ? 'selected' : '' }}>E-Learning</option>
                    </select>
                </div>

                {{-- Filtre par Domaine --}}
                <div>
                    <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Domaine / Catégorie</label>
                    <select name="domain" class="w-full rounded-lg border-slate-200 text-sm focus:border-amber-500 focus:ring-amber-500">
                        <option value="">Tous les domaines</option>
                        @foreach($domains as $domain)
                            <option value="{{ $domain }}" {{ request('domain') == $domain ? 'selected' : '' }}>{{ $domain }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Boutons d'action --}}
                <div class="flex items-end gap-2">
                    <button type="submit" class="flex-1 rounded-lg bg-[#061743] py-2 px-4 text-sm font-bold text-white hover:bg-[#0a2463] transition">
                        Filtrer
                    </button>
                    @if(request()->hasAny(['search', 'type', 'domain', 'status']))
                        <a href="{{ route('admin.formations.index') }}" class="rounded-lg bg-slate-200 py-2 px-4 text-sm font-bold text-slate-700 hover:bg-slate-300 transition">
                            Réinitialiser
                        </a>
                    @endif
                </div>
            </form>
        </div>

        {{-- Tableau des Formations --}}
        <div class="rounded-xl bg-white shadow-sm border border-slate-200/80 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600">
                    <thead class="bg-slate-50 text-xs uppercase font-bold text-slate-500 border-b border-slate-200">
                        <tr>
                            <th class="px-6 py-4">Code</th>
                            <th class="px-6 py-4">Intitulé & Domaine</th>
                            <th class="px-6 py-4">Type</th>
                            <th class="px-6 py-4">Durée</th>
                            <th class="px-6 py-4">Prix</th>
                            <th class="px-6 py-4">Statut</th>
                            <th class="px-6 py-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($formations as $formation)
                            <tr class="hover:bg-slate-50/80 transition">
                                {{-- Code --}}
                                <td class="px-6 py-4 whitespace-nowrap font-mono text-xs font-bold text-[#ce9233]">
                                    {{ $formation->code ?: 'N/A' }}
                                </td>

                                {{-- Intitulé & Domaine --}}
                                <td class="px-6 py-4">
                                    <div class="font-bold text-slate-900 line-clamp-1" title="{{ $formation->title }}">
                                        {{ $formation->title }}
                                    </div>
                                    <div class="text-xs text-slate-400 mt-0.5">
                                        {{ $formation->domain ?: 'Domaine non spécifié' }}
                                    </div>
                                </td>

                                {{-- Type --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($formation->type === 'certifiante')
                                        <span class="inline-flex items-center gap-1 rounded-full bg-amber-100 px-2.5 py-1 text-xs font-bold text-amber-800">
                                            📜 Certifiante
                                        </span>
                                    @elseif($formation->type === 'diplomante')
                                        <span class="inline-flex items-center gap-1 rounded-full bg-indigo-100 px-2.5 py-1 text-xs font-bold text-indigo-800">
                                            🎓 Diplômante
                                        </span>
                                    @elseif($formation->type === 'sur_mesure')
                                        <span class="inline-flex items-center gap-1 rounded-full bg-purple-100 px-2.5 py-1 text-xs font-bold text-purple-800">
                                            🎯 Sur Mesure
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1 rounded-full bg-cyan-100 px-2.5 py-1 text-xs font-bold text-cyan-800">
                                            💻 E-Learning
                                        </span>
                                    @endif
                                </td>

                                {{-- Durée --}}
                                <td class="px-6 py-4 whitespace-nowrap text-xs font-semibold text-slate-700">
                                    {{ $formation->duration ?: 'Non précisée' }}
                                </td>

                                {{-- Prix --}}
                                <td class="px-6 py-4 whitespace-nowrap font-bold text-slate-900">
                                    @if($formation->price)
                                        {{ number_format($formation->price, 0, ',', ' ') }} €
                                    @else
                                        <span class="text-xs text-amber-600 font-bold bg-amber-50 px-2 py-0.5 rounded border border-amber-200">Sur devis</span>
                                    @endif
                                </td>

                                {{-- Statut --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @if($formation->status === 'active')
                                        <span class="inline-flex items-center gap-1 text-xs font-bold text-emerald-600">
                                            <span class="h-2 w-2 rounded-full bg-emerald-500 animate-pulse"></span> Active
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1 text-xs font-bold text-slate-400">
                                            <span class="h-2 w-2 rounded-full bg-slate-300"></span> Inactive
                                        </span>
                                    @endif
                                </td>

                                {{-- Actions --}}
                                <td class="px-6 py-4 whitespace-nowrap text-right text-xs font-bold">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('admin.formations.edit', $formation) }}" class="rounded-lg bg-slate-100 p-2 text-slate-700 hover:bg-amber-500 hover:text-white transition">
                                            ✏️ Éditer
                                        </a>
                                        <form method="POST" action="{{ route('admin.formations.destroy', $formation) }}" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette formation ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="rounded-lg bg-red-50 p-2 text-red-600 hover:bg-red-600 hover:text-white transition">
                                                🗑️
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="px-6 py-12 text-center text-slate-400">
                                    <div class="text-4xl mb-2">🔍</div>
                                    Aucune formation trouvée dans la base de données.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if($formations->hasPages())
                <div class="p-4 border-t border-slate-100">
                    {{ $formations->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
