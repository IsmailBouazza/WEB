@extends('layouts.app')
<!-- link css -->
<link href="{{ asset('css/premium.css') }}" rel="stylesheet">
<!--  -->
@section('content')
<div class="header-box">
    <div class="float box1">
        <div class="float">
            <img src="{{asset('images/premium-logo.png')}}" style="border-color: black; width:200px; height:200px; margin-top:30px; margin-left:5%;">
        </div>
        <div class="float">
            <p class="text">
                HERE ARE THE<br>
                <span style="font-size: 3em; font-weight:bold">Premiums Ads</span><br>
                Unique items to rent, displayed  by owners from all over the world.
            </p>
        </div>
    </div>
    <div class="float box2">
        <img src="{{asset('images/header.jpg')}}" >
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
    <a class="nv navbar-brand" href="{{ url('/Category/4') }}" style="margin-left: 8px">Home-Made</a>
    <a class="nv navbar-brand" href="{{ url('/Category/1') }}" style="margin-left: 8px">Car Equipment</a>
    <a class="nv navbar-brand" href="{{ url('/Category/2') }}" style="margin-left: 8px">Clothes</a>
    <a class="nv navbar-brand" href="{{ url('/Category/3') }}" style="margin-left: 8px">High tech / Multimedia</a>
    <a class="nv navbar-brand" href="{{ url('/Category/5') }}" style="margin-left: 8px">House Equipment</a>
    <a class="nv navbar-brand" href="{{ url('/Category/6') }}" style="margin-left: 8px">Pets</a>
    <a class="nv navbar-brand" href="{{ url('/Category/7') }}" style="margin-left: 8px">Services</a>
    <a class="nv navbar-brand" href="{{ url('/Category/9') }}" style="margin-left: 8px">Vehicles</a>
    <a class="nv navbar-brand" href="{{ url('/Category/8') }}" style="margin-left: 8px">Sport Equipment</a>
    <div class="collapse navbar-collapse" id="navbarsExample09">
        <ul class="navbar-nav mr-auto">
        </ul>
        <form class="form-inline my-2 my-md-0">
            <input class="form-control" type="text" placeholder="Search" aria-label="Search">
        </form>
    </div>
</nav>

<div class="album ">

    @if($items_premium ?? ''->count() > 0)
      @foreach($items_premium ?? '' as $item)

      <div id="card" class="card" style="width: 18rem;">
        <img class="card-img-top" src="{{asset('/storage/' .$item->thumbnail_path )}}" alt="Card image cap" style="width: 100%; height:250px">
        <div class="card-body">
          <h5 class="card-title">{{$item->title}}</h5>
          <p class="card-text">{{$item->description}}</p>

          <a href="{{ url('Item/'.$item->id) }}" class="btn btn-primary">view details</a>
        </div>
      </div>
    
      @endforeach

    @else
      <div class="msg">
        <p class="msg">No items added yet</p>
        <small>Sorry try latter !!</small> 
      </div>
    @endif
       
</div>