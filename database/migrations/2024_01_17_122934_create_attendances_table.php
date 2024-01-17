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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('candidate_id');
            $table->unsignedBigInteger('company_id');
            $table->boolean('isApproved')->default(0);
            $table->string('invoice_no')->nullable();
            $table->date('date');
            $table->string('day');
            $table->time('in_time');
            $table->time('out_time')->nullable();
            $table->tinyInteger('next_day')->default(0);
            $table->integer('lunch_hour')->default(0);
            $table->integer('total_hour_min')->default(0);
            $table->integer('normal_hour_min')->default(0);
            $table->integer('ot_hour_min')->default(0);
            $table->tinyInteger('ot_calculation')->default(0);
            $table->tinyInteger('ot_edit')->default(0);
            $table->tinyInteger('work')->default(0);
            $table->tinyInteger('ph')->default(0);
            $table->tinyInteger('ph_pay')->default(0);
            $table->text('remark')->nullable();
            $table->string('type_of_leave')->nullable();
            $table->string('leave_day')->nullable();
            $table->string('leave_attachment')->nullable();
            $table->string('claim_attachment')->nullable();
            $table->string('type_of_reimbursement')->nullable();
            $table->decimal('amount_of_reimbursement', 10, 2)->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('candidate_id')->references('id')->on('candidates')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');

            // candidate_id, company_id, invoice_no, date, day, in_time, out_time, next_day, lunch_hour, total_hour_min, normal_hour_min, ot_hour_min, ot_calculation, ot_edit, work, ph, ph_pay, remark, type_of_leave, leave_day, leave_attachment, claim_attachment, type_of_reimbursement, amount_of_reimbursement,
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
