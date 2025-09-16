<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_create_clinics_table.php
public function up()
{
    Schema::create('clinics', function (Blueprint $table) {
        $table->id();
        $table->foreignId('doctor_id')->constrained()->onDelete('cascade');
        $table->string('clinic_name');
        $table->string('city');
        $table->text('address');
        $table->decimal('consultation_fee', 8, 2)->nullable();
        $table->string('waiting_time')->nullable();
        $table->string('working_hours')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clinics');
    }
};
