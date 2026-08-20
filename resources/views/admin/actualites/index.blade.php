@extends('layouts.app')

@section('content')
<div class="flex min-h-screen -mt-8 -mx-4 sm:-mx-6 lg:-mx-8" style="background: linear-gradient(135deg, rgba(241, 245, 249, 0.85) 0%, rgba(226, 232, 240, 0.88) 100%), url('{{ asset('assets/img/company.jpg') }}') center/cover fixed no-repeat;">
    {{-- Sidebar Admin --}}
    <x-admin-sidebar />

    {{-- Contenu Principal --}}
    <div class="flex-1 p-6 md:p-8 overflow-y-auto">
        {{-- En-tête --}}
        <div class="mb-8 rounded-2xl p-8 text-white shadow-xl relative overflow-hidden" style="background: linear-gradient(135deg, rgba(6, 23, 67, 0.88) 0%, rgba(0, 31, 63, 0.92) 100%), url('{{ asset('assets/img/company.jpg') }}') center/cover no-repeat;">
            <div class="absolute -right-6 -bottom-8 opacity-20 text-8xl pointer-events-none select-none">📰</div>
            <div class="relative z-10 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
                <div>
                    <h1 class="mt-3 text-3xl font-black tracking-tight flex items-center gap-3">
                        <span>Gestion des Actualités</span> 📰
                    </h1>
                    <p class="mt-2 text-sm text-slate-300">Gérez les actualités, séminaires et événements du CAEI.</p>
                </div>
                <div class="flex items-center gap-3">
                    <a href="{{ route('admin.actualites.create') }}" class="inline-flex items-center gap-2 rounded-xl bg-gradient-to-r from-[#ce9233] to-[#f0b75a] px-5 py-3 text-sm font-bold shadow-lg hover:shadow-xl hover:scale-[1.02] transition-all" style="color: #061743;">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M12 4v16m8-8H4"/></svg>
                        <span>Nouvelle Actualité</span>
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

        {{-- Tableau des Actualités --}}
        <div class="rounded-xl bg-white shadow-sm border border-slate-200/80 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left text-sm text-slate-600">
                    <thead class="bg-slate-50 text-xs uppercase font-bold text-slate-500 border-b border-slate-200">
                        <tr>
                            <th class="px-6 py-4">Titre</th>
                            <th class="px-6 py-4">Catégorie</th>
                            <th class="px-6 py-4">Lieu</th>
                            <th class="px-6 py-4">Date</th>
                            <th class="px-6 py-4 text-right">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100">
                        @forelse($actualites as $actualite)
                            <tr class="hover:bg-slate-50/80 transition">
                                <td class="px-6 py-4">
                                    <div class="flex items-center gap-3">
                                        @if($actualite->main_image)
                                            <div class="h-10 w-10 flex-shrink-0">
                                                <img src="{{ asset($actualite->main_image) }}" class="h-10 w-10 rounded-lg object-cover border border-slate-200">
                                            </div>
                                        @endif
                                        <div>
                                            <div class="font-bold text-slate-900 line-clamp-1" title="{{ $actualite->title }}">
                                                {{ $actualite->title }}
                                            </div>
                                            <div class="text-xs text-slate-400 mt-0.5">
                                                {{ $actualite->slug }}
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $actualite->category }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $actualite->location }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $actualite->date }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-xs font-bold">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('admin.actualites.edit', $actualite->id) }}" class="rounded-lg bg-slate-100 p-2 text-slate-700 hover:bg-amber-500 hover:text-white transition">
                                            ✏️ Éditer
                                        </a>
                                        <form method="POST" action="{{ route('admin.actualites.destroy', $actualite->id) }}" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette actualité ?');">
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
                                <td colspan="5" class="px-6 py-12 text-center text-slate-400">
                                    Aucune actualité trouvée.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if($actualites->hasPages())
                <div class="p-4 border-t border-slate-100">
                    {{ $actualites->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
