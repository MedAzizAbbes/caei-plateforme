<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // Modifier l'enum du rôle pour ajouter 'clinic'
        DB::statement("ALTER TABLE users MODIFY COLUMN role ENUM('admin','formateur','participant','clinic') NOT NULL DEFAULT 'participant'");
    }

    public function down(): void
    {
        DB::statement("ALTER TABLE users MODIFY COLUMN role ENUM('admin','formateur','participant') NOT NULL DEFAULT 'participant'");
    }
};
