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

                    <style>


                        /*new tag css*/

                        .tags span {
                            display: inline-block;
                            height:24px;
                            line-height:23px;
                            position:relative;
                            margin: 0 12px 8px 0;
                            padding: 0 12px 0 10px;
                            background: #777;
                            -moz-border-radius-bottomleft: 5px;
                            -webkit-border-bottom-left-radius: 5px;
                            border-bottom-left-radius: 5px;
                            -moz-border-radius-topleft: 5px;
                            -webkit-border-top-left-radius: 5px;
                            border-top-left-radius: 5px;
                            box-shadow: 0 1px 2px rgba(0,0,0,0.2);
                            color: #fff;
                            font-size:12px;
                            font-family: "Lucida Grande","Lucida Sans Unicode",Verdana,sans-serif;
                            text-decoration: none;
                            text-shadow: 0 1px 2px rgba(0,0,0,0.2);
                            font-weight: bold;
                        }

                        .tags span:before {
                            content: "";
                            position: absolute;
                            top: 10px;
                            right: 1px;
                            float: left;
                            width: 5px;
                            height: 5px;
                            -moz-border-radius: 50%;
                            -webkit-border-radius: 50%;
                            border-radius: 50%;
                            background: #fff;
                            -moz-box-shadow: -1px -1px 2px rgba(0,0,0,0.4);
                            -webkit-box-shadow: -1px -1px 2px rgba(0,0,0,0.4);
                            box-shadow: -1px -1px 2px rgba(0,0,0,0.4);
                        }

                        .tags span:after {
                            content: "";
                            position: absolute;
                            top:0;
                            right: -12px;
                            width: 0;
                            height: 0;
                            border-color: transparent transparent transparent #777;
                            border-style: solid;
                            border-width: 12px 0 12px 12px;
                        }

                        .tags span.color3 {background: #de3f3e;}
                        .tags span.color3:after {border-color: transparent transparent transparent #de3f3e}

                        .small span {
                            height: 21px;
                            line-height: 21px;
                            float: none;
                            font-size: 11px;
                        }

                        .small span:before {
                            right: 0;
                            top: 8px;
                            border-width: 10px 0 10px 10px;
                        }

                        .small span:after {
                            right: -11px;
                            top: 0;
                            border-width: 11px 0 11px 11px;
                        }

                        /*end new tag css*/


                    </style>


                    @if($reservations1 != NULL || $reservations2 != NULL || $reservations_declined->count() > 0 )




                        @forelse($reservations_declined as $reservation_declined)




                            <div class="res-container" id="">


                                    <div class="tags">
                                        <span class="color3">New</span>
                                    </div>

                                <div class="card flex1" style="width: 18rem;">

                                    <a href="{{url('/Item/'.$reservation_declined->item->id)}}">
                                        <img src="{{asset('/storage/' .$reservation_declined->item->thumbnail_path )}}" class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" role="img"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em"></text>
                                    </a>
                                </div>
                                <div class="flex2">
                                    <div style="width:100%; height:10px; text-align:center;">
                                        <span style="font-size: 1.5em"><u>User Info</u><br></span><br>
                                        <small style="font-size: 1em;"><i class="fas fa-envelope-square" style="margin-right: 5px"></i>{{$reservation_declined->item->user->name}} </small><br><br>
                                        <small style="font-size: 1em;"><i class="fas fa-phone" style="margin-right: 5px"></i>{{$reservation_declined->item->user->city}} </small>
                                    </div>
                                </div>
                                <div class="flex3" >
                                    
                                </div>
                                <div class="flex4 text-center">

                                    <div class="alert alert-warning">
                                        <strong>Request Declined</strong>
                                    </div>

                                </div>
                            </div>

                        @empty

                        @endforelse





                    @if($reservations1 != NULL )


                        @forelse($reservations1 as $reservation)




                            <div class="res-container" id="{{$reservation->id}}">

                                @if( ! $reservation->read)
                                    <div class="tags">
                                        <span class="color3">New</span>
                                    </div>
                                @endif

                                <div class="card flex1" style="width: 18rem;">

                                    <a href="{{url('/Item/'.$reservation->item->id)}}">
                                        <img src="{{asset('/storage/' .$reservation->item->thumbnail_path )}}" class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" role="img"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em"></text>
                                    </a>
                                </div>
                                <div class="flex2">
                                    <div style="width:100%; height:10px; text-align:center;">
                                        <span style="font-size: 1.5em"><u>User Info</u><br></span><br>
                                        <small style="font-size: 1em;"><i class="fas fa-envelope-square" style="margin-right: 5px"></i>{{$reservation->user_owner_id->email}} </small><br><br>
                                        <small style="font-size: 1em;"><i class="fas fa-phone" style="margin-right: 5px"></i>{{$reservation->user_owner_id->phone}} </small>
                                    </div>
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
                                        <small style="font-size: 0.8em;">{{$reservation->total_price}} DH</small>
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


                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                            <script>


                                $(document).on("click","#{{$reservation->id}}res", function () {
                                    var token = $("meta[name='csrf-token']").attr("content");
                                    if(confirm(" you want to cancel this reservation ?")) {
                                        $.ajax({
                                            url: "{{ url('/cancelreservation/'.$reservation->id) }}",
                                            type: "POST",
                                            data: {"_token": token},
                                            success: function (msg) {
                                                alert(msg);
                                                if (msg == 'your reservation has been cancled!') $('#{{$reservation->id}}').fadeOut(2000);

                                            }
                                        });
                                    }

                                });
                            </script>

                        @empty

                        @endforelse

                @endif









                    @if($reservations2 != NULL )


                        @forelse($reservations2 as $reservation)


                            <div class="res-container" id="{{$reservation->id}}">
                                <div class="card flex1" style="width: 18rem;">
                                    <a href="{{url('/Item/'.$reservation->item->id)}}">
                                        <img src="{{asset('/storage/' .$reservation->item->thumbnail_path )}}" class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" role="img"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em"></text>
                                    </a>
                                </div>
                                <div class="flex2">
                                    <div style="width:100%; height:10px; text-align:center;">
                                        <span style="font-size: 1.5em"><u>User Info</u><br><br></span>

                                        @if($reservation->status == 0)
                                            <i class="fas fa-user" style="margin-right: 5px"></i><span style="font-size: 1em">{{ $reservation->user_owner_id->name }}<br><br></span>
                                            <i class="fas fa-city" style="margin-right: 5px"></i><span style="font-size: 1em">{{ $reservation->user_owner_id->city }}<br></span>
                                        @else
                                            <span style="font-size: 1.5em"><u>Email :</u><br></span>
                                            <span style="font-size: 1em">{{ $reservation->user_owner_id->email }}<br></span><br>
                                            <span style="font-size: 1.5em"><u>Phone :</u><br></span>
                                            <span style="font-size: 1em">{{ $reservation->user_owner_id->phone }}<br></span>
                                        @endif

                                    </div>
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
                                        <small style="font-size: 0.8em;">{{$reservation->total_price}} DH</small>
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


                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                            <script>


                                $(document).on("click","#{{$reservation->id}}res", function () {
                                    var token = $("meta[name='csrf-token']").attr("content");
                                    if(confirm(" you want to cancel this reservation ?")) {
                                        $.ajax({
                                            url: "{{ url('/cancelreservation/'.$reservation->id) }}",
                                            type: "POST",
                                            data: {"_token": token},
                                            success: function (msg) {
                                                alert(msg);
                                                if (msg == 'your reservation has been cancled!') $('#{{$reservation->id}}').fadeOut(2000);

                                            }
                                        });
                                    }

                                });
                            </script>



                        @empty

                        @endforelse


                    @endif


















                    @else

                        <div class="msg">
                            <p class="msg" style="margin-left: 12%">No Reservations found or your reservation is refused</p>
                            <small>Sorry try latter !!</small>
                        </div>

                    @endif
                </div>

    @include('inc.jsSidebar')

@endsection
