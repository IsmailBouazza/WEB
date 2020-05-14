@extends('layouts.app')
<!-- link css -->
<link href="{{ asset('css/item.css') }}" rel="stylesheet">
<link href="{{ asset('css/lightpick.css') }}" rel="stylesheet">
<!--  -->
@section('content')

@if(Auth::user())
    @if($item->user_id == Auth::user()->id)


    </br><h1>{{$item->title}}</h1>
    <div class="box-container img-container">
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
    <div class="block">
        <div class="info row">


            <div class="col-md-6 mb-3">
                <label for="email">Description</label>
                <input type="text" class="form-control" id="email" placeholder="{{$item->description}}" value="" required>
                <div class="invalid-feedback">
                    item description .
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <label for="zip_code">price</label>
                <input type="text" class="form-control" id="zip_code" placeholder="{{$item->price}}" value="" required>
                <div class="invalid-feedback">
                   price.
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <label for="city">disponibility starts at</label>
                <input type="text" class="form-control" id="city" placeholder="{{$item->dispo_starts}}" value="" required>
                <div class="invalid-feedback">
                    disponibility starts at.
                </div>
            </div>
            <div class="col-md-6 mb-3">
                <label for="city">disponibility ends at</label>
                <input type="text" class="form-control" id="city" placeholder="{{$item->dispo_ends}}" value="" required>
                <div class="invalid-feedback">
                    disponibility ends at.
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <label for="city">created at</label>
                <input type="text" class="form-control" id="city" placeholder="{{$item->created_at}}" value="" required>
                <div class="invalid-feedback">
                    created_at.
                </div>
            </div>

            <div class="col-md-6 mb-3">
                <label for="city">updated at</label>
                <input type="text" class="form-control" id="city" placeholder="{{$item->updated_at}}" value="" required>
                <div class="invalid-feedback">
                    updated_at.
                </div>
            </div>



        </div>
    </div>
</div>
<div class="btns">
<div class="col1">
    <label for="adresse"><br></label>
    </i><a href="{{ url('Item/'.$item->id. '/edit') }}"><button type="button" class="btn btn-outline-success my-2 my-sm-0"><i class="fas fa-edit" style="margin-right: 7px;"></i>Edit </button></a>
</div>

<div class="col2">
{!!Form::open(['action' => ['ItemController@destroy', $item->id], 'method'=> 'POST', 'class'=> 'pull-right'])!!}
    {{Form::hidden('_method', 'DELETE')}}
    {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
{!!Form::close()!!}
</div>


<!--<div class="col2">
    <label for="adresse"><br></label>
    <form class="form-inline mt-2 mt-md-0">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">archive</button>
    </form>
</div> -->
</div>

@else

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
            </div>
    </div>

    <div class="price-container">
        <div style="font-size:1.5em"><a href="#"><i class="fas fa-heart" style="margin-right: 10px; width:30px; height:30px"></i></a>Make it your favorite</div>
        <hr>
        <div style="font-size:1.5em"><i class="fas fa-dollar-sign" style="margin-right: 10px;"></i>{{$item->price}}</div>
    </div>
@endif
@else

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
        </div>
</div>

<div class="price-container">
    <div style="font-size:1.5em"><a href="#"><i class="fas fa-heart" style="margin-right: 10px; width:30px; height:30px"></i></a>Make it your favorite</div>
    <hr>
    <div style="font-size:1.5em"><i class="fas fa-dollar-sign" style="margin-right: 10px;"></i>{{$item->price}}</div>
</div>



@endif

<!--chekout-->

<div class="col-lg-12" id="bill" style="display: none">
    <div id="mainContentWrapper">
        <div class="row p-2 offset-md-2">
            <div class="col-md-8  m-2">
                <h3>
                    Review your Reservation
                </h3>
                <div class="row">
                    <div class="col-md-8 mt-2">
                        <div class="card">
                            <h5 class="card-header">
                                {{$item->title}}
                            </h5>
                            <div class="card-body">
                                <p class="card-text">
                                <ul>
                                    <li><b><i>Gategory : </i></b></li>
                                    <li><b><i>Renting Period : </i></b><span id="renting_period"></span></li>
                                    <li><b><i>Total Days : </i></b><span id="total_days"></span></li>
                                    <li><b><i>Price Per Day : </i></b><span id="price">{{$item->price}}</span> MAD</li>
                                </ul>

                                </p>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-4 ">
                        <br><br><br><br>
                        <h3 class="text-center mt-2">
                            Total Price
                        </h3>
                        <h3 class="text-center text-success">
                            <span id="total_price"></span> MAD</span>
                        </h3>
                    </div>
                </div>
                <button type="button" class="btn btn-block btn-md active btn-success mt-5" onClick="submitForm()">
                    Send Renting Request
                </button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment-with-locales.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="{{ asset('js/lightpick.js') }}" ></script>

<script type="application/javascript" >
    var dispo_starts = "{{$item->dispo_starts}}";
    var dispo_ends = "{{$item->dispo_ends}}";
    var takendates  =  JSON.parse({!!json_encode($takendates)!!});

    var date = new Date();
    var today = date.getFullYear()+'-'+(date.getMonth()+1)+'/'+date.getDate();
    console.log(takendates);
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
                $("#renting_period").text("from : "+$("#start").val()+" to : "+$("#end").val());
                $('input[name="total_price"]').val(total_price.toFixed(2));

            }
        }

    });
    var calendar = $('.lightpick--inlined');
    calendar.insertBefore('#bill');
    calendar.addClass("offset-md-2");
    calendar.css({"margin-bottom":"2%","margin-top":"2%","z-index": "0"});


    function submitForm() {
        $("#checkoutform").submit();

    }
</script>
@endsection
