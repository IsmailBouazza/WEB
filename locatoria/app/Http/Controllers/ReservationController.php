<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\User;
use Auth;

class ReservationController extends Controller
{

    public function index()
    {
        $user_id=Auth::user()->id;
        $reservations = Reservation::all();
        $user = User::find($user_id);
        $user->reservations()->get();
        return view('reservations.myreservations')->with([
            'reservations' => $reservations,
            'user' => $user,
           
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([

            'total_price' => 'required|numeric',
            'dispo_starts' => 'required|date',
            'dispo_ends' => 'required',
        ]);

        $reservation =  new Reservation;

        $reservation->user_id = Auth::user()->id;
        $user_id = $reservation->user_id;
        $user = User::find($user_id);
        $reservation->item_id = $user->items()->id->get();
        $reservation->total_price=$request->total_price;
        $reservation->dispo_starts=$request->dispo_starts;
        $reservation->dispo_ends=$request->dispo_ends;

        $reservation->save();

        

        return redirect('/Reservation');


       
    }
    /*
    $user_id (client)
    $user_owner_id (partenaire)


    <form id="checkoutform" action="{{ url('Reservation') }}" method="POST" style="display: none">
        <input type="hidden" name="date_start" id="start">
        <input type="hidden" name="date_end" id="end">
        <input type="hidden" name="total_price">
        <input type="hidden" name="item_id" value="{{$item->id}}">
    </form>
    */

}
