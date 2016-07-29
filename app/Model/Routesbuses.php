<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Routesbuses extends Model
{
    protected $table = 'routesbuses';
    /**
     *  Fillable
     */
    protected $fillable = [
        'buses_id',
        'routes_id',
        'status'
    ];

    public function routes()
    {
        return $this->belongsTo('App\Model\Route','routes_id');
    }

    public function buses()
    {
        return $this->belongsTo('App\Model\Buse','buses_id');
    }
}
