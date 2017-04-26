<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFoulsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        {
            Schema::create('fouls', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('y_card');
                $table->integer('r_card');
                $table->integer('player_id')->unsigned();
                $table->integer('match_id')->unsigned();
                $table->timestamps();
            });

            Schema::table('fouls', function (Blueprint $table) {
                $table->foreign('player_id')->references('id')->on('players')->onDelete('cascade');
            });
            Schema::table('fouls', function (Blueprint $table) {
                $table->foreign('match_id')->references('id')->on('matches')->onDelete('cascade');
            });
        }
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('fouls');
        //
    }
}
