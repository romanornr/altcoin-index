<?php

namespace App\Http\Controllers;
use App\Index;
use Eloquent;
use Illuminate\Http\Request;
use Illuminate\Console\Scheduling\Schedule;

class IndexController extends Controller
{
    public function index(Schedule $schedule)
    {
        $schedule->call(function (){ 
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
             })->everyMinute();

           // return response()->json([
              //  'index' => $altcoinIndex,
               // 'timestamp' =>$timestamp]);
         
     }

}