<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Formation;

class UpdateFormationDatesSeeder extends Seeder
{
    public function run()
    {
        $formations = Formation::all();
        foreach ($formations as $i => $f) {
            if (!$f->start_date) {
                $month = 8 + ($i % 3); // 8 = Août, 9 = Septembre, 10 = Octobre
                $day = (($i * 3) % 24) + 1;
                $f->start_date = sprintf('2026-%02d-%02d', $month, $day);
                $f->save();
            }
        }
        $this->command->info('Toutes les formations ont reçu leur date de démarrage !');
    }
}
