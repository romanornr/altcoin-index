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
}
