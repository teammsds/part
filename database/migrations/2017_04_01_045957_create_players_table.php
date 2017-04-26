<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        {
            Schema::create('players', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('user_id')->unsigned();
                $table->integer('p_number');
                $table->string('p_lname');
                $table->string('p_fname');
                $table->string('p_street');
                $table->string('p_city');
                $table->string('p_state');
                $table->integer('p_zip');
                $table->string('p_email');
                $table->string('p_phone');
                $table->string('p_estatus'); //player eligibility status
                $table->integer('team_id')->unsigned();
                $table->integer('school_id')->unsigned();
                $table->timestamps();
            });

            Schema::table('players', function (Blueprint $table) {
                $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
            });

            Schema::table('players', function (Blueprint $table) {
                $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
            });

            Schema::table('players', function (Blueprint $table) {
                $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::drop('players');
        //
    }
}
