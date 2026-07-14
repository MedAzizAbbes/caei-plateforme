<x-guest-layout>
    <div class="mb-6 text-center">
        <p class="text-sm font-black uppercase text-[#ffbd45]">CAEI Company Group</p>
        <h1 class="mt-2 text-2xl font-black uppercase text-[#061743]">Inscription à un séminaire</h1>
        <p class="mt-2 text-sm text-slate-500">Connecté en tant que <strong>{{ Auth::user()->fullName() }}</strong></p>
    </div>

    {{-- Infos participant (lecture seule) --}}
    <div class="mb-5 rounded-lg bg-slate-50 border border-slate-200 p-4 text-sm text-slate-700">
        <p class="font-bold text-[#061743] text-xs uppercase tracking-wide mb-2">Vos informations</p>
        <div class="grid grid-cols-2 gap-2">
            <div><span class="text-slate-500">Prénom :</span> {{ Auth::user()->first_name }}</div>
            <div><span class="text-slate-500">Nom :</span> {{ Auth::user()->last_name }}</div>
            <div class="col-span-2"><span class="text-slate-500">Email :</span> {{ Auth::user()->email }}</div>
            @if(Auth::user()->institution)
                <div class="col-span-2"><span class="text-slate-500">Institution :</span> {{ Auth::user()->institution }}</div>
            @endif
        </div>
    </div>

    <form method="POST" action="{{ route('registration.store') }}">
        @csrf

        <div class="grid gap-4">
            <div>
                <x-input-label for="seminar_id" :value="__('Séminaire')" />
                <select id="seminar_id" name="seminar_id"
                        class="block mt-1 w-full rounded-md border-slate-300 shadow-sm focus:border-[#ffbd45] focus:ring-[#ffbd45]"
                        required>
                    <option value="">Sélectionnez un séminaire</option>
                    @foreach($seminars as $seminar)
                        <option value="{{ $seminar->id }}"
                            {{ (old('seminar_id', $selectedSeminarId) == $seminar->id) ? 'selected' : '' }}>
                            {{ $seminar->theme }} — {{ $seminar->country }}
                            ({{ $seminar->start_date->format('d/m/Y') }})
                        </option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('seminar_id')" class="mt-2" />
            </div>
        </div>

        <div class="mt-6 flex items-center justify-between gap-3">
            <a href="{{ url()->previous() }}" class="text-sm text-slate-600 hover:text-[#061743] underline">
                Annuler
            </a>
            <x-primary-button>
                {{ __("Confirmer l'inscription") }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
