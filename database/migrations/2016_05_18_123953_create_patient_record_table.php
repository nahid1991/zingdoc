<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientRecordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visit_record', function(Blueprint $table){
            $table->increments('id');
            $table->string('d_username')->index();
            $table->foreign('d_username')->references('username')->on('users')->onDelete('cascade');
            $table->string('p_username')->index();
            $table->foreign('p_username')->references('username')->on('users')->onDelete('cascade');
            $table->string('patient_name');
            $table->string('issue');
            $table->string('comments');
            $table->string('prescription');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('patient_record');
    }
}
