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

    public function show(User $Users)
    {
        return view('user.account', compact('Users'));
    }

    public function edit(User $Users)
    {
        
        return view('user.edit', compact('Users'));
    }

    public function update(User $Users)
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


     
    $Users->update($data);

    return redirect("/user/{$Users->id}");

    }

    
    public function destroy($id)
    {
        //
    }
}
