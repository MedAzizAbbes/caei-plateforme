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
        // Registration de la Policy de Sécurité Call Center (P3 RBAC)
        \Illuminate\Support\Facades\Gate::policy(\App\Models\RendezVous::class, \App\Policies\RendezVousPolicy::class);

        // Force le HTTPS sur toutes les URLs générées (formulaires, redirections, assets)
        if (str_starts_with(config('app.url'), 'https://')) {
            URL::forceScheme('https');
        }
    }
}