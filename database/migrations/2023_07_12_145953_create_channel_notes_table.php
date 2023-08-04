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
        Schema::create('channel_notes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('appointment_id');
            $table->unsignedBigInteger('user_id');
            $table->string('patient_name');
            $table->integer('age')->nullable();
            $table->date('date')->nullable();
            $table->string('gender')->nullable();
            $table->float('height')->nullable();
            $table->float('weight')->nullable();
            $table->text('reason')->nullable();
            $table->text('prescription')->nullable();
            $table->text('testings')->nullable();
            $table->timestamps();

            $table->foreign('appointment_id')->references('id')->on('appointments');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('channel_notes');
    }
};
