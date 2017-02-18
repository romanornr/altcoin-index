<? php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class createMarketsTable extends Migration
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
            $table->string('name');
            $table->string('base');
            $table->string('quote');
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
