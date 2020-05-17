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

        @forelse($reservations as $reservation)

            <div class="res-container" style="width: 60%; margin-left:20%">
                <div class="card flex1" style="width: 150px; height: 150px; border-radius: 50%">
                    <img src="{{asset('/storage/' .$reservation->item->thumbnail_path )}}" style="border-radius: 50%" class="bd-placeholder-img card-img-top" width="150px" height="150px" xmlns="http://www.w3.org/2000/svg" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" role="img">
                </div>
                <div class="flex2" style="width: 150px;">
                    <div style="width:100%;  text-align:center;">
                        <span style="font-size: 1.5em"><u>Name :</u><br></span>
                        <span style="font-size: 1em">{{ $reservation->user_id->name }}<br><br></span>
                        <span style="font-size: 1.5em"><u>Email :</u><br></span>
                        <span style="font-size: 1em">{{ $reservation->user_id->email }}<br></span>
                    </div>
                </div>
                <div class="flex3" style="width: 150px;">
                    <div style="width:100%; height:10px; text-align:center;">
                        <span style="font-size: 1.5em"><u>Date Dispo :</u><br></span>
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
                        <br>
                        <span style="color: #000000; font-weight: bold; margin-top: 10px">Accept the request ?</span><br><br>
                        
                        <button type="button" class="btn btn-primary">Accept</button>
                        <button type="button" class="btn btn-danger" >Refuse</button>
                    @else
                        <span style="color: #000000; font-weight: bold;">The reservation is already accepted !!</span>
                    @endif
                </div>
                
                @empty

                <div class="msg">
                    <p class="msg">No requests found</p>
                    <small>Sorry try latter !!</small> 
                </div>

            </div>
        @endforelse


        </div>
    </div>

@endsection
