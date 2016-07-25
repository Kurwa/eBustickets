<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Busdocument extends Model
{
    protected $table = 'bus_documents';
    protected $fillable = [
        'buses_id',
        'documents_id',
        'images',
        'companies_id'
    ];
    /*BUSES*/
    public function busses()
    {
        return $this->belongsTo('App\Model\Buse','buses_id');
    }
    /*DOCUMENTS*/
    public function document()
    {
        return $this->belongsTo('App\Model\Document','documents_id');
    }
    /*Companies*/
    public function companies()
    {
        return $this->belongsTo('App\Model\Companies','companies_id');
    }
}