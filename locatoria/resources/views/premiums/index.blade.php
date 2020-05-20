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
                <span style="font-size: 2.8em; font-weight:bold">Premium Items</span><br>
                Unique items to rent, displayed  by owners from all over the world.
            </p>
        </div>
    </div>
    <div class="slider float box2" id="main-slider">   
      <div class="slider-wrapper">
        <img src="{{asset('images/ad1.jpg')}}" alt="1" class="slide">
        <img src="{{asset('images/ad3.jpg')}}" alt="2" class="slide">
        <img src="{{asset('images/ad4.jpg')}}" alt="3" class="slide">
        <img src="{{asset('images/ad5.jpg')}}" alt="4" class="slide">
        <img src="{{asset('images/ad6.jpg')}}" alt="5" class="slide">
      </div>
    </div>
</div>

<nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
    <a class="nv navbar-brand" href="{{ url('/Category/4') }}" style="margin-left: 8px">Home-Made</a>
    <a class="nv navbar-brand" href="{{ url('/Category/1') }}" style="margin-left: 8px">Car Equipment</a>
    <a class="nv navbar-brand" href="{{ url('/Category/2') }}" style="margin-left: 8px">Clothes</a>
    <a class="nv navbar-brand" href="{{ url('/Category/3') }}" style="margin-left: 8px">High tech / Multimedia</a>
    <a class="nv navbar-brand" href="{{ url('/Category/5') }}" style="margin-left: 8px">House Equipment</a>
    <a class="nv navbar-brand" href="{{ url('/Category/6') }}" style="margin-left: 8px">Pets</a>
    <a class="nv navbar-brand" href="{{ url('/Category/7') }}" style="margin-left: 8px">Sea Equipment</a>
    <a class="nv navbar-brand" href="{{ url('/Category/9') }}" style="margin-left: 8px">Vehicles</a>
    <a class="nv navbar-brand" href="{{ url('/Category/8') }}" style="margin-left: 8px">Sport Equipment</a>
    <div class="collapse navbar-collapse" id="navbarsExample09">
    <ul class="navbar-nav mr-auto">
    </ul>
      <form  action="{{URL::to('/search')}}" method="POST" class="form-inline mt-2 mt-md-0">
        @csrf
        <input class="form-control" type="text" name="object" placeholder="Search by item" aria-label="Search">
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

<script src="{{asset('js/premium.js')}}"></script>