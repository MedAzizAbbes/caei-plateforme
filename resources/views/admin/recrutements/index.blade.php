@extends('layouts.app')

@section('content')
<div class="flex min-h-screen -mt-8 -mx-4 sm:-mx-6 lg:-mx-8" style="background: linear-gradient(135deg, rgba(241, 245, 249, 0.85) 0%, rgba(226, 232, 240, 0.88) 100%), url('{{ asset('assets/img/features-bg.jpg') }}') center/cover fixed no-repeat;">

    <x-admin-sidebar />

    <div class="flex-1 p-6 md:p-10 overflow-y-auto">

        {{-- En-tête --}}
        <div class="mb-8 rounded-2xl p-8 text-white shadow-xl flex flex-col md:flex-row md:items-center justify-between gap-6 relative overflow-hidden"
             style="background: linear-gradient(135deg, rgba(30, 58, 138, 0.88) 0%, rgba(30, 64, 175, 0.92) 100%), url('{{ asset('assets/img/features-bg.jpg') }}') center/cover no-repeat;">
            <div class="absolute -right-6 -bottom-8 opacity-20 text-8xl pointer-events-none select-none">💼</div>
            <div class="relative z-10">
                <span class="inline-flex items-center gap-1.5 bg-white/20 text-white text-xs font-black px-3 py-1 rounded-md uppercase tracking-wider mb-2">
                    <span>💼</span> CAEI Recrutement
                </span>
                <h1 class="text-3xl font-black uppercase tracking-tight flex items-center gap-3">
                    <span>Candidatures Reçues</span> 👔
                </h1>
                <p class="mt-2 text-blue-100 text-sm">Gérez les candidatures soumises depuis le formulaire de recrutement.</p>
            </div>
            <a href="{{ route('recrutement.index') }}" target="_blank"
               class="shrink-0 inline-flex items-center gap-2 bg-white hover:bg-blue-50 font-black text-xs px-4 py-2.5 rounded-xl shadow transition-all relative z-10" style="color: #1e40af;">
                <span>Voir le formulaire 💼</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            </a>
        </div>

        {{-- Alertes --}}
        @if(session('success'))
            <div class="mb-6 rounded-xl bg-emerald-50 border border-emerald-300 p-4 text-emerald-900 text-sm font-semibold flex items-center gap-3">
                <svg class="w-5 h-5 text-emerald-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="mb-6 rounded-xl bg-red-50 border border-red-300 p-4 text-red-900 text-sm font-semibold flex items-center gap-3">
                <svg class="w-5 h-5 text-red-600 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                {{ session('error') }}
            </div>
        @endif

        {{-- Tableau --}}
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm relative">
            @if($recrutements->count() > 0)
                <div class="overflow-x-auto min-h-[340px] pb-16">
                    <table class="w-full text-left text-sm text-slate-700">
                        <thead class="bg-slate-50 text-xs font-black uppercase tracking-wider text-slate-600 border-b border-slate-200">
                            <tr>
                                <th class="p-4 rounded-tl-2xl">Date</th>
                                <th class="p-4">Candidat</th>
                                <th class="p-4">Domaine</th>
                                <th class="p-4">Statut</th>
                                <th class="p-4 text-right rounded-tr-2xl">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @foreach($recrutements as $recrutement)
                                @php
                                    $statut = $recrutement->statut ?? 'en_attente';
                                    $rowClass = match($statut) {
                                        'accepte' => 'bg-emerald-100/60 hover:bg-emerald-200/60',
                                        'refuse'  => 'bg-rose-100/60 hover:bg-rose-200/60',
                                        default   => 'hover:bg-slate-50/80',
                                    };
                                    $badgeClass = match($statut) {
                                        'accepte' => 'bg-emerald-100 text-emerald-800 border-emerald-200',
                                        'refuse'  => 'bg-rose-100 text-rose-800 border-rose-200',
                                        default   => 'bg-amber-100 text-amber-800 border-amber-200',
                                    };
                                    $badgeLabel = match($statut) {
                                        'accepte' => '✅ Accepté',
                                        'refuse'  => '❌ Refusé',
                                        default   => '⏳ En attente',
                                    };
                                @endphp
                                <tr class="transition-colors {{ $rowClass }}">

                                    {{-- Date --}}
                                    <td class="p-4">
                                        <span class="block text-[11px] font-mono font-bold text-slate-600">
                                            {{ $recrutement->created_at->format('d/m/Y H:i') }}
                                        </span>
                                    </td>

                                    {{-- Candidat --}}
                                    <td class="p-4">
                                        <div class="font-bold text-slate-900">{{ $recrutement->nom }} {{ $recrutement->prenom }}</div>
                                        <div class="text-xs text-blue-600 font-medium">✉ {{ $recrutement->email }}</div>
                                        <div class="text-xs text-slate-500">📞 {{ $recrutement->telephone }}</div>
                                    </td>

                                    {{-- Domaine --}}
                                    <td class="p-4 font-medium text-slate-800">
                                        {{ $recrutement->domaine }}
                                    </td>

                                    {{-- Statut --}}
                                    <td class="p-4">
                                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full text-xs font-bold border {{ $badgeClass }}">
                                            {{ $badgeLabel }}
                                        </span>
                                    </td>

                                    {{-- Actions (Bouton Gérer avec menu déroulant) --}}
                                    <td class="p-4 text-right">
                                        <div class="relative inline-block text-left" x-data="{ open: false }">
                                            <button @click="open = !open"
                                                    class="inline-flex items-center gap-1 text-xs font-bold text-[#061743] hover:text-[#f2a90f] bg-slate-100 hover:bg-slate-200 px-3.5 py-1.5 rounded-lg transition-all shadow-xs">
                                                <span>Gérer</span>
                                                <svg class="w-3.5 h-3.5 transition-transform" :class="{'rotate-180': open}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                            </button>

                                            <div x-show="open" @click.away="open = false"
                                                 class="absolute right-0 mt-1 w-52 bg-white rounded-2xl shadow-2xl border border-slate-200 py-1.5 z-50 text-left overflow-hidden"
                                                 x-cloak>

                                                {{-- Voir détails --}}
                                                <button @click="open = false; openModal('recrutement-modal-{{ $recrutement->id }}')"
                                                        class="w-full text-left px-4 py-2 text-xs font-bold text-slate-700 hover:bg-slate-50 flex items-center gap-2.5 transition-colors">
                                                    <span>👁</span> Voir les détails
                                                </button>

                                                {{-- Télécharger CV --}}
                                                @if($recrutement->cv_path)
                                                    <a href="{{ route('admin.recrutements.cv', $recrutement->id) }}"
                                                       class="w-full text-left px-4 py-2 text-xs font-bold text-blue-700 hover:bg-blue-50 flex items-center gap-2.5 transition-colors">
                                                        <span>📥</span> Télécharger le CV
                                                    </a>
                                                @endif

                                                <div class="border-t border-slate-100 my-1"></div>

                                                {{-- Accepter --}}
                                                <form action="{{ route('admin.recrutements.statut', $recrutement->id) }}" method="POST">
                                                    @csrf @method('PATCH')
                                                    <input type="hidden" name="statut" value="accepte">
                                                    <button type="submit"
                                                            class="w-full text-left px-4 py-2 text-xs font-bold text-emerald-700 hover:bg-emerald-50 flex items-center gap-2.5 transition-colors">
                                                        <span>✅</span> Marquer Accepté
                                                    </button>
                                                </form>

                                                {{-- En attente --}}
                                                <form action="{{ route('admin.recrutements.statut', $recrutement->id) }}" method="POST">
                                                    @csrf @method('PATCH')
                                                    <input type="hidden" name="statut" value="en_attente">
                                                    <button type="submit"
                                                            class="w-full text-left px-4 py-2 text-xs font-bold text-amber-700 hover:bg-amber-50 flex items-center gap-2.5 transition-colors">
                                                        <span>⏳</span> Marquer En attente
                                                    </button>
                                                </form>

                                                {{-- Refuser --}}
                                                <form action="{{ route('admin.recrutements.statut', $recrutement->id) }}" method="POST">
                                                    @csrf @method('PATCH')
                                                    <input type="hidden" name="statut" value="refuse">
                                                    <button type="submit"
                                                            class="w-full text-left px-4 py-2 text-xs font-bold text-rose-700 hover:bg-rose-50 flex items-center gap-2.5 transition-colors">
                                                        <span>❌</span> Marquer Refusé
                                                    </button>
                                                </form>

                                                <div class="border-t border-slate-100 my-1"></div>

                                                {{-- Supprimer --}}
                                                <form action="{{ route('admin.recrutements.destroy', $recrutement->id) }}" method="POST"
                                                      onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer définitivement cette candidature ?');">
                                                    @csrf @method('DELETE')
                                                    <button type="submit"
                                                            class="w-full text-left px-4 py-2 text-xs font-bold text-rose-600 hover:bg-rose-50 flex items-center gap-2.5 transition-colors">
                                                        <span>🗑</span> Supprimer
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                {{-- Modal Détails --}}
                                <div id="recrutement-modal-{{ $recrutement->id }}" class="hidden fixed inset-0 z-50 bg-black/60 backdrop-blur-sm flex items-center justify-center p-4">
                                    <div class="bg-white rounded-3xl max-w-xl w-full p-6 shadow-2xl space-y-4 relative text-left my-auto max-h-[92vh] overflow-y-auto">
                                        <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                                            <div class="flex items-center gap-2.5">
                                                <div>
                                                    <span class="text-xs font-bold text-blue-600 uppercase">{{ $recrutement->domaine }}</span>
                                                    <h3 class="text-lg font-black text-slate-900">{{ $recrutement->nom }} {{ $recrutement->prenom }}</h3>
                                                </div>
                                                <span class="inline-flex items-center gap-1 px-2.5 py-0.5 rounded-full text-xs font-bold border {{ $badgeClass }}">
                                                    {{ $badgeLabel }}
                                                </span>
                                            </div>
                                            <button onclick="closeModal('recrutement-modal-{{ $recrutement->id }}')" class="text-slate-400 hover:text-slate-700 text-lg font-bold p-1 hover:bg-slate-100 rounded-lg">✕</button>
                                        </div>

                                        <div class="grid grid-cols-2 gap-3 bg-slate-50 p-3.5 rounded-2xl text-xs">
                                            <div><strong>Email :</strong> {{ $recrutement->email }}</div>
                                            <div><strong>Téléphone :</strong> {{ $recrutement->telephone }}</div>
                                            <div class="col-span-2"><strong>Reçu le :</strong> {{ $recrutement->created_at->format('d/m/Y à H:i') }}</div>
                                        </div>

                                        @if($recrutement->message)
                                        <div>
                                            <label class="block text-xs font-bold uppercase text-slate-500 mb-1">Message de motivation :</label>
                                            <div class="p-3.5 bg-blue-50/60 rounded-2xl text-xs text-slate-800 border border-blue-100 whitespace-pre-wrap leading-relaxed max-h-32 overflow-y-auto">{{ $recrutement->message }}</div>
                                        </div>
                                        @endif

                                        {{-- Actions dans le modal --}}
                                        <div class="pt-3 border-t border-slate-100 flex items-center justify-between flex-wrap gap-2">
                                            <div class="flex items-center gap-2">
                                                @if($recrutement->cv_path)
                                                <a href="{{ route('admin.recrutements.cv', $recrutement->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold text-xs px-4 py-2 rounded-xl shadow-xs transition-all inline-flex items-center gap-1.5">
                                                    <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                                    Télécharger CV
                                                </a>
                                                @endif

                                                {{-- Changer Statut rapide --}}
                                                <form action="{{ route('admin.recrutements.statut', $recrutement->id) }}" method="POST" class="inline">
                                                    @csrf @method('PATCH')
                                                    <input type="hidden" name="statut" value="{{ $statut === 'accepte' ? 'en_attente' : 'accepte' }}">
                                                    <button type="submit" class="text-xs font-bold px-3 py-2 rounded-xl border {{ $statut === 'accepte' ? 'bg-amber-50 text-amber-700 border-amber-200' : 'bg-emerald-50 text-emerald-700 border-emerald-200' }} transition-colors">
                                                        {{ $statut === 'accepte' ? '⏳ Remettre En attente' : '✅ Accepter' }}
                                                    </button>
                                                </form>

                                                @if($statut !== 'refuse')
                                                <form action="{{ route('admin.recrutements.statut', $recrutement->id) }}" method="POST" class="inline">
                                                    @csrf @method('PATCH')
                                                    <input type="hidden" name="statut" value="refuse">
                                                    <button type="submit" class="text-xs font-bold px-3 py-2 rounded-xl bg-rose-50 text-rose-700 border border-rose-200 transition-colors">
                                                        ❌ Refuser
                                                    </button>
                                                </form>
                                                @endif
                                            </div>

                                            <form action="{{ route('admin.recrutements.destroy', $recrutement->id) }}" method="POST" onsubmit="return confirm('Supprimer définitivement cette candidature ?');">
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
                    {{ $recrutements->links() }}
                </div>
            @else
                <div class="p-12 text-center text-slate-500">
                    <p class="text-4xl mb-4">💼</p>
                    <p class="text-base font-semibold">Aucune candidature reçue pour le moment.</p>
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
