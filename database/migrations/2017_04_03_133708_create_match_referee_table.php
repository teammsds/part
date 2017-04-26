<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchRefereeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

            Schema::create('match_referee', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('match_id')->unsigned();
                $table->integer('referee_id')->unsigned();


                $table->foreign('match_id')->references('id')->on('matches')->onDelete('cascade');
                $table->foreign('referee_id')->references('id')->on('referees')->onDelete('cascade');
            });

        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::drop('match_referee');
    }
}
