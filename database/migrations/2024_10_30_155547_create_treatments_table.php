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
        Schema::create('treatments', function (Blueprint $table) {
            $table->id();
            $table->string('prescribed_treatment');
            $table->string('dosage');
            $table->string('treatments_description');   
            $table->unsignedBigInteger(column: 'patient_id');
            $table->unsignedBigInteger(column: 'doctor_id');
            $table->unsignedBigInteger(column: 'medication_id');
            $table->foreign('medication_id')->references('id')->on('medications')->onDelete('cascade');
            $table->foreign('patient_id')->references('id')->on('patients')->onDelete('cascade');
            $table->foreign("doctor_id")->references("id")->on("doctors")->onDelete("cascade"); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('treatments');
    }
};
