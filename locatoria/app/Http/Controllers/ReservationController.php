<?php

namespace App\Http\Controllers;

use App\Item;
use App\Reservation;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{


    public function store(){

        $res = new Reservation();

        $res->date_start = request('date_start');
        $res->date_end = request('date_end');
        $res->total_price = request('total_price');
        $res->item_id = request('item_id');
        $res->user_id = Auth::user()->id;
        $res->user_owner_id = Item::find(request('item_id'))->user->id;

        $res->save();

        return redirect('/home');

    }


    public function index(){

        $reservations = Reservation::where('user_owner_id',Auth::user()->id)->get();

        $reservations2 = $reservations->map(function ($resevation , $key){


            $resevation->user_id = User::find($resevation->user_id);

            return $resevation;
        });

        //dd($reservations2);

        return view('reservation.reservations' , [

            'reservations'=>$reservations2
        ]);

    }


}
