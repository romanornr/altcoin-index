<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Index;
use Eloquent;
use Illuminate\Http\Request;

class AltIndex extends Command
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
        $list = ["ethereum", "litecoin", "monero", "dash", "ethereum-classic","maidsafecoin","nem","augur","factom","zcash"];
        $totalcap = 0;
        $altcoinIndex = 0;
        
        $obj = json_decode($json, true);
        foreach ($obj as $key => $val) {
            foreach ($list as $x) {
                if($val['id'] == 'bitcoin') $bitcoinprice = $val['price_usd'];
                if($val['id'] == $x) $totalcap += $val['market_cap_usd'];
                if($val['id'] == $x) $altcoinIndex += $val['price_usd'] * 1;
                }
            }

            $altcoinIndex = round($altcoinIndex, 2);
            $timestamp = time();

            $index = new Index;
            $index->price = $altcoinIndex;
            $index->timestamp = $timestamp;
            $index->save();
            $this->info('Altcoin index save success');
     }

}