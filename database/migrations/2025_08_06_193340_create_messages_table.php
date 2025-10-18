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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->references('id')->on('users');
            $table->string('name',50)->nullable();
            $table->string('phone',20)->nullable();
            $table->string('email',50)->nullable();
            $table->text('message')->nullable();
            $table->boolean('subscription')->default(1);
            $table->boolean('reply_status')->default(0);
            $table->text('reply_message')->nullable();
            $table->foreignId('replied_by')->nullable()->references('id')->on('admins');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
