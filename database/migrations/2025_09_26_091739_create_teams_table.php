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
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('team_member_name',100)->nullable();
            $table->string('team_member_desig',100)->nullable();
            $table->string('team_member_gender',20)->nullable();
            $table->string('team_member_phone',50)->nullable();
            $table->string('team_member_email',100)->nullable();
            $table->string('team_member_image')->nullable();
            $table->string('team_member_address')->nullable();
            $table->text('team_member_about')->nullable();
            $table->text('team_member_expertise')->nullable();
            $table->text('team_member_exp_lavel')->nullable();
            $table->string('team_member_facebook')->nullable();
            $table->string('team_member_instagram')->nullable();
            $table->string('team_member_linkedin')->nullable();
            $table->string('team_member_youtube')->nullable();
            $table->customDefaults();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
