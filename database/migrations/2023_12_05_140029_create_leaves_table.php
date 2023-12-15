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
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->integer('leave_approveds_id')->nullable()->comment('link to leave_approveds table');
            $table->integer('employees_id')->nullable()->comment('link to Employee/Candidate table');
            $table->integer('leave_types_id')->nullable();
            $table->string('leave_duration')->nullable();
            $table->timestamp('leave_datefrom')->nullable();
            $table->timestamp('leave_dateto')->nullable();
            $table->double('leave_total_day',8,2)->default(0);
            $table->string('leave_reason')->nullable();
            $table->integer('leave_status')->nullable();
            $table->integer('leave_file_path')->nullable();
            $table->integer('leave_empl_type')->nullable()->comment('0-Candidate,1-employee');
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
        Schema::dropIfExists('leaves');
    }
};
