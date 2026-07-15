@extends('layouts.app')

@section('content')
<div class="py-6">
    <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <h1 class="text-2xl font-semibold mb-4">Créer un séminaire</h1>

                <form method="POST" action="{{ route('admin.seminars.store') }}" enctype="multipart/form-data" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Thème</label>
                        <input type="text" name="theme" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm border px-3 py-2" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Pays</label>
                        <input type="text" name="country" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm border px-3 py-2" required>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Description</label>
                        <textarea name="description" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm border px-3 py-2"></textarea>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700">Affiche (image)</label>
                        <input type="file" name="image" accept="image/jpeg,image/jpg,image/png,image/webp" class="mt-1 block w-full text-sm text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                        <p class="mt-1 text-xs text-gray-500">JPG, JPEG, PNG ou WebP — max. 2 Mo.</p>
                        @error('image')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Date de début</label>
                            <input type="date" name="start_date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm border px-3 py-2" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Date de fin</label>
                            <input type="date" name="end_date" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm border px-3 py-2" required>
                        </div>
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Nombre d'heures</label>
                            <input type="number" name="hours" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm border px-3 py-2" min="1" placeholder="Ex: 35">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Prix (€)</label>
                            <input type="number" step="0.01" name="price" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm border px-3 py-2" min="0" placeholder="Ex: 150.00">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Statut</label>
                            <select name="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm border px-3 py-2" required>
                                <option value="draft">Brouillon</option>
                                <option value="published">Publié</option>
                                <option value="closed">Fermé</option>
                            </select>
                        </div>
                    </div>

                    <div class="flex items-center gap-3">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700">
                            Enregistrer
                        </button>
                        <a href="{{ route('admin.seminars.index') }}" class="text-sm text-gray-600 hover:text-gray-900">Annuler</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
