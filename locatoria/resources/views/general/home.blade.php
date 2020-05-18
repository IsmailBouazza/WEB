@extends('layouts.app')
<!-- link css -->
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
<!--  -->
@section('content')
    <table class="img-container">
      <tr>
        <td class="image">
          <img src="{{asset('images/logo.png')}}">
        </td>
        <td class="image">
          Welcome to the best renting website
        </td>
      </tr>
    </table>
    <div class="search">
        <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="District,City,Region ...." aria-label="Search">
            <input class="form-control mr-sm-2" type="text" placeholder="Object" aria-label="Search">
            <input class="form-control mr-sm-2" type="text" placeholder="Budget max" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
        <br>
        <div class="btn-group">
          <p><a class="btn btn-sm btn-outline-secondary" href="http://localhost/locatoria/public/pages/researchdetails" role="button">View details &raquo;</a></p>                      
        </div>
    </div>
    <div class="categorie nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
          <a class="p-2 text-muted" href="{{ url('/Category/4') }}">Home-made</a>
          <a class="p-2 text-muted" href="{{ url('/Category/1') }}">Car Equipement</a>
          <a class="p-2 text-muted" href="{{ url('/Category/3') }}">Multimedia/High tech</a>
          <a class="p-2 text-muted" href="{{ url('/Category/8') }}">Sport/Hobbies</a>
          <a class="p-2 text-muted" href="{{ url('/Category/2') }}">Clothes</a>
          <a class="p-2 text-muted" href="{{ url('/Category/5') }}">House Equipement</a>
          <a class="p-2 text-muted" href="{{ url('/Category') }}">...More</a>
        </nav>
    </div>

    <div class="conteneur jumbotron p-4 p-md-5 text-white rounded bg-dark">
        <div class="annonce annonce1">
            <h3 class="font-italic">Locatoria is here for you</h3>
        </div>  
        <a href="{{ url('/Category/4') }}">
          <div class="annonce">
            <img src="{{asset('images/home-made.jpg')}}"  class="img">
            <div class="centered">Home-Made</div>
          </div>
        </a>  
        <a href="{{ url('/Category/2') }}">
          <div class="annonce">
            <img src="{{asset('images/clothes.jpg')}}"  class="img">
            <div class="centered">Clothes</div>
          </div>
        </a>  
        <a href="{{ url('/Category/1') }}"  class="img">
          <div class="annonce">
            <img src="{{asset('images/car-equipement.jpg')}}">
            <div class="centered">Car Equipement</div>
          </div>
        </a>  
    </div>

    <div class="title">
        Last advertisements
    </div>

    <div class="album ">

      @if($items ?? ''->count() > 0)
        @foreach($items ?? '' as $item)

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

  <div class="annonce-premium">
    <div class="float" style="margin-left: 5%;">
      <h1 style="color: white; margin-left: 10%; font-weight:bold;">Discover premium ads</h1>
      <h4 style="color: white; margin-left: 10%;">Now you can see different items from differents categories and with a high quality</h4>
    </div>
    <div class="float" style="margin-left: 25%;">
      <a href="{{ url('Premium') }}">
        <button type="button" class="btn btn-outline-secondary" style="color: white; border:white solid 2px; font-size:1.2em">Discover more</button>
      </a>
    </div>
    
    <div class="grid-container">
      @foreach($items_premium as $item)
          <div class="grid-item">
            <img class="card-img-top" src="{{asset('/storage/' .$item->thumbnail_path )}}" alt="Card image cap" style="width: 100%; height:80%; border-top-left-radius: 20px; border-top-right-radius: 20px;">
            <div class="card-body">
              <p class="card-text">{{$item->description}}</p>
            </div>
          </div>
      @endforeach
    </div>
  </div>
                       
        
        

@endsection