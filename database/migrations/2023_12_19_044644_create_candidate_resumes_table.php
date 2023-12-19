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
        Schema::create('candidate_resumes', function (Blueprint $table) {
            $table->id();
            $table->integer('candidates_id');
            $table->string('resume_name');
            $table->string('resume_type');
            $table->string('resume_file_path')->nullable();
            $table->longText('resume_details')->nullable();
            $table->integer('isMain')->default(0)->comment('1=main,0=onlist');
            $table->integer('created_by')->nullable();
            $table->integer('modify_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidate_resumes');
    }
};
