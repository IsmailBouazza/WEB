<?php

namespace App\Http\Controllers;

use App\User;
use App\Favorite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    protected $cid;
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
        $users = User::withTrashed()->get();

        return view('admin.users', [
            "users"=>$users
        ]);
    }

    public function show(User $user)
    {
        if(!Auth::user()){
            return redirect('/login')->with('error', 'unauthorized page');
        }
        else{
            if(Auth::guard('admin')->check() || Auth::user()->id == $user->id){
                return view('user.account', compact('user'));
            }
            return redirect('/user/'.Auth::user()->id)->with('error', 'unauthorized page');
        }

    }

    public function edit(User $user)
    {
        if(!Auth::user()){
            return redirect('/login')->with('error', 'unauthorized page');
        }
        else{
            if(Auth::user()->id !== $user->id){
                return redirect('/user/'.Auth::user()->id)->with('error', 'unauthorized page');;
            }
            return view('user.edit', compact('user'));
        }

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

            Storage::disk('public')->delete($user->picture);

            $extension = request('picture')->getClientOriginalExtension();
            $imageName = $user->id.'_picture'.'.'.$extension;
            $picturePath = request('picture')->storeAs($user->id, $imageName,'public');
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

    //  this function for delete and recover
    public function block()
    {
        AdminController::loginverification();

        $user = User::withTrashed()->where('id', request('subject'))->first();

        if($user->trashed()){

            $user->restore();
        }
        else{
            $user->delete();
        }

    }

    //  this function return the button of the admin
    public function usersajaxfetch()
    {

        AdminController::loginverification();

        $user = User::withTrashed()->where('id', request('view'))->first();

        $output = '';

        if($user->trashed()){

            $output = "<button type=\"submit button unblock\" class=\"btn btn-labeled btn-info\">
                <span ><i class=\"fas fa-trash-restore\"></i></span> Unblock</button><input type=\"hidden\" id=\"custId\" name=\"subject\" value=\"".request('view')."\">";
        }else {

            $output = "<button type=\"submit button block\" class=\"btn btn-labeled btn-danger\">
                <span ><i class=\"fas fa-trash-alt\"></i></span> Block</button><input type=\"hidden\" id=\"custId\" name=\"subject\" value=\"".request('view')."\">";
        }

        $data = array( 'notification' => $output);

        return $data;

    }



}
