<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::firstOrCreate(
            ['email' => 'admin@caei.org'],
            [
                'first_name' => 'Admin',
                'last_name'  => 'CAEI',
                'password'   => Hash::make('changeme123'), // à changer après le premier login
                'role'       => 'admin',
            ]
        );
    }
}
