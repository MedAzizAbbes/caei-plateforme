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
        // 1. Users Indexes
        Schema::table('users', function (Blueprint $table) {
            $table->index('role');
            $table->index('created_at');
        });

        // 2. Payments Indexes & SoftDeletes
        Schema::table('payments', function (Blueprint $table) {
            $table->index('status');
            $table->index('payment_method');
            $table->index('created_at');
            $table->softDeletes();
        });

        // 3. Seminars SoftDeletes & Index
        Schema::table('seminars', function (Blueprint $table) {
            $table->index('status');
            $table->softDeletes();
        });

        // 4. Rendez-vous Indexes & SoftDeletes
        Schema::table('rendez_vous', function (Blueprint $table) {
            $table->index('statut');
            $table->index('created_at');
            $table->softDeletes();
        });

        // 5. Medical Requests Indexes & SoftDeletes
        Schema::table('medical_requests', function (Blueprint $table) {
            $table->index('status');
            $table->index('clinic_status');
            $table->index('partner_clinic_id');
            $table->index('created_at');
            $table->softDeletes();
        });

        // 6. Digital Moov Contacts Indexes & SoftDeletes
        Schema::table('digital_moov_contacts', function (Blueprint $table) {
            $table->index('status');
            $table->index('created_at');
            $table->softDeletes();
        });

        // 7. Elite Training Appointments Indexes & SoftDeletes
        Schema::table('elite_training_appointments', function (Blueprint $table) {
            $table->index('status');
            $table->index('created_at');
            $table->softDeletes();
        });

        // 8. Recrutements Indexes & SoftDeletes
        Schema::table('recrutements', function (Blueprint $table) {
            $table->index('domaine');
            $table->index('created_at');
            $table->softDeletes();
        });

        // 9. Registrations Indexes
        Schema::table('registrations', function (Blueprint $table) {
            $table->index('status');
            $table->index('created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropIndex(['role']);
            $table->dropIndex(['created_at']);
        });

        Schema::table('payments', function (Blueprint $table) {
            $table->dropIndex(['status']);
            $table->dropIndex(['payment_method']);
            $table->dropIndex(['created_at']);
            $table->dropSoftDeletes();
        });

        Schema::table('seminars', function (Blueprint $table) {
            $table->dropIndex(['status']);
            $table->dropSoftDeletes();
        });

        Schema::table('rendez_vous', function (Blueprint $table) {
            $table->dropIndex(['statut']);
            $table->dropIndex(['created_at']);
            $table->dropSoftDeletes();
        });

        Schema::table('medical_requests', function (Blueprint $table) {
            $table->dropIndex(['status']);
            $table->dropIndex(['clinic_status']);
            $table->dropIndex(['partner_clinic_id']);
            $table->dropIndex(['created_at']);
            $table->dropSoftDeletes();
        });

        Schema::table('digital_moov_contacts', function (Blueprint $table) {
            $table->dropIndex(['status']);
            $table->dropIndex(['created_at']);
            $table->dropSoftDeletes();
        });

        Schema::table('elite_training_appointments', function (Blueprint $table) {
            $table->dropIndex(['status']);
            $table->dropIndex(['created_at']);
            $table->dropSoftDeletes();
        });

        Schema::table('recrutements', function (Blueprint $table) {
            $table->dropIndex(['domaine']);
            $table->dropIndex(['created_at']);
            $table->dropSoftDeletes();
        });

        Schema::table('registrations', function (Blueprint $table) {
            $table->dropIndex(['status']);
            $table->dropIndex(['created_at']);
        });
    }
};
