<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ReceiverAccount extends Model
{
    protected $table = 'receiver_accounts';
    public $timestamps = false;
    function bank(){
        return $this->belongsTo('App\Model\Bank');
    }
}
