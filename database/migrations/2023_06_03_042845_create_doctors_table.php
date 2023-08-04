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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            

            $table->string('firstname')->nullable();
            $table->string('lastname');
            $table->string('username')->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('confirmed_password')->nullable();
            $table->string('dob');
            $table->string('gender')->nullable();
            $table->string('address')->nullable();
            $table->string('nic')->nullable();
            $table->string('appointment_fee')->nullable();
            $table->string('speciality')->nullable();
            $table->string('phone')->nullable();
            $table->string('image')->nullable();
            $table->string('status')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
