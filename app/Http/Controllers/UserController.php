<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Model\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use App\Mail\MailNotify;
use Redirect,Response,Config;
use Mail;
use RealRashid\SweetAlert\Facades\Alert;


class UserController extends Controller
{
    protected $user;
    function __construct(User $user)
    {
        $this->user = $user;
        $this->middleware('alert');
    }

    public function index(){
        if(empty(Session('user'))){
            $data = DB::table('devvn_tinhthanhpho')->get();
            return view('XacThuc.login', ['address' => $data]);
        }else{

            if (Session('user')['role']==1){
                return view('home.home');
            }
            if (Session('user')['role']==2){
                return view('home.home');
            }
            if (Session('user')['role']==3){
                return view('admin.index');
            }

        }

    }
    public function sendEmail($email)
    {
        $data = $email;
        Mail::to($data['email'])->send(new MailNotify($data));
    }
    public function showRegister(){
            $data = DB::table('devvn_tinhthanhpho')->get();
        return view('XacThuc.register', ['address' => $data]);
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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
            $email['email'] = $this->user->email;
            $this->sendEmail($email);
            $this->user->check()->create(['verifi' => $verifi]);
            $this->user->role()->attach(1);
            return redirect(route('show_login'))->with('alert.success', 'Sign up successful');
        }else{
            return redirect(route('show_login'))->with('alert.error', 'Sign up fail');
        }
    }
    function login(LoginRequest $request)
    {
        $this->middleware('user');
        $user = $this->user->where('email',$request['email'])->first();
        if(!empty($user)){
            if(Hash::check($request['password'],$user->password)){
                $data = [
                    'id'   => $user->id,
                    'name' => $user->name,
                    'role' => $user->role->first()->id,
                ];
                  Session(['user'=> $data]);
                  session()->flash('alert','success,login success');
                 return back();
            }else{
                return back()->with('alert','error,password is not correct');
            }
        }else{
            return back()->with('alert','error,email is not correct');
        }

    }
    function logout(Request $request){
        $request->session()->forget('user');
        $request->session()->flush();
        return redirect(route('show_login'));
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
    function verifiMail($id,$verifi){
        $verifi_confirm = $verifi;
        $user = $this->user->find($id);
        $verifi = $user->check->first();
        $verifi->verifi;
        if ($verifi->verifi == $verifi_confirm){
            $user->email_verified_at = now();
            $user->save();
            $user->check()->delete();
            return redirect(route('show_login'))->with('alert', 'success,Email authentication successful');
        }
        return redirect(route('show_login'))->with('alert', 'error,Email authentication fail');
    }
}
