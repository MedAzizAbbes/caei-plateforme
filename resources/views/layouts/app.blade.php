<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'CAEI Plateforme') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        @auth
        @if(Auth::user()->role === 'admin')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('notificationBell', () => ({
                    open: false,
                    notifications: [],
                    unreadCount: 0,
                    pollingInterval: null,

                    toggle() {
                        this.open = !this.open;
                        if (this.open) this.fetchNotifications();
                    },

                    async fetchNotifications() {
                        try {
                            const res = await fetch('{{ route("admin.notifications.index") }}', {
                                headers: { 'Accept': 'application/json', 'X-Requested-With': 'XMLHttpRequest' }
                            });
                            const data = await res.json();
                            this.notifications = data.notifications;
                            this.unreadCount = data.unread_count;
                        } catch (e) {
                            console.error('Failed to fetch notifications', e);
                        }
                    },

                    async markRead(notif) {
                        if (notif.is_read) return;
                        try {
                            await fetch(`/admin/notifications/${notif.id}/read`, {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                    'Accept': 'application/json',
                                }
                            });
                            notif.is_read = true;
                            this.unreadCount = Math.max(0, this.unreadCount - 1);
                        } catch (e) {
                            console.error('Failed to mark notification as read', e);
                        }
                    },

                    async markAllRead() {
                        try {
                            await fetch('{{ route("admin.notifications.readAll") }}', {
                                method: 'POST',
                                headers: {
                                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                                    'Accept': 'application/json',
                                }
                            });
                            this.notifications.forEach(n => n.is_read = true);
                            this.unreadCount = 0;
                        } catch (e) {
                            console.error('Failed to mark all as read', e);
                        }
                    },

                    startPolling() {
                        this.pollingInterval = setInterval(() => this.fetchNotifications(), 30000);
                    },

                    timeAgo(dateStr) {
                        const now = new Date();
                        const date = new Date(dateStr);
                        const seconds = Math.floor((now - date) / 1000);

                        if (seconds < 60) return "À l'instant";
                        const minutes = Math.floor(seconds / 60);
                        if (minutes < 60) return `Il y a ${minutes} min`;
                        const hours = Math.floor(minutes / 60);
                        if (hours < 24) return `Il y a ${hours}h`;
                        const days = Math.floor(hours / 24);
                        if (days < 7) return `Il y a ${days}j`;
                        return date.toLocaleDateString('fr-FR');
                    },

                    destroy() {
                        if (this.pollingInterval) clearInterval(this.pollingInterval);
                    }
                }));
            });
        </script>
        @endif
        @endauth
    </head>
    <body class="font-sans antialiased text-slate-900 bg-slate-50 selection:bg-caei-gold selection:text-caei-navy">
        <div class="min-h-screen relative flex flex-col">
            <!-- Arrière-plan décoratif subtil -->
            <div class="absolute inset-0 z-0 overflow-hidden pointer-events-none">
                <div class="absolute -top-[20%] -right-[10%] w-[50%] h-[50%] rounded-full bg-caei-gold/5 blur-[120px]"></div>
                <div class="absolute top-[40%] -left-[10%] w-[40%] h-[40%] rounded-full bg-caei-navy/5 blur-[120px]"></div>
            </div>

            <div class="relative z-10">
                @include('layouts.navigation')

                <!-- Page Heading -->
                @isset($header)
                    <header class="bg-white/80 backdrop-blur-md border-b border-slate-200/60 sticky top-0 z-40">
                        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                            {{ $header }}
                        </div>
                    </header>
                @endisset

                <!-- Page Content -->
                <main class="flex-grow w-full max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8 animate-fade-in">
                    @hasSection('content')
                        @yield('content')
                    @else
                        {{ $slot ?? '' }}
                    @endif
                </main>
            </div>
        </div>
    </body>
</html>
