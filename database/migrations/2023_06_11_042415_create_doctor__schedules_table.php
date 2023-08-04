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
        Schema::create('doctor__schedules', function (Blueprint $table) {
          $table->id();
            $table->unsignedBigInteger('doctor_id');
            $table->string('doc_name');
            $table->string('days');
            $table->string('start_time');
            $table->string('end_time');
            $table->enum('status', ['active', 'inactive']);
           

            $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctor__schedules');
    }
};
