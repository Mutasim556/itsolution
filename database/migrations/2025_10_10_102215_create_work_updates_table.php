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
        Schema::create('work_updates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('work_id')->nullable()->constrained('works')->nullOnDelete();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('payment_id')->nullable()->constrained('work_payments')->nullOnDelete();
            $table->text('updates_details')->nullable();
            $table->text('updates_note')->nullable();
            $table->string('updates_file')->nullable();
            $table->customDefaults();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('work_updates');
    }
};
