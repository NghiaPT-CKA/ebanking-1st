<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';
    public $timestamps = false;
    function user(){
        return $this->belongsToMany('App\Model\User');
    }
}
