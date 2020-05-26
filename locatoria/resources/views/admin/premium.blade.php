@extends('layouts.adminmenu')
<!-- link css -->
<link href="{{ asset('css/reported.css') }}" rel="stylesheet">

<!--  -->
@section('css')

    <style>
        hr.style-two {
            border: 0;
            height: 2px;
            background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
        }
       
    </style>

@endsection

@section('content')

<br>
        <img class="top" src="{{asset('images/notif.png')}}" style="width: 100px; height:100px; margin-top: 0;">
        <h2 style="margin-left : 7%;">Premium requests </h2>
        <hr>
        <div class="row">  
            @forelse($data as $premium)
            @if($premium->status == 0)
            <div class="reservations">
            <hr class="style-two">
            <div class="res-container" style="display : flex; flex-wrap : wrap;">
                
                <div class="" style="width: 150px;   border-radius: 50%; ">
                    <a href="{{ url('/Item/'.$premium->item_id) }}" ><img title="View item" src="{{asset('/storage/' .$premium->thumbnail_path )}}" style="border-radius: 50%" class="bd-placeholder-img card-img-top" width="150px" height="150px" xmlns="http://www.w3.org/2000/svg" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" role="img"> 
                     </a>
                </div>
                <div class="flex2" >
                    <div style="width:100%;  text-align:center;">
                        <span style="font-size: 1.5em"><u>Owner :</u><br></span>
                        <span style="font-size: 1em">{{ $premium->name }}<br><br></span>
                        <span style="font-size: 1.5em"><u>Email :</u><br></span>
                        <span style="font-size: 1em">{{ $premium->email }}<br></span>
                    </div>

                </div>
               
                {{--<div class="flex3" style="width: 150px;">
                    <div style="width:100%; height:10px; text-align:center;">
                        <span style="font-size: 1.5em"><u>Item :</u><br></span>
                        <span style="font-size: 1em">
                            Title : {{$premium->title}}<br>
                           
                        </span>
                    </div>
                    <div style="width:100%; font-size: 1.5em; height:10px; text-align:center; margin-top:80px">
                        <u>Total Price</u><br>
                        <small style="font-size: 0.8em;">{{$premium->price}} $</small>
                    </div>
                    <a href="{{ url('/Item/'.$premium->item_id) }}" class="btn btn-primary" style="margin-top: 38%; margin-left:23%;">view item</a>
                </div>--}}
                <div class="flex4">
                        <br>
                        <span style="color: #000000; font-weight: bold; margin-top: 10px">Accept the request ?</span><br><br>
                        
                        <button type="button" class="btn btn-primary" onclick="approveRequest({{ $premium->id }})">Accept</button>
                        <form method="post" action="{{ url('premium/' .$premium->id. '/approve') }}" id="approval-form" style="display: none">
                            @csrf
                            @method('PUT')
                        </form>

                        <button type="button" class="btn btn-danger" onclick="refuseRequest({{ $premium->id }})">Refuse</button>
                        <form method="post" action="{{ url('premium/' .$premium->id. '/refuse') }}" id="refuse-form" style="display: none">
                            @csrf
                            @method('PUT')
                        </form>
                </div>        
            </div>
        </div>
                    @else
                        
                    @endif
               
               
                @empty

                <div class="msg">
                    <p class="msg">No requests found</p>
                    <small>Sorry try latter !!</small> 
                </div>

          
        @endforelse

    
    


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
        function approveRequest(id) {
            swal({
                title: 'Are you sure?',
                text: "You want to accept this request ",
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
                        'The request remain pending :)',
                        'info'
                    )
                }
            })
        }

        function refuseRequest(id) {
            swal({
                title: 'Are you sure?',
                text: "You want to refuse this request ",
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
                        'The request remain pending :)',
                        'info'
                    )
                }
            })
        }
    </script>

@endsection




