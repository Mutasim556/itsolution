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
        Schema::create('countings', function (Blueprint $table) {
            $table->id();
            $table->string('counting1_name',100)->nullable();
            $table->string('counting1_value',100)->nullable();
            $table->string('counting2_name',100)->nullable();
            $table->string('counting2_value',100)->nullable();
            $table->string('counting3_name',100)->nullable();
            $table->string('counting3_value',100)->nullable();
            $table->string('counting4_name',100)->nullable();
            $table->string('counting4_value',100)->nullable();
            $table->customDefaults();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countings');
    }
};
