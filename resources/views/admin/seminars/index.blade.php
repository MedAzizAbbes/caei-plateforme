@extends('layouts.app')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h1 class="text-2xl font-semibold">Séminaires</h1>
                        <p class="text-sm text-gray-600">Gérer les séminaires et leurs inscriptions.</p>
                    </div>
                    <a href="{{ route('admin.seminars.create') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700">
                        Ajouter un séminaire
                    </a>
                </div>

                @if(session('success'))
                    <div class="mb-4 rounded-md bg-green-100 p-3 text-sm text-green-700">
                        {{ session('success') }}
                    </div>
                @endif

                @if($seminars->isEmpty())
                    <p class="text-gray-600">Aucun séminaire pour le moment.</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Thème</th>
                                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Pays</th>
                                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Dates</th>
                                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Statut</th>
                                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Inscriptions</th>
                                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Actions</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach($seminars as $seminar)
                                    <tr>
                                        <td class="px-4 py-3 text-sm text-gray-900">
                                            <div class="font-medium">{{ $seminar->theme }}</div>
                                            @if($seminar->trainers->isNotEmpty())
                                                <div class="text-xs text-gray-500">Formateurs : {{ $seminar->trainers->pluck('first_name')->join(', ') }}</div>
                                            @else
                                                <div class="text-xs text-gray-500">Aucun formateur assigné</div>
                                            @endif
                                        </td>
                                        <td class="px-4 py-3 text-sm text-gray-600">{{ $seminar->country }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-600">{{ $seminar->start_date->format('d/m/Y') }} - {{ $seminar->end_date->format('d/m/Y') }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-600">{{ ucfirst($seminar->status) }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-600">{{ $seminar->registrations_count }}</td>
                                        <td class="px-4 py-3 text-sm">
                                            <div class="flex gap-2">
                                                <a href="{{ route('echange.index', $seminar) }}" class="inline-flex items-center px-3 py-1 bg-green-100 text-green-700 rounded hover:bg-green-200 text-xs font-medium">
                                                    Discussions
                                                </a>
                                                <a href="{{ route('admin.documents.index', $seminar) }}" class="inline-flex items-center px-3 py-1 bg-indigo-100 text-indigo-700 rounded hover:bg-indigo-200 text-xs font-medium">
                                                    Contenus
                                                </a>
                                                <a href="{{ route('admin.seminars.edit', $seminar) }}" class="inline-flex items-center px-3 py-1 bg-blue-100 text-blue-700 rounded hover:bg-blue-200 text-xs font-medium">
                                                    Modifier
                                                </a>
                                                <form method="POST" action="{{ route('admin.seminars.destroy', $seminar) }}" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="inline-flex items-center px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200 text-xs font-medium" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce séminaire ?')">
                                                        Supprimer
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $seminars->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
