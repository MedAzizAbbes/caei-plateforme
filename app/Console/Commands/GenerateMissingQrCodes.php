<?php

namespace App\Console\Commands;

use App\Models\QrCode;
use App\Models\Registration;
use Illuminate\Console\Command;

class GenerateMissingQrCodes extends Command
{
    protected $signature = 'qr:generate-missing';
    protected $description = 'Génère les QR Codes manquants pour les inscriptions existantes';

    public function handle(): int
    {
        $registrations = Registration::doesntHave('qrCode')->get();

        if ($registrations->isEmpty()) {
            $this->info('Toutes les inscriptions ont déjà un QR Code.');
            return self::SUCCESS;
        }

        $this->info("Inscriptions sans QR Code : {$registrations->count()}");

        $bar = $this->output->createProgressBar($registrations->count());
        $bar->start();

        foreach ($registrations as $registration) {
            QrCode::generateFor($registration);
            $bar->advance();
        }

        $bar->finish();
        $this->newLine();
        $this->info("{$registrations->count()} QR Code(s) généré(s) avec succès.");

        return self::SUCCESS;
    }
}
