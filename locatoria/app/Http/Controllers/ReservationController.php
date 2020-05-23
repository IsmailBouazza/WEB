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
        $res->user_read = 1;
        $res->user_owner_read = 0;
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

    public function announces(){

        if(!Auth::user()){
            return redirect('/login');
        }
        $reservations = Auth::user()->announces;

        // map 1 : you should return this collection because announces is set as viewd
        // map 2 : you shoud return information about the user sendind the request
        // sortBy : the first one will be unviewed anounces
        $reservations2 = $reservations->map(function ($reservation , $key){
                    if(! $reservation->announceviewed()){
                        $reservation->announceread();
                        $reservation->user_owner_read = 0;
                    }
                    return $reservation;
            })
            ->map(function ($reservation){

                    $reservation->user_id = User::find($reservation->user_id);
                    return $reservation;
            })
            ->sortBy(function($reservation){
                    return $reservation->user_owner_read;
            })
            ->values();


        // here I returned the anounces as unviewed cause we need to separate it later
        return view('reservation.announces' , [
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

    public function reservationsajaxfetch()
    {

        $count1 = request()->user()->reservations->where('user_read',0)
                                                    ->where('status',0)
                                                    ->count(); // count my reservation

        $count2 = request()->user()->announces->where('user_owner_read',0)
                                                ->where('status',0)
                                                ->count(); // count my own announce

        $data = array(
                        'count' => $count1+$count2,
                        'count1' => $count1,
                        'count2' => $count2
                    );

        return $data;

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

    }

}
