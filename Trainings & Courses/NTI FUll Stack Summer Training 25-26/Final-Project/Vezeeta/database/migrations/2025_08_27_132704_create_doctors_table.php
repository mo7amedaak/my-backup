<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('doctors', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('title')->nullable();
        $table->string('specialization');
        $table->text('subspecialization')->nullable();
        $table->text('description')->nullable();
        $table->string('phone')->nullable();
        $table->string('email')->nullable();
        $table->string('profile_image')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
