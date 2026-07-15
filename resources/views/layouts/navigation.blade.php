<nav x-data="{ open: false }" class="sticky top-0 z-50 glass-panel-dark text-white border-b-0">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center hover:scale-105 transition-transform duration-300">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo CAEI" class="h-14 w-14 rounded-full object-cover shadow-sm">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                    @auth
                        @if(Auth::user()->role === 'admin')
                            <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.*')">
                                Administration
                            </x-nav-link>
                        @endif
                        @if(Auth::user()->role === 'participant')
                            <x-nav-link :href="route('participant.dashboard')" :active="request()->routeIs('participant.*')">
                                Espace participant
                            </x-nav-link>
                        @endif
                        @if(Auth::user()->role === 'formateur')
                            <x-nav-link :href="route('formateur.dashboard')" :active="request()->routeIs('formateur.*')">
                                Espace formateur
                            </x-nav-link>
                        @endif
                    @endauth
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6 sm:gap-4">
                @auth
                    {{-- Notification Bell (admin only) --}}
                    @if(Auth::user()->role === 'admin')
                    <div x-data="notificationBell()" x-init="fetchNotifications(); startPolling()" @click.away="open = false" class="relative">
                        <button @click="toggle()" class="relative inline-flex items-center justify-center rounded-md p-2 text-white hover:bg-white/10 focus:outline-none transition duration-150">
                            {{-- Bell icon --}}
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                            </svg>
                            {{-- Badge --}}
                            <span x-show="unreadCount > 0"
                                  x-text="unreadCount > 99 ? '99+' : unreadCount"
                                  x-transition
                                  class="absolute -top-0.5 -right-0.5 flex items-center justify-center min-w-[20px] h-5 rounded-full bg-red-500 text-white text-[10px] font-bold px-1 shadow-lg animate-pulse">
                            </span>
                        </button>

                        {{-- Dropdown --}}
                        <div x-show="open"
                             x-transition:enter="transition ease-out duration-200"
                             x-transition:enter-start="opacity-0 scale-95 translate-y-1"
                             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
                             x-transition:leave="transition ease-in duration-100"
                             x-transition:leave-start="opacity-100 scale-100 translate-y-0"
                             x-transition:leave-end="opacity-0 scale-95 translate-y-1"
                             class="absolute right-0 mt-3 w-96 rounded-xl bg-white shadow-2xl ring-1 ring-black/5 z-50 overflow-hidden"
                             style="display: none;">

                            {{-- Header --}}
                            <div class="flex items-center justify-between px-5 py-4 border-b border-slate-100 bg-gradient-to-r from-[#061743] to-[#0a2463]">
                                <h3 class="text-sm font-black text-white uppercase tracking-wider">Notifications</h3>
                                <button x-show="unreadCount > 0" @click.stop="markAllRead()" class="text-xs font-semibold text-[#ffbd45] hover:text-yellow-300 transition">
                                    Tout marquer lu
                                </button>
                            </div>

                            {{-- List --}}
                            <div class="max-h-80 overflow-y-auto divide-y divide-slate-100">
                                <template x-if="notifications.length === 0">
                                    <div class="px-5 py-8 text-center text-sm text-slate-400">
                                        <svg class="mx-auto mb-3 h-10 w-10 text-slate-200" fill="none" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
                                        </svg>
                                        Aucune notification
                                    </div>
                                </template>
                                <template x-for="notif in notifications" :key="notif.id">
                                    <div @click="markRead(notif)"
                                         :class="notif.is_read ? 'bg-white' : 'bg-blue-50/60'"
                                         class="flex items-start gap-3 px-5 py-4 cursor-pointer hover:bg-slate-50 transition-colors group">
                                        <span class="text-2xl mt-0.5 flex-shrink-0" x-text="notif.icon || '🔔'"></span>
                                        <div class="flex-1 min-w-0">
                                            <p class="text-sm font-bold text-slate-800 truncate" x-text="notif.title"></p>
                                            <p class="text-xs text-slate-500 mt-0.5 line-clamp-2" x-text="notif.message"></p>
                                            <p class="text-[10px] text-slate-400 mt-1.5 font-medium" x-text="timeAgo(notif.created_at)"></p>
                                        </div>
                                        <span x-show="!notif.is_read" class="mt-2 flex-shrink-0 h-2.5 w-2.5 rounded-full bg-[#ffbd45] shadow-sm"></span>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                    @endif

                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center rounded-md border border-white/15 bg-white/10 px-3 py-2 text-sm font-semibold leading-4 text-white transition hover:bg-white/15 focus:outline-none">
                                <div>{{ Auth::user()->fullName() }}</div>

                                <div class="ms-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a href="{{ route('login') }}" class="text-sm font-semibold text-white hover:text-[#ffbd45]">
                        {{ __('Log in') }}
                    </a>
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center rounded-md p-2 text-white hover:bg-white/10 focus:outline-none focus:bg-white/10 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            @auth
                @if(Auth::user()->role === 'admin')
                    <x-responsive-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.*')">
                        Administration
                    </x-responsive-nav-link>
                @endif
                @if(Auth::user()->role === 'participant')
                    <x-responsive-nav-link :href="route('participant.dashboard')" :active="request()->routeIs('participant.*')">
                        Espace participant
                    </x-responsive-nav-link>
                @endif
                @if(Auth::user()->role === 'formateur')
                    <x-responsive-nav-link :href="route('formateur.dashboard')" :active="request()->routeIs('formateur.*')">
                        Espace formateur
                    </x-responsive-nav-link>
                @endif
            @endauth
        </div>

        <!-- Responsive Settings Options -->
        @auth
            <div class="pt-4 pb-1 border-t border-white/10">
                <div class="px-4">
                    <div class="font-medium text-base text-white">{{ Auth::user()->fullName() }}</div>
                    <div class="font-medium text-sm text-white/65">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-responsive-nav-link>

                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @else
            <div class="pt-4 pb-1 border-t border-white/10">
                <div class="px-4">
                    <a href="{{ route('login') }}" class="block text-sm text-white hover:text-[#ffbd45]">
                        {{ __('Log in') }}
                    </a>
                </div>
            </div>
        @endauth
    </div>
</nav>
