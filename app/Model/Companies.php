<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Companies extends Model
{
    protected $table = 'companies';

    protected  $fillable = [
        'name',
        'slug',
        'address',
        'email',
        'telephone',
        'ownername',
        'ownerphone',
    ];
}
