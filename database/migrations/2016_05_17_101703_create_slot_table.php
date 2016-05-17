<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSlotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_slot', function(Blueprint $table){
            $table->increments('id');
            $table->string('d_user');
            $table->foreign('d_user')->references('username')->on('users')->onDelete('cascade');
            $table->string('slot');
            $table->string('day_of_week');
            $table->datetime('slot_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('time_slot');
    }
}
