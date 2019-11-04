<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Check extends Model
{
    protected $fillable = [
        'user_id', 'verifi', 'otp',
    ];
    protected $table = 'checks';
    public $timestamps = false;
    public $incrementing = false;
    public function user(){
        return $this->belongsTo('App\Model\User');
    }
}
