@php
    $user = Auth::user();
    $unreadCount = $user ? $user->unreadNotifications()->count() : 0;
    $recentNotifications = $user ? $user->notifications()->take(8)->get() : collect();
    $mappedNotifications = $recentNotifications->map(function ($n) {
        return [
            'id'         => $n->id,
            'read'       => $n->read(),
            'data'       => $n->data,
            'created_at' => $n->created_at->diffForHumans(),
            'date'       => $n->created_at->format('d/m/Y H:i'),
        ];
    })->values()->all();
@endphp

<div class="relative" x-data="clinicNotificationBell()">
    {{-- Bouton Cloche avec Badge --}}
    <button 
        @click="toggle()" 
        type="button" 
        class="relative p-2.5 rounded-2xl bg-white border border-slate-200 text-slate-600 hover:text-[#0284c7] hover:border-sky-300 hover:bg-sky-50/50 shadow-xs transition-all flex items-center justify-center group focus:outline-none cursor-pointer"
        title="Notifications"
    >
        <svg class="w-6 h-6 transform group-hover:rotate-12 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
        </svg>

        {{-- Badge de compteur non lu --}}
        <template x-if="unreadCount > 0">
            <span class="absolute -top-1.5 -right-1.5 flex h-5 min-w-5 items-center justify-center px-1 rounded-full bg-rose-500 text-white font-black text-[11px] shadow-sm animate-pulse" x-text="unreadCount"></span>
        </template>
        @if($unreadCount > 0)
            <span x-show="!initialized && unreadCount > 0" class="absolute -top-1.5 -right-1.5 flex h-5 min-w-5 items-center justify-center px-1 rounded-full bg-rose-500 text-white font-black text-[11px] shadow-sm">
                {{ $unreadCount }}
            </span>
        @endif
    </button>

    {{-- Dropdown Notifications --}}
    <div 
        x-show="open" 
        @click.outside="open = false"
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0 translate-y-2 scale-95"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100"
        x-transition:leave-end="opacity-0 translate-y-2 scale-95"
        class="absolute right-0 mt-3 w-80 sm:w-96 rounded-3xl bg-white shadow-2xl border border-slate-100 z-50 overflow-hidden text-left"
        style="display: none;"
    >
        {{-- En-tête du panneau --}}
        <div class="bg-gradient-to-r from-[#061743] to-[#0c3a6e] p-4 text-white flex items-center justify-between">
            <div class="flex items-center gap-2">
                <span class="text-lg">🔔</span>
                <h3 class="font-black text-sm uppercase tracking-wider">Notifications</h3>
                <span class="text-xs font-bold bg-white/20 px-2 py-0.5 rounded-full text-sky-200" x-text="unreadCount + ' non lue(s)'"></span>
            </div>
            <template x-if="unreadCount > 0">
                <button 
                    @click="markAllAsRead()" 
                    type="button" 
                    class="text-[11px] font-bold text-sky-200 hover:text-white underline hover:no-underline transition-colors cursor-pointer"
                >
                    Tout marquer lu
                </button>
            </template>
        </div>

        {{-- Liste des notifications --}}
        <div class="max-h-96 overflow-y-auto divide-y divide-slate-100">
            <template x-if="notifications.length === 0">
                <div class="p-8 text-center text-slate-400">
                    <div class="text-4xl mb-2">📭</div>
                    <div class="font-bold text-xs">Aucune notification pour le moment</div>
                    <p class="text-[11px] text-slate-400 mt-1">Vous serez notifié dès qu'un nouveau patient vous sera affecté.</p>
                </div>
            </template>

            <template x-for="notif in notifications" :key="notif.id">
                <a 
                    :href="notif.data.url || '#'" 
                    @click="markRead(notif)"
                    class="block p-4 hover:bg-slate-50 transition-colors relative group"
                    :class="!notif.read ? 'bg-sky-50/40' : ''"
                >
                    <div class="flex items-start gap-3">
                        <div class="w-9 h-9 rounded-xl flex items-center justify-center shrink-0 shadow-xs" :class="!notif.read ? 'bg-sky-500 text-white font-bold text-sm' : 'bg-slate-100 text-slate-600'">
                            <span>🏥</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between gap-1">
                                <div class="font-black text-xs text-slate-900 truncate" x-text="notif.data.title || 'Nouveau dossier patient'"></div>
                                <span class="text-[10px] text-slate-400 shrink-0" x-text="notif.created_at"></span>
                            </div>
                            <p class="text-xs text-slate-600 mt-1 line-clamp-2" x-text="notif.data.message"></p>
                            <div class="flex items-center gap-2 mt-2" x-if="notif.data.fullname">
                                <span class="text-[10px] font-bold text-sky-700 bg-sky-100/70 px-2 py-0.5 rounded-md" x-text="notif.data.fullname"></span>
                                <span class="text-[10px] font-medium text-slate-500" x-text="notif.data.service_type"></span>
                            </div>
                        </div>
                        <template x-if="!notif.read">
                            <span class="w-2.5 h-2.5 rounded-full bg-sky-500 shrink-0 mt-1" title="Non lue"></span>
                        </template>
                    </div>
                </a>
            </template>
        </div>

        {{-- Pied de panneau --}}
        <div class="p-3 bg-slate-50 border-t border-slate-100 text-center">
            <a href="{{ route('clinic.patients.index') }}" class="text-xs font-bold text-[#061743] hover:text-[#0284c7] transition-colors inline-flex items-center gap-1">
                <span>Voir tous mes patients</span>
                <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
            </a>
        </div>
    </div>
</div>

<script>
document.addEventListener('alpine:init', () => {
    Alpine.data('clinicNotificationBell', () => ({
        open: false,
        initialized: false,
        notifications: @json($mappedNotifications),
        unreadCount: {{ (int) $unreadCount }},
        pollingInterval: null,

        init() {
            this.initialized = true;
            // Polling automatique toutes les 25 secondes
            this.pollingInterval = setInterval(() => {
                this.fetchNotifications();
            }, 25000);
        },

        toggle() {
            this.open = !this.open;
            if (this.open) {
                this.fetchNotifications();
            }
        },

        async fetchNotifications() {
            try {
                const res = await fetch('{{ route("clinic.notifications.index") }}', {
                    headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' }
                });
                if (res.ok) {
                    const data = await res.json();
                    this.notifications = data.notifications;
                    this.unreadCount = data.unread_count;
                }
            } catch (e) {
                console.error('Erreur récupération notifications clinique:', e);
            }
        },

        async markRead(notif) {
            if (notif.read) return;
            try {
                await fetch(`/cliniques/espace/notifications/${notif.id}/read`, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '{{ csrf_token() }}',
                        'Accept': 'application/json',
                    }
                });
                notif.read = true;
                this.unreadCount = Math.max(0, this.unreadCount - 1);
            } catch (e) {
                console.error('Erreur marquage notification lue:', e);
            }
        },

        async markAllAsRead() {
            try {
                await fetch('{{ route("clinic.notifications.markAllRead") }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || '{{ csrf_token() }}',
                        'Accept': 'application/json',
                    }
                });
                this.notifications.forEach(n => n.read = true);
                this.unreadCount = 0;
            } catch (e) {
                console.error('Erreur tout marquer lu:', e);
            }
        }
    }));
});
</script>
