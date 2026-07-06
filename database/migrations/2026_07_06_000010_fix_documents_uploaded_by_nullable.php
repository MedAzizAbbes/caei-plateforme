<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // add temporary column
        Schema::table('documents', function (Blueprint $table) {
            $table->unsignedBigInteger('uploaded_by_tmp')->nullable()->after('seminar_id');
        });

        // copy data
        DB::statement('UPDATE documents SET uploaded_by_tmp = uploaded_by');

        // drop foreign key & column
        Schema::table('documents', function (Blueprint $table) {
            $table->dropForeign(['uploaded_by']);
            $table->dropColumn('uploaded_by');
        });

        // add new column with nullOnDelete
        Schema::table('documents', function (Blueprint $table) {
            $table->foreignId('uploaded_by')->nullable()->constrained('users')->nullOnDelete()->after('seminar_id');
        });

        // restore data
        DB::statement('UPDATE documents SET uploaded_by = uploaded_by_tmp');

        // drop temp
        Schema::table('documents', function (Blueprint $table) {
            $table->dropColumn('uploaded_by_tmp');
        });
    }

    public function down(): void
    {
        // revert: add old column, copy back, drop new FK
        Schema::table('documents', function (Blueprint $table) {
            $table->unsignedBigInteger('uploaded_by_old')->nullable()->after('seminar_id');
        });

        DB::statement('UPDATE documents SET uploaded_by_old = uploaded_by');

        Schema::table('documents', function (Blueprint $table) {
            $table->dropForeign(['uploaded_by']);
            $table->dropColumn('uploaded_by');
        });

        Schema::table('documents', function (Blueprint $table) {
            $table->foreignId('uploaded_by')->nullable()->constrained('users');
        });

        DB::statement('UPDATE documents SET uploaded_by = uploaded_by_old');

        Schema::table('documents', function (Blueprint $table) {
            $table->dropColumn('uploaded_by_old');
        });
    }
};
