{{-- ══════════════════════════════════════════════════════════════════
     CAEI LiveKit — Modales d'appel Audio/Vidéo
     Inclus dans : shared/echange.blade.php
══════════════════════════════════════════════════════════════════ --}}

{{-- ── 1. Modale : Appel SORTANT (sonnerie) ──────────────────────────── --}}
<div id="modal-outgoing" class="hidden fixed inset-0 z-[9999] flex items-center justify-center bg-black/60 backdrop-blur-sm">
    <div class="bg-white rounded-3xl shadow-2xl w-80 p-8 flex flex-col items-center gap-5 animate-fade-in">
        <div class="w-20 h-20 rounded-full bg-[#061743] flex items-center justify-center shadow-lg ring-4 ring-[#f2a90f]/40 ring-offset-2 animate-pulse">
            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
            </svg>
        </div>
        <div class="text-center">
            <p class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-1" id="outgoing-call-type">Appel audio en cours...</p>
            <p class="text-xl font-black text-[#061743]" id="outgoing-callee-name">—</p>
            <p class="text-xs text-slate-400 mt-1 animate-pulse">Sonnerie...</p>
        </div>
        <button onclick="CaeiCall.hangUp()" class="mt-2 flex items-center gap-2 bg-rose-600 hover:bg-rose-700 text-white font-black px-8 py-3 rounded-full shadow-md transition-all text-sm">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M6.6 10.8c1.4 2.8 3.8 5.1 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1-9.4 0-17-7.6-17-17 0-.6.4-1 1-1h3.5c.6 0 1 .4 1 1 0 1.3.2 2.5.6 3.6.1.3 0 .7-.2 1L6.6 10.8z"/></svg>
            Raccrocher
        </button>
    </div>
</div>

{{-- ── 2. Modale : Appel ENTRANT (sonnerie) ───────────────────────────── --}}
<div id="modal-incoming" class="hidden fixed inset-0 z-[9999] flex items-center justify-center bg-black/60 backdrop-blur-sm">
    <div class="bg-white rounded-3xl shadow-2xl w-80 p-8 flex flex-col items-center gap-5 animate-fade-in">
        <div class="w-20 h-20 rounded-full bg-emerald-500 flex items-center justify-center shadow-lg ring-4 ring-emerald-400/40 ring-offset-2 animate-bounce">
            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
            </svg>
        </div>
        <div class="text-center">
            <p class="text-xs font-bold text-slate-500 uppercase tracking-widest mb-1" id="incoming-call-type">Appel entrant</p>
            <p class="text-xl font-black text-[#061743]" id="incoming-caller-name">—</p>
        </div>
        <div class="flex gap-4 w-full justify-center mt-1">
            <button onclick="CaeiCall.acceptIncoming()" class="flex items-center gap-2 bg-emerald-500 hover:bg-emerald-600 text-white font-black px-6 py-3 rounded-full shadow-md transition-all text-sm">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                Accepter
            </button>
            <button onclick="CaeiCall.refuseIncoming()" class="flex items-center gap-2 bg-rose-500 hover:bg-rose-600 text-white font-black px-6 py-3 rounded-full shadow-md transition-all text-sm">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M6.6 10.8c1.4 2.8 3.8 5.1 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1-9.4 0-17-7.6-17-17 0-.6.4-1 1-1h3.5c.6 0 1 .4 1 1 0 1.3.2 2.5.6 3.6.1.3 0 .7-.2 1L6.6 10.8z"/></svg>
                Refuser
            </button>
        </div>
    </div>
</div>

