<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('elite_training_appointments', function (Blueprint $table) {
            if (!Schema::hasColumn('elite_training_appointments', 'type')) {
                $table->string('type')->default('appointment')->after('message'); // appointment, inscription
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('elite_training_appointments', function (Blueprint $table) {
            if (Schema::hasColumn('elite_training_appointments', 'type')) {
                $table->dropColumn('type');
            }
        });
    }
};
