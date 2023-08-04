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
        Schema::create('payments', function (Blueprint $table) {
             $table->id();
    $table->unsignedBigInteger('appointment_id');
    $table->unsignedBigInteger('user_id');
    $table->unsignedBigInteger('doctor_id');
    $table->string('doctor_name')->nullable();
    $table->string('patient_name')->nullable();
    $table->string('phone_no')->nullable();
    $table->string('email')->nullable();
    $table->string('appointment_date')->nullable();
    $table->string('appointment_time')->nullable();
    $table->decimal('amount', 8, 2);
    $table->timestamp('payment_time')->useCurrent();
    $table->timestamps();

    // Add foreign key constraints if needed
    $table->foreign('appointment_id')->references('id')->on('appointments');
    $table->foreign('user_id')->references('id')->on('users');
    $table->foreign('doctor_id')->references('id')->on('doctors');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
