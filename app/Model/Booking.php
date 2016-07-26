<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
                'firstname',
                'lastname',
                'phonenumber',
                'routes_id',
                'initial',
                'final',
                'buses_id',
                'seat_number',
                'payments_id',
                'amount',
                'dateoftravel',
                'insert_by',
                'companies_id'
            ];
        public function init()
        {
            return $this->belongsTo('App\Model\Routespoint','initial');
        }
        public function ends()
        {
            return $this->belongsTo('App\Model\Routespoint','final');
        }
        public function route()
        {
            return $this->belongsTo('App\Model\Route','routes_id');
        }
        public function buses()
        {
            return $this->belongsTo('App\Model\Buse','buses_id');
        }
        public function user()
        {
            return $this->belongsTo('App\Model\User','insert_by');
        }
        public function payment()
        {
            return $this->belongsTo('App\Model\Payment','payments_id');
        }
}
