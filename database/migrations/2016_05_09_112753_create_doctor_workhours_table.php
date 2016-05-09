<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorWorkhoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_schedule', function(Blueprint $table){
            $table->increments('id');
            $table->string('doctor_user')->index();
            $table->foreign('doctor_user')->references('username')->on('users')->onDelete('cascade');
            $table->string('days');
            $table->timestamp('created_at');
            $table->string('starting_time');
            $table->string('ending_time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('doctor_schedule');
    }
}
