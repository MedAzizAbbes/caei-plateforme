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
    </head>
    <body class="font-sans text-slate-900 antialiased selection:bg-caei-gold selection:text-caei-navy">
        <div class="min-h-screen flex flex-col justify-center items-center px-4 py-8 relative overflow-hidden bg-caei-navy">
            <!-- Arrière-plan décoratif subtil -->
            <div class="absolute inset-0 z-0 overflow-hidden pointer-events-none">
                <div class="absolute -top-[20%] -right-[10%] w-[60%] h-[60%] rounded-full bg-caei-gold/10 blur-[60px]" style="will-change: transform, opacity;"></div>
                <div class="absolute top-[40%] -left-[10%] w-[50%] h-[50%] rounded-full bg-blue-500/10 blur-[60px]" style="will-change: transform, opacity;"></div>
            </div>

            <!-- Logo CAEI à gauche (Retour au site) -->
            <div class="absolute top-6 left-6 md:left-10 z-20">
                <a href="{{ route('home') }}" class="flex items-center gap-3 group transition-all duration-300 hover:scale-105">
                    <img src="{{ asset('assets/img/logocompany.png') }}" alt="CAEI Logo" class="h-10 md:h-12 w-auto object-contain filter drop-shadow">
                    <span class="hidden sm:inline-flex items-center gap-1.5 text-xs font-bold text-white/80 group-hover:text-[#ffbd45] transition-colors bg-white/10 px-3 py-1.5 rounded-full border border-white/15 backdrop-blur-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M10 19l-7-7m0 0l7-7m-7 7h18"/></svg>
                        <span>Retour au site</span>
                    </span>
                </a>
            </div>

            <div class="mb-8 relative z-10 animate-slide-up">
                <a href="{{ route('home') }}" class="flex items-center justify-center hover:scale-105 transition-transform duration-300" title="Retour à l'accueil">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo CAEI" class="h-24 w-24 rounded-full object-cover shadow-lg border-4 border-white/10">
                </a>
            </div>

            <div class="w-full sm:max-w-lg rounded-2xl border border-white/20 bg-white/95 backdrop-blur-md px-8 py-8 shadow-2xl relative z-10 animate-slide-up animate-delay-100">
                {{ $slot }}
            </div>
        </div>
        @yield('scripts')
    </body>
</html>
