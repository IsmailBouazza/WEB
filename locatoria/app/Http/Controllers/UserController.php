<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application account.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function show(User $user)
    {

        return view('user.account', compact('user'));
    }

    public function index()
    {


        $users = User::all();

        return view('admin.users', [
            "users"=>$users
        ]);
    }


    public function delete(User $user)
    {
        AdminController::loginverification();

        $user->delete();

        return redirect('/users');
    }

}
