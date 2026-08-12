@extends('layouts.app')

@section('content')
<div class="flex min-h-screen -mt-8 -mx-4 sm:-mx-6 lg:-mx-8 bg-slate-100">

    <x-admin-sidebar />

    <div class="flex-1 p-6 md:p-10 overflow-y-auto">

        {{-- En-tête --}}
        <div class="mb-8 rounded-2xl p-8 text-white shadow-xl flex flex-col md:flex-row md:items-center justify-between gap-6"
             style="background: linear-gradient(135deg, #d11141 0%, #a30e32 100%);">
            <div>
                <span class="inline-block bg-white/20 text-white text-xs font-black px-3 py-1 rounded-md uppercase tracking-wider mb-2">Call Center</span>
                <h1 class="text-3xl font-black uppercase tracking-tight">Demandes de Contact</h1>
                <p class="mt-2 text-red-100 text-sm">Gérez les demandes soumises depuis la page Contact du Call Center.</p>
            </div>
            <a href="{{ route('callcenter.index') }}" target="_blank"
               class="shrink-0 inline-flex items-center gap-2 bg-white hover:bg-red-50 text-red-700 font-black text-xs px-4 py-2.5 rounded-xl shadow transition-all">
                <span>Voir le site Call Center</span>
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                </svg>
            </a>
        </div>

        @if(session('success'))
            <div class="mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-r-lg shadow-sm">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-500" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm font-medium text-green-800">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
        @endif

        {{-- Tableau des demandes --}}
        <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-slate-200">
                    <thead class="bg-slate-50">
                        <tr>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Date</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Contact</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Sujet</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Message</th>
                            <th scope="col" class="px-6 py-4 text-left text-xs font-bold text-slate-500 uppercase tracking-wider">Statut</th>
                            <th scope="col" class="px-6 py-4 text-right text-xs font-bold text-slate-500 uppercase tracking-wider">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-slate-200">
                        @forelse($requests as $request)
                            <tr class="transition-colors duration-150 {{ $request->status === 'Traité' ? 'bg-emerald-100/60 hover:bg-emerald-200/60' : ($request->status === 'En cours' ? 'bg-blue-100/60 hover:bg-blue-200/60' : 'hover:bg-slate-50') }}">
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500">
                                    {{ $request->created_at->format('d/m/Y H:i') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="font-medium text-slate-900">{{ $request->name }}</div>
                                    <div class="text-sm text-slate-500">{{ $request->email }}</div>
                                    <div class="text-sm text-slate-500">{{ $request->phone }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-900 font-medium">
                                    {{ $request->subject }}
                                </td>
                                <td class="px-6 py-4 text-sm text-slate-500 max-w-xs truncate" title="{{ $request->message }}">
                                    {{ Str::limit($request->message, 50) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex px-2.5 py-1 text-xs font-bold rounded-full 
                                        @if($request->status == 'Nouveau') bg-blue-100 text-blue-800 
                                        @elseif($request->status == 'En cours') bg-yellow-100 text-yellow-800 
                                        @else bg-green-100 text-green-800 @endif">
                                        {{ $request->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                    <div class="flex justify-end gap-2">
                                        <!-- Update Status Form -->
                                        <form action="{{ route('admin.callcenter.update-status', $request->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" onchange="this.form.submit()" class="text-xs rounded border-slate-300 py-1 pl-2 pr-6 focus:ring-red-500 focus:border-red-500">
                                                <option value="Nouveau" {{ $request->status == 'Nouveau' ? 'selected' : '' }}>Nouveau</option>
                                                <option value="En cours" {{ $request->status == 'En cours' ? 'selected' : '' }}>En cours</option>
                                                <option value="Traité" {{ $request->status == 'Traité' ? 'selected' : '' }}>Traité</option>
                                            </select>
                                        </form>

                                        <!-- Delete Form -->
                                        <form action="{{ route('admin.callcenter.destroy', $request->id) }}" method="POST" class="inline" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette demande ?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900 bg-red-50 hover:bg-red-100 p-1.5 rounded transition-colors" title="Supprimer">
                                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-12 text-center text-slate-500">
                                    <div class="flex flex-col items-center justify-center">
                                        <svg class="w-12 h-12 text-slate-300 mb-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                        </svg>
                                        <p class="text-lg font-medium">Aucune demande reçue pour le moment.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            @if($requests->hasPages())
                <div class="bg-white px-4 py-3 border-t border-slate-200 sm:px-6">
                    {{ $requests->links() }}
                </div>
            @endif
        </div>

    </div>
</div>
@endsection
