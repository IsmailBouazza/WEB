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
        <h2>Reservations</h2>
        <hr>
        <div class="row">  

            <div class="reservations">
                @if($user->reservations->count() > 0)
                    @foreach($user->reservations as $reservation)

                        <div class="res-container" id="{{$reservation->id}}">
                            <div class="card flex1" style="width: 18rem;">
                                <a href="{{url('/Item/'.$reservation->item->id)}}">
                                    <img src="{{asset('/storage/' .$reservation->item->thumbnail_path )}}" class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" role="img"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em"></text>
                                </a>
                            </div>
                            <div class="flex3" >
                                <div style="width:100%; height:10px; text-align:center;">
                                    <span style="font-size: 1.5em"><u>Date Dispo</u><br></span>
                                    <span style="font-size: 1em">
                                        Start : {{$reservation->date_start}}<br>
                                        End : {{$reservation->date_end}}
                                    </span>
                                </div>
                                <div style="width:100%; font-size: 1.5em; height:10px; text-align:center; margin-top:80px">
                                    <u>Total Price</u><br>
                                    <small style="font-size: 0.8em;">{{$reservation->total_price}} $</small>
                                </div>
                            </div>
                            <div class="flex4 text-center">
                                @if($reservation->status == 0)
                                    <div class="alert alert-warning">
                                        <strong>Pending</strong>
                                    </div>
                                    <button type="button" class="btn btn-danger" id="{{$reservation->id}}res" style="margin-top: 6px;width: 100%" >Cancel Reservation</button>
                                @else
                                    @if(($reservation->date_start <= date('Y-m-d')) && ($reservation->date_end >= date('Y-m-d')) )
                                        <div class="alert alert-primary ">
                                            <strong>Happening now!</strong>
                                        </div>


                                        @elseif ($reservation->date_end < date('Y-m-d'))
                                            <div class="alert alert-dark">
                                                <strong>Gone!</strong>
                                            </div>
                                        @else
                                            <div class="alert alert-success ">
                                                <strong>Approved </strong>
                                            </div>
                                            <button type="button" class="btn btn-danger" id="{{$reservation->id}}res" style="margin-top: 6px;width: 100%" >Cancel Reservation</button>
                                    @endif

                                @endif

                            </div>
                        </div>
                        

                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

                        
                        <script>


                            $(document).on("click","#{{$reservation->id}}res", function () {
                                var token = $("meta[name='csrf-token']").attr("content");

                                $.ajax({
                                    url: "{{ url('/cancelreservation/'.$reservation->id) }}",
                                    type: "POST",
                                    data: { "_token": token },
                                    success: function( msg ) {
                                        alert( msg );
                                        if(msg == 'your reservation has been cancled!')$('#{{$reservation->id}}').fadeOut( 2000 );

                                    }
                                });

                            });
                        </script>
                    @endforeach
                @else
                    <div class="msg">
                        <p class="msg" style="margin-left: 12%">No Reservations found or your reservation is refused</p>
                        <small>Sorry try latter !!</small>
                    </div>
                @endif
            </div>

@include('inc.jsSidebar')
@endsection
