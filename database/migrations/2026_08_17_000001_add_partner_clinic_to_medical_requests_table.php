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
        Schema::table('medical_requests', function (Blueprint $table) {
            $table->string('partner_clinic')->nullable()->after('admin_notes');
            $table->timestamp('assigned_at')->nullable()->after('partner_clinic');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('medical_requests', function (Blueprint $table) {
            $table->dropColumn(['partner_clinic', 'assigned_at']);
        });
    }
};
