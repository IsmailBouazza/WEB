@extends('layouts.adminmenu')
<!-- link css -->
<link href="{{ asset('css/reported.css') }}" rel="stylesheet">
<!--  -->
@section('content')




  <!-- sidebar-wrapper  -->
  <main class="page-content" >
    <div class="container-fluid" style="margin-top: 2%;">
        <img class="top" src="{{asset('images/reported.jpg')}}" style="width: 100px; height:100px; border-radius: 50%; margin-left: 5%;">
        <h2 style="margin-left: 8%;">Reported items</h2>
        <hr>
        <div class="row">  


        <div class="reservations">


            <style>
                hr.style-two {
                    border: 0;
                    height: 2px;
                    background-image: linear-gradient(to right, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.75), rgba(0, 0, 0, 0));
                }
                .code {
                    color: #333;
                    position: relative;
                    overflow: hidden;
                }
                .code h2 {
                    text-align: left;
                    color: #ccc;
                    font: 25px monaco,mono-space;
                    padding-left: 300px;
                }
            </style>
   
                
            @forelse($data as $reported)

            <hr class="style-two">

                <div class="res-container" style="width: 80%; margin-left:3%">
                    
                    <div class="card flex1" style="width: 150px; height: 150px; border-radius: 50%">
                        <img src="{{asset('/storage/' .$reported->thumbnail_path )}}" style="border-radius: 50%" class="bd-placeholder-img card-img-top" width="150px" height="150px" xmlns="http://www.w3.org/2000/svg" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" role="img">
                    </div>
                    <div class="flex2" style="width: 100px;">
                        <div style="width:100%;  text-align:center; margin-left : 3%;">
                            <span style="font-size: 1.5em"><u>Name :</u><br></span>
                            <span style="font-size: 1em">{{ $reported->name }}<br><br></span>
                            <span style="font-size: 1.5em"><u>Email :</u><br></span>
                            <span style="font-size: 1em">{{ $reported->email }}<br></span>
                        </div>
                    </div>
                    <div class="flex3" style="width: 100px;">
                        
                            <div style="width:100%; height:10px; text-align:center;">
                                <span style="font-size: 1.5em"><u>Item : </u><br></span>
                                <span style="font-size: 1em">
                                   {{$reported->title}}<br>
                                  
                                </span>
                            </div>
                        <div style="width:100%; font-size: 1.5em; height:10px; text-align:center; margin-top:80px">
                            <u> Price</u><br>
                            <small style="font-size: 0.8em;">{{$reported->price}} $</small>
                        </div>
                    </div>
                    <div class="flex4" >
                       
                            <br>
                            <span style="color: #000000; font-weight: bold; ">Approve the report ?</span><br><br>

                            <button type="button" style="margin-bottom : 5px; " class="btn btn-danger" onclick="approveReport({{ $reported->item_id }})">Approve  report</button>
                            <form method="post" action="{{ url('reported/' .$reported->item_id. '/approve') }}" id="approval-form" style="display: none">
                                @csrf
                                @method('PUT')
                            </form>

                            <button type="button" class="btn btn-primary" onclick="refuseReport({{ $reported->id }})">Reject report</button>
                            <form method="post" action="{{ url('reported/' .$reported->id. '/refuse') }}" id="refuse-form" style="display: none">
                                @csrf
                                @method('PUT')
                            </form>
                        
                </div>
                </div>

            @empty

                    <div class="msg">
                        <p class="msg">No reports found</p>
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
        function approveReport(id) {
            swal({
                title: 'Are you sure?',
                text: "You want to accept this report, this will delete the item ! ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, approve it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-danger',
                cancelButtonClass: 'btn btn-info',
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
                        'The report remain pending :)',
                        'info'
                    )
                }
            })
        }

        function refuseReport(id) {
            swal({
                title: 'Are you sure?',
                text: "You want to reject this report ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, reject it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-info',
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
                        'The report remain pending :)',
                        'info'
                    )
                }
            })
        }
    </script>

@include('inc.jsSidebar')

@endsection




