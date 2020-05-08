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

    public function show()
    {
        if ( ! Auth::guard('admin')->check()) {

            dd("you can not access");
        }
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
