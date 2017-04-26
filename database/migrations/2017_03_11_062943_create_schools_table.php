<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schools', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('s_number');
            $table->string('s_name');
            $table->string('s_street');
            $table->string('s_city');
            $table->string('s_state');
            $table->integer('s_zip');
            $table->string('s_contact');
            $table->string('s_email');
            $table->string('s_phone');
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
        Schema::drop('schools');
        //
    }
}
