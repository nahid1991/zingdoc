<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientDoctorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patient_doctor', function (Blueprint $table) {
            $table->increments('id');
            $table->string('doctor_username');
            $table->foreign('doctor_username')->references('username')->on('users')->onDelete('cascade');
            $table->string('patient_username');
            $table->foreign('patient_username')->references('username')->on('users')->onDelete('cascade');
            $table->string('p_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('patient_doctor');
    }
}
