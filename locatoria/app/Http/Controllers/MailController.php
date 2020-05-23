<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Mail\SendMail;
use Auth;


class MailController extends Controller
{
    public function mailsend(){
        
        $user = [
            'name' => Auth::user()->name,
            'email' => Auth::user()->email,
        ];

        return view('emails.thanks')->with('name',$user['name']);
        
    }
}
