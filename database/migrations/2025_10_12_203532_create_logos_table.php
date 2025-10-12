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
        Schema::create('logos', function (Blueprint $table) {
            $table->id();
            $table->string('admin_panel_logo')->nullable();
            $table->string('admin_panel_mobile_logo')->nullable();
            $table->string('admin_panel_icon')->nullable();
            $table->string('main_site_header_logo')->nullable();
            $table->string('main_site_header_mobile_logo')->nullable();
            $table->string('main_site_footer_logo')->nullable();
            $table->string('main_site_footer_mobile_logo')->nullable();
            $table->string('main_site_icon')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('logos');
    }
};
