<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        'tickets_number','bookings_id','companies_id'
    ];
    public function booking()
    {
        return $this->belongsTo('App\Model\Booking','bookings_id');
    }
}
