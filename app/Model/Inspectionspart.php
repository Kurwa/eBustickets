<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Inspectionspart extends Model
{
    protected $fillable = [
        'parts_id',
        'results_id',
        'inspections_id',
        'inspected_by',
        'remarks',
    ];
    public $timestamps = false;

    public function inspection()
    {
        return $this->belongsTo('App\Model\Inspection','inspections_id');
    }

    public function parts()
    {
        return $this->belongsTo('App\Model\Buspart','parts_id');
    }
}
