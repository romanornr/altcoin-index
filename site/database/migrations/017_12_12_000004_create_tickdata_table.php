<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTickdataTable extends Migration
{
    /**
    * Run the migrations
    *
    * @return void
    */
    public function up()
    {
        Schema::create('tickdata', function(Blueprint $table){
            $table->increments('id')->unsigned();
            $table->double('timestamp')->unsigned();
            $table->double('value')->unsigned();
            $table->double('weight')->unsigned();
            $table->string('altcoin')->nullable();

            $table->foreign('altcoin')->references('name')->on('markets');
            //$table->foreign('timestamp')->references('timestamp')->on('index_table');
            });
    }

    /**
    * Reverse the migrations
    *
    * @return void
    */
    public function down()
    {
        Schema::drop('tickdata');
    }
}