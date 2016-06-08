<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHiddenCommentPrescriptionColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('visit_record', function (Blueprint $table) {
            $table->string('hidden_prescription')->nullable();
            $table->string('hidden_comment')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('visit_record', function (Blueprint $table) {
            $table->dropColumn('hidden_prescription');
            $table->dropColumn('hidden_comment');
        });
    }
}
