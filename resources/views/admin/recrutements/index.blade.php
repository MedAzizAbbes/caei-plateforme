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
               class="shrink-0 inline-flex items-center gap-2 bg-white hover:bg-blue-50 text-blue-800 font-black text-xs px-4 py-2.5 rounded-xl shadow transition-all relative z-10">
                <span>Voir le formulaire 💼</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
            </a>
        </div>

        {{-- Alerte succès/erreur --}}
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
        <div class="bg-white rounded-2xl border border-slate-200 shadow-sm overflow-hidden">
            @if($recrutements->count() > 0)
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm text-slate-700">
                        <thead class="bg-slate-50 text-xs font-black uppercase tracking-wider text-slate-600 border-b border-slate-200">
                            <tr>
                                <th class="p-4">Date</th>
                                <th class="p-4">Candidat</th>
                                <th class="p-4">Domaine</th>
                                <th class="p-4">CV</th>
                                <th class="p-4 text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @foreach($recrutements as $recrutement)
                                <tr class="hover:bg-slate-50/80 transition-colors">
                                    <td class="p-4 font-mono font-bold text-[#061743]">
                                        <span class="block text-[11px] font-normal text-slate-500 mt-0.5">
                                            {{ $recrutement->created_at->format('d/m/Y H:i') }}
                                        </span>
                                    </td>
                                    <td class="p-4">
                                        <div class="font-bold text-slate-900">{{ $recrutement->nom }} {{ $recrutement->prenom }}</div>
                                        <div class="text-xs text-blue-600 font-medium">✉ {{ $recrutement->email }}</div>
                                        <div class="text-xs text-slate-500">📞 {{ $recrutement->telephone }}</div>
                                    </td>
                                    <td class="p-4 font-medium text-slate-800">
                                        {{ $recrutement->domaine }}
                                    </td>
                                    <td class="p-4">
                                        @if($recrutement->cv_path)
                                            <a href="{{ route('admin.recrutements.cv', $recrutement->id) }}" class="inline-flex items-center gap-1 text-xs font-bold text-blue-700 bg-blue-50 hover:bg-blue-100 px-3 py-1.5 rounded-lg transition-colors">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/></svg>
                                                Télécharger CV
                                            </a>
                                        @else
                                            <span class="text-xs text-slate-400">Aucun CV</span>
                                        @endif
                                    </td>
                                    <td class="p-4 text-right">
                                        <button onclick="openModal('recrutement-modal-{{ $recrutement->id }}')"
                                                class="text-xs font-bold text-slate-700 hover:text-slate-900 bg-slate-100 hover:bg-slate-200 px-3 py-1.5 rounded-lg transition-all">
                                            Détails
                                        </button>
                                    </td>
                                </tr>

                                {{-- Modal --}}
                                <div id="recrutement-modal-{{ $recrutement->id }}" class="hidden fixed inset-0 z-50 bg-black/60 backdrop-blur-sm flex items-center justify-center p-4">
                                    <div class="bg-white rounded-3xl max-w-xl w-full p-8 shadow-2xl space-y-5 relative text-left">
                                        <div class="flex items-center justify-between border-b border-slate-100 pb-4">
                                            <div>
                                                <span class="text-xs font-bold text-blue-600 uppercase">{{ $recrutement->domaine }}</span>
                                                <h3 class="text-xl font-black text-slate-900">{{ $recrutement->nom }} {{ $recrutement->prenom }}</h3>
                                            </div>
                                            <button onclick="closeModal('recrutement-modal-{{ $recrutement->id }}')" class="text-slate-400 hover:text-slate-700 text-xl font-bold p-2">✕</button>
                                        </div>

                                        <div class="grid grid-cols-2 gap-3 bg-slate-50 p-4 rounded-2xl text-xs">
                                            <div><strong>Email :</strong> {{ $recrutement->email }}</div>
                                            <div><strong>Téléphone :</strong> {{ $recrutement->telephone }}</div>
                                            <div class="col-span-2"><strong>Reçu le :</strong> {{ $recrutement->created_at->format('d/m/Y à H:i') }}</div>
                                        </div>

                                        @if($recrutement->message)
                                        <div>
                                            <label class="block text-xs font-bold uppercase text-slate-500 mb-2">Message de motivation :</label>
                                            <div class="p-4 bg-blue-50/60 rounded-2xl text-sm text-slate-800 border border-blue-100 whitespace-pre-wrap leading-relaxed">{{ $recrutement->message }}</div>
                                        </div>
                                        @endif

                                        <div class="flex items-center justify-between pt-4 border-t border-slate-100">
                                            @if($recrutement->cv_path)
                                            <a href="{{ route('admin.recrutements.cv', $recrutement->id) }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold text-sm px-6 py-3 rounded-xl shadow transition-all inline-flex items-center gap-2">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/></svg>
                                                Télécharger le CV
                                            </a>
                                            @else
                                            <div></div>
                                            @endif
                                            
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
