<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;

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
  

    public function index()
    {

        $users = User::all();

        return view('admin.users', [
            "users"=>$users
        ]);
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
            'picture' => '',
        ]);


        if(request('picture')){

            $picturePath = request('picture')->store('user','public');
            $picture = Image::make(public_path("storage/{$picturePath}"))->fit(250,200);
            $picture->save();

        }

        
        $user->update(array_merge(
            $data,
            ['picture' => $picturePath]
        ));
        
        

        return redirect("/user/{$user->id}");

    }

    


    public function delete(User $user)
    {
        AdminController::loginverification();

        $user->delete();

        return redirect('/users');
    }

}
