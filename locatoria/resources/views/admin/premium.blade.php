@extends('layouts.adminmenu')
<!-- link css -->
<!--  -->
@section('content')

<br>
    
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
    
    <div class="welcome" >
        <img class="top" src="{{asset('images/notif.png')}}" style="width: 90px; height:90px; border-radius: 50%; margin-left:5%; margin-top:2%;">
        <h2 style="margin-left : 9%; color : rgb(26, 21, 21);">Premium requests </h2>
    </div>
    <hr>
   
  
        
    <div class="reservations" style="margin-top : 7%">
    @forelse($data as $premium)
    @if($premium->status == 0)
       
            <div class="res-container" style=" display : flex; flex-wrap: wrap; margin-left: 20%; margin-top: 6%;">
                @if( ! $premium->read)
                    <div class="tags">
                        <span class="color3">New</span>
                    </div>
                @endif
                <div class="card flex1" style="width: 150px; height: 150px; border-radius: 50%">
                    <a href="{{ url('/Item/'.$premium->item_id) }}"  ><img src="{{asset('/storage/' .$premium->thumbnail_path )}}" title="view item" style="border-radius: 50%" class="bd-placeholder-img card-img-top" width="150px" height="150px" xmlns="http://www.w3.org/2000/svg" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" role="img"></a> 
                </div>
                
                 <div class="flex2" style="width: 150px;">
                    <div style="width:100%;  text-align:center;">
                        <span style="font-size: 1.5em"><u>Owner :</u><br></span>
                        <span style="font-size: 1em">{{ $premium->name }}<br><br></span>
                        <span style="font-size: 1.5em"><u>Email :</u><br></span>
                        <span style="font-size: 1em">{{ $premium->email }}<br></span>
                    </div>

                </div>
               
                <div class="flex3" style="width: 150px;">
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
                    
                </div>
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
            <hr>
                    {{--<span style="color: #000000; font-weight: bold; display: flex; flex-wrap : wrap;" ><h5>It is premium now !!</h5><i class="far fa-smile-wink fa-3x" style="text-align : center;"></i></span>--}}
                @endif
            
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



