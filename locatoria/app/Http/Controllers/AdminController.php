<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\View\Factory;
use Auth;
use App\Item;
use App\Reservation;
use App\ItemPremium;



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

        $users = User::all();
        $items = Item::all();
        $reservations = Reservation::all();
        $premium = ItemPremium::where('status', 1)->get();
        //return view('admin');
        return View::make('admin.admin')->with([
            'users'=> $users,
            'items'=> $items,
            'reservations'=> $reservations,
            'premium'=> $premium,
            
            ]);
    }

    //all items 

    public function index(){

        $items = Item::all()->sortByDesc('created_at');
        return view('admin.items')->with('items', $items);
    }


}
