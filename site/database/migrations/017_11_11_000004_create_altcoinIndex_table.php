<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAltcoinIndexTable extends Migration
{
    /**
    * Run the migration
    *
    * @return void
    */
    public function up()
    {
        Schema::create('index_table', function(Blueprint $table) {
            $table->double('price')->unsigned();
            $table->double('timestamp')->unique();
        });
    }

    /**
    * Run the migrations
    *
    * @return void
    */
    public function down()
    {
        Schema::drop('index_table');
    }
}