<x-guest-layout>
    <div class="mb-6 text-center">
        <p class="text-sm font-black uppercase text-[#ffbd45]">CAEI Company Group</p>
        <h1 class="mt-2 text-2xl font-black uppercase text-[#061743]">Inscription seminaire</h1>
    </div>

    <form method="POST" action="{{ route('registration.store') }}">
        @csrf

        <div class="grid gap-4">
            <div>
                <x-input-label for="first_name" :value="__('Prenom')" />
                <x-text-input id="first_name" class="block mt-1 w-full" type="text" name="first_name" :value="old('first_name')" required autofocus />
                <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="last_name" :value="__('Nom')" />
                <x-text-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required />
                <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="institution" :value="__('Etablissement')" />
                <x-text-input id="institution" class="block mt-1 w-full" type="text" name="institution" :value="old('institution')" />
            </div>

            <div>
                <x-input-label for="email" :value="__('Email')" />
                <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="phone" :value="__('Telephone')" />
                <x-text-input id="phone" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" />
            </div>

            <div>
                <x-input-label for="seminar_id" :value="__('Seminaire')" />
                <select id="seminar_id" name="seminar_id" class="block mt-1 w-full rounded-md border-slate-300 shadow-sm focus:border-[#ffbd45] focus:ring-[#ffbd45]" required>
                    <option value="">Selectionnez un seminaire</option>
                    @foreach($seminars as $seminar)
                        <option value="{{ $seminar->id }}">{{ $seminar->theme }} ({{ $seminar->country }})</option>
                    @endforeach
                </select>
                <x-input-error :messages="$errors->get('seminar_id')" class="mt-2" />
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end">
            <x-primary-button>
                {{ __("S'inscrire") }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
