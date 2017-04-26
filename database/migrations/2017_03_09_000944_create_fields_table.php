<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fields', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('f_number');
            $table->string('f_name');
            $table->string('f_street');
            $table->string('f_city');
            $table->string('f_state');
            $table->integer('f_zip');
            $table->string('f_oworg'); //field owner organization
            $table->string('f_conname');// field contact name
            $table->string('f_conemail');// field contact email
            $table->string('f_conphone');// field contact phone
            $table->string('f_notes');
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
        Schema::drop('fields');
        //
    }
}
