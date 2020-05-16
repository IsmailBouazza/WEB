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
                <a href="{{ url('/MyResrvations') }}"><button type="button"  class="butt btn btn-secondary"><i class="fas fa-heart" style="margin-right: 7px;"></i>My Reservations</button></a>
                <a href="{{ url('/MyRequests') }}"><button type="button" class="butt btn btn-secondary"><i class="fas fa-edit" style="margin-right: 7px;"></i>My requests</button></a>
            </div>
        </div>
    </div>