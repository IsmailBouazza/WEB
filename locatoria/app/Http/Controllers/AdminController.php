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

        self::loginverification();

        $items = Item::all()->sortByDesc('created_at');
        return view('admin.items')->with('items', $items);
    }



    public function adminajaxfetch()
    {

        self::loginverification();


        $count = Auth::guard('admin')->user()->unreadNotifications->count();

        $count1 = Auth::guard('admin')->user()->unreadNotifications
                                   ->where('type','App\Notifications\PremiumItem')
                                   ->count(); // count the premium notifications

        $count2 = Auth::guard('admin')->user()->unreadNotifications
                                   ->where('type','App\Notifications\ReportItem')
                                   ->count(); // count the reports notifications

        $data = array(
            'count' => $count,
            'count1' => $count1,
            'count2' => $count2
        );

        return $data;

    }


}
