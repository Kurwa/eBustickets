<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Buse extends Model
{
    protected $fillable = [
        'bus_number',
        'model',
        'manufacture',
        'countrymanufacture',
        'yearmanufacture',
        'types_id',
        'noofseats',
        'companies_id',
        'insert_by',
        'bus_image'
    ];

    public function type()
    {
        return $this->belongsTo('App\Model\Type','types_id');
    }
}
