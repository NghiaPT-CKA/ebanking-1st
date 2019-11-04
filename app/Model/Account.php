<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    public $timestamps = false;
    public $incrementing = false;
    protected $table = 'accounts';
    protected $fillable = [
        'user_id', 'id', 'ballance', 'category_id'
    ];
    public function user(){
        return $this->belongsTo('App\Model\User');
    }
    public function category(){
        return $this->belongsTo('App\Model\Category');
    }

}
