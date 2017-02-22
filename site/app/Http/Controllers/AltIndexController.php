<?php

namespace App\Http\Controllers;
use App\AltIndex;
use Eloquent;
use Illuminate\Http\Request;

class AltIndexController extends Controller
{

    /**
     * Display a the first index price
     *
     * @return   \Illuminate\Http\Response
     */
    public function index()
    {
        $altcoinIndex = AltIndex::first();
        return response()->json($altcoinIndex);
     }

    /**
     * Display a listing of the resource
     *
     * @return   \Illuminate\Http\Response
     */
     public function history()
     {
         $altcoinIndex = AltIndex::orderBy('timestamp')->get();
         return response()->json($altcoinIndex);
     }
}