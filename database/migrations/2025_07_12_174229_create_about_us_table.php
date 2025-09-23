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
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('company_name')->nullable();
            $table->string('about_us_title')->nullable();
            $table->text('short_details')->nullable();
            $table->text('details')->nullable();
            $table->text('points')->nullable();
            $table->text('project_line')->nullable();
            $table->string('resp_person_name')->nullable();
            $table->string('resp_person_desig')->nullable();
            $table->string('resp_person_image')->nullable();
            $table->string('resp_person_signature')->nullable();
            $table->integer('experience')->nullable();
            $table->string('image1')->nullable();
            $table->string('image2')->nullable();
            $table->string('video_link')->nullable();
            $table->customDefaults();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us');
    }
};
