<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Markets extends Model
{
    /**
     * table from customer.
     *
     * @var
     */
    protected $table = 'markets';


    /**
     * guard id
     * protection for mass assignment vulnerability.
     *
     * @var
     */
    protected $fillable = ['id'];

}
