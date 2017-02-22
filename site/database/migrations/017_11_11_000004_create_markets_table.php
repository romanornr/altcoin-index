<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMarketsTable extends Migration
{
    /**
    * Run the migrations
    *
    * @return void
    */
    public function up()
    {
        Schema::create('markets', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name', 20);
            $table->string('symbol', 10);
        });
    }
    /**
     * Reverse the migrations
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('markets');
    }
}
