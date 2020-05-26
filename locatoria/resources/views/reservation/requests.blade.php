@extends('layouts.app')
<!-- link css -->
<link href="{{ asset('css/reservation.css') }}" rel="stylesheet">
<link href="{{ asset('css/account.css') }}" rel="stylesheet">
<!--  -->
@section('content')

@include('inc.sidebar')


  <!-- sidebar-wrapper  -->
  <main class="page-content" >
    <div class="container-fluid">
        <img class="top" src="{{asset('images/notif.png')}}" style="width: 100px; height:100px">
        <h2>Requests</h2>
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

        @forelse($reservations as $reservation)


                <div class="res-container" style="width: 80%; margin-left:10%">

                    @if( ! $reservation->read)
                        <div class="tags">
                            <span class="color3">New</span>
                        </div>
                    @endif

                    <!-- The Modal  -->
                    <div class="modal" id="modal{{$reservation->user_id->id}}">
                        <div class="modal-dialog">
                            <div class="modal-content">

                                <!-- Modal Header -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Sending a message</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                </div>

                                <!-- Modal body -->
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="chat">write your message:</label>
                                        <textarea class="form-control" id="chat" rows="3"></textarea>
                                    </div>
                                </div>

                                <!-- Modal footer -->
                                <div class="modal-footer">

                                    <button type="button" class="btn btn-dark" id="closemodal" data-dismiss="modal">close</button>
                                    <button type="button" id="{{$reservation->user_id->id}}" onclick="test(this)" class="btn btn-danger" >Send</button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- The Modal end -->
                    <div class="card flex1" style="width: 150px; height: 150px; border-radius: 50%">
                        <img src="{{asset('/storage/' .$reservation->item->thumbnail_path )}}" style="border-radius: 50%" class="bd-placeholder-img card-img-top" width="150px" height="150px" xmlns="http://www.w3.org/2000/svg" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" role="img">
                    </div>
                    <div class="flex2" style="width: 150px;">
                        <div style="width:100%;  text-align:center;">
                            @if($reservation->status == 0)
                                <span style="font-size: 1.5em"><u>Name :</u><br></span>
                                <span style="font-size: 1em">{{ $reservation->user_id->name }}<br><br></span>
                                <span style="font-size: 1.5em"><u>city :</u><br></span>
                                <span style="font-size: 1em">{{ $reservation->user_id->city }}<br></span>
                            @else
                                <span style="font-size: 1.5em"><u>Email :</u><br></span>
                                <span style="font-size: 1em">{{ $reservation->user_id->email }}<br></span><br>
                                <span style="font-size: 1.5em"><u>Phone :</u><br></span>
                                <span style="font-size: 1em">{{ $reservation->user_id->phone }}<br></span>
                            @endif

                        </div>
                    </div>
                    <div class="flex3" style="width: 150px;">
                        <div style="width:100%; height:10px; text-align:center;">
                            <span style="font-size: 1.5em"><u>Date Dispo :</u><br></span>
                            @if($reservation->status == 0)
                                <span style="font-size: 1em">
                                    Start : {{$reservation->date_start}}<br>
                                    End : {{$reservation->date_end}}
                                </span>
                            @else
                                <span style="font-size: 1em">Renting period ...
                            @endif
                        </div>
                        <div style="width:100%; font-size: 1.5em; height:10px; text-align:center; margin-top:80px">
                            <u>Total Price</u><br>
                            <small style="font-size: 0.8em;">{{$reservation->total_price}} MAD</small>
                        </div>
                    </div>
                    <div class="flex4">
                        @if($reservation->status == 0)
                            <br>
                            <span style="color: #000000; font-weight: bold; margin-top: 10px">Accept the request ?</span><br><br>

                            <button type="button" class="btn btn-primary" onclick="approveReservation({{ $reservation->id }})">Accept</button>
                            <form method="post" action="{{ url('MyRequests/' .$reservation->id. '/approve') }}" id="approval-form" style="display: none">
                                @csrf
                                @method('PUT')
                            </form>
                            <button type="button" class="btn btn-danger" onclick="refuseReservation({{ $reservation->id }})">Refuse</button>
                            <button type="button" class="btn btn-success mt-2" style="width: 100%" data-toggle="modal" data-target="#modal{{$reservation->user_id->id}}">Chat</button>
                            <form method="post" action="{{ url('MyRequests/' .$reservation->id. '/refuse') }}" id="refuse-form" style="display: none">
                                @csrf
                                @method('PUT')
                            </form>


                        @else
                            <span style="color: #000000; font-weight: bold;">The request is already accepted !!</span>
                        @endif
                </div>
                </div>


            @empty

                    <div class="msg">
                        <p class="msg">No requests found</p>
                        <small>Sorry try latter !!</small>
                    </div>


            @endforelse


        </div>







    <!-- accept or refuse reservation with js -->

    <!-- Select Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
    <!-- TinyMCE -->
    <script src="{{ asset('assets/backend/plugins/tinymce/tinymce.js') }}"></script>
    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>

    <script>
        $(function () {
            //TinyMCE
            tinymce.init({
                selector: "textarea#tinymce",
                theme: "modern",
                height: 300,
                plugins: [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern imagetools'
                ],
                toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
                toolbar2: 'print preview media | forecolor backcolor emoticons',
                image_advtab: true
            });
            tinymce.suffix = ".min";
            tinyMCE.baseURL = '{{ asset('assets/backend/plugins/tinymce') }}';
        });
        function approveReservation(id) {
            swal({
                title: 'Are you sure?',
                text: "You want to accept this reservation ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, approve it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('approval-form').submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'The reservation remain pending :)',
                        'info'
                    )
                }
            })
        }

        function refuseReservation(id) {
            swal({
                title: 'Are you sure?',
                text: "You want to refuse this reservation ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, refuse it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-danger',
                cancelButtonClass: 'btn btn-success',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('refuse-form').submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'The reservation remain pending :)',
                        'info'
                    )
                }
            })
        }

        function test(btn) {

            var receiver_id= $(btn).attr('id');
            var message = $('#chat').val();

            $('#chat').val("");
            var token = $("meta[name='csrf-token']").attr("content");

            $.ajax({
                url: "{{ url('/chat')}}",
                type: "POST",
                data: {"_token": token,
                    'message':message,
                    'receiver_id':receiver_id},
                success: function () {
                    alert("message sent")
                    $("#closemodal").click();

                }
            });

        }




    </script>



@include('inc.jsSidebar')

@endsection




