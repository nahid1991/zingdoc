<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_profile', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('doctor_user')->index();
            $table->foreign('doctor_user')->references('username')->on('users')->onDelete('cascade');
            $table->string('location');
            $table->string('address');
            $table->string('title');
            $table->string('start');
            $table->string('end');
            $table->string('membership');
            $table->string('certifications');
            $table->string('insurance');
            $table->string('specializations');
            $table->string('education');
            $table->string('language');
            $table->string('award');
            $table->string('registration');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('doctor_profile');
    }
}
