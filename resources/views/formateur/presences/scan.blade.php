<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <a href="{{ route('formateur.presences.index', $seminar) }}" class="text-sm font-bold text-[#f2a90f] hover:underline mb-1 inline-block">&larr; Retour aux présences</a>
                <h2 class="text-xl font-black uppercase leading-tight text-slate-900">Scanner QR Code</h2>
                <p class="text-xs text-slate-600 mt-0.5">{{ $seminar->theme }}</p>
            </div>
            {{-- Day selector --}}
            <div class="flex items-center gap-2">
                <label for="day-select" class="text-xs font-bold uppercase text-slate-500 whitespace-nowrap">Jour actif :</label>
                <select id="day-select" onchange="window.location.href='{{ route('formateur.presences.scan', $seminar) }}?day_number=' + this.value" class="rounded-md border border-slate-300 bg-white px-3 py-1.5 text-sm font-bold text-[#061743] shadow-sm focus:border-[#061743] focus:outline-none">
                    @for($i = 1; $i <= $totalDays; $i++)
                        <option value="{{ $i }}" {{ $dayNumber == $i ? 'selected' : '' }}>Jour {{ $i }}</option>
                    @endfor
                </select>
            </div>
        </div>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden">
                
                {{-- Top Header --}}
                <div class="bg-[#061743] p-6 text-white text-center">
                    <p class="text-xs font-black uppercase text-[#f2a90f] tracking-wider">Validation de présence</p>
                    <h3 class="mt-1 text-2xl font-black uppercase">Enregistrement — Jour {{ $dayNumber }}</h3>
                </div>

                <div class="p-6 md:p-8 space-y-6">

                    {{-- Camera Container & Controls --}}
                    <div class="grid gap-6 md:grid-cols-2 items-start">
                        
                        {{-- Left Column: Camera / Photo Scanner --}}
                        <div class="space-y-4">
                            <div class="relative rounded-xl border-2 border-dashed border-slate-300 bg-slate-900 p-2 overflow-hidden aspect-square flex items-center justify-center">
                                <div id="reader" class="w-full h-full rounded-lg overflow-hidden"></div>
                            </div>

                            <div class="flex flex-wrap gap-2 justify-center">
                                <button type="button" id="toggle-camera-btn" class="inline-flex items-center gap-1.5 rounded-lg border border-slate-300 bg-white px-3.5 py-2 text-xs font-bold text-slate-700 shadow-sm transition hover:bg-slate-50">
                                    🎥 Redémarrer caméra
                                </button>
                                <button type="button" id="toggle-mirror-btn" class="inline-flex items-center gap-1.5 rounded-lg border border-slate-300 bg-white px-3.5 py-2 text-xs font-bold text-slate-700 shadow-sm transition hover:bg-slate-50">
                                    🪞 Inverser Miroir
                                </button>
                                <label for="qr-file-input" class="inline-flex items-center gap-1.5 rounded-lg border border-slate-300 bg-white px-3.5 py-2 text-xs font-bold text-slate-700 shadow-sm transition cursor-pointer hover:bg-slate-50">
                                    📁 Importer une photo QR
                                </label>
                                <input type="file" id="qr-file-input" accept="image/*" class="hidden">
                            </div>
                        </div>

                        {{-- Right Column: Manual Code Entry (Mode secours) --}}
                        <div class="bg-slate-50 rounded-xl border border-slate-200 p-5 space-y-4">
                            <div>
                                <h4 class="font-black text-sm uppercase text-[#061743] mb-1">💡 Scan difficile ? Saisie manuelle</h4>
                                <p class="text-xs text-slate-500">Si le reflet de l'écran empêche le scan automatique, saisissez le code ci-dessous (ex: <code class="font-mono bg-slate-200 px-1 py-0.5 rounded text-slate-800">CAEI-2026-0001</code> ou collez le lien du QR code).</p>
                            </div>

                            <form id="manual-scan-form" class="space-y-3">
                                <div>
                                    <label class="block text-xs font-bold uppercase tracking-wider text-slate-600 mb-1">Code du participant</label>
                                    <input type="text" id="manual-code-input" placeholder="Ex: CAEI-2026-0001" required class="w-full font-mono text-sm rounded-lg border border-slate-300 bg-white px-3 py-2 text-slate-800 shadow-sm focus:border-[#061743] focus:outline-none focus:ring-1 focus:ring-[#061743]">
                                </div>
                                <button type="submit" id="submit-manual-btn" class="w-full rounded-lg bg-[#061743] px-4 py-2.5 text-xs font-black uppercase text-white transition hover:bg-[#0a2060]">
                                    Valider la présence (Jour {{ $dayNumber }})
                                </button>
                            </form>
                        </div>
                    </div>

                    {{-- Feedback status alert --}}
                    <div id="status-message" class="hidden rounded-xl border p-4 text-center text-sm font-bold shadow-sm transition-all duration-200">
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- Html5Qrcode Library & jsQR Fallback -->
    <script src="https://unpkg.com/html5-qrcode"></script>
    <script src="https://cdn.jsdelivr.net/npm/jsqr@1.4.0/dist/jsQR.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let html5QrCode = null;
            let isScanning = false;
            let isProcessing = false;

            const statusMessage = document.getElementById("status-message");
            const manualForm = document.getElementById("manual-scan-form");
            const manualInput = document.getElementById("manual-code-input");
            const fileInput = document.getElementById("qr-file-input");
            const toggleCameraBtn = document.getElementById("toggle-camera-btn");

            function showMessage(msg, type) {
                statusMessage.innerHTML = msg;
                statusMessage.className = "rounded-xl border p-4 text-center text-sm font-bold block shadow-sm";
                if (type === 'success') {
                    statusMessage.classList.add("bg-emerald-50", "border-emerald-200", "text-emerald-800");
                } else if (type === 'warning') {
                    statusMessage.classList.add("bg-amber-50", "border-amber-200", "text-amber-800");
                } else {
                    statusMessage.classList.add("bg-red-50", "border-red-200", "text-red-800");
                }
            }

            function hideMessage() {
                statusMessage.className = "hidden";
            }

            async function processCode(codeStr) {
                if (isProcessing) return;
                const cleanCode = codeStr ? codeStr.trim() : '';
                if (!cleanCode) return;

                isProcessing = true;
                showMessage("⏳ Validation du code en cours...", 'warning');

                try {
                    const response = await fetch("{{ route('formateur.presences.storeScan', $seminar) }}", {
                        method: "POST",
                        headers: {
                            "Content-Type": "application/json",
                            "X-CSRF-TOKEN": "{{ csrf_token() }}",
                            "Accept": "application/json"
                        },
                        body: JSON.stringify({
                            code: cleanCode,
                            day_number: {{ $dayNumber }}
                        })
                    });

                    const data = await response.json().catch(() => ({}));

                    if (response.ok && data.status === 'ok') {
                        showMessage(`✅ <strong>${data.participant}</strong> : ${data.message}`, 'success');
                        manualInput.value = '';
                    } else if (data.status === 'warning') {
                        showMessage(`⚠️ ${data.message}`, 'warning');
                    } else {
                        showMessage(`❌ ${data.message || "Code QR non reconnu ou introuvable."}`, 'error');
                    }
                } catch (err) {
                    showMessage("❌ Erreur de connexion au serveur. Vérifiez votre réseau.", 'error');
                } finally {
                    isProcessing = false;
                    setTimeout(() => {
                        if (isScanning && html5QrCode) {
                            try { html5QrCode.resume(); } catch (e) {}
                        }
                    }, 2500);
                }
            }

            const toggleMirrorBtn = document.getElementById("toggle-mirror-btn");
            let isVisualMirrored = false;

            toggleMirrorBtn.addEventListener('click', () => {
                isVisualMirrored = !isVisualMirrored;
                const videoElem = document.querySelector("#reader video");
                if (videoElem) {
                    videoElem.style.transform = isVisualMirrored ? "scaleX(-1)" : "scaleX(1)";
                }
            });

            function scanCanvasWithJsQR(canvas) {
                if (!window.jsQR) return null;
                const width = canvas.width;
                const height = canvas.height;
                const ctx = canvas.getContext('2d');

                // 1. Passe normale (non miroir)
                let imageData = ctx.getImageData(0, 0, width, height);
                let code = jsQR(imageData.data, width, height, { inversionAttempts: "both" });
                if (code && code.data) return code.data;

                // 2. Passe Miroir Horizontal (Inversion horizontale pour caméras/webcams miroir)
                const mirrorCanvas = document.createElement('canvas');
                mirrorCanvas.width = width;
                mirrorCanvas.height = height;
                const mCtx = mirrorCanvas.getContext('2d');
                mCtx.translate(width, 0);
                mCtx.scale(-1, 1);
                mCtx.drawImage(canvas, 0, 0);
                imageData = mCtx.getImageData(0, 0, width, height);
                code = jsQR(imageData.data, width, height, { inversionAttempts: "both" });
                if (code && code.data) return code.data;

                // 3. Passe Miroir Vertical
                mCtx.clearRect(0, 0, width, height);
                mCtx.setTransform(1, 0, 0, 1, 0, 0);
                mCtx.translate(0, height);
                mCtx.scale(1, -1);
                mCtx.drawImage(canvas, 0, 0);
                imageData = mCtx.getImageData(0, 0, width, height);
                code = jsQR(imageData.data, width, height, { inversionAttempts: "both" });
                if (code && code.data) return code.data;

                return null;
            }

            let videoTicker = null;

            function startVideoTicker() {
                stopVideoTicker();
                videoTicker = setInterval(() => {
                    if (!isScanning || isProcessing) return;
                    const videoElem = document.querySelector("#reader video");
                    if (videoElem && videoElem.readyState === videoElem.HAVE_ENOUGH_DATA) {
                        try {
                            const canvas = document.createElement("canvas");
                            canvas.width = videoElem.videoWidth;
                            canvas.height = videoElem.videoHeight;
                            const ctx = canvas.getContext("2d");
                            ctx.drawImage(videoElem, 0, 0, canvas.width, canvas.height);

                            const decodedText = scanCanvasWithJsQR(canvas);
                            if (decodedText && !isProcessing) {
                                console.log("jsQR mirror-compensated hit:", decodedText);
                                try { html5QrCode.pause(); } catch (e) {}
                                processCode(decodedText);
                            }
                        } catch (e) {}
                    }
                }, 150);
            }

            function stopVideoTicker() {
                if (videoTicker) {
                    clearInterval(videoTicker);
                    videoTicker = null;
                }
            }

            async function startCameraScanner() {
                try {
                    if (!html5QrCode) {
                        html5QrCode = new Html5Qrcode("reader", {
                            verbose: false,
                            experimentalFeatures: {
                                useBarCodeDetectorIfSupported: true
                            }
                        });
                    }
                    if (isScanning) {
                        await stopCameraScanner();
                    }

                    const qrboxFunction = function(viewfinderWidth, viewfinderHeight) {
                        const minEdge = Math.min(viewfinderWidth, viewfinderHeight);
                        const edgeSize = Math.floor(minEdge * 0.8);
                        return { width: edgeSize, height: edgeSize };
                    };

                    const config = {
                        fps: 20,
                        qrbox: qrboxFunction,
                        aspectRatio: 1.0
                    };

                    const onScanSuccess = async (decodedText) => {
                        if (isProcessing) return;
                        try { html5QrCode.pause(); } catch (e) {}
                        await processCode(decodedText);
                    };

                    const onScanError = (errorMessage) => {
                        // Ignorer les erreurs de cadrage en temps réel
                    };

                    let cameraTarget = { facingMode: "environment" };

                    // Détecter la liste des caméras disponibles (Support PC Portable / Webcam USB / Mobile)
                    try {
                        const devices = await Html5Qrcode.getCameras();
                        if (devices && devices.length > 0) {
                            const rearCam = devices.find(d => 
                                d.label.toLowerCase().includes('back') || 
                                d.label.toLowerCase().includes('rear') || 
                                d.label.toLowerCase().includes('arrière')
                            );
                            cameraTarget = rearCam ? { deviceId: { exact: rearCam.id } } : { deviceId: devices[0].id };
                        }
                    } catch (e) {
                        console.log("Enumeration des caméras non supportée ou refusée, tentative par défaut.");
                    }

                    try {
                        await html5QrCode.start(cameraTarget, config, onScanSuccess, onScanError);
                    } catch (err1) {
                        console.log("Tentative 1 échouée, essai avec facingMode user/default...");
                        try {
                            await html5QrCode.start({ facingMode: "user" }, config, onScanSuccess, onScanError);
                        } catch (err2) {
                            console.log("Tentative 2 échouée, essai avec configuration minimale...");
                            await html5QrCode.start(true, { fps: 10, qrbox: 250 }, onScanSuccess, onScanError);
                        }
                    }

                    isScanning = true;
                    toggleCameraBtn.textContent = '⏹ Arrêter caméra';
                    startVideoTicker();
                } catch (err) {
                    console.error("Impossible de démarrer le flux vidéo de la caméra :", err);
                    isScanning = false;
                    toggleCameraBtn.textContent = '🎥 Démarrer caméra';
                    showMessage("⚠️ Impossible d'accéder à la caméra sur ce périphérique.<br>💡 Utilisez la <strong>saisie manuelle</strong> ci-contre ou le bouton <strong>Importer une photo QR</strong>.", 'warning');
                }
            }

            async function stopCameraScanner() {
                stopVideoTicker();
                if (html5QrCode && isScanning) {
                    try {
                        await html5QrCode.stop();
                    } catch (e) {}
                }
                isScanning = false;
                toggleCameraBtn.textContent = '🎥 Démarrer caméra';
            }

            function decodeWithJsQR(imageFile) {
                return new Promise((resolve, reject) => {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        const img = new Image();
                        img.onload = () => {
                            const canvas = document.createElement('canvas');
                            const ctx = canvas.getContext('2d');
                            canvas.width = img.width;
                            canvas.height = img.height;
                            ctx.drawImage(img, 0, 0);
                            const decoded = scanCanvasWithJsQR(canvas);
                            if (decoded) {
                                return resolve(decoded);
                            }
                            reject(new Error("jsQR failed to find QR code"));
                        };
                        img.onerror = reject;
                        img.src = e.target.result;
                    };
                    reader.onerror = reject;
                    reader.readAsDataURL(imageFile);
                });
            }

            toggleCameraBtn.addEventListener('click', async () => {
                if (isScanning) {
                    await stopCameraScanner();
                } else {
                    await startCameraScanner();
                }
            });

            manualForm.addEventListener('submit', async (e) => {
                e.preventDefault();
                await processCode(manualInput.value);
            });

            fileInput.addEventListener('change', async (e) => {
                if (e.target.files.length === 0) return;
                const imageFile = e.target.files[0];
                
                showMessage("🔍 Analyse approfondie du QR Code...", 'warning');

                // Arrêter la caméra active si nécessaire pour libérer les ressources
                if (isScanning) {
                    await stopCameraScanner();
                }

                let decodedText = null;

                // Moteur 1 : Html5Qrcode scanFile
                try {
                    const tempScanner = new Html5Qrcode("reader");
                    decodedText = await tempScanner.scanFile(imageFile, false);
                } catch (err1) {
                    console.log("Html5Qrcode scanFile failed, trying jsQR fallback...");
                }

                // Moteur 2 : Fallback jsQR avec détection inversée
                if (!decodedText) {
                    try {
                        decodedText = await decodeWithJsQR(imageFile);
                    } catch (err2) {
                        console.log("jsQR failed as well");
                    }
                }

                if (decodedText) {
                    manualInput.value = decodedText;
                    await processCode(decodedText);
                } else {
                    showMessage("❌ Impossible de lire le QR Code sur cette image.<br>💡 Saisissez le code affiché sous le QR (ex: <strong>CAEI-2026-0011</strong>) dans le champ manuel ci-contre.", 'error');
                }

                // Réinitialiser la sélection de fichier
                fileInput.value = '';
            });

            // Lancer le scanner automatiquement au chargement
            startCameraScanner();
        });
    </script>
</x-app-layout>

