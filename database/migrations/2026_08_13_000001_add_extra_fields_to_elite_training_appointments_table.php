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
            if (!Schema::hasColumn('elite_training_appointments', 'country')) {
                $table->string('country')->nullable()->after('phone');
            }
            if (!Schema::hasColumn('elite_training_appointments', 'job_title')) {
                $table->string('job_title')->nullable()->after('country');
            }
            if (!Schema::hasColumn('elite_training_appointments', 'company')) {
                $table->string('company')->nullable()->after('job_title');
            }
            if (!Schema::hasColumn('elite_training_appointments', 'session_date')) {
                $table->string('session_date')->nullable()->after('subject');
            }
            if (!Schema::hasColumn('elite_training_appointments', 'participation_mode')) {
                $table->string('participation_mode')->nullable()->after('session_date'); // présentiel, en_ligne
            }
            if (!Schema::hasColumn('elite_training_appointments', 'source')) {
                $table->string('source')->nullable()->after('participation_mode');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('elite_training_appointments', function (Blueprint $table) {
            $columns = ['country', 'job_title', 'company', 'session_date', 'participation_mode', 'source'];
            foreach ($columns as $column) {
                if (Schema::hasColumn('elite_training_appointments', $column)) {
                    $table->dropColumn($column);
                }
            }
        });
    }
};
