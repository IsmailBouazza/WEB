@extends('layouts.app')
<!-- link css -->
<link href="{{ asset('css/item.css') }}" rel="stylesheet">
<link href="{{ asset('css/lightpick.css') }}" rel="stylesheet">
<link href="{{ asset('css/account.css') }}" rel="stylesheet">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
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



    @if(!Auth::user() || Auth::user()->id !== $item->user_id)

        <!--Client-->

        <div class="box-container img-container">

            <div class="info-img">
                <div style="margin-left: -30%" >{{$item->title}}   <span  class="float-lg-right" style="font-size:0.9rem;color:green;margin-right: 3%;font-weight: bold " >Price : {{$item->price}}/day MAD</span></div>

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

            <button type="button" class="btn btn-success mt-2" style="display: inline;margin-left: 20%;width: 30%">Chat</button>
            <button type="button"  class="mt-2 btn btn-warning" style="display: inline;margin-left: 2%;width: 30%" data-toggle="modal" data-target="#myModal">Report</button>
            <hr>

            <div style="font-size:1.2em">
                    @if(Auth::check())
                        {{-- $NotFavourite return false if the item is favorite--}}
                         @if($NotFavourite)
                            <button id="favbtn" class="btn"><i class="fas fa-heart" style="margin-right: 10px; width:30px; height:30px;color: rgba(253,32,32,0.64)"></i> <br>
                                Add this item to your favorites</button>
                         @else
                              <button  class="btn"><i class="fas fa-heart" style="margin-right: 10px; width:30px; height:30px;color: rgb(253,32,32)"></i> <br>
                                  This item is one of your favorites</button>
                         @endif

                    @else
                            <button  class="btn"><i class="fas fa-heart" style="margin-right: 10px; width:30px; height:30px;color: #bccac3"></i> <br>
                                login to add this item to your favorites</button>
                      @endif
            </div>




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



        <!-- The Modal -->
        <div class="modal" id="myModal">
            <div class="modal-dialog">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Reporting an Item</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="reason">Tell us why you want to report this item :</label>
                            <textarea class="form-control" id="reason" rows="3"></textarea>
                        </div>
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">

                        <button type="button" class="btn btn-dark" id="closemodal" data-dismiss="modal">close</button>
                        <button type="button" id="report"  class="btn btn-danger" >Report</button>
                    </div>

                </div>
            </div>
        </div>
        <!-- The Modal end -->
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
        @include('inc.sidebar')


        <main class="page-content" >
            <div class="container-fluid">
                <img src="{{asset('images/item.png')}}" style="width: 100px; height:100px">
                <h2>Items</h2>
                <hr>
                <div class="row">
                    <div class="box-container img-container" style="margin-left: 10%; height: 500px;">
                        @if(count($item_photos)>0)
                        <div class="info-img">
                            <div class="slider-wrapper">

                                <div class="slider-container">
                                    @foreach ($item_photos as $item_photo)

                                        <img src="{{asset('/storage/'.$item_photo->photo_path)}}">

                                    @endforeach
                                </div>

                                <div class="slider-controls">
                                <span class="control prev">&larr;</span>
                                <span class="control next">&rarr;</span>
                                </div>

                            </div>
                            @else
                                <p>NO PHOTS!</p>
                            @endif
                        </div>
                    </div>
                    <div class="form">
                        <div class="info row" style="margin-left: 7%">


                            <div style="padding: 20px;" class="col-md-6 mb-3">
                                <label style="width: 300px; text-align: center; text-align: center;" for="email">Description</label>
                                <input style="width: 300px; text-align: center; text-align: center;" type="text" class="form-control" id="email" placeholder="{{$item->description}}" value="" required>
                                <div class="invalid-feedback">
                                    item description .
                                </div>
                            </div>

                            <div style="padding: 20px;" class="col-md-6 mb-3">
                                <label style="width: 300px; text-align: center; text-align: center;" for="zip_code">price</label>
                                <input style="width: 300px; text-align: center; text-align: center;" type="text" class="form-control" id="zip_code" placeholder="{{$item->price}}" value="" required>
                                <div class="invalid-feedback">
                                    price.
                                </div>
                            </div>

                            <div style="padding: 20px;" class="col-md-6 mb-3">
                                <label style="width: 300px; text-align: center; text-align: center;" for="city">disponibility starts at</label>
                                <input style="width: 300px; text-align: center; text-align: center;" type="text" class="form-control" id="city" placeholder="{{$item->dispo_starts}}" value="" required>
                                <div class="invalid-feedback">
                                    disponibility starts at.
                                </div>
                            </div>
                            <div style="padding: 20px;" class="col-md-6 mb-3">
                                <label style="width: 300px; text-align: center; text-align: center;" for="city">disponibility ends at</label>
                                <input style="width: 300px; text-align: center; text-align: center;" type="text" class="form-control" id="city" placeholder="{{$item->dispo_ends}}" value="" required>
                                <div class="invalid-feedback">
                                    disponibility ends at.
                                </div>
                            </div>

                            <div style="padding: 20px;" class="col-md-6 mb-3">
                                <label style="width: 300px; text-align: center; text-align: center;" for="city">created at</label>
                                <input style="width: 300px; text-align: center; text-align: center;" type="text" class="form-control" id="city" placeholder="{{$item->created_at}}" value="" required>
                                <div class="invalid-feedback">
                                    created_at.
                                </div>
                            </div>

                            <div style="padding: 20px;" class="col-md-6 mb-3">
                                <label style="width: 300px; text-align: center; text-align: center;" for="city">updated at</label>
                                <input style="width: 300px; text-align: center; text-align: center;" type="text" class="form-control" id="city" placeholder="{{$item->updated_at}}" value="" required>
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

                    @include('inc.jsSidebar')


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

    // add to favorites
    $(document).on("click","#favbtn", function () {
        var token = $("meta[name='csrf-token']").attr("content");
        $.ajax({
            url: "{{ url('/addToFavorites/'.$item->id) }}",
            type: "POST",
            data: { "_token": token,
                "item_id": {{$item->id}}},
            success: function( msg ) {

                if(msg){
                    alert("item added to you favorites");
                    $('.fa-heart').css('color','#fd2020');
                }
            }
        });


    });

    //report item

    $(document).on("click","#report", function () {
        var reason = $('#reason').val();
        $('#reason').val("");
        var token = $("meta[name='csrf-token']").attr("content");
        if (confirm(" you want to report this item ?")) {
                $.ajax({
                    url: "{{ url('/report/'.$item->id) }}",
                    type: "POST",
                    data: {"_token": token,'reason':reason},
                    success: function (msg) {
                        $("#closemodal").click();
                        if (msg) {
                            alert("item reported");
                            $("#report").prop("disabled", true);
                        }
                    }
                });
        }

    });
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

