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
            <img src="{{asset('images/history.jpg')}}" style="width: 100px; height:100px">
            <h2>History</h2>
            <hr>
            <div class="row">

                @foreach($history as $reservation)




                            <div class="res-container">

                                <div class="card flex1" style="width: 18rem;">

                                    <a href="{{url('/Item/'.$reservation->item->id)}}">
                                        <img src="{{asset('/storage/' .$reservation->item->thumbnail_path )}}" class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" role="img"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em"></text>
                                    </a>
                                </div>
                                <div class="flex2">
                                    <div style="width:100%; height:10px; text-align:center;">
                                        <span style="font-size: 1.5em"><u>User Info</u><br></span><br>
                                        <small style="font-size: 1em;">{{$reservation->item->user->name}} </small><br><br>
                                        <small style="font-size: 1em;">{{$reservation->item->user->city}} </small>
                                    </div>
                                </div>
                                <div class="flex3" >
                                    <div style="width:100%; height:10px; text-align:center;">
                                        <span style="font-size: 1.5em"><u>Date Dispo</u><br></span>
                                        <span style="font-size: 1em">
                                            blablabla
                                    </span>
                                    </div>
                                    <div style="width:100%; font-size: 1.5em; height:10px; text-align:center; margin-top:80px">
                                        <u>Total Price</u><br>
                                        <small style="font-size: 0.8em;">blablabla</small>
                                    </div>
                                </div>
                                <div class="flex4 text-center">

                                    

                                </div>
                            </div>

                    @endforeach

                        




@include('inc.jsSidebar')

@endsection
                