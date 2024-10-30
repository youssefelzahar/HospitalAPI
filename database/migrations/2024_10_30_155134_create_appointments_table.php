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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('doctorid');
            $table->unsignedBigInteger('patientid');
            $table->unsignedBigInteger('departmentid');
            $table->foreign('doctorid')->references(columns: 'id')->on('doctors');
            $table->foreign('patientid')->references(columns: 'id')->on('patients');
            $table->foreign('departmentid')->references(columns: 'id')->on('departments');
            $table->dateTime('date_of_appointment');
            $table->string('status');
            $table->string('name of doctor');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
