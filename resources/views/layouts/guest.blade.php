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
    <body class="font-sans text-slate-900 antialiased">
        <div class="min-h-screen flex flex-col justify-center items-center px-4 py-8 bg-caei-navy">
            <div class="mb-6">
                <a href="/" class="caei-brand">
                    <span class="caei-brand-mark">CAEI</span>
                    <span class="caei-brand-text">
                        <span>Company</span>
                        <strong>Group</strong>
                    </span>
                </a>
            </div>

            <div class="w-full sm:max-w-md rounded-lg border border-white/15 bg-white px-6 py-6 shadow-2xl shadow-black/25">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>
