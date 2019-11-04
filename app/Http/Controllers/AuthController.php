<?php

namespace App\Http\Controllers;

use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Mail\MailNotify;
use Redirect,Response,Config;
use Mail;

class AuthController extends Controller
{
    protected $user;
    function __construct(User $user)
    {
        $this->middleware('user');
        $this->middleware('alert');
        $this->user = $user;
    }
    function verifiMail($id,$verifi){
        $verifi_confirm = $verifi;
        $user = $this->user->find($id);
        $verifi = $user->check->first();
        $verifi->verifi;
        if ($verifi->verifi == $verifi_confirm){
            $user->email_verified_at = now();
            $user->save();
            $user->check()->delete();
        }
    }
    public function store(RegisterRequest $request)
    {
        $data = $request->validated();
        $this->user->name = $data['name'];
        $this->user->email = $data['email'];
        $this->user->password = Hash::make($data['password']);
        $this->user->birthday = $data['birthday'];
        $this->user->tel = $data['tel'];
        $this->user->address = $data['address'];
        $checkUser = $this->user->save();
        if ($checkUser){
            $verifi = Str::random(6);
            $email['verifi'] = $verifi;
            $email['id'] = $this->user->id;
            $this->sendEmail($email);
            $this->user->check()->create(['verifi' => $verifi]);
            $this->user->role()->attach(1);
            return redirect(route('show_login'))->with('result', 'Sign up successful');
        }else{
            return redirect(route('show_register'))->with('result', 'Sign up fail');
        }
    }
}
