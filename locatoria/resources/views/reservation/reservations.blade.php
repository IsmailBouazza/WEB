@extends('layouts.app')
<!-- link css -->
<link href="{{ asset('css/reservation.css') }}" rel="stylesheet">
<link href="{{ asset('css/account.css') }}" rel="stylesheet">
<!--  -->
@section('content')

<br><br><br>
    
    <div class="nav">
        <div class="mini-block">
            <img src="{{asset('storage/'.$user->picture)}}" style="width:150px; height:150px; border-radius:50%; margin-left:100px;">
            <div class="s-nav">
                <a href="{{ url('/user/'.$user->id) }}"><button type="button" class="butt btn btn-secondary"><i class="fas fa-home" style="margin-right: 7px;"></i>My Profile</button></a>
                <a href="#"><button type="button" class="butt btn btn-secondary"><i class="fas fa-envelope-open-text" style="margin-right: 7px;"></i>My messages</button></a>
                <a href="{{ url('/items/myitems/'.$user->id) }}"><button type="button"  class="butt btn btn-secondary"><i class="fas fa-shopping-cart" style="margin-right: 7px;"></i>My items</button></a>
                <a href="{{ url('/Reservation') }}"><button type="button"  class="butt btn btn-secondary"><i class="fas fa-edit" style="margin-right: 7px;"></i>Reservations</button></a>
                <a href="#"><button type="button" class="butt btn btn-secondary"><i class="fas fa-heart" style="margin-right: 7px;"></i>My favorite</button></a>
            </div>
        </div>
    </div>

    <div class="reservations">
        @if($user->reservations->count() > 0)
            @foreach($user->reservations as $reservation)
            
                <div class="res-container">
                    <div class="card flex1" style="width: 18rem;">
                        <a href="{{url('/Item/'.$reservation->item->id)}}">
                            <img src="{{asset('/storage/' .$reservation->item->thumbnail_path )}}" class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" role="img"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em"></text>
                        </a>
                    </div>
                    <div class="flex2">
                        <div style="width:100%; height:10px; text-align:center;">
                            <span style="font-size: 1.5em"><u>Item Info</u><br></span>
                        </div>
                    </div>
                    <div class="flex3" >
                        <div style="width:100%; height:10px; text-align:center;">
                            <span style="font-size: 1.5em"><u>Date Dispo</u><br></span>
                            <span style="font-size: 1em">
                                Start : {{$reservation->date_start}}<br>
                                End : {{$reservation->date_end}}
                            </span>
                        </div>
                        <div style="width:100%; font-size: 1.5em; height:10px; text-align:center; margin-top:80px">
                            <u>Total Price</u><br>
                            <small style="font-size: 0.8em;">{{$reservation->total_price}} $</small>
                        </div>
                    </div>
                    <div class="flex4">
                        @if($reservation->status == 0)
                            <span style="color: #000000; font-weight: bold;">Your reservation is not accepted yet !!</span><br>
                            <small>Send a reminder</small>
                            <button type="button" class="btn btn-primary">Reminder</button>
                            <button type="button" class="btn btn-danger" style="margin-top: 6px">Cancel Reservation</button>
                        @else
                            <span style="color: #000000; font-weight: bold;">Your reservation has already started !!</span>
                        @endif
                    </div>
                </div>

            @endforeach
        @else
            <div class="msg">
                <p class="msg">No Reservations found</p>
                <small>Sorry try latter !!</small> 
            </div>
        @endif
    </div>
@endsection