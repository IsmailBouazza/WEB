<?php

namespace App\Http\Controllers;

use App\Item;
use App\Reservation;
use App\User;
use Auth;
use DateTime;
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
        // better to redirect to /Myreservations
        return redirect('/home');

    }


    public function reservations(){


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

    public function requests(){

        if(!Auth::user()){
            return redirect('/login');
        }

        $id = Auth::user()->id;

        $reservations = Reservation::all()->where('user_owner_id',$id)->sortBy('status');
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

    //accept a reservation
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


    //refuse(delete) a reservation
    public function destroy($id){

        $reservation = Reservation::find($id);
        $reservation->delete();
        return redirect()->back();

    }

   
    public  function  userCancel($id) {

       if(Auth::user()){


                $reservation = Reservation::find($id);

                $start_date= new DateTime($reservation->date_start);

                $today = date('Y-m-d');
                $d2= new DateTime($today);

                $interval= $start_date->diff($d2);
                $hoursleft = $interval->days * 24;
                if($hoursleft<=24){
                    echo 'this reservation will start within 24h, you can not cancel it.for more information, please contact the owner';
                }
                else {
                   self::destroy($id);
                   //send notification to the owner
                    echo 'your reservation has been cancled!';

                }

        }
       // dd($date);
    }

}
