<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->text('work_title')->nullable();
            $table->foreignId('user_id')->nullable()->constrained('users')->nullOnDelete();
            $table->string('duration')->nullable();
            $table->float('total_cost')->default(0);
            $table->float('total_paid')->default(0);
            $table->integer('payment_status')->default(0);
            $table->integer('progress')->default(0);
            $table->customDefaults();
            $table->timestamps();
        });

        // 🔹 Trigger: set payment_status before INSERT
        DB::unprepared('
            CREATE TRIGGER trg_work_payment_status_insert 
            BEFORE INSERT ON works
            FOR EACH ROW
            BEGIN
                IF NEW.total_paid = 0 THEN
                    SET NEW.payment_status = 0; -- Not paid
                ELSEIF NEW.total_paid < NEW.total_cost THEN
                    SET NEW.payment_status = 1; -- Partially paid
                ELSE
                    SET NEW.payment_status = 2; -- Fully paid
                END IF;
            END
        ');

        // 🔹 Trigger: set payment_status before UPDATE
        DB::unprepared('
            CREATE TRIGGER trg_work_payment_status_update 
            BEFORE UPDATE ON works
            FOR EACH ROW
            BEGIN
                IF NEW.total_paid = 0 THEN
                    SET NEW.payment_status = 0; -- Not paid
                ELSEIF NEW.total_paid < NEW.total_cost THEN
                    SET NEW.payment_status = 1; -- Partially paid
                ELSE
                    SET NEW.payment_status = 2; -- Fully paid
                END IF;
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP TRIGGER IF EXISTS trg_work_payment_status_insert');
        DB::unprepared('DROP TRIGGER IF EXISTS trg_work_payment_status_update');

        Schema::dropIfExists('works');
    }
};
