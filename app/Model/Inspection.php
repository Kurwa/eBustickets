<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Inspection extends Model
{
    protected $fillable = [
        'inspectionsdate',
        'buses_id',
        'inspected_by',
        'kilometer_run',
        'companies_id'
    ];

    public function buses()
    {
        return $this->belongsTo('App\Model\Buse','buses_id');
    }
    public function inspection()
    {
        return $this->hasMany('App\Model\Inspectionspart','inspections_id');
    }
}
