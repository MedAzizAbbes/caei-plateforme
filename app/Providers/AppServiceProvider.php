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
        // Enregistrement des Policies de Sécurité RBAC (Phase C)
        \Illuminate\Support\Facades\Gate::policy(\App\Models\RendezVous::class, \App\Policies\RendezVousPolicy::class);
        \Illuminate\Support\Facades\Gate::policy(\App\Models\Seminar::class, \App\Policies\SeminarPolicy::class);
        \Illuminate\Support\Facades\Gate::policy(\App\Models\MedicalRequest::class, \App\Policies\MedicalRequestPolicy::class);
        \Illuminate\Support\Facades\Gate::policy(\App\Models\Payment::class, \App\Policies\PaymentPolicy::class);
        \Illuminate\Support\Facades\Gate::policy(\App\Models\Document::class, \App\Policies\DocumentPolicy::class);

        // Force le HTTPS sur toutes les URLs générées (formulaires, redirections, assets)
        if (str_starts_with(config('app.url'), 'https://')) {
            URL::forceScheme('https');
        }
    }
}