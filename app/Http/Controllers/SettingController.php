<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ChangePasswordRequest;
use App\Model\User;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;


class SettingController extends Controller
{
    protected $user;
    function __construct(User $user)
    {
        $this->middleware('user');
        $this->middleware('alert');
        $this->user = $user;
    }
    function showSetting(){
        return view('setting.index');
    }
    function showChangePassword(){
        return view('setting.change_password');
    }
    function changePassword(ChangePasswordRequest $request,$id){
        $user = $this->user->where('id',$id)->first();
        if (Hash::check($request->old_password,$user->password)){
            $user->password = Hash::make($request->new_password);
            $user->save();
            return redirect(route('show_change_password'))->with('alert' , 'success,Change Password Is Successul');
        }
        return redirect(route('show_change_password'))->with('alert' , 'error,Change Password Is Fail');
    }
}
