<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAuxiliaryIdToTempleCountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('temple_count', function (Blueprint $table) {
            $table->integer('auxiliary_id')->unsigned();
            $table->foreign('auxiliary_id')->references('id')->on('auxiliary');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('temple_count', function (Blueprint $table) {
            $table->dropColumn('auxiliary_id');
        });
    }
}
