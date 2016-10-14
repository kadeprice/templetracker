<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempleCountTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temple_count', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('count');
            $table->integer('sex');
            $table->integer('member_id')->unsigned();
            $table->foreign('member_id')->references('id')->on('member');
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
        Schema::drop('temple_count');
    }
}
