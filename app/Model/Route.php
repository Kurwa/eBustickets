<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    /**
     *  Fillable
     */
    protected $fillable = [
        'initial',
        'destination',
        'status',
        'companies_id',
    ];
}
