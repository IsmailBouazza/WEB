@extends('layouts.app')
<!-- link css -->
<link href="{{ asset('css/reservation.css') }}" rel="stylesheet">
<link href="{{ asset('css/account.css') }}" rel="stylesheet">
<!--  -->
@section('content')

<br><br><br>
    
    <div class="nav" style="margin-left: 10%">
        <div class="mini-block">
            <img src="{{asset('storage/'.$user->picture)}}">
            <div class="s-nav" >
                <a href="{{ url('/user/'.$user->id) }}"><button type="button"  class="butt btn btn-secondary" style="width:100px; border-bottom:none;"><i class="fas fa-arrow-left" style="font-size: 2em;"></i></button></a>
                <a href="{{ url('/MyReservations') }}"><button type="button"  class="butt btn btn-secondary"><i class="fas fa-heart" style="margin-right: 7px;"></i>My Reservations</button></a>
                <a href="{{ url('/MyRequests') }}"><button type="button" class="butt btn btn-secondary"><i class="fas fa-thumbs-up" style="margin-right: 7px;"></i>Requests</button></a>
            </div>
        </div>
    </div>

    <div class="img-res">
        <img src="{{asset('images/reservation.jpg')}}" style="width:400px; height:400px; border-radius: 50%">
        
    </div>
    <div class="img-res" style="margin-top: 150px; text-align:center; width:350px">Welcome to your reservations center</div>

@endsection