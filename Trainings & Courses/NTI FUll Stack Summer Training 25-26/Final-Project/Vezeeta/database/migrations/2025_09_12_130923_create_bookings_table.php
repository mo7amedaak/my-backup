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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('name');               // اسم المريض
            $table->string('phone');              // رقم الموبايل
            $table->string('email')->nullable();  // البريد الإلكتروني (اختياري)
            $table->string('insurance')->nullable(); // التأمين (اختياري)
            $table->string('slot');               // ميعاد الحجز
            $table->foreignId('doctor_id')        // ربط الدكتور بالحجز
                  ->constrained()
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
