<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Mon espace participant
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Mes séminaires</h3>

                    @if($registrations->isEmpty())
                        <p class="text-gray-600">Vous n’êtes inscrit à aucun séminaire pour le moment.</p>
                    @else
                        <div class="space-y-4">
                            @foreach($registrations as $registration)
                                <div class="border rounded-lg p-4">
                                    <div class="flex justify-between items-start gap-4">
                                        <div>
                                            <h4 class="font-semibold">{{ $registration->seminar?->theme ?? 'Séminaire' }}</h4>
                                            <p class="text-sm text-gray-600">
                                                {{ $registration->seminar?->country ?? 'Pays non renseigné' }}
                                            </p>
                                            <p class="text-sm text-gray-600">
                                                Statut : <span class="font-medium">{{ $registration->status }}</span>
                                            </p>
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            @if($registration->qrCode)
                                                <p>Code QR : {{ $registration->qrCode->code }}</p>
                                            @else
                                                <p>Code QR en préparation</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
