@extends('layouts.app')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h1 class="text-2xl font-semibold">{{ $seminar->theme }}</h1>
                        <p class="text-gray-600 text-sm">Gérer les contenus et documents</p>
                    </div>
                    <a href="{{ route('admin.seminars.index') }}" class="text-indigo-600 hover:text-indigo-700">
                        ← Retour aux séminaires
                    </a>
                </div>

                @if(session('success'))
                    <div class="mb-4 rounded-md bg-green-100 p-3 text-sm text-green-700">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="mb-8 bg-gray-50 p-4 rounded-lg border border-gray-200">
                    <h2 class="font-semibold text-gray-900 mb-4">Ajouter un document</h2>
                    <form method="POST" action="{{ route('admin.documents.store', $seminar) }}" enctype="multipart/form-data" class="space-y-4">
                        @csrf
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Titre</label>
                                <input type="text" name="title" class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Jour du séminaire</label>
                                <input type="number" name="day_number" class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2" min="1" max="30" required>
                            </div>
                            <div>
                                <label class="block text-sm font-medium text-gray-700">Fichier (PDF, PPT, MP4)</label>
                                <input type="file" name="file" class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2" required>
                            </div>
                        </div>
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700">
                            Ajouter
                        </button>
                    </form>
                </div>

                @if($documentsByDay->isEmpty())
                    <p class="text-gray-600">Aucun document pour ce séminaire.</p>
                @else
                    @foreach($documentsByDay as $day => $documents)
                        <div class="mb-6">
                            <h3 class="text-lg font-semibold text-gray-900 mb-3">Jour {{ $day }}</h3>
                            <div class="space-y-2">
                                @foreach($documents as $doc)
                                    <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg border border-gray-200">
                                        <div>
                                            <p class="font-medium text-gray-900">{{ $doc->title }}</p>
                                            <p class="text-sm text-gray-600">{{ ucfirst($doc->type) }} · {{ $doc->size_kb }} KB</p>
                                        </div>
                                        <form method="POST" action="{{ route('admin.documents.destroy', [$seminar, $doc->id]) }}" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-700 text-sm" onclick="return confirm('Supprimer ce document ?')">
                                                Supprimer
                                            </button>
                                        </form>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
