<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Routespoint extends Model
{
    protected $fillable = [
        'routes_id',
        'name',
        'fares'
    ];
}
