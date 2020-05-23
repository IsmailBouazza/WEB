@extends('layouts.app')
<!-- link css -->
<link href="{{ asset('css/reservation.css') }}" rel="stylesheet">
<link href="{{ asset('css/account.css') }}" rel="stylesheet">
<!--  -->
@section('content')
@include('inc.sidebar')


  <!-- sidebar-wrapper  -->
  <main class="page-content">
    <div class="container-fluid">
        <img src="{{asset('images/reserv.jpg')}}" style="width: 100px; height:100px">
        <h2>Favorite</h2>
        <hr>
        <div class="row">  

            <div class="reservations">
                @if($items_favorite->count() > 0)
                    @foreach($items_favorite as $favorite)

                        <div class="res-container" id="{{$favorite->id}}">
                            <div class="card flex1" style="width: 18rem;">
                                <a href="{{url('/Item/'.$favorite->id)}}">
                                    <img src="{{asset('/storage/' .$favorite->thumbnail_path )}}" class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" role="img"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em"></text>
                                </a>
                            </div>
                            <div class="flex3" >
                                <div style="width:100%; height:10px; text-align:center;">
                                    <span style="font-size: 1.5em"><u>Date Dispo</u><br></span>
                                    <span style="font-size: 1em">
                                        
                                    </span>
                                </div>
                                <div style="width:100%; font-size: 1.5em; height:10px; text-align:center; margin-top:80px">
                                    <u>Price</u><br>
                                    <small style="font-size: 0.8em;">{{$favorite->price}} $</small>
                                </div>
                            </div>
                            <div class="flex4 text-center">
                                <button type="button" class="btn btn-info">Supprimer</button>
                            </div>
                        </div>
                    
                    @endforeach
                @else
                    <div class="msg">
                        <p class="msg" style="margin-left: 12%">No items found</p>
                        <small>Go add one !!</small>
                    </div>
                @endif
            </div>

@include('inc.jsSidebar')
@endsection