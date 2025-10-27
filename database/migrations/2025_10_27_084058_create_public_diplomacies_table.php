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
        Schema::create('public_diplomacies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('country_id')->nullable()->constrained('country_representations')->nullOnDelete();
            $table->text('title')->nullable();
            $table->text('name')->nullable();
            $table->text('image')->nullable();
            $table->text('link')->nullable();
            $table->customDefaults();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('public_diplomacies');
    }
};
