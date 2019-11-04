<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    protected $user;
    function __construct(User $user)
    {
        $this->user = $user;
        $this->middleware('alert');
    }
    function showProfile($id){
        $data = $this->user->where('id', $id)->first();
        $data['user'] =[
            'Full name' => $data->name,
            'Birthday' => $data->birthday,
            'Phone number' => $data->tel,
            'Address' => $data->address
        ];
        return  view('home.profile', $data);

    }

}
