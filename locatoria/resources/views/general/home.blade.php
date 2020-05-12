@extends('layouts.app')

<link href="{{ asset('/css/home.css') }}" rel="stylesheet" type="text/css"/>
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
          <a class="p-2 text-muted" href="#">Bricolage</a>
          <a class="p-2 text-muted" href="#">Car Equipement</a>
          <a class="p-2 text-muted" href="#">Multimedia/High tech</a>
          <a class="p-2 text-muted" href="#">Sport/Hobbies</a>
          <a class="p-2 text-muted" href="#">Clothes</a>
          <a class="p-2 text-muted" href="#">House Equipement</a>
          <a class="p-2 text-muted" href="http://localhost/locatoria/public/pages/toutescat">...More</a>
        </nav>
    </div>

    <div class="conteneur jumbotron p-4 p-md-5 text-white rounded bg-dark">
        <div class="annonce annonce1">
            <h3 class="font-italic">Locatoria is here for you</h3>
        </div>  
        <a href=""><div class="annonce">Bricolage</div></a>  
        <a href=""><div class="annonce">Clothes</div></a>  
        <!--<a href=""><div class="annonce">Car Equipement</div></a>  -->
    </div>

    <div class="title">
        Last advertisements
    </div>

            <div class="album ">

              @if($items->count() > 0)
              @foreach($items as $item)

              <div id="card" class="card" style="width: 18rem;">
                <img class="card-img-top" src="{{asset('/storage/' .$item->thumbnail_path )}}" alt="Card image cap">
                <div class="card-body">
                  <h5 class="card-title">{{$item->title}}</h5>
                  <p class="card-text">{{$item->description}}</p>
                  <a href="#" class="btn btn-primary">view details</a>
                </div>
              </div>
    
            @endforeach

            @else
              <p>NO ITEM ADDED YET</p>
            @endif
         
    </div>
                       
        
        

@endsection