<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorEntityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_entity', function(Blueprint $table){
            $table->increments('id');
            $table->string('entity_user')->index();
            $table->foreign('entity_user')->references('username')->on('users')->onDelete('cascade');
            $table->string('doctor_user')->index();
            $table->foreign('doctor_user')->references('username')->on('users')->onDelete('cascade');
            $table->string('workhour')->nullable();
            $table->timestamp('created_at');
            $table->string('appointed_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('doctor_entity');
    }
}
