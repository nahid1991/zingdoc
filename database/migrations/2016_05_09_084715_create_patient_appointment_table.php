<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientAppointmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('appointment_user', function(Blueprint $table){
            $table->increments('id');
            $table->string('patient_user')->index();
            $table->foreign('patient_user')->references('username')->on('users')->onDelete('cascade');
            $table->string('doctor_user')->index();
            $table->foreign('doctor_user')->references('username')->on('users')->onDelete('cascade');
            $table->string('issues')->nullable();
            $table->timestamp('created_at');
            $table->datetime('appointed_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('appointment_user');
    }
}
