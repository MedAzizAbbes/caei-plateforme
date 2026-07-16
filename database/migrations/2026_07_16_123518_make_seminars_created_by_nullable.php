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
        // 1. Add temporary column
        Schema::table('seminars', function (Blueprint $table) {
            $table->unsignedBigInteger('created_by_tmp')->nullable();
        });

        // 2. Copy data
        \DB::statement('UPDATE seminars SET created_by_tmp = created_by');

        // 3. Drop foreign key and column
        Schema::table('seminars', function (Blueprint $table) {
            $table->dropForeign('seminars_created_by_foreign');
            $table->dropColumn('created_by');
        });

        // 4. Re-create column as nullable and with nullOnDelete constraint
        Schema::table('seminars', function (Blueprint $table) {
            $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
        });

        // 5. Restore data from temporary column
        \DB::statement('UPDATE seminars SET created_by = created_by_tmp');

        // 6. Drop temporary column
        Schema::table('seminars', function (Blueprint $table) {
            $table->dropColumn('created_by_tmp');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('seminars', function (Blueprint $table) {
            $table->unsignedBigInteger('created_by_tmp')->nullable();
        });

        \DB::statement('UPDATE seminars SET created_by_tmp = created_by');

        Schema::table('seminars', function (Blueprint $table) {
            $table->dropForeign(['created_by']);
            $table->dropColumn('created_by');
        });

        Schema::table('seminars', function (Blueprint $table) {
            $table->foreignId('created_by')->constrained('users');
        });

        \DB::statement('UPDATE seminars SET created_by = created_by_tmp');

        Schema::table('seminars', function (Blueprint $table) {
            $table->dropColumn('created_by_tmp');
        });
    }
};
