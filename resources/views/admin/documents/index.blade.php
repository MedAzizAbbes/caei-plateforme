@extends('layouts.app')

@section('content')
@php
    $documentsRoutePrefix = request()->routeIs('formateur.*') ? 'formateur' : 'admin';
    $backRoute = $documentsRoutePrefix === 'formateur' ? route('formateur.dashboard') : route('admin.seminars.index');
    $backLabel = $documentsRoutePrefix === 'formateur' ? 'Retour espace formateur' : 'Retour aux seminaires';
@endphp
<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900">
                <div class="flex items-center justify-between mb-6">
                    <div>
                        <h1 class="text-2xl font-semibold">{{ $seminar->theme }}</h1>
                        <p class="text-gray-600 text-sm">Gérer les contenus et documents</p>
                    </div>
                    <a href="{{ $backRoute }}" class="text-indigo-600 hover:text-indigo-700">
                        &larr; {{ $backLabel }}
                    </a>
                </div>

                @if(session('success'))
                    <div class="mb-4 rounded-md bg-green-100 p-3 text-sm text-green-700">
                        {{ session('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="mb-4 rounded-md bg-red-100 p-3 text-sm text-red-700">
                        <p class="font-semibold">Le document n'a pas pu etre ajoute.</p>
                        <ul class="mt-2 list-disc pl-5">
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="mb-8 bg-gray-50 p-4 rounded-lg border border-gray-200">
                    <h2 class="font-semibold text-gray-900 mb-4">Ajouter un document</h2>
                    <form method="POST" action="{{ route($documentsRoutePrefix . '.documents.store', $seminar) }}" enctype="multipart/form-data" class="space-y-4">
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
                                <label class="block text-sm font-medium text-gray-700">Fichier (PDF, PPT, Excel, Word, video)</label>
                                <input type="file" name="file" accept=".pdf,.ppt,.pptx,.pps,.ppsx,.xls,.xlsx,.csv,.doc,.docx,.mp4,.mov,.avi,.webm,.zip,.rar" class="mt-1 block w-full rounded-md border border-gray-300 px-3 py-2" required>
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
                                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded-lg border border-gray-200">
                                        <div class="flex items-center">
                                            @php
                                                $fileExt = $doc->getFileExtension();
                                                $fileTypes = [
                                                    'pdf' => ['icon' => 'PDF', 'bgClass' => 'bg-red-50 text-red-700 border-red-100'],
                                                    'doc' => ['icon' => 'DOC', 'bgClass' => 'bg-[#061743]/5 text-[#061743] border-[#061743]/10'],
                                                    'docx' => ['icon' => 'DOCX', 'bgClass' => 'bg-[#061743]/5 text-[#061743] border-[#061743]/10'],
                                                    'ppt' => ['icon' => 'PPT', 'bgClass' => 'bg-[#ffbd45]/20 text-[#061743] border-[#ffbd45]/30'],
                                                    'pptx' => ['icon' => 'PPTX', 'bgClass' => 'bg-[#ffbd45]/20 text-[#061743] border-[#ffbd45]/30'],
                                                    'xls' => ['icon' => 'XLS', 'bgClass' => 'bg-emerald-50 text-emerald-700 border-emerald-100'],
                                                    'xlsx' => ['icon' => 'XLSX', 'bgClass' => 'bg-emerald-50 text-emerald-700 border-emerald-100'],
                                                    'mp4' => ['icon' => 'MP4', 'bgClass' => 'bg-[#061743]/5 text-[#061743] border-[#061743]/10'],
                                                    'avi' => ['icon' => 'AVI', 'bgClass' => 'bg-[#061743]/5 text-[#061743] border-[#061743]/10'],
                                                    'mov' => ['icon' => 'MOV', 'bgClass' => 'bg-[#061743]/5 text-[#061743] border-[#061743]/10'],
                                                    'zip' => ['icon' => 'ZIP', 'bgClass' => 'bg-slate-100 text-slate-700 border-slate-200'],
                                                    'rar' => ['icon' => 'RAR', 'bgClass' => 'bg-slate-100 text-slate-700 border-slate-200'],
                                                ];
                                                $fileInfo = $fileTypes[$fileExt] ?? ['icon' => 'FILE', 'bgClass' => 'bg-slate-100 text-slate-700 border-slate-200'];
                                            @endphp
                                            <div class="flex h-12 w-12 flex-shrink-0 items-center justify-center rounded-lg border {{ $fileInfo['bgClass'] }}">
                                                <span class="text-xs font-black">{{ $fileInfo['icon'] }}</span>
                                            </div>
                                            <div class="ml-4">
                                                <p class="font-medium text-gray-900">{{ $doc->title }}</p>
                                                <div class="mt-1 flex items-center gap-2 text-xs text-gray-600">
                                                    <span class="inline-flex items-center rounded bg-white px-2 py-1 font-medium border border-gray-200">
                                                        {{ ucfirst($doc->type) }}
                                                    </span>
                                                    <span>{{ $doc->size_kb > 1024 ? number_format($doc->size_kb / 1024, 2) . ' MB' : $doc->size_kb . ' KB' }}</span>
                                                    @if($doc->created_at)
                                                        <span>· Ajouté le {{ $doc->created_at->format('d/m/Y') }}</span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex items-center gap-2">
                                            <a href="{{ route('participant.formation.download', [$seminar, $doc->id]) }}" 
                                               class="inline-flex items-center px-3 py-1.5 bg-[#ffbd45] text-[#061743] text-sm font-semibold rounded-md hover:bg-[#ffd071] transition"
                                               title="Télécharger">
                                                Télécharger
                                            </a>
                                            <button onclick="openPreview('{{ route('participant.formation.preview', ['seminar' => $seminar, 'documentId' => $doc->id]) }}')"
                                                    class="inline-flex items-center px-3 py-1.5 bg-white border border-gray-300 text-gray-700 text-sm font-semibold rounded-md hover:bg-gray-50 transition"
                                                    title="Aperçu">
                                                Aperçu
                                            </button>
                                            <form method="POST" action="{{ route($documentsRoutePrefix . '.documents.destroy', [$seminar, $doc->id]) }}" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="inline-flex items-center px-3 py-1.5 bg-red-100 text-red-700 text-sm font-semibold rounded-md hover:bg-red-200 transition" onclick="return confirm('Supprimer ce document ?')">
                                                    Supprimer
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <!-- Modal de prévisualisation -->
    <div id="previewModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-black/60 p-4">
        <div class="flex max-h-[90vh] w-full max-w-6xl flex-col rounded-lg bg-white shadow-xl">
            <!-- Header -->
            <div class="flex items-center justify-between border-b border-slate-200 p-4">
                <h3 class="text-lg font-black text-[#061743]">Aperçu du document</h3>
                <button onclick="closePreview()" class="rounded-md p-1 text-slate-500 transition hover:bg-slate-100 hover:text-[#061743]">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <!-- Contenu -->
            <div class="flex-1 overflow-auto bg-slate-100 p-4">
                <div id="previewContent" class="flex min-h-full items-center justify-center">
                    <p class="text-slate-600">Chargement...</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        async function openPreview(url) {
            const modal = document.getElementById('previewModal');
            const content = document.getElementById('previewContent');
            content.innerHTML = '<p class="text-slate-600">Chargement...</p>';
            modal.classList.remove('hidden');
            modal.classList.add('flex');

            try {
                const response = await fetch(url, {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                    },
                });

                if (!response.ok) {
                    throw new Error('Preview failed');
                }

                content.innerHTML = await response.text();
            } catch (error) {
                content.innerHTML = "<div class=\"rounded-md border border-red-100 bg-red-50 p-4 text-sm text-red-700\">Impossible de charger l'apercu du document.</div>";
            }
        }

        function closePreview() {
            const modal = document.getElementById('previewModal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.getElementById('previewContent').innerHTML = '<p class="text-slate-600">Chargement...</p>';
        }

        // Fermer le modal en cliquant sur le fond
        document.getElementById('previewModal')?.addEventListener('click', function(event) {
            if (event.target === this) {
                closePreview();
            }
        });

        // Fermer avec Échap
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closePreview();
            }
        });
    </script>
</div>
@endsection
