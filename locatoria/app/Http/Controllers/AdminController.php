<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\View\Factory;
use Auth;


class AdminController extends Controller
{
    //

    public function loginverification(){

        if ( ! Auth::guard('admin')->check()) {

            dd("you can not access");
        }
    }


    public function show()
    {
        $this->loginverification();
        //return view('admin');
        return View::make('admin.admin');
    }

    public function delete(User $user)
    {

        //ddd($user);
        $user->delete();

        return view('admin');
    }

    public function cc(Factory $view)
    {

        // return view::make('admin');
        // return view('admin');
        return $view->make('admin');

    }

}
