<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Index extends Model
{

   /**
    * table from customer.
    *
    * @var
    */
    protected $table = 'index_table';

   /**
    * guard id
    * protection for mass assignment vulnerability.
    *
    * @var
    */
    protected $fillable = ['id'];

    public $timestamps = false;
}