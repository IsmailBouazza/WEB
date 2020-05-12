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
        $this->middleware('auth');
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
        if(Auth::user()->id == $user->id){
            return view('user.account', compact('user'));
        }
        else{
            return view('erreur.erreur');
        }
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
            'password' => '',
            'picture' => '',
        ]);


        if(request('picture')){

            $picturePath = request('picture')->store('user','public');
            $picture = Image::make(public_path("storage/{$picturePath}"))->fit(250,200);
            $picture->save();

            $user->update(array_merge(
                $data,
                ['picture' => $picturePath]
            ));
        }

        else{
            $user->update($data);
        }
        
        
        
        

        return redirect("/user/{$user->id}");

    }

    


    public function delete(User $user)
    {
        AdminController::loginverification();

        $user->delete();

        return redirect('/users');
    }

}
