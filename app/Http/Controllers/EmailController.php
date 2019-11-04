<?php

namespace App\Http\Controllers;

use App\Mail\MailNotify;
use Illuminate\Http\Request;
use Redirect,Response,DB,Config;
use Mail;
class EmailController extends Controller
{
    public function sendEmail()
    {

        $user = [
            'address' => 'nghiacka@gmail.com',
            'name'    => 'nghia',
        ];
        Mail::to('nghiacka@gmail.com')->send(new MailNotify());
    }
}
