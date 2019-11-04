<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = 'banks';
    public $timestamps = false;
    function receiverAccount(){
        return $this->hasMany('App\Model\ReceiverAccount');
    }
}
