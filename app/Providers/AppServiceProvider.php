<?php

namespace App\Providers;

use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        // Force le HTTPS sur toutes les URLs générées (formulaires, redirections, assets)
        // — nécessaire quand l'app tourne en local derrière un tunnel ngrok, sinon
        // Laravel génère des liens en http et le navigateur les bloque/avertit.
        if (str_starts_with(config('app.url'), 'https://')) {
            URL::forceScheme('https');
        }
    }
}