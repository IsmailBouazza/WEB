<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application account.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
    }

    public function create(){
        
    }

    public function store(){
        
    }

    public function show(User $user)
    {
        return view('user.account', compact('user'));
    }

    public function edit(User $user)
    {
        
        return view('user.edit', compact('user'));
    }

    public function update(User $user)
    {
        $data = request()->validate([
            'name' => '',
            'bio' => '',
            'email' => '',
            'phone' => '',
            'adresse' => '',
            'zip_code' => '',
            'city' => '',
        ]);


     
    $user->update($data);

    return redirect("/user/{$user->id}");

    }

    
    public function destroy($id)
    {
        //
    }
}
