<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'users';
    public $timestamps = false;
    public function check(){
        return $this->hasMany('App\Model\Check');
    }
    public function account(){
        return $this->hasMany('App\Model\Account');
    }
    function role(){
        return $this->belongsToMany('App\Model\Role', 'role_user', 'user_id', 'role_id');
    }
}
