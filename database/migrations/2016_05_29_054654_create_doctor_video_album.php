<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorVideoAlbum extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_album', function (Blueprint $table) {
            $table->increments('id');
            $table->string('v_album_user')->index();
            $table->foreign('v_album_user')->references('username')->on('users')->onDelete('cascade');
            $table->string('video_location');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('video_album');
    }
}
