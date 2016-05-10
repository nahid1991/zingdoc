<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorPatientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_patient', function(Blueprint $table){
            $table->increments('id');
            $table->string('doctor_user')->index();
            $table->foreign('doctor_user')->references('username')->on('users');
            $table->string('patient_user')->index();
            $table->foreign('patient_user')->references('username')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('doctor_patient');
    }
}
