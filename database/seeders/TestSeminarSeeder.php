<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Seminar;
use App\Models\Document;
use App\Models\Registration;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TestSeminarSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
            $participant = User::where('email', 'participant@caei.org')->first();
            $formateur = User::where('email', 'formateur@caei.org')->first();

            if (! $participant || ! $formateur) {
                $this->command->error('Les utilisateurs tests sont manquants. Lancez TestUsersSeeder d\'abord.');
                return;
            }

            $seminar = Seminar::updateOrCreate(
                ['theme' => 'Séminaire Test CAEI'],
                [
                    'country' => 'Tunisie',
                    'description' => 'Séminaire de démonstration pour tests',
                    'start_date' => Carbon::today(),
                    'end_date' => Carbon::today()->addDays(1),
                    'status' => 'published',
                    'created_by' => $formateur->id,
                ]
            );

            // Document de test (Jour 1)
            Document::updateOrCreate([
                'seminar_id' => $seminar->id,
                'title' => 'Support Jour 1 - Présentation'
            ], [
                'uploaded_by' => $formateur->id,
                'type' => 'pdf',
                'file_path' => 'documents/test-support-jour1.pdf',
                'day_number' => 1,
                'size_kb' => 123,
            ]);

            // Inscrire le participant si nécessaire (statut conforme à la migration: 'inscrit')
            Registration::updateOrCreate(
                ['user_id' => $participant->id, 'seminar_id' => $seminar->id],
                ['status' => 'inscrit', 'registered_at' => Carbon::now()]
            );

            $this->command->info('Séminaire de test créé et participant inscrit.');
        });
    }
}
