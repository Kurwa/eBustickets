<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'role_users';

    public function user()
    {
        return $this->belongsTo('App\Model\User');
    }
    public function role()
    {
        return $this->belongsTo('App\Model\Role');
    }
}
