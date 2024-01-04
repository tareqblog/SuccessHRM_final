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
        Schema::create('time_sheets', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->comment('from auth user');
            $table->string('title');
            $table->string('print')->nullable();
            $table->text('remark')->nullable();
            $table->time('sunday_in')->nullable();
            $table->time('sunday_out')->nullable();
            $table->string('sunday_lunch')->nullable();
            $table->string('sunday_isWork')->nullable();
            $table->string('sunday_ot_rate')->nullable();
            $table->integer('sunday_minimum')->nullable();
            $table->integer('sunday_allowance')->nullable();
            $table->time('monday_in')->nullable();
            $table->time('monday_out')->nullable();
            $table->string('monday_lunch')->nullable();
            $table->string('monday_isWork')->nullable();
            $table->string('monday_ot_rate')->nullable();
            $table->integer('monday_minimum')->nullable();
            $table->integer('monday_allowance')->nullable();
            $table->time('tuesday_in')->nullable();
            $table->time('tuesday_out')->nullable();
            $table->string('tuesday_lunch')->nullable();
            $table->string('tuesday_isWork')->nullable();
            $table->string('tuesday_ot_rate')->nullable();
            $table->integer('tuesday_minimum')->nullable();
            $table->integer('tuesday_allowance')->nullable();
            $table->time('wedness_in')->nullable();
            $table->time('wedness_out')->nullable();
            $table->string('wedness_lunch')->nullable();
            $table->string('wedness_isWork')->nullable();
            $table->string('wedness_ot_rate')->nullable();
            $table->integer('wedness_minimum')->nullable();
            $table->integer('wedness_allowance')->nullable();
            $table->time('thusday_in')->nullable();
            $table->time('thusday_out')->nullable();
            $table->string('thusday_lunch')->nullable();
            $table->string('thusday_isWork')->nullable();
            $table->string('thusday_ot_rate')->nullable();
            $table->integer('thusday_minimum')->nullable();
            $table->integer('thusday_allowance')->nullable();
            $table->time('friday_in')->nullable();
            $table->time('friday_out')->nullable();
            $table->string('friday_lunch')->nullable();
            $table->string('friday_isWork')->nullable();
            $table->string('friday_ot_rate')->nullable();
            $table->integer('friday_minimum')->nullable();
            $table->integer('friday_allowance')->nullable();
            $table->time('saturday_in')->nullable();
            $table->time('saturday_out')->nullable();
            $table->string('saturday_lunch')->nullable();
            $table->string('saturday_isWork')->nullable();
            $table->string('saturday_ot_rate')->nullable();
            $table->integer('saturday_minimum')->nullable();
            $table->integer('saturday_allowance')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('time_sheets');
    }
};
