<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorsTiming extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_timing', function(Blueprint $table){
            $table->increments('id');
            $table->string('doc_user')->index();
            $table->foreign('doc_user')->references('username')->on('users')->onDelete('cascade');
            $table->string('start_interval');
            $table->string('end_interval');
            $table->string('day');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('doctor_timing');
    }
}
