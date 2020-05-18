<?php

namespace App\Http\Controllers;

use App\Item;
use App\Reservation;
use App\User;
use Auth;
use Illuminate\Http\Request;

class ReservationController extends Controller
{

    public function index(){
        
        if(!Auth::user()){
            return redirect('/login');
        }

        $user_id = Auth::user()->id;
        $user = User::find($user_id);

        return view('reservation.index')->with('user',$user);
    }

    

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


    public function reservation(){


        if(!Auth::user()){
            return redirect('/login');
        }
        $user_id = Auth::user()->id;
        $Myreservations = Reservation::all();
        $user = User::find($user_id);
        $user->reservations()->get();
        return view('reservation.reservations')->with([
            'reservations'=> $Myreservations,
            'user'=>$user,
        
        ]);
           
    }

    public function request(){
        
        if(!Auth::user()){
            return redirect('/login');
        }
        
        $id = Auth::user()->id;

        $reservations = Reservation::where('user_owner_id',$id)->get();
        $user = User::find($id);

        $reservations2 = $reservations->map(function ($reservation , $key){

            $reservation->user_id = User::find($reservation->user_id);
            return $reservation;
        });


        return view('reservation.requests' , [

            'user' => $user,
            'reservations'=>$reservations2,
        ]);

    }

    public function approval($id)
    {
        $reservation = Reservation::find($id);
       
        if ($reservation->status == 0)
        {
            $reservation->status = 1;
            $reservation->save();
            
        } else {
            
        }
        return redirect()->back();
    }

    public function destroy($id){
        $reservation = Reservation::find($id);
        $reservation->delete();
        return redirect()->back();

    }

}
