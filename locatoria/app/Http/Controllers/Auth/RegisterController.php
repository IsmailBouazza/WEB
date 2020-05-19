<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone' => ['required', 'string', 'max:10', 'unique:users'],
            'adresse' => ['required', 'string', 'max:255'],
            'city' => ['required', 'string', 'max:255'],
            'zip_code' => ['required', 'string', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'bio' => ['required', 'string', 'max:255'],
            'picture' => 'max:2048',

        ]);


    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        $user = User::create([

            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'phone' => $data['phone'],
            'adresse' => $data['adresse'],
            'city' => $data['city'],
            'zip_code' => $data['zip_code'],
            'bio' => $data['bio'],
            'picture' => '',

        ]);

        if($data['picture']){

            $extension = $data['picture']->getClientOriginalExtension();
            $imageName = $user->id.'_picture'.'.'.$extension;
            $picturePath = $data['picture']->storeAs($user->id, $imageName,'public');
            $picture = Image::make(public_path("storage/{$picturePath}"))->resize(250,200);

            $user->picture = $picturePath;
            $user->save();
        }

        return $user;

    }
}
