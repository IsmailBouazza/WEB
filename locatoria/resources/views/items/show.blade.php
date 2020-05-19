@extends('layouts.app')
<!-- link css -->
<link href="{{ asset('css/item.css') }}" rel="stylesheet">
<link href="{{ asset('css/lightpick.css') }}" rel="stylesheet">
<link href="{{ asset('css/account.css') }}" rel="stylesheet">

<!--  -->

<!-- start css mouad-->

<style>
    {{-- rah kayn fichier commenys.css fih hadchi manba3d fach tsay yield 3ad khdam bih o7ayad had css!! --}}
    body{
        background:#eee;
    }

    hr {
        margin-top: 20px;
        margin-bottom: 20px;
        border: 0;
        border-top: 1px solid #FFFFFF;
    }
    a.commentuser {
        color: #82b440;
        text-decoration: none;
    }
    .blog-comment::before,
    .blog-comment::after,
    .blog-comment-form::before,
    .blog-comment-form::after{
        content: "";
        display: table;
        clear: both;
    }

    .blog-comment{
        margin-top: 20px;
        padding-top: 20px;
        padding-left: 15%;
        padding-right: 15%;
    }

    .blog-comment ul{
        list-style-type: none;
        padding: 0;
    }

    .blog-comment img{
        opacity: 1;
        filter: Alpha(opacity=100);
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        -o-border-radius: 4px;
        border-radius: 4px;
    }

    .blog-comment img.avatar {
        position: relative;
        float: left;
        margin-left: 0;
        margin-top: 0;
        width: 65px;
        height: 65px;
    }

    .blog-comment .post-comments{
        border: 1px solid #eee;
        margin-bottom: 20px;
        margin-left: 85px;
        margin-right: 0px;
        padding: 10px 20px;
        position: relative;
        -webkit-border-radius: 4px;
        -moz-border-radius: 4px;
        -o-border-radius: 4px;
        border-radius: 4px;
        background: #fff;
        color: #6b6e80;
        position: relative;
    }

    .blog-comment .meta {
        font-size: 13px;
        color: #aaaaaa;
        padding-bottom: 8px;
        margin-bottom: 10px !important;
        border-bottom: 1px solid #eee;
    }

    .blog-comment ul.comments ul{
        list-style-type: none;
        padding: 0;
        margin-left: 85px;
    }

    .blog-comment-form{
        padding-left: 15%;
        padding-right: 15%;
        padding-top: 40px;
    }

    .blog-comment h3,
    .blog-comment-form h3{
        margin-bottom: 40px;
        font-size: 26px;
        line-height: 30px;
        font-weight: 800;
    }

</style>

<!-- end css mouad-->






@section('content')

<br><br>


    @if(!Auth::user() || Auth::user()->id !== $item->user_id)

        <!--Client-->

        <div class="box-container img-container">

            <div class="info-img">
                <div>{{$item->title}}</div>
                <hr>
            </div>

            @foreach ($item_photos as $item_photo)

                <img src="{{asset('storage/'.$item_photo->photo_path)}}" width="200px" height="250px">


            @endforeach


            <div class="link">
                {{$item_photos->links()}}
            </div>
            <hr>
            <div class="desc">{{$item->description}}</div>
        </div>

        <div class="img-container info-container">

            <img src="{{asset('storage/'.$user->picture)}}" style="width: 150px; height:150px; border-radius:50%;">
            <hr>
            <div><i class="fas fa-user" style="margin-right: 10px"></i>{{$user->name}}</div>
            <div><i class="fas fa-map-marker" style="margin-right: 10px"></i>{{$user->city}} , {{$user->adresse}}</div>
            <div><i class="fas fa-phone" style="margin-right: 10px"></i></i>{{$user->phone}}</div>
            <div><i class="fas fa-envelope-open-text" style="margin-right: 10px"></i>{{$user->email}}</div>

            <button type="button" class="center btn btn-success">Chat</button>
            <hr>
            <div style="font-size:1.5em"><a href="#"><i class="fas fa-heart" style="margin-right: 10px; width:30px; height:30px"></i></a>Make it your favorite</div>
            <hr>
            <div style="font-size:1.5em"><i class="fas fa-dollar-sign" style="margin-right: 10px;"></i>{{$item->price}}</div>

        </div>




        <!--chekout-->

        <div class="col-lg-12  calendrier" id="bill" style="display: none">
            <div id="mainContentWrapper">
                <div class="row p-2 offset-md-2">
                    <div class="col-md-12 mt-2" style="margin-left: -15%">
                        <h3>
                            Review your Reservation
                        </h3>
                        <div class="row " >
                            <div class="col-md-8 mt-2">
                                <div class="card">
                                    <h5 class="card-header">
                                        Item : {{$item->title}}
                                    </h5>
                                    <div class="card-body">

                                        <ul>

                                            <li><b><i>Renting Period : </i></b><span id="renting_period"></span></li>
                                            <li><b><i>Total Days : </i></b><span id="total_days"></span></li>
                                            <li><b><i>Price Per Day : </i></b><span id="price">{{$item->price}}</span> MAD</li>
                                        </ul>


                                    </div>

                                </div>
                            </div>
                            <div class="col-md-4 ">
                                <br><br><br><br>
                                <h3 class="text-center mt-2">
                                    Total Price
                                </h3>
                                <h3 class="text-center text-success">
                                    <span id="total_price"></span> MAD
                                </h3>
                            </div>
                        </div>
                        @if (Auth::guest())
                            <button type="button" class="btn btn-block btn-md active btn-success mt-5" disabled>
                                You should log in or register before sending a request
                            </button>

                            <button type="button" onclick="location.href='{{ route('login') }}'" class="btn btn-block btn-md active btn-primary" style="display:inline;width:49.9%" >
                                You have an account ? Login.
                            </button>
                            <button type="button" onclick="location.href='{{ route('register') }}'" class="btn btn-block btn-md active btn-secondary" style="display:inline;width:49.5%"  >
                                Not yet ? Register. it's never late.
                            </button>
                        @else
                            <button type="button" class="btn btn-block btn-md active btn-success mt-5" onClick="submitForm()">
                                Send Renting Request
                            </button>
                        @endif


                    </div>
                </div>
            </div>
        </div>



        <form id="checkoutform" action="{{ url('reser') }}" method="POST" style="display: none">
            @csrf
            <input type="hidden" name="date_start" id="start">
            <input type="hidden" name="date_end" id="end">
            <input type="hidden" name="total_price">
            <input type="hidden" name="item_id" value="{{$item->id}}">
        </form>



        <!--end ckeckout -->



    <!-- comments -->


        <div class="container bootstrap snippet">
            <div class="row">
                <div class="col-md-12">
                    <div class="blog-comment">
                        <h3 class="text-success">Comments</h3>
                        <hr/>
                        <ul class="comments">

                            @forelse($comments as $comment)
                                <li class="clearfix">
                                    <img src="https://bootdey.com/img/Content/user_1.jpg" class="avatar" alt=""> {{-- haka t9ad tejbad lid d luser osta3mlo bach t9ad l image $comment->user->id --}}
                                    <div class="post-comments">
                                        <p class="meta"> {{$comment->updated_at}} <a class="commentuser" href="#">{{"@".$comment->user->name}}</a></p>
                                        <p>
                                            {{$comment->comment}}
                                        </p>
                                    </div>
                                </li>
                            @empty
                                <p style="font-size: 1.5em">No comment yet !!</p>
                            @endforelse


                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!--End Client-->


    @else

    @if($item->user_id == Auth::user()->id)

        <!--Partenaire-->


        <div class="nav">
            <div class="mini-block">
            <img src="{{asset('storage/'.$user->picture)}}" style="width:150px; height:150px; border-radius:50%; margin-left:100px;">
                <div class="s-nav">
                    <a href="{{ url('/user/'.$user->id) }}"><button type="button" class="butt btn btn-secondary"><i class="fas fa-home" style="margin-right: 7px;"></i>My Profile</button></a>
                    <a href="#"><button type="button" class="butt btn btn-secondary"><i class="fas fa-envelope-open-text" style="margin-right: 7px;"></i>My messages</button></a>
                    <a href="#"><button type="button"  class="butt btn btn-secondary"><i class="fas fa-heart" style="margin-right: 7px;"></i>My favorites</button></a>
                    <a href="{{ url('/Reservation') }}"><button type="button"  class="butt btn btn-secondary"><i class="fas fa-check-square" style="margin-right: 7px;"></i>My reservations</button></a>
                    <a href="{{ url('Item/create/') }}"><button type="button"  class="butt btn btn-secondary"><i class="fas fa-plus-circle" style="margin-right: 7px;"></i>Add item</button></a>
                </div>
            </div>
        </div>

        <h1>{{$item->title}}</h1>
        <div class="box-container img-container" style="margin-left: 10%; height: 500px;">
            @if(count($item_photos)>0)
            <div class="info-img">
                @foreach ($item_photos as $item_photo)

                    <img src="{{asset('/storage/'.$item_photo->photo_path)}}">

                @endforeach


                <div class="link">

                    {{$item_photos->links()}}
                </div>

                @else
                    <p>NO PHOTS!</p>
                @endif
            </div>
        </div>
        <div class="form">
            <div class="info row" style="width: 500px; margin-left: 20%;">


                <div style="padding: 20px;" class="col-md-6 mb-3">
                    <label style="width: 200px; text-align: center;" for="email">Description</label>
                    <input style="width: 200px; text-align: center;" type="text" class="form-control" id="email" placeholder="{{$item->description}}" value="" required>
                    <div class="invalid-feedback">
                        item description .
                    </div>
                </div>

                <div style="padding: 20px;" class="col-md-6 mb-3">
                    <label style="width: 200px; text-align: center;" for="zip_code">price</label>
                    <input style="width: 200px; text-align: center;" type="text" class="form-control" id="zip_code" placeholder="{{$item->price}}" value="" required>
                    <div class="invalid-feedback">
                        price.
                    </div>
                </div>

                <div style="padding: 20px;" class="col-md-6 mb-3">
                    <label style="width: 200px; text-align: center;" for="city">disponibility starts at</label>
                    <input style="width: 200px; text-align: center;" type="text" class="form-control" id="city" placeholder="{{$item->dispo_starts}}" value="" required>
                    <div class="invalid-feedback">
                        disponibility starts at.
                    </div>
                </div>
                <div style="padding: 20px;" class="col-md-6 mb-3">
                    <label style="width: 200px; text-align: center;" for="city">disponibility ends at</label>
                    <input style="width: 200px; text-align: center;" type="text" class="form-control" id="city" placeholder="{{$item->dispo_ends}}" value="" required>
                    <div class="invalid-feedback">
                        disponibility ends at.
                    </div>
                </div>

                <div style="padding: 20px;" class="col-md-6 mb-3">
                    <label style="width: 200px; text-align: center;" for="city">created at</label>
                    <input style="width: 200px; text-align: center;" type="text" class="form-control" id="city" placeholder="{{$item->created_at}}" value="" required>
                    <div class="invalid-feedback">
                        created_at.
                    </div>
                </div>

                <div style="padding: 20px;" class="col-md-6 mb-3">
                    <label style="width: 200px; text-align: center;" for="city">updated at</label>
                    <input style="width: 200px; text-align: center;" type="text" class="form-control" id="city" placeholder="{{$item->updated_at}}" value="" required>
                    <div class="invalid-feedback">
                        updated_at.
                    </div>
                </div>



            </div>
        </div>
        <div class="btns">
            <div class="col1">
                <label for="adresse"><br></label>
                <a href="{{ url('Item/'.$item->id. '/edit') }}"><button type="button" class="btn btn-outline-success my-2 my-sm-0"><i class="fas fa-edit" style="margin-right: 7px;"></i>Edit </button></a>
            </div>

            <div class="col2">
                <button type="button" class="btn btn-danger pull-right " onclick="deleteItem({{ $item->id }})">Delete</button>
                <form method="post" action="{{ url('Item/' .$item->id. '/delete') }}" id="delete-form" style="display: none">
                    @csrf
                        @method('PUT')
                </form>
            </div>
        </div>

    @endif

    @endif







    <!-- Select Plugin Js -->
    <script src="{{ asset('assets/backend/plugins/bootstrap-select/js/bootstrap-select.js') }}"></script>
    <!-- TinyMCE -->
    <script src="{{ asset('assets/backend/plugins/tinymce/tinymce.js') }}"></script>
    <script src="https://unpkg.com/sweetalert2@7.19.1/dist/sweetalert2.all.js"></script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment-with-locales.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="{{ asset('js/lightpick.js') }}" ></script>

