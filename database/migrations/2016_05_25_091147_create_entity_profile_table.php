<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEntityProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entity_profile', function (Blueprint $table) {
            $table->increments('id');
            $table->string('e_user')->index();
            $table->foreign('e_user')->references('username')->on('users')->onDelete('cascade');
            $table->string('year');
            $table->string('overview');
            $table->string('location');
            $table->string('address');
            $table->string('specializations');
            $table->string('services');
            $table->string('award');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('entity_profile');
    }
}
