<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Inscription confirmée
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <p class="mb-4">Votre inscription a bien été enregistrée.</p>
                    <p class="mb-2"><strong>Participant :</strong> {{ $registration->user?->fullName() }}</p>
                    <p class="mb-2"><strong>Séminaire :</strong> {{ $registration->seminar?->theme }}</p>
                    <p class="mb-2"><strong>Statut :</strong> {{ $registration->status }}</p>
                    @if($registration->qrCode)
                        <p class="mb-2"><strong>Code QR :</strong> {{ $registration->qrCode->code }}</p>
                    @endif
                    <a href="{{ route('participant.dashboard') }}" class="text-indigo-600 underline">Accéder à mon espace</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