<script type="application/javascript" >
    var dispo_starts = "{{$item->dispo_starts}}";
    var dispo_ends = "{{$item->dispo_ends}}";
    var takendates  =  JSON.parse({!!json_encode($takendates)!!});

    var date = new Date();
    var today = date.getFullYear()+'-'+(date.getMonth()+1)+'-'+date.getDate();
    const myPicker = new Lightpick({
        field: document.getElementById('start'),
        secondField: document.getElementById('end'),

        // date format
        format: 'YYYY-MM-DD',

        // separator character
        separator: ' -',

        // number of months to display
        numberOfMonths: 2,

        // number of columns to display
        numberOfColumns: 2,

        // single date mode
        singleDate: false,

        // auto close after selection
        autoclose: true,

        // Repick start/end instead of new range.
        repick: false,


        // min/max dates
        minDate: today,
        maxDate: dispo_ends,

        // min/max days
        minDays: null,
        maxDays: null,

        // shows tooltip
        hoveringTooltip: true,

        // disabled dates in the range
        disabledDatesInRange: false,
        disableDates: takendates ,
        // disable Saturday and Sunday.
        disableWeekends: false,

        // inline mode (still still)

        inline: true,
        onSelect: function(end){
            var totaldays=$( ".lightpick__tooltip" ).text();
            var days = totaldays.replace(/\D/g, "");

            if (totaldays != ""){
                $("#bill").show();
                $("#total_days").text(totaldays);
                var price = $("#price").text();
                var total_price = price*days;
                $("#total_price").text(total_price.toFixed(2)); // XXXXX.xx
                $("#renting_period").append("<br>from : "+$("#start").val()+" <br>to : "+$("#end").val());
                $('input[name="total_price"]').val(total_price.toFixed(2));

            }
        }

    });
    var calendar = $('.lightpick--inlined');
    calendar.insertBefore('#bill');
    calendar.addClass("offset-md-2");
    calendar.addClass("calendrier");
    calendar.css({"margin-bottom":"2%","margin-top":"2%","z-index": "0","margin-left":"30%"});


    function submitForm() {
        $("#checkoutform").submit();

    }
</script>

<!-- to delete item (mounia) -->
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

    function deleteItem(id) {
            swal({
                title: 'Are you sure?',
                text: "You want to delete this item ",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-danger',
                cancelButtonClass: 'btn btn-success',
                buttonsStyling: false,
                reverseButtons: true
            }).then((result) => {
                if (result.value) {
                    event.preventDefault();
                    document.getElementById('delete-form').submit();
                } else if (
                    // Read more about handling dismissals
                    result.dismiss === swal.DismissReason.cancel
                ) {
                    swal(
                        'Cancelled',
                        'The item is not deleted :)',
                        'info'
                    )
                }
            })
        }

</script>

@endsection

