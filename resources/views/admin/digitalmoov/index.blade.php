@extends('layouts.app')

@section('content')
<div class="flex min-h-screen -mt-8 -mx-4 sm:-mx-6 lg:-mx-8" style="background: linear-gradient(135deg, rgba(241, 245, 249, 0.85) 0%, rgba(226, 232, 240, 0.88) 100%), url('{{ asset('assets/img/service_webdesign_1786525611976.jpg') }}') center/cover fixed no-repeat;">

    <x-admin-sidebar />

    <div class="flex-1 p-6 md:p-10 overflow-y-auto">

        {{-- En-tête --}}
        <div class="mb-8 rounded-2xl p-8 text-white shadow-xl flex flex-col md:flex-row md:items-center justify-between gap-6 relative overflow-hidden"
             style="background: linear-gradient(135deg, rgba(249, 115, 22, 0.88) 0%, rgba(234, 88, 12, 0.92) 100%), url('{{ asset('assets/img/service_webdesign_1786525611976.jpg') }}') center/cover no-repeat;">
            <div class="absolute -right-6 -bottom-8 opacity-20 text-8xl pointer-events-none select-none">📱</div>
            <div class="relative z-10">
                <span class="inline-flex items-center gap-1.5 bg-white/20 text-white text-xs font-black px-3 py-1 rounded-md uppercase tracking-wider mb-2">
                    <span>📱</span> CAEI Digital Moov
                </span>
                <h1 class="text-3xl font-black uppercase tracking-tight flex items-center gap-3">
                    <span>Contacts & Messages Reçus</span> 🚀
                </h1>
                <p class="mt-2 text-orange-100 text-sm">Gérez les demandes de contact soumises depuis la page Digital Moov.</p>
            </div>
            <a href="{{ route('digitalmoov') }}" target="_blank"
               class="shrink-0 inline-flex items-center gap-2 bg-white hover:bg-orange-50 font-black text-xs px-4 py-2.5 rounded-xl shadow transition-all relative z-10" style="color: #c2410c;">
                <span>Voir le site Digital Moov 📱</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            </a>
        </div>

        {{-- Alerte succès --}}
        @if(session('success'))
            <div class="mb-6 rounded-xl bg-emerald-50 border border-emerald-300 p-4 text-emerald-900 text-sm font-semibold flex items-center gap-3">
                <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                {{ session('success') }}
            </div>
        @endif

        {{-- Stats --}}
        <div class="grid grid-cols-2 md:grid-cols-5 gap-4 mb-8">
            <a href="{{ route('admin.digitalmoov.index') }}" class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm text-center hover:shadow-md transition-all">
                <div class="text-xs font-bold text-slate-500 uppercase">Total</div>
                <div class="text-2xl font-black text-slate-900 mt-1">{{ $stats['total'] }}</div>
            </a>
            <a href="{{ route('admin.digitalmoov.index', ['status' => 'new']) }}" class="bg-orange-50 p-5 rounded-2xl border border-orange-200 shadow-sm text-center hover:shadow-md transition-all">
                <div class="text-xs font-bold text-orange-700 uppercase">Nouveaux</div>
                <div class="text-2xl font-black text-orange-700 mt-1">{{ $stats['new'] }}</div>
            </a>
            <a href="{{ route('admin.digitalmoov.index', ['status' => 'read']) }}" class="bg-blue-50 p-5 rounded-2xl border border-blue-200 shadow-sm text-center hover:shadow-md transition-all">
                <div class="text-xs font-bold text-blue-700 uppercase">Lus</div>
                <div class="text-2xl font-black text-blue-700 mt-1">{{ $stats['read'] }}</div>
            </a>
            <a href="{{ route('admin.digitalmoov.index', ['status' => 'replied']) }}" class="bg-emerald-50 p-5 rounded-2xl border border-emerald-200 shadow-sm text-center hover:shadow-md transition-all">
                <div class="text-xs font-bold text-emerald-700 uppercase">Répondus</div>
                <div class="text-2xl font-black text-emerald-700 mt-1">{{ $stats['replied'] }}</div>
            </a>
            <a href="{{ route('admin.digitalmoov.index', ['status' => 'archived']) }}" class="bg-slate-100 p-5 rounded-2xl border border-slate-200 shadow-sm text-center hover:shadow-md transition-all">
                <div class="text-xs font-bold text-slate-500 uppercase">Archivés</div>
                <div class="text-2xl font-black text-slate-600 mt-1">{{ $stats['archived'] }}</div>
            </a>
        </div>

        {{-- Filtres --}}
        <div class="bg-white p-6 rounded-2xl border border-slate-200 shadow-sm mb-8">
            <form method="GET" action="{{ route('admin.digitalmoov.index') }}" class="grid grid-cols-1 sm:grid-cols-4 gap-4">
                <div>
                    <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Rechercher</label>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Nom, email, sujet..."
                           class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm focus:border-orange-500 focus:outline-none">
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Statut</label>
                    <select name="status" class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm focus:border-orange-500 focus:outline-none">
                        <option value="">Tous</option>
                        <option value="new"      {{ request('status') === 'new'      ? 'selected' : '' }}>Nouveau</option>
                        <option value="read"     {{ request('status') === 'read'     ? 'selected' : '' }}>Lu</option>
                        <option value="replied"  {{ request('status') === 'replied'  ? 'selected' : '' }}>Répondu</option>
                        <option value="archived" {{ request('status') === 'archived' ? 'selected' : '' }}>Archivé</option>
                    </select>
                </div>
                <div>
                    <label class="block text-xs font-bold uppercase text-slate-600 mb-1">Trier par Date & Heure</label>
                    <select name="sort" class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm focus:border-orange-500 focus:outline-none">
                        <option value="desc" {{ request('sort', 'desc') === 'desc' ? 'selected' : '' }}>📅 Plus récents d'abord (Décroissant)</option>
                        <option value="asc" {{ request('sort') === 'asc' ? 'selected' : '' }}>📅 Plus anciens d'abord (Croissant)</option>
                    </select>
                </div>
                <div class="flex items-end gap-2">
                    <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 text-white font-bold text-sm py-2.5 px-5 rounded-xl shadow transition-all">Filtrer</button>
                    <a href="{{ route('admin.digitalmoov.index') }}" class="bg-slate-100 hover:bg-slate-200 text-slate-700 font-bold text-sm py-2.5 px-4 rounded-xl transition-all">Effacer</a>
                </div>
            </form>
        </div>

        {{-- Tableau --}}
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            @if($contacts->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-slate-700">
                        <thead class="bg-slate-50 text-xs font-black uppercase tracking-wider text-slate-600 border-b border-slate-200">
                            <tr>
                                <th class="p-4">
                                    <a href="{{ route('admin.digitalmoov.index', array_merge(request()->query(), ['sort' => request('sort') === 'asc' ? 'desc' : 'asc'])) }}" class="inline-flex items-center gap-1.5 hover:text-orange-500 transition-colors" title="Cliquer pour basculer le tri par date et heure">
                                        <span>Réf / Date</span>
                                        @if(request('sort') === 'asc')
                                            <span class="text-orange-600 font-black">↑ (Anciens)</span>
                                        @else
                                            <span class="text-orange-600 font-black">↓ (Récents)</span>
                                        @endif
                                    </a>
                                </th>
                                <th class="p-4">Expéditeur</th>
                                <th class="p-4">Sujet</th>
                                <th class="p-4">Message</th>
                                <th class="p-4">Statut</th>
                                <th class="p-4 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @foreach($contacts as $contact)
                                <tr class="transition-colors {{ $contact->status === 'replied' ? 'bg-emerald-100/60 hover:bg-emerald-200/60' : ($contact->status === 'read' ? 'bg-blue-100/60 hover:bg-blue-200/60' : ($contact->status === 'new' ? 'bg-orange-100/60 hover:bg-orange-200/60' : 'hover:bg-slate-50/80')) }}">
                                    <td class="p-4 font-mono font-bold text-[#061743]">
                                        #{{ ($contacts->currentPage() - 1) * $contacts->perPage() + $loop->iteration }}
                                        <span class="block text-[11px] font-normal text-slate-400 mt-0.5">
                                            {{ $contact->created_at->format('d/m/Y H:i') }}
                                        </span>
                                    </td>
                                    <td class="p-4">
                                        <div class="font-bold text-slate-900">{{ $contact->name }}</div>
                                        <div class="text-xs text-blue-600 font-medium">✉ {{ $contact->email }}</div>
                                        @if($contact->phone)
                                            <div class="text-xs text-slate-500">📞 {{ $contact->phone }}</div>
                                        @endif
                                    </td>
                                    <td class="p-4 font-medium text-slate-800 max-w-[160px]">
                                        {{ $contact->subject ?? '—' }}
                                    </td>
                                    <td class="p-4 max-w-[220px]">
                                        <p class="text-xs text-slate-600 line-clamp-2 italic">"{{ $contact->message }}"</p>
                                    </td>
                                    <td class="p-4">
                                        @if($contact->status === 'new')
                                            <span class="bg-orange-100 text-orange-800 text-xs font-bold px-3 py-1 rounded-full">Nouveau</span>
                                        @elseif($contact->status === 'read')
                                            <span class="bg-blue-100 text-blue-800 text-xs font-bold px-3 py-1 rounded-full">Lu</span>
                                        @elseif($contact->status === 'replied')
                                            <span class="bg-emerald-100 text-emerald-800 text-xs font-bold px-3 py-1 rounded-full">Répondu</span>
                                        @else
                                            <span class="bg-slate-100 text-slate-600 text-xs font-bold px-3 py-1 rounded-full">Archivé</span>
                                        @endif
                                    </td>
                                    <td class="p-4 text-right">
                                        <button onclick="openModal('dm-modal-{{ $contact->id }}')"
                                                class="text-xs font-bold text-orange-700 hover:text-orange-900 bg-orange-50 hover:bg-orange-100 px-3 py-1.5 rounded-lg transition-all">
                                            Gérer
                                        </button>
                                    </td>
                                </tr>

                                {{-- Modal --}}
                                <div id="dm-modal-{{ $contact->id }}" class="hidden fixed inset-0 z-50 bg-black/60 backdrop-blur-sm flex items-center justify-center p-4">
                                    <div class="bg-white rounded-3xl max-w-xl w-full p-8 shadow-2xl space-y-5 relative text-left">
                                        <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                                            <div>
                                                <span class="text-xs font-bold text-orange-600 uppercase">Digital Moov #{{ ($contacts->currentPage() - 1) * $contacts->perPage() + $loop->iteration }}</span>
                                                <h3 class="text-xl font-black text-slate-900">{{ $contact->name }}</h3>
                                            </div>
                                            <button onclick="closeModal('dm-modal-{{ $contact->id }}')" class="text-slate-400 hover:text-slate-700 text-xl font-bold p-2">✕</button>
                                        </div>

                                        <div class="grid grid-cols-2 gap-3 bg-slate-50 p-4 rounded-2xl text-xs">
                                            <div><strong>Email :</strong> {{ $contact->email }}</div>
                                            <div><strong>Téléphone :</strong> {{ $contact->phone ?? '—' }}</div>
                                            <div class="col-span-2"><strong>Sujet :</strong> {{ $contact->subject ?? '—' }}</div>
                                            <div class="col-span-2"><strong>Reçu le :</strong> {{ $contact->created_at->format('d/m/Y à H:i') }}</div>
                                        </div>

                                        <div>
                                            <label class="block text-xs font-bold uppercase text-slate-500 mb-2">Message complet :</label>
                                            <div class="p-4 bg-orange-50/60 rounded-2xl text-sm text-slate-800 border border-orange-100 whitespace-pre-wrap leading-relaxed">{{ $contact->message }}</div>
                                        </div>

                                        <form action="{{ route('admin.digitalmoov.update-status', $contact) }}" method="POST" class="space-y-4">
                                            @csrf
                                            @method('PUT')
                                            <div>
                                                <label class="block text-xs font-bold uppercase text-slate-700 mb-2">Changer le statut :</label>
                                                <select name="status" class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm focus:outline-none focus:border-orange-500">
                                                    <option value="new"      {{ $contact->status === 'new'      ? 'selected' : '' }}>Nouveau</option>
                                                    <option value="read"     {{ $contact->status === 'read'     ? 'selected' : '' }}>Lu</option>
                                                    <option value="replied"  {{ $contact->status === 'replied'  ? 'selected' : '' }}>Répondu</option>
                                                    <option value="archived" {{ $contact->status === 'archived' ? 'selected' : '' }}>Archivé</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label class="block text-xs font-bold uppercase text-slate-700 mb-2">Notes internes :</label>
                                                <textarea name="admin_notes" rows="3" placeholder="Vos notes ou suivi..."
                                                          class="w-full rounded-xl border border-slate-300 px-4 py-2.5 text-sm focus:outline-none focus:border-orange-500">{{ $contact->admin_notes }}</textarea>
                                            </div>
                                            <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                                                <button type="submit" class="bg-orange-500 hover:bg-orange-600 text-white font-bold text-sm px-6 py-3 rounded-xl shadow transition-all">
                                                    Enregistrer
                                                </button>
                                        </form>
                                                <form action="{{ route('admin.digitalmoov.destroy', $contact) }}" method="POST" onsubmit="return confirm('Supprimer ce message ?');">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="text-rose-600 hover:text-rose-800 text-xs font-bold underline">Supprimer</button>
                                                </form>
                                            </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="p-4 border-t border-slate-200">
                    {{ $contacts->links() }}
                </div>
            @else
                <div class="p-12 text-center text-slate-500">
                    <p class="text-4xl mb-4">📭</p>
                    <p class="text-base font-semibold">Aucun message reçu pour le moment.</p>
                    <p class="text-xs text-slate-400 mt-1">Les soumissions du formulaire Digital Moov apparaîtront ici.</p>
                </div>
            @endif
        </div>

    </div>
</div>

<script>
    function openModal(id)  { document.getElementById(id).classList.remove('hidden'); }
    function closeModal(id) { document.getElementById(id).classList.add('hidden'); }
</script>
@endsection
