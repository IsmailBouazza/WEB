<?php

namespace App\Http\Controllers;

use App\Item;
use App\Notifications\ReservationRequest;
use App\Reservation;
use App\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

        $var = $res->save();

        User::find($res->user_owner_id)->notify(new ReservationRequest($res->id)) ;

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
        $user->reservationsresponse()->get();
        return view('reservation.reservations')->with([
            'reservations'=> $Myreservations,
            'user'=>$user,

        ]);
    }

    public function announces(){

        if(!Auth::user()){
            return redirect('/login');
        }
        $reservations = Auth::user()->reservationsrequest;

        if ($reservations->count() > 0 ){
        // map   : you should return this collection because announces is set as viewd
        //       : you shoud return information about the user sendind the request
        // sortBy : the first one will be unviewed anounces
        $reservations2 = $reservations->map(function ($reservation){

                    $reservation->user_id = User::find($reservation->user_id);

                    // this is the notification associated with this reservation
                    $notification = Auth::user()->notifications()->where('data->reservation_id',$reservation->id)->first();


                    $reservation->read = $notification->read() ? true : false;

                    $notification->markAsRead();

                    return $reservation;
            })
            ->sortBy(function($reservation){
                    return $reservation->read;
            })
            ->values();

        }else{
            $reservations2 = $reservations;
        }

        // here I returned the requests as unviewed cause we need to separate it later
        return view('reservation.requests' , [
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

        $count = Auth::user()->unreadNotifications->count();

        $count1 = request()->user()->unreadNotifications
                                    ->where('type','App\Notifications\ReservationRequest')
                                    ->count(); // count the requests that i receive from other clients

        $count2 = request()->user()->unreadNotifications
                                    ->where('type','App\Notifications\ReservationResponse')
                                    ->count(); // count the response that i receive from other landlords

        $data = array(
                        'count' => $count,
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
