<x-app-layout>
    @php
        $backRoute = Auth::user()->isFormateur()
            ? route('formateur.dashboard')
            : route('participant.dashboard');
    @endphp

    <x-slot name="header">
        <div class="flex items-center gap-4">
            <a href="{{ $backRoute }}" class="inline-flex items-center text-gray-600 hover:text-gray-900">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                </svg>
                Retour
            </a>
            <div>
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ $seminar->theme }} — Supports de formation
                </h2>
                <p class="text-sm text-gray-600 mt-1">{{ $seminar->country ?? 'Pays non renseigné' }}</p>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Résumé du séminaire -->
            <div class="bg-white rounded-lg shadow-md p-6 mb-8">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Dates</p>
                        <p class="text-gray-900 font-semibold">
                            @if($seminar->start_date && $seminar->end_date)
                                {{ $seminar->start_date->format('d/m/Y') }} — {{ $seminar->end_date->format('d/m/Y') }}
                            @else
                                À définir
                            @endif
                        </p>
                    </div>
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Nombre de jours</p>
                        <p class="text-gray-900 font-semibold">
                            @php
                                $dayCount = $documentsByDay->keys()->max() ?? 1;
                            @endphp
                            {{ $dayCount }} jour(s)
                        </p>
                    </div>
                    <div>
                        <p class="text-gray-600 text-sm font-medium">Total de documents</p>
                        <p class="text-gray-900 font-semibold">{{ $documentsByDay->sum(function($docs) { return $docs->count(); }) }} document(s)</p>
                    </div>
                </div>

                @if($seminar->description)
                    <div class="mt-4 pt-4 border-t">
                        <p class="text-gray-700 text-sm">{{ $seminar->description }}</p>
                    </div>
                @endif
            </div>

            <!-- Documents classés par jour -->
            @if($documentsByDay->isEmpty())
                <div class="bg-white rounded-lg shadow p-12 text-center">
                    <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    <h3 class="mt-4 text-lg font-medium text-gray-900">Aucun document</h3>
                    <p class="mt-2 text-sm text-gray-600">Les supports de formation seront bientôt disponibles.</p>
                </div>
            @else
                <div class="space-y-8">
                    @foreach($documentsByDay as $dayNumber => $documents)
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <!-- En-tête du jour -->
                            <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-6 py-4">
                                <h3 class="text-lg font-semibold text-white flex items-center">
                                    <svg class="w-6 h-6 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v2h16V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5H4v8a2 2 0 002 2h12a2 2 0 002-2V7h-2v1a1 1 0 11-2 0V7H9v1a1 1 0 11-2 0V7H6v1a1 1 0 11-2 0V7z" clip-rule="evenodd"></path>
                                    </svg>
                                    Jour {{ $dayNumber }} — {{ $documents->count() }} document(s)
                                </h3>
                            </div>

                            <!-- Liste des documents -->
                            <div class="divide-y">
                                @foreach($documents as $document)
                                    @php
                                        $filePath = $document->file_path ?? '';
                                        $fileExt = strtolower(pathinfo($filePath ?: '', PATHINFO_EXTENSION) ?: '');
                                        $fileTypes = [
                                            'pdf' => ['icon' => '📄', 'label' => 'PDF', 'bgClass' => 'bg-red-100'],
                                            'doc' => ['icon' => '📝', 'label' => 'Document', 'bgClass' => 'bg-blue-100'],
                                            'docx' => ['icon' => '📝', 'label' => 'Document', 'bgClass' => 'bg-blue-100'],
                                            'ppt' => ['icon' => '🎞️', 'label' => 'Présentation', 'bgClass' => 'bg-orange-100'],
                                            'pptx' => ['icon' => '🎞️', 'label' => 'Présentation', 'bgClass' => 'bg-orange-100'],
                                            'xls' => ['icon' => '📊', 'label' => 'Feuille', 'bgClass' => 'bg-green-100'],
                                            'xlsx' => ['icon' => '📊', 'label' => 'Feuille', 'bgClass' => 'bg-green-100'],
                                            'mp4' => ['icon' => '🎬', 'label' => 'Vidéo', 'bgClass' => 'bg-purple-100'],
                                            'avi' => ['icon' => '🎬', 'label' => 'Vidéo', 'bgClass' => 'bg-purple-100'],
                                            'mov' => ['icon' => '🎬', 'label' => 'Vidéo', 'bgClass' => 'bg-purple-100'],
                                            'zip' => ['icon' => '📦', 'label' => 'Archive', 'bgClass' => 'bg-gray-100'],
                                            'rar' => ['icon' => '📦', 'label' => 'Archive', 'bgClass' => 'bg-gray-100'],
                                        ];
                                        $fileInfo = $fileTypes[$fileExt] ?? ['icon' => '📎', 'label' => 'Fichier', 'bgClass' => 'bg-gray-100'];
                                    @endphp
                                    <div class="p-4 hover:bg-gray-50 transition-colors flex items-center justify-between">
                                        <!-- Infos du document -->
                                        <div class="flex items-center flex-1 min-w-0">
                                            <div class="flex-shrink-0">
                                                <div class="flex items-center justify-center h-12 w-12 rounded-lg {{ $fileInfo['bgClass'] }}">
                                                    <span class="text-lg">{{ $fileInfo['icon'] }}</span>
                                                </div>
                                            </div>
                                            <div class="ml-4 min-w-0 flex-1">
                                                <h4 class="text-sm font-semibold text-gray-900 truncate">{{ $document->title }}</h4>
                                                <div class="mt-1 flex items-center gap-3">
                                                    <span class="inline-flex items-center px-2 py-1 rounded text-xs font-medium bg-gray-100 text-gray-800">
                                                        {{ $fileInfo['label'] }}
                                                    </span>
                                                    @if($document->size_kb)
                                                        <span class="text-xs text-gray-600">
                                                            @if($document->size_kb > 1024)
                                                                {{ number_format($document->size_kb / 1024, 2) }} MB
                                                            @else
                                                                {{ $document->size_kb }} KB
                                                            @endif
                                                        </span>
                                                    @endif
                                                    @if($document->created_at)
                                                        <span class="text-xs text-gray-500">
                                                            Ajouté le {{ $document->created_at->format('d/m/Y') }}
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Actions -->
                                        <div class="ml-4 flex-shrink-0 flex gap-2">
                                            <!-- Bouton Télécharger -->
                                            <a href="{{ route('participant.formation.download', [$seminar, $document->id]) }}" 
                                               class="inline-flex items-center px-3 py-2 rounded-lg border border-blue-300 text-sm font-medium text-blue-700 bg-blue-50 hover:bg-blue-100 transition-colors"
                                               title="Télécharger">
                                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path>
                                                </svg>
                                                Télécharger
                                            </a>

                                            <!-- Bouton Aperçu/Lecture (pour PDF et vidéos) -->
                                            @if(in_array($fileExt, ['pdf', 'mp4', 'mov', 'avi']))
                                                <button onclick="openPreview('{{ route('participant.formation.download', [$seminar, $document->id, 'preview' => 1]) }}', '{{ $fileExt }}')"
                                                        class="inline-flex items-center px-3 py-2 rounded-lg border border-gray-300 text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 transition-colors"
                                                        title="Aperçu">
                                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                                    </svg>
                                                    Aperçu
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>

    <!-- Modal de prévisualisation -->
    <div id="previewModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-lg shadow-xl max-w-4xl w-full max-h-[90vh] flex flex-col">
            <!-- Header -->
            <div class="flex items-center justify-between p-4 border-b">
                <h3 class="text-lg font-semibold text-gray-900">Aperçu du document</h3>
                <button onclick="closePreview()" class="text-gray-500 hover:text-gray-700">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            <!-- Contenu -->
            <div class="flex-1 overflow-auto bg-gray-100 p-4">
                <div id="previewContent" class="flex items-center justify-center min-h-full">
                    <p class="text-gray-600">Chargement...</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function openPreview(url, fileType) {
            const modal = document.getElementById('previewModal');
            const content = document.getElementById('previewContent');
            
            if (fileType === 'pdf') {
                content.innerHTML = `<iframe src="${url}" class="w-full h-full rounded" frameborder="0"></iframe>`;
            } else if (['mp4', 'mov', 'avi'].includes(fileType)) {
                content.innerHTML = `<video controls class="max-w-full max-h-full rounded"><source src="${url}" type="video/${fileType === 'mov' ? 'quicktime' : fileType}">Votre navigateur ne supporte pas la lecture vidéo.</video>`;
            }
            
            modal.classList.remove('hidden');
        }

        function closePreview() {
            const modal = document.getElementById('previewModal');
            modal.classList.add('hidden');
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
</x-app-layout>
