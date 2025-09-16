<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('students', function (Blueprint $table) {
            // Add new columns if they don't exist
            if (!Schema::hasColumn('students', 'password')) {
                $table->string('password')->after('email');
            }
            
            if (!Schema::hasColumn('students', 'remember_token')) {
                $table->rememberToken()->after('password');
            }
            
            if (!Schema::hasColumn('students', 'email_verified_at')) {
                $table->timestamp('email_verified_at')->nullable()->after('remember_token');
            }
        });

        // Set default passwords for existing students
        \Illuminate\Support\Facades\DB::table('students')->update([
            'password' => \Illuminate\Support\Facades\Hash::make('password')
        ]);
    }

    public function down(): void
    {
        Schema::table('students', function (Blueprint $table) {
            $table->dropColumn(['password', 'remember_token', 'email_verified_at']);
        });
    }
};