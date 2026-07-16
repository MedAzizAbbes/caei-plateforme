<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->string('payment_method')->nullable()->change();
            $table->string('status')->default('unpaid')->change();
        });
    }

    public function down(): void
    {
        Schema::table('payments', function (Blueprint $table) {
            $table->enum('payment_method', ['bank_transfer', 'visa', 'arrangement'])->nullable()->change();
            $table->enum('status', ['unpaid', 'pending', 'arrangement_pending', 'paid', 'rejected'])->default('unpaid')->change();
        });
    }
};
