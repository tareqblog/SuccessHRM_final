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
        Schema::create('marital_statuses', function (Blueprint $table) {
            $table->id();
            $table->string('marital_statuses_code')->unique();
            $table->string('marital_statuses_desc');
            $table->integer('marital_statuses_seqno')->nullable();
            $table->integer('marital_statuses_status')->default(1);
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
        Schema::dropIfExists('marital_statuses');
    }
};
