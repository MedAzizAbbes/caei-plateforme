<?php

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Mail;

try {
    Mail::raw('Test de configuration Gmail CAEI - Si vous recevez cet email, la configuration SMTP est correcte !', function ($m) {
        $m->to('amenizina12@gmail.com')->subject('[CAEI] Test configuration Gmail SMTP');
    });
    echo "✅ Email envoyé avec succès !\n";
} catch (\Exception $e) {
    echo "❌ Erreur : " . $e->getMessage() . "\n";
}
