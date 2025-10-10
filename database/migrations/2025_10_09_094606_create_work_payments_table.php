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
        Schema::create('work_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('work_id')->nullable()->constrained('works')->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->float('asking_payment')->nullable();
            $table->date('asking_payment_date')->nullable();
            $table->float('actual_payment')->nullable();
            $table->date('actual_payment_date')->nullable();
            $table->customDefaults();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_payments');
    }
};
