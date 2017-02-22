<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tickdata extends Model
{

   /**
    * table from customer.
    *
    * @var
    */
    protected $table = 'tickdata';

    /**
     * no Laravel framework timestamps for ticketdata.
     *
     * @var
     */
    public $timestamps = false;

    protected $guarded = [];

    public function index()
    {
        return $this->belongsTo('App\AltIndex','timestamp');
    }

    public function markets()
    {
        return $this->belongsTo('App\Markets','name');
    }
}