<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Businsurance extends Model
{
        protected $fillable =  [
            'insurances_id',
            'buses_id',
            'start_date',
            'end_date',
            'cost',
           'companies_id'];

    public function insurance()
    {
        return $this->belongsTo('App\Model\Insurance','insurances_id');
    }

    public function buses()
    {
        return $this->belongsTo('App\Model\Buse');
    }
}
