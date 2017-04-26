<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRefereesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('referees', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('r_number');
            $table->string('r_lname');
            $table->string('r_fname');
            $table->string('r_street');
            $table->string('r_city');
            $table->string('r_state');
            $table->integer('r_zip');
            $table->string('r_email');
            $table->string('r_phone');
            $table->timestamps();
        });
        //
        Schema::table('referees', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('referees');
        //
    }
}
