<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTournamentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
            Schema::create('tournaments', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('to_number');
                $table->string('to_name');
                $table->date('to_sdate'); //tournament start date
                $table->date('to_edate');//tournament end date
                $table->integer('to_totteams'); //tournament total number of teams
                $table->string('to_cname'); // tournament contact name
                $table->string('to_cemail');// tournament contact email
                $table->string('to_cphone');// tournament contact phone
                $table->timestamps();
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
        Schema::drop('tournaments');
        //
    }
}
