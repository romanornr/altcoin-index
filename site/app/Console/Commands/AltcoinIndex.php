<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\AltIndex;
use Eloquent;
use Illuminate\Http\Request;


use App\Markets;
use App\Tickdata;

class AltcoinIndex extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ticker:altcoinIndex';

    /**
     * getApi coinmarketcap & calculate the index
     * Save Data into the database
     *
     * @var string
     */
    protected $description = 'Save altcoinIndex price 5min';

    /**
     * Create a new command instance.
     *
     * @return void
     */
     public function __construct()
     {
         parent::__construct();
     }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
     public function handle()
     {
        $json = file_get_contents('https://api.coinmarketcap.com/v1/ticker/?limit=50');
        $totalcap = 0;
        $altcoinIndex = 0;
        $timestamp = time();
        $coins = Markets::all();
        $list = [];
        //push all coins from markets table into the list array
        foreach($coins as $coin){
            array_push($list, $coin->name);
        };
        
        $obj = json_decode($json, true);
        foreach ($obj as $key => $val) {
            foreach ($list as $x) {
                $weight = 1;
                if($val['id'] == 'bitcoin') $bitcoinprice = $val['price_usd'];
                if($val['id'] == $x){
                    $totalcap += $val['market_cap_usd'];
                    $price = $val['price_usd'];
                    $altcoinIndex += $val['price_usd'] * $weight;

                    $tickdata = new Tickdata([
                        'timestamp' => $timestamp,
                        'value' => $price,
                        'weight' => $weight,
                        'altcoin' => $x,
                    ]);

                    $market = Markets::where('name', $x)->first();
                    $market = Markets::find($market->id);
                    
                    $market->tickdata()->save($tickdata);
                    }
                }
            }

            $altcoinIndex = round($altcoinIndex, 2);

            $index = new AltIndex;
            $index->price = $altcoinIndex;
            $index->timestamp = $timestamp;
            $index->save();
            $this->info('Altcoin index save success');
     }

}