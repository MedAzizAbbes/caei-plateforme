<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Carbon\Carbon;

class TestUsersSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {
            // Participant
            User::updateOrCreate(
                ['email' => 'participant@caei.org'],
                [
                    'first_name' => 'Participant',
                    'last_name' => 'Test',
                    'email' => 'participant@caei.org',
                    'phone' => null,
                    'institution' => null,
                    'password' => Hash::make('secret123'),
                    'role' => 'participant',
                    'participant_code' => 'P001',
                    'email_verified_at' => Carbon::now(),
                ]
            );

            // Formateur
            User::updateOrCreate(
                ['email' => 'formateur@caei.org'],
                [
                    'first_name' => 'Formateur',
                    'last_name' => 'Test',
                    'email' => 'formateur@caei.org',
                    'phone' => null,
                    'institution' => null,
                    'password' => Hash::make('secret123'),
                    'role' => 'formateur',
                    'participant_code' => null,
                    'email_verified_at' => Carbon::now(),
                ]
            );
        });

        $this->command->info('Test users created: participant@caei.org (participant), formateur@caei.org (formateur)');
    }
}
