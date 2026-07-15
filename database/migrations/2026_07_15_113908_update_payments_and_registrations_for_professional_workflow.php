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
        Schema::table('payments', function (Blueprint $table) {
            $table->string('currency')->default('TND')->after('amount');
            $table->string('bank_name')->nullable()->after('currency'); // participant's bank
            $table->string('country')->nullable()->after('bank_name'); // participant's country
            $table->date('transfer_date')->nullable()->after('country');
            $table->foreignId('validated_by')->nullable()->constrained('users')->nullOnDelete()->after('status');
            $table->timestamp('validated_at')->nullable()->after('validated_by');
            $table->text('rejection_reason')->nullable()->after('validated_at');
        });

        // Modification de l'enum status de registrations
        // SQLite does not support changing enum columns easily, so we usually just define it at app level, 
        // but since this is Laravel 13, and likely MySQL, let's alter the enum.
        // A safer way without doctrine/dbal issues is a raw statement if it's MySQL, or just using change() if DBAL is installed.
        // Actually, since enum changing is tricky, let's just make it string or leave it and handle it in the model logic.
        // The user said: "pending_payment, confirmed, cancelled".
        // To be safe with `change()`, we can use string:
        Schema::table('registrations', function (Blueprint $table) {
            $table->string('status')->default('pending_payment')->change();
        });
        
        // Similarly for payments:
        Schema::table('payments', function (Blueprint $table) {
            $table->string('status')->default('pending')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->dropForeign(['validated_by']);
            $table->dropColumn(['currency', 'bank_name', 'country', 'transfer_date', 'validated_by', 'validated_at', 'rejection_reason']);
        });
    }
};