<script type="text/javascript">

    //  set --n (used for calc in CSS) via JS, after getting
    // .container and the number of child images it holds:

    const _C = document.querySelector(".slider-container"),
      N = _C.children.length;

    _C.style.setProperty("--n", N);

    // detect the direction of the motion between "touchstart" (or "mousedown") event
    // and the "touched" (or "mouseup") event
    // and then update --i (current slide) accordingly
    // and move the container so that the next image in the desired direction moves into the viewport

    // on "mousedown"/"touchstart", lock x-coordiate
    // and store it into an initial coordinate variable x0:
    let x0 = null;
    let locked = false;

    function lock(e) {
      x0 = unify(e).clientX;
      // remove .smooth class
      _C.classList.toggle("smooth", !(locked = true));
    }

    // next, make the images move when the user swipes:
    // was the lock action performed aka is x0 set?
    // if so, read current x coordiante and compare it to x0
    // from the difference between these two determine what to do next

    let i = 0; // counter
    let w; //image width

    // update image width w on resive
    function size() {
      w = window.innerWidth;
    }

    function move(e) {
      if (locked) {
        // set threshold of 20% (if less, do not drag to the next image)
        // dx = number of pixels the user dragged
        let dx = unify(e).clientX - x0,
          s = Math.sign(dx),
          f = +(s * dx / w).toFixed(2);

        // Math.sign(dx) returns 1 or -1
        // depending on this, the slider goes backwards or forwards

        if ((i > 0 || s < 0) && (i < N - 1 || s > 0) && f > 0.2) {
          _C.style.setProperty("--i", (i -= s));
          f = 1 - f;
        }

        _C.style.setProperty("--tx", "0px");
        _C.style.setProperty("--f", f);
        _C.classList.toggle("smooth", !(locked = false));
        x0 = null;
      }
    }

    size();

    addEventListener("resize", size, false);

    // ===============
    // drag-animation for the slider when it reaches the end
    // ===============

    function drag(e) {
      e.preventDefault();

      if (locked) {
        _C.style.setProperty("--tx", `${Math.round(unify(e).clientX - x0)}px`);
      }
    }

    // ===============
    // prev, next
    // ===============
    let prev = document.querySelector(".prev");
    let next = document.querySelector(".next");

    prev.addEventListener("click", () => {
      if (i == 0) {
        console.log("start reached");
      } else if (i > 0) {
        // decrease i as long as it is bigger than the number of slides
        _C.style.setProperty("--i", i--);
      }
    });

    next.addEventListener("click", () => {
      if (i < N) {
        // increase i as long as it's smaller than the number of slides
        _C.style.setProperty("--i", i++);
      }
    });

    // ===============
    // slider event listeners for mouse and touch (start, move, end)
    // ===============

    _C.addEventListener("mousemove", drag, false);
    _C.addEventListener("touchmove", drag, false);

    _C.addEventListener("mousedown", lock, false);
    _C.addEventListener("touchstart", lock, false);

    _C.addEventListener("mouseup", move, false);
    _C.addEventListener("touchend", move, false);

    // override Edge swipe behaviour
    _C.addEventListener(
      "touchmove",
      e => {
        e.preventDefault();
      },
      false
    );

    // unify touch and click cases:
    function unify(e) {
      return e.changedTouches ? e.changedTouches[0] : e;
    }

    </script>

    @endsection


