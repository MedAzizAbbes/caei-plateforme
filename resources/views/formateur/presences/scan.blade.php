<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <a href="{{ route('formateur.presences.index', $seminar) }}" class="text-sm font-bold text-[#ffbd45] hover:underline mb-1 inline-block">&larr; Retour au tableau de bord</a>
                <h2 class="text-xl font-black uppercase leading-tight text-slate-900">Scanner QR Code</h2>
                <p class="text-xs text-slate-600 mt-1">{{ $seminar->theme }} - Jour {{ $dayNumber }}</p>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-lg shadow-sm border border-slate-200 p-8 text-center">
                
                <h3 class="text-lg font-black text-[#061743] mb-6 uppercase">Enregistrement de présence (Jour {{ $dayNumber }})</h3>

                <div id="reader-container" class="mx-auto overflow-hidden rounded-lg border-2 border-dashed border-slate-300" style="width: 100%; max-width: 500px;">
                    <div id="reader"></div>
                </div>

                <div id="status-message" class="mt-6 p-4 rounded-lg font-bold text-sm hidden">
                </div>

                <div class="mt-8">
                    <p class="text-sm text-slate-500 mb-2">Veuillez scanner le QR Code du participant pour valider sa présence.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Html5Qrcode -->
    <script src="https://unpkg.com/html5-qrcode"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const html5QrCode = new Html5Qrcode("reader");
            const statusMessage = document.getElementById("status-message");
            let isScanning = true;

            const config = { fps: 10, qrbox: { width: 250, height: 250 } };

            function showMessage(msg, type) {
                statusMessage.textContent = msg;
                statusMessage.className = "mt-6 p-4 rounded-lg font-bold text-sm block";
                if (type === 'success') {
                    statusMessage.classList.add("bg-emerald-100", "text-emerald-700");
                } else if (type === 'warning') {
                    statusMessage.classList.add("bg-yellow-100", "text-yellow-700");
                } else {
                    statusMessage.classList.add("bg-red-100", "text-red-700");
                }
            }

            function onScanSuccess(decodedText, decodedResult) {
                if (!isScanning) return;
                
                isScanning = false;
                html5QrCode.pause();

                fetch("{{ route('formateur.presences.storeScan', $seminar) }}", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/json",
                        "X-CSRF-TOKEN": "{{ csrf_token() }}",
                        "Accept": "application/json"
                    },
                    body: JSON.stringify({
                        code: decodedText,
                        day_number: {{ $dayNumber }}
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'ok') {
                        showMessage(data.participant + " : " + data.message, 'success');
                    } else if (data.status === 'warning') {
                        showMessage(data.message, 'warning');
                    } else {
                        showMessage(data.message || "Erreur de scan", 'error');
                    }
                    
                    // Resume scanning after 3 seconds
                    setTimeout(() => {
                        statusMessage.classList.add('hidden');
                        isScanning = true;
                        html5QrCode.resume();
                    }, 3000);
                })
                .catch(err => {
                    showMessage("Erreur de connexion au serveur.", 'error');
                    setTimeout(() => {
                        statusMessage.classList.add('hidden');
                        isScanning = true;
                        html5QrCode.resume();
                    }, 3000);
                });
            }

            html5QrCode.start(
                { facingMode: "environment" },
                config,
                onScanSuccess
            ).catch(err => {
                showMessage("Impossible d'accéder à la caméra.", 'error');
            });
        });
    </script>
</x-app-layout>
