<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //
    public function company()
    {
        return $this->belongsTo('App\Model\Companies','companies_id');
    }
    public function roles()
    {
//        return $this->belongsToMany('App\Model\RoleUser');
        return $this->hasMany('App\Model\RoleUser','user_id');
    }
}
