<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id_tmp')->nullable()->after('seminar_id');
        });

        DB::statement('UPDATE messages SET user_id_tmp = user_id');

        Schema::table('messages', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });

        Schema::table('messages', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete()->after('seminar_id');
        });

        DB::statement('UPDATE messages SET user_id = user_id_tmp');

        Schema::table('messages', function (Blueprint $table) {
            $table->dropColumn('user_id_tmp');
        });
    }

    public function down(): void
    {
        Schema::table('messages', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id_old')->nullable()->after('seminar_id');
        });

        DB::statement('UPDATE messages SET user_id_old = user_id');

        Schema::table('messages', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');
        });

        Schema::table('messages', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained('users');
        });

        DB::statement('UPDATE messages SET user_id = user_id_old');

        Schema::table('messages', function (Blueprint $table) {
            $table->dropColumn('user_id_old');
        });
    }
};
