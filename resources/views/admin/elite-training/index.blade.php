@extends('layouts.app')

@section('content')
<div class="flex min-h-screen -mt-8 -mx-4 sm:-mx-6 lg:-mx-8 bg-slate-100">
    
    {{-- Sidebar Administrateur --}}
    <x-admin-sidebar />

    {{-- Main Back-Office Content --}}
    <div class="flex-1 p-6 md:p-10 overflow-y-auto">
        
        {{-- En-tête du module --}}
        <div class="mb-8 rounded-2xl bg-[#061743] p-8 text-white shadow-xl flex flex-col md:flex-row md:items-center justify-between gap-6">
            <div>
                <span class="inline-block bg-[#f2a90f] text-[#061743] text-xs font-black px-3 py-1 rounded-md uppercase tracking-wider mb-2">CAEI Elite Training</span>
                <h1 class="text-3xl font-black uppercase tracking-tight">Rendez-vous & Demandes en Ligne</h1>
                <p class="mt-2 text-slate-300 text-sm">Consultez, gérez et suivez les demandes d'inscription et de rendez-vous soumis via le portail Elite Training.</p>
            </div>
            <div class="shrink-0 flex items-center gap-3">
                <a href="{{ route('elite.training') }}" target="_blank" class="inline-flex items-center gap-2 bg-[#f2a90f] hover:bg-amber-400 text-[#061743] font-bold text-xs px-4 py-2.5 rounded-xl shadow transition-all">
                    <span>Voir le site Elite Training</span>
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                </a>
            </div>
        </div>

        {{-- Alerte de succès --}}
        @if(session('success'))
            <div class="mb-6 rounded-xl bg-emerald-50 border border-emerald-300 p-4 text-emerald-900 text-sm font-semibold flex items-center gap-3">
                <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                <span>{{ session('success') }}</span>
            </div>
        @endif

        {{-- Sub-Navigation Tabs (Rendez-vous vs Inscriptions aux Formations) --}}
        <div class="flex flex-col sm:flex-row items-center gap-3 mb-6 bg-white p-2 rounded-2xl border border-slate-200 shadow-sm">
            <a href="{{ route('admin.elite-training.index', ['type' => 'appointment']) }}" 
               class="w-full sm:w-auto flex-1 text-center py-3 px-5 rounded-xl font-bold text-sm transition-all flex items-center justify-center gap-2.5 {{ $activeType === 'appointment' ? 'bg-[#061743] text-white shadow-md' : 'text-slate-600 hover:bg-slate-100' }}">
                <span class="text-base">📅</span>
                <span>Rendez-vous & Demandes en Ligne</span>
                <span class="px-2.5 py-0.5 rounded-full text-xs font-black {{ $activeType === 'appointment' ? 'bg-[#f2a90f] text-[#061743]' : 'bg-slate-200 text-slate-700' }}">
                    {{ $countAppointmentsTotal }}
                </span>
                @if($countAppointmentsPending > 0)
                    <span class="bg-amber-500 text-white text-[10px] font-black px-2 py-0.5 rounded-full animate-pulse">
                        {{ $countAppointmentsPending }} nouveaux
                    </span>
                @endif
            </a>

            <a href="{{ route('admin.elite-training.index', ['type' => 'inscription']) }}" 
               class="w-full sm:w-auto flex-1 text-center py-3 px-5 rounded-xl font-bold text-sm transition-all flex items-center justify-center gap-2.5 {{ $activeType === 'inscription' ? 'bg-[#061743] text-white shadow-md' : 'text-slate-600 hover:bg-slate-100' }}">
                <span class="text-base">📜</span>
                <span>Inscriptions aux Formations (Diplômes)</span>
                <span class="px-2.5 py-0.5 rounded-full text-xs font-black {{ $activeType === 'inscription' ? 'bg-[#f2a90f] text-[#061743]' : 'bg-slate-200 text-slate-700' }}">
                    {{ $countInscriptionsTotal }}
                </span>
                @if($countInscriptionsPending > 0)
                    <span class="bg-amber-500 text-white text-[10px] font-black px-2 py-0.5 rounded-full animate-pulse">
                        {{ $countInscriptionsPending }} nouveaux
                    </span>
                @endif
            </a>
        </div>

        {{-- Statistiques clés --}}
        <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mb-8">
            <a href="{{ route('admin.elite-training.index', ['type' => $activeType]) }}" class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm hover:shadow-md transition-all text-center">
                <div class="text-xs uppercase font-bold text-slate-500">Total {{ $activeType === 'inscription' ? 'Inscriptions' : 'Rendez-vous' }}</div>
                <div class="text-2xl font-black text-slate-900 mt-1">{{ $stats['total'] }}</div>
            </a>
            <a href="{{ route('admin.elite-training.index', ['type' => $activeType, 'status' => 'pending']) }}" class="bg-amber-50 p-5 rounded-2xl border border-amber-200 shadow-sm hover:shadow-md transition-all text-center">
                <div class="text-xs uppercase font-bold text-amber-700">En Attente</div>
                <div class="text-2xl font-black text-amber-700 mt-1">{{ $stats['pending'] }}</div>
            </a>
            <a href="{{ route('admin.elite-training.index', ['type' => $activeType, 'status' => 'in_progress']) }}" class="bg-blue-50 p-5 rounded-2xl border border-blue-200 shadow-sm hover:shadow-md transition-all text-center">
                <div class="text-xs uppercase font-bold text-blue-700">En Cours</div>
                <div class="text-2xl font-black text-blue-700 mt-1">{{ $stats['in_progress'] }}</div>
            </a>
            <a href="{{ route('admin.elite-training.index', ['type' => $activeType, 'status' => 'completed']) }}" class="bg-emerald-50 p-5 rounded-2xl border border-emerald-200 shadow-sm hover:shadow-md transition-all text-center">
                <div class="text-xs uppercase font-bold text-emerald-700">Traités</div>
                <div class="text-2xl font-black text-emerald-700 mt-1">{{ $stats['completed'] }}</div>
            </a>
            <a href="{{ route('admin.elite-training.index', ['type' => $activeType, 'status' => 'cancelled']) }}" class="bg-rose-50 p-5 rounded-2xl border border-rose-200 shadow-sm hover:shadow-md transition-all text-center">
                <div class="text-xs uppercase font-bold text-rose-700">Annulés</div>
                <div class="text-2xl font-black text-rose-700 mt-1">{{ $stats['cancelled'] }}</div>
            </a>
        </div>

        {{-- Filtres & Recherche --}}
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm mb-8">
            <form method="GET" action="{{ route('admin.elite-training.index') }}" class="grid grid-cols-1 sm:grid-cols-4 gap-4">
                <input type="hidden" name="type" value="{{ $activeType }}">
                <div>
                    <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Rechercher</label>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Nom, email, téléphone, objet..." class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm focus:border-[#061743] focus:outline-none">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Statut</label>
                    <select name="status" class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm focus:border-[#061743] focus:outline-none">
                        <option value="">Tous les statuts</option>
                        <option value="pending" {{ request('status') === 'pending' ? 'selected' : '' }}>En attente</option>
                        <option value="in_progress" {{ request('status') === 'in_progress' ? 'selected' : '' }}>En cours</option>
                        <option value="completed" {{ request('status') === 'completed' ? 'selected' : '' }}>Traité</option>
                        <option value="cancelled" {{ request('status') === 'cancelled' ? 'selected' : '' }}>Annulé</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Trier par Date & Heure</label>
                    <select name="sort" class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm focus:border-[#061743] focus:outline-none">
                        <option value="desc" {{ request('sort', 'desc') === 'desc' ? 'selected' : '' }}>📅 Plus récents d'abord (Décroissant)</option>
                        <option value="asc" {{ request('sort') === 'asc' ? 'selected' : '' }}>📅 Plus anciens d'abord (Croissant)</option>
                    </select>
                </div>
                <div class="flex items-end gap-2">
                    <button type="submit" class="w-full bg-[#061743] hover:bg-[#0a2569] text-white font-bold text-sm py-2.5 px-5 rounded-xl shadow transition-all">
                        Filtrer
                    </button>
                    <a href="{{ route('admin.elite-training.index', ['type' => $activeType]) }}" class="bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-sm py-2.5 px-4 rounded-xl transition-all">
                        Effacer
                    </a>
                </div>
            </form>
        </div>

        {{-- Tableau des rendez-vous --}}
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            @if($appointments->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-slate-700">
                        <thead class="bg-slate-50 text-xs font-black uppercase tracking-wider text-slate-600 border-b border-slate-200">
                            <tr>
                                <th class="p-4">
                                    <a href="{{ route('admin.elite-training.index', array_merge(request()->query(), ['sort' => request('sort') === 'asc' ? 'desc' : 'asc'])) }}" class="inline-flex items-center gap-1.5 hover:text-[#f2a90f] transition-colors" title="Cliquer pour basculer le tri par date et heure">
                                        <span>Réf / Date</span>
                                        @if(request('sort') === 'asc')
                                            <span class="text-amber-600 font-black">↑ (Anciens)</span>
                                        @else
                                            <span class="text-amber-600 font-black">↓ (Récents)</span>
                                        @endif
                                    </a>
                                </th>
                                <th class="p-4">Demandeur</th>
                                <th class="p-4">Coordonnées</th>
                                <th class="p-4">Objet</th>
                                <th class="p-4">Statut</th>
                                <th class="p-4 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @foreach($appointments as $app)
                                <tr class="hover:bg-slate-50/80 transition-colors">
                                    <td class="p-4 font-mono font-bold text-[#061743]">
                                        #{{ ($appointments->currentPage() - 1) * $appointments->perPage() + $loop->iteration }}
                                        <span class="block text-[11px] font-normal text-slate-400 mt-0.5">
                                            {{ $app->created_at->format('d/m/Y H:i') }}
                                        </span>
                                    </td>
                                    <td class="p-4">
                                        <div class="font-bold text-slate-900">{{ $app->fullname }}</div>
                                    </td>
                                    <td class="p-4">
                                        <div class="font-medium text-slate-800">{{ $app->email }}</div>
                                        @if($app->phone)
                                            <div class="text-xs text-amber-700 font-bold">📞 {{ $app->phone }}</div>
                                        @endif
                                    </td>
                                    <td class="p-4">
                                        <span class="inline-block bg-amber-50 text-amber-800 font-bold text-xs px-2.5 py-1 rounded-lg border border-amber-200">
                                            {{ $app->subject ?? 'Rendez-vous' }}
                                        </span>
                                        @if($app->message)
                                            <p class="text-xs text-slate-500 mt-1 line-clamp-1 italic">"{{ $app->message }}"</p>
                                        @endif
                                    </td>
                                    <td class="p-4">
                                        @if($app->status === 'pending')
                                            <span class="bg-amber-100 text-amber-800 text-xs font-bold px-3 py-1 rounded-full">En attente</span>
                                        @elseif($app->status === 'in_progress')
                                            <span class="bg-blue-100 text-blue-800 text-xs font-bold px-3 py-1 rounded-full">En cours</span>
                                        @elseif($app->status === 'completed')
                                            <span class="bg-emerald-100 text-emerald-800 text-xs font-bold px-3 py-1 rounded-full">Traité</span>
                                        @else
                                            <span class="bg-rose-100 text-rose-800 text-xs font-bold px-3 py-1 rounded-full">Annulé</span>
                                        @endif
                                    </td>
                                    <td class="p-4 text-right">
                                        <button onclick="openModal('modal-{{ $app->id }}')" class="inline-flex items-center gap-1 text-xs font-bold text-[#061743] hover:text-[#f2a90f] bg-slate-100 hover:bg-slate-200 px-3 py-1.5 rounded-lg transition-all">
                                            <span>Gérer</span>
                                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                        </button>
                                    </td>
                                </tr>

                                {{-- Modal de Gestion du Rendez-vous --}}
                                <div id="modal-{{ $app->id }}" class="hidden fixed inset-0 z-50 overflow-y-auto bg-black/60 backdrop-blur-xs flex items-center justify-center p-4">
                                    <div class="bg-white rounded-3xl max-w-2xl w-full p-8 shadow-2xl space-y-6 relative text-left">
                                        <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                                            <div>
                                                <span class="text-xs font-bold uppercase text-amber-600">Rendez-vous Elite Training #{{ ($appointments->currentPage() - 1) * $appointments->perPage() + $loop->iteration }}</span>
                                                <h3 class="text-xl font-black text-slate-900">{{ $app->fullname }}</h3>
                                            </div>
                                            <button onclick="closeModal('modal-{{ $app->id }}')" class="text-slate-400 hover:text-slate-700 text-xl font-bold p-2">✕</button>
                                        </div>

                                        <div class="grid grid-cols-2 gap-4 bg-slate-50 p-4 rounded-2xl text-xs space-y-1">
                                            <div><strong>Email :</strong> {{ $app->email }}</div>
                                            <div><strong>Téléphone :</strong> {{ $app->phone ?? 'Non renseigné' }}</div>
                                            <div><strong>Objet :</strong> {{ $app->subject ?? 'Rendez-vous' }}</div>
                                            <div><strong>Demande reçue :</strong> {{ $app->created_at->format('d/m/Y H:i') }}</div>
                                        </div>

                                        @if($app->message)
                                            <div>
                                                <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Message transmis :</label>
                                                <div class="p-4 bg-amber-50/60 rounded-2xl text-xs text-slate-800 border border-amber-200 whitespace-pre-wrap">
                                                    {{ $app->message }}
                                                </div>
                                            </div>
                                        @endif

                                        <form action="{{ route('admin.elite-training.update-status', $app) }}" method="POST" class="space-y-4">
                                            @csrf
                                            @method('PUT')

                                            <div>
                                                <label class="block text-xs font-bold uppercase text-slate-700 mb-2">Changer le statut :</label>
                                                <select name="status" class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm focus:border-[#061743] focus:outline-none">
                                                    <option value="pending" {{ $app->status === 'pending' ? 'selected' : '' }}>En attente</option>
                                                    <option value="in_progress" {{ $app->status === 'in_progress' ? 'selected' : '' }}>En cours de traitement</option>
                                                    <option value="completed" {{ $app->status === 'completed' ? 'selected' : '' }}>Traité / Rendez-vous confirmé</option>
                                                    <option value="cancelled" {{ $app->status === 'cancelled' ? 'selected' : '' }}>Annulé</option>
                                                </select>
                                            </div>

                                            <div>
                                                <label class="block text-xs font-bold uppercase text-slate-700 mb-2">Notes internes Administrateur :</label>
                                                <textarea name="admin_notes" rows="3" placeholder="Ajoutez vos notes de suivi interne..." class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm focus:border-[#061743] focus:outline-none">{{ $app->admin_notes }}</textarea>
                                            </div>

                                            <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                                                <button type="submit" class="bg-[#061743] hover:bg-[#0a2569] text-white font-bold text-sm px-6 py-3 rounded-xl shadow transition-all">
                                                    Enregistrer les modifications
                                                </button>
                                        </form>

                                                <form action="{{ route('admin.elite-training.destroy', $app) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette demande ?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="text-rose-600 hover:text-rose-800 text-xs font-bold underline">
                                                        Supprimer la demande
                                                    </button>
                                                </form>
                                            </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="p-4 border-t border-slate-200">
                    {{ $appointments->links() }}
                </div>
            @else
                <div class="p-12 text-center text-slate-500">
                    <p class="text-base font-semibold">Aucune {{ $activeType === 'inscription' ? 'inscription aux formations' : 'demande de rendez-vous' }} trouvée.</p>
                </div>
            @endif
        </div>

    </div>
</div>

<script>
    function openModal(id) {
        document.getElementById(id).classList.remove('hidden');
    }
    function closeModal(id) {
        document.getElementById(id).classList.add('hidden');
    }
</script>
@endsection
