<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        // تعديل عمود resume إلى LONGBLOB
        DB::statement('ALTER TABLE applications MODIFY resume LONGBLOB');

        // إضافة الأعمدة الجديدة
        Schema::table('applications', function (Blueprint $table) {
            $table->string('resume_name')->nullable()->after('resume');
            $table->string('resume_type')->nullable()->after('resume_name');
        });
    }

    public function down(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropColumn(['resume_name', 'resume_type']);
            $table->string('resume')->change();
        });
    }
};
