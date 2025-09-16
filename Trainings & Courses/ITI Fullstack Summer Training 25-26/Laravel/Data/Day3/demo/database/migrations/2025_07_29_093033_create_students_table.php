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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
             $table->string('name')->default('Student Name');
             $table->string('address');
             $table->string('email')->unique();
             $table->integer('age');
             $table->enum('gender',['male','female'])->default('male');
             $table->string('image')->nullable()->default("https://images.pexels.com/photos/1222271/pexels-photo-1222271.jpeg");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
