<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Espace formateur</h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-semibold mb-4">Mes séminaires (en tant que formateur)</h3>

                    @if($seminars->isEmpty())
                        <p class="text-gray-600">Vous n'intervenez sur aucun séminaire pour le moment.</p>
                    @else
                        <div class="space-y-4">
                            @foreach($seminars as $seminar)
                                <div class="border rounded-lg p-4 flex justify-between items-center">
                                    <div>
                                        <h4 class="font-semibold">{{ $seminar->theme }}</h4>
                                        <p class="text-sm text-gray-600">{{ $seminar->country ?? '' }} — {{ $seminar->start_date?->format('d/m/Y') }} @if($seminar->end_date) - {{ $seminar->end_date->format('d/m/Y') }}@endif</p>
                                        <p class="text-sm text-gray-600">Participants : <span class="font-medium">{{ $seminar->participants_count }}</span></p>
                                    </div>
                                    <div class="flex items-center gap-3">
                                        <a href="{{ route('admin.documents.index', $seminar) }}" class="px-3 py-2 bg-blue-50 text-blue-700 rounded">Gérer contenus</a>
                                        <a href="{{ route('participant.formation', $seminar) }}" class="px-3 py-2 bg-gray-50 text-gray-700 rounded">Voir comme participant</a>
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
