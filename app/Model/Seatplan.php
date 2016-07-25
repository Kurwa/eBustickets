<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Seatplan extends Model
{
    protected $fillable = [
        'firstletter',
        'lastletter',
        'leftseatrow',
        'rightseatrow',
        'buses_id',
    ];
}
