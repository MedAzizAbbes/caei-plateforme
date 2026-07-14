<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <a href="{{ route('formateur.dashboard') }}" class="text-sm font-bold text-[#ffbd45] hover:underline mb-1 inline-block">&larr; Retour au tableau de bord</a>
                <h2 class="text-xl font-black uppercase leading-tight text-slate-900">Gestion des présences</h2>
                <p class="text-xs text-slate-600 mt-1">{{ $seminar->theme }}</p>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('formateur.presences.export.excel', $seminar) }}" class="inline-flex items-center px-4 py-2 border border-[#061743] rounded-lg text-sm font-bold text-[#061743] bg-white hover:bg-slate-50 transition shadow-sm">
                    Exporter Excel
                </a>
                <a href="{{ route('formateur.presences.export.pdf', $seminar) }}" class="inline-flex items-center px-4 py-2 border border-[#061743]/15 rounded-lg text-sm font-bold text-white bg-[#061743] hover:bg-[#0b245f] transition shadow-sm">
                    Exporter PDF
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Statistiques -->
            <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-6">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6">
                    <div>
                        <p class="text-sm font-medium text-slate-500 uppercase">Participants Inscrits</p>
                        <p class="mt-1 text-3xl font-black text-[#061743]">{{ $seminar->registrations->count() }}</p>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-slate-500 uppercase">Jours de formation</p>
                        <p class="mt-1 text-3xl font-black text-[#061743]">{{ $totalDays }}</p>
                    </div>
                </div>
            </div>

            <!-- Actions Scan -->
            <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-6">
                <h3 class="text-lg font-black text-[#061743] mb-4 uppercase">Scanner les présences</h3>
                <form action="{{ route('formateur.presences.scan', $seminar) }}" method="GET" class="flex flex-wrap gap-4 items-end">
                    <div>
                        <label for="day_number" class="block text-sm font-medium text-slate-700 mb-1">Sélectionner la journée :</label>
                        <select name="day_number" id="day_number" class="w-48 rounded-md border-slate-300 shadow-sm focus:border-[#061743] focus:ring-[#061743] sm:text-sm">
                            @for($i = 1; $i <= $totalDays; $i++)
                                <option value="{{ $i }}">Jour {{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <button type="submit" class="inline-flex items-center px-6 py-2 border border-transparent rounded-lg shadow-sm text-sm font-black text-[#061743] bg-[#ffbd45] hover:bg-[#ffd071] transition uppercase tracking-wide h-[42px]">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z"></path>
                        </svg>
                        Ouvrir le Scanner QR
                    </button>
                </form>
            </div>

            <!-- Tableau de suivi -->
            <div class="bg-white rounded-lg shadow-sm border border-slate-200 overflow-hidden">
                <div class="px-6 py-5 border-b border-slate-200">
                    <h3 class="text-lg font-black text-[#061743] uppercase">Tableau de suivi des présences</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-200">
                        <thead class="bg-slate-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-black text-slate-500 uppercase tracking-wider">Participant</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-black text-slate-500 uppercase tracking-wider">Institution</th>
                                @for($i = 1; $i <= $totalDays; $i++)
                                    <th scope="col" class="px-6 py-3 text-center text-xs font-black text-slate-500 uppercase tracking-wider">Jour {{ $i }}</th>
                                @endfor
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-slate-200">
                            @foreach($seminar->registrations as $registration)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm font-bold text-slate-900">{{ $registration->user->first_name }} {{ $registration->user->last_name }}</div>
                                        <div class="text-xs text-slate-500">{{ $registration->user->email }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500">
                                        {{ $registration->user->institution ?? '-' }}
                                    </td>
                                    @for($i = 1; $i <= $totalDays; $i++)
                                        @php
                                            $isPresent = $seminar->attendances->where('registration_id', $registration->id)->where('day_number', $i)->isNotEmpty();
                                        @endphp
                                        <td class="px-6 py-4 whitespace-nowrap text-center">
                                            @if($isPresent)
                                                <span class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-emerald-100 text-emerald-600">
                                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                                </span>
                                            @else
                                                <span class="inline-flex items-center justify-center h-8 w-8 rounded-full bg-slate-100 text-slate-400">
                                                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                                </span>
                                            @endif
                                        </td>
                                    @endfor
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
