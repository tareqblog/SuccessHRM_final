<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('candidate_resumes', function (Blueprint $table) {
            $table->text('resume_text')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('candidate_resumes', function (Blueprint $table) {
            $table->dropColumn('resume_text');
        });
    }
};
