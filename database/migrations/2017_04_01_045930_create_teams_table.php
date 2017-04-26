<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        {
            Schema::create('teams', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('school_id')->unsigned();
                $table->integer('tm_number');
                $table->string('tm_name');
                $table->string('tm_coach');
                $table->string('tm_coachemail');
                $table->string('tm_coachphone');
                $table->timestamps();
            });

            Schema::table('teams', function (Blueprint $table) {
                $table->foreign('school_id')->references('id')->on('schools')->onDelete('cascade');
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
        Schema::drop('teams');
        //
    }
}
