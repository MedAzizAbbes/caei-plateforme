@extends('layouts.app')

@section('content')
<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="flex items-center justify-between mb-6">
                    <h1 class="text-2xl font-semibold">Participants et Inscriptions</h1>
                    <div class="flex gap-2">
                        <a href="{{ route('admin.participants.export.excel') }}" class="inline-flex items-center px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-white hover:bg-green-700">
                            📊 Excel
                        </a>
                        <a href="{{ route('admin.participants.export.pdf') }}" class="inline-flex items-center px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-white hover:bg-red-700">
                            📄 PDF
                        </a>
                    </div>
                </div>

                <form method="GET" class="mb-6 grid gap-4 md:grid-cols-2">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Séminaire</label>
                        <select name="seminar_id" class="w-full rounded-md border-gray-300 shadow-sm">
                            <option value="">Tous les séminaires</option>
                            @foreach($seminars as $seminar)
                                <option value="{{ $seminar->id }}" {{ request('seminar_id') == $seminar->id ? 'selected' : '' }}>{{ $seminar->theme }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Statut</label>
                        <select name="status" class="w-full rounded-md border-gray-300 shadow-sm">
                            <option value="">Tous les statuts</option>
                            <option value="inscrit" {{ request('status') == 'inscrit' ? 'selected' : '' }}>Inscrit</option>
                            <option value="present" {{ request('status') == 'present' ? 'selected' : '' }}>Présent</option>
                            <option value="absent" {{ request('status') == 'absent' ? 'selected' : '' }}>Absent</option>
                        </select>
                    </div>
                    <div class="md:col-span-2 flex justify-end">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-md">Filtrer</button>
                    </div>
                </form>

                @if($registrations->isEmpty())
                    <p class="text-gray-600">Aucun participant pour le moment.</p>
                @else
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Nom</th>
                                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Email</th>
                                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Séminaire</th>
                                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Statut</th>
                                    <th class="px-4 py-3 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">Inscrit le</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200 bg-white">
                                @foreach($registrations as $registration)
                                    <tr>
                                        <td class="px-4 py-3 text-sm text-gray-900">{{ $registration->user->first_name }} {{ $registration->user->last_name }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-600">{{ $registration->user->email }}</td>
                                        <td class="px-4 py-3 text-sm text-gray-600">{{ $registration->seminar->theme }}</td>
                                        <td class="px-4 py-3 text-sm">
                                            <span class="px-2 py-1 rounded-full text-xs font-semibold
                                                {{ $registration->status == 'present' ? 'bg-green-100 text-green-800' : 'bg-yellow-100 text-yellow-800' }}">
                                                {{ ucfirst($registration->status) }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 text-sm text-gray-600">{{ $registration->registered_at->format('d/m/Y H:i') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $registrations->links() }}
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