{{-- ── 3. Modale : Appel ACTIF (en cours) ────────────────────────────── --}}
<div id="modal-active-call" class="hidden fixed inset-0 z-[9999] flex items-center justify-center bg-black/80 backdrop-blur-md">
    <div class="relative w-full max-w-2xl mx-4 bg-[#061743] rounded-3xl shadow-2xl overflow-hidden flex flex-col" style="min-height:420px;">

        {{-- Remote video (full background) --}}
        <div id="remote-video-container" class="absolute inset-0 bg-slate-900 flex items-center justify-center">
            <div id="remote-video-placeholder" class="flex flex-col items-center gap-3 text-white/60">
                <div id="remote-avatar" class="w-24 h-24 rounded-full bg-white/10 flex items-center justify-center text-4xl font-black text-white">?</div>
                <span class="text-sm font-semibold" id="remote-name-placeholder">En attente...</span>
            </div>
        </div>

        {{-- Local video (picture-in-picture) --}}
        <div id="local-video-container" class="absolute top-4 right-4 w-28 h-20 bg-slate-800 rounded-2xl overflow-hidden border-2 border-white/20 shadow-xl z-10">
            <div id="local-video-placeholder" class="w-full h-full flex items-center justify-center text-white/40 text-xs font-bold">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.069A1 1 0 0121 8.82v6.36a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
            </div>
        </div>

        {{-- Header info --}}
        <div class="relative z-10 flex items-center justify-between px-6 pt-5 pb-3">
            <div>
                <p class="text-white font-black text-lg" id="active-peer-name">—</p>
                <p class="text-white/60 text-xs font-semibold" id="active-call-type-label">Appel audio</p>
            </div>
            <div class="flex items-center gap-2 bg-white/10 rounded-full px-3 py-1">
                <span class="w-2 h-2 rounded-full bg-emerald-400 animate-pulse"></span>
                <span class="text-white text-xs font-black font-mono" id="call-timer">0:00</span>
            </div>
        </div>

        {{-- Spacer --}}
        <div class="flex-1 relative z-10 min-h-[200px]"></div>

        {{-- Controls --}}
        <div class="relative z-10 flex items-center justify-center gap-5 px-6 py-6 bg-gradient-to-t from-black/60 to-transparent">

            {{-- Micro toggle --}}
            <button id="btn-toggle-mic" onclick="CaeiCall.toggleMic()" class="w-14 h-14 rounded-full bg-white/15 hover:bg-white/25 text-white flex items-center justify-center transition-all shadow-lg" title="Micro">
                <svg id="icon-mic-on" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11a7 7 0 01-7 7m0 0a7 7 0 01-7-7m7 7v4m0 0H8m4 0h4m-4-8a3 3 0 01-3-3V5a3 3 0 116 0v6a3 3 0 01-3 3z"/></svg>
                <svg id="icon-mic-off" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.586 15H4a1 1 0 01-1-1v-4a1 1 0 011-1h1.586l4.707-4.707C10.923 3.663 12 4.109 12 5v14c0 .891-1.077 1.337-1.707.707L5.586 15z" clip-rule="evenodd"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2"/></svg>
            </button>

            {{-- Camera toggle --}}
            <button id="btn-toggle-cam" onclick="CaeiCall.toggleCamera()" class="w-14 h-14 rounded-full bg-white/15 hover:bg-white/25 text-white flex items-center justify-center transition-all shadow-lg" title="Caméra">
                <svg id="icon-cam-on" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.069A1 1 0 0121 8.82v6.36a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                <svg id="icon-cam-off" class="w-6 h-6 hidden" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.069A1 1 0 0121 8.82v6.36a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3l18 18"/></svg>
            </button>

            {{-- Hang up --}}
            <button onclick="CaeiCall.hangUp()" class="w-16 h-16 rounded-full bg-rose-600 hover:bg-rose-700 text-white flex items-center justify-center shadow-xl transition-all ring-4 ring-rose-600/30" title="Raccrocher">
                <svg class="w-7 h-7 rotate-135" fill="currentColor" viewBox="0 0 24 24"><path d="M6.6 10.8c1.4 2.8 3.8 5.1 6.6 6.6l2.2-2.2c.3-.3.7-.4 1-.2 1.1.4 2.3.6 3.6.6.6 0 1 .4 1 1V20c0 .6-.4 1-1 1-9.4 0-17-7.6-17-17 0-.6.4-1 1-1h3.5c.6 0 1 .4 1 1 0 1.3.2 2.5.6 3.6.1.3 0 .7-.2 1L6.6 10.8z"/></svg>
            </button>

        </div>
    </div>
</div>

{{-- ── 4. Panneau membres & historique (sidebar latérale) ─────────────── --}}
<div id="panel-members" class="hidden fixed inset-y-0 right-0 z-[9990] w-80 bg-white shadow-2xl border-l border-slate-200 flex flex-col" style="top:0;">
    <div class="flex items-center justify-between px-5 py-4 border-b border-slate-200 bg-slate-50">
        <h3 class="font-black text-[#061743] text-sm uppercase tracking-wider">📞 Appeler un membre</h3>
        <button onclick="document.getElementById('panel-members').classList.add('hidden')" class="text-slate-400 hover:text-slate-700 transition">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
    </div>

    {{-- Tabs --}}
    <div class="flex border-b border-slate-200">
        <button id="tab-members-btn" onclick="CaeiCall.showTab('members')" class="flex-1 py-2.5 text-xs font-black uppercase tracking-wider text-[#061743] border-b-2 border-[#f2a90f]">Membres</button>
        <button id="tab-history-btn" onclick="CaeiCall.showTab('history')" class="flex-1 py-2.5 text-xs font-bold uppercase tracking-wider text-slate-500 hover:text-slate-700 border-b-2 border-transparent transition">Historique</button>
    </div>

    {{-- Members list --}}
    <div id="tab-members" class="flex-1 overflow-y-auto p-3 space-y-2">
        <div class="text-center py-8 text-slate-400 text-sm">Chargement...</div>
    </div>

    {{-- History list --}}
    <div id="tab-history" class="hidden flex-1 overflow-y-auto p-3 space-y-2">
        <div class="text-center py-8 text-slate-400 text-sm">Chargement...</div>
    </div>
</div>

<style>
@keyframes fade-in { from { opacity: 0; transform: scale(0.95); } to { opacity: 1; transform: scale(1); } }
.animate-fade-in { animation: fade-in 0.2s ease-out; }
</style>
