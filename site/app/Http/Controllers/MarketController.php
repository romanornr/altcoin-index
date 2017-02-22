<?php

namespace App\Http\Controllers;
use App\Markets;
use Eloquent;
use Illuminate\Http\Request;

class MarketController extends Controller
{
    /**
     * Display a listing of the resources
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $markets = Markets::all();
        return response()->json($markets);
    }

   /**
    * Fetch a record by id
    *
    * @param id
    *
    * @return mixed
    */
    public function getMarket($name)
    {
        $markets = Markets::where('name', $name)->first();
        return response()->json($markets);
    }

    public function find($name)
    {
        $markets = Markets::where('name', $name)->first();
        return response()->json($markets);
    }
    
}
