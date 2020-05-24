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
        <img src="{{asset('images/ad3.jpg')}}" alt="3" class="slide">
        <img src="{{asset('images/ad4.jpg')}}" alt="3" class="slide">
        <img src="{{asset('images/ad5.jpg')}}" alt="3" class="slide">
        <img src="{{asset('images/ad6.jpg')}}" alt="3" class="slide">
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

      <div class="product">
        <figure class="product__card">
          <div class="product__image">
            <img src="{{asset('/storage/'.$item->thumbnail_path )}}" alt="image">
            <div class='product__btns'>
              <a href="{{ url('Item/'.$item->id) }}">quick view</a>
            </div>
          </div>
          <figcaption class="product__description">
            <h4>{{$item->title}}</h4>
            <span class="price">
              {{$item->price}} Dh
              @if(Auth::user()->id == $item->user_id)
                <i class="fas fa-user-circle" style="margin-left: 80%; width:40px; height:40px; color: blue;"></i>
              @endif
            </span>
          </figcaption>
        </figure>
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