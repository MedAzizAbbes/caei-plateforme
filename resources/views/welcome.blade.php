<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'CAEI Plateforme') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800,900&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased text-white">
        <main class="min-h-screen bg-caei-navy">
            <section class="caei-hero">
                <div class="caei-topbar">
                    <span>+216 55 335 286</span>
                    <span>contact@caei-afri.com</span>
                    <span>SIS 8 Rue Claude Bernard 1002 Belvedere-Tunis, Tunisie</span>
                    <span class="ms-auto hidden lg:inline-flex">Catalogue CAEI COMPANY GROUP</span>
                </div>
                <nav class="caei-public-nav">
                    <a href="{{ url('/') }}" class="caei-brand" aria-label="CAEI Company Group">
                        <span class="caei-brand-mark">CAEI</span>
                        <span class="caei-brand-text"><span>Company</span><strong>Group</strong></span>
                    </a>
                    <div class="caei-public-links">
                        <a class="active" href="{{ url('/') }}">Accueil</a>
                        <a href="#solutions">Nos Solutions</a>
                        @auth
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}">Contact</a>
                        @endauth
                    </div>
                </nav>
                <div class="caei-hero-content">
                    <p class="caei-eyebrow">Plateforme de gestion des seminaires</p>
                    <h1><span>Bienvenue!</span>CAEI Company Group</h1>
                    <p class="caei-hero-copy">Inscription, suivi des participants, presence par QR code et contenus de formation dans une experience inspiree de la charte officielle CAEI.</p>
                    <div class="caei-actions">
                        <a href="{{ route('registration.create') }}" class="caei-btn caei-btn-gold">S'inscrire</a>
                        <a href="{{ route('login') }}" class="caei-btn caei-btn-outline">Connexion</a>
                    </div>
                </div>
            </section>
            <a href="{{ route('registration.create') }}" class="caei-chat-button" aria-label="Inscription rapide">...</a>
        </main>
    </body>
</html>
