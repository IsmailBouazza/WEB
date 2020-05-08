<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\View\Factory;
use Auth;


class AdminController extends Controller
{


    // a function to prevent users other than the admin to access this controller
    public static function loginverification(){

        if ( ! Auth::guard('admin')->check()) {

            return redirect("login/admin")->send();
        }
    }

    // dashboard of the admin
    public function show()
    {
        self::loginverification();
        //return view('admin');
        return View::make('admin.admin');
    }


}
