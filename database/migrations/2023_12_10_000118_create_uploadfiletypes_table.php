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
        Schema::create('uploadfiletypes', function (Blueprint $table) {
            $table->id();
            $table->string('uploadfiletype_code')->unique();
            $table->string('uploadfiletype_desc');
            $table->integer('uploadfiletype_seqno')->nullable();
            $table->integer('uploadfiletype_status')->default(1);
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
        Schema::dropIfExists('uploadfiletypes');
    }
};
