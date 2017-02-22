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
            $table->double('timestamp');
            $table->double('value')->unsigned();
            $table->double('weight')->unsigned();
            $table->integer('coin_id')->unsigned()->nullable();

            $table->foreign('coin_id')->references('id')->on('markets');
            $table->foreign('timestamp')->references('timestamp')->on('index_table');
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