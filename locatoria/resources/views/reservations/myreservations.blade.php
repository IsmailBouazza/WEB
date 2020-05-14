@extends('layouts.app')
<!-- link css -->
<link href="{{ asset('css/account.css') }}" rel="stylesheet">
<link href="{{ asset('css/reservation.css') }}" rel="stylesheet">
<!--  -->
@section('content')

<br><br><br>

<div class="nav">
    <div class="mini-block">
        <img src="{{asset('storage/'.$user->picture)}}" style="width:150px; height:150px; border-radius:50%; margin-left:100px;">
        <div class="s-nav">
            <a href="http://localhost/WEB/locatoria/public/user/{{$user->id}}"><button type="button" class="butt btn btn-secondary"><i class="fas fa-home" style="margin-right: 7px;"></i>My Profile</button></a>
            <a href="http://localhost/WEB/locatoria/public/user/{{$user->id}}/edit"><button type="button" class="butt btn btn-secondary"><i class="fas fa-edit" style="margin-right: 7px;"></i>Update Profile</button></a>
            <a href="#"><button type="button" class="butt btn btn-secondary"><i class="fas fa-envelope-open-text" style="margin-right: 7px;"></i>My messages</button></a>
            <a href="http://localhost/WEB/locatoria/public/items/myitems/{{$user->id}}"><button type="button"  class="butt btn btn-secondary"><i class="fas fa-shopping-cart" style="margin-right: 7px;"></i>My items</button></a>
            <a href="#"><button type="button"  class="butt btn btn-secondary"><i class="fas fa-heart" style="margin-right: 7px;"></i>My favorites</button></a>
        </div>
    </div>
</div>

@if($reservations->count() > 0)
@else
    <div class="msg">
        <p class="msg">No reservations found</p>
        <small>Sorry try latter !!</small> 
    </div>
@endif

@endsection