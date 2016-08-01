<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'users_id',
        'locations',
    ];
    public function agents()
    {
        return $this->belongsTo('App\Model\User','users_id');
    }
}
