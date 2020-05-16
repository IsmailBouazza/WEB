@extends('layouts.app')
<!-- link css -->
<link href="{{ asset('css/reservation.css') }}" rel="stylesheet">
<link href="{{ asset('css/account.css') }}" rel="stylesheet">
<!--  -->
@section('content')

<br><br><br>
    
    <div class="nav">
        <div class="mini-block">
            <img src="{{asset('storage/'.$user->picture)}}" style="width:150px; height:150px; border-radius:50%; margin-left:150px;">
            <div class="s-nav" style="margin-right: 35%">
                <a href="{{ url('/user/'.$user->id) }}"><button type="button"  class="butt btn btn-secondary" style="width:100px; border-bottom:none;"><i class="fas fa-arrow-left" style="font-size: 2em;"></i></button></a>
                <a href="{{ url('/MyResrvations') }}"><button type="button"  class="butt btn btn-secondary"><i class="fas fa-heart" style="margin-right: 7px;"></i>My Reservations</button></a>
                <a href="{{ url('/MyRequests') }}"><button type="button" class="butt btn btn-secondary"><i class="fas fa-thumbs-up" style="margin-right: 7px;"></i>Requests</button></a>
            </div>
        </div>
    </div>


@endsection