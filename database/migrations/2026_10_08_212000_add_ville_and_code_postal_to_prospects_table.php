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
        Schema::table('prospects', function (Blueprint $table) {
            if (!Schema::hasColumn('prospects', 'code_postal')) {
                $table->string('code_postal', 20)->nullable()->after('adresse');
            }
            if (!Schema::hasColumn('prospects', 'ville')) {
                $table->string('ville', 150)->nullable()->after('code_postal');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('prospects', function (Blueprint $table) {
            if (Schema::hasColumn('prospects', 'ville')) {
                $table->dropColumn('ville');
            }
            if (Schema::hasColumn('prospects', 'code_postal')) {
                $table->dropColumn('code_postal');
            }
        });
    }
};
