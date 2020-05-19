@extends('layouts.app')
<!-- link css -->
<link href="{{ asset('css/item.css') }}" rel="stylesheet">
<link href="{{ asset('css/lightpick.css') }}" rel="stylesheet">
<link href="{{ asset('css/image-uploader.min.css') }}" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<!--  -->
@section('content')

@include('inc.sidebar')


  <!-- sidebar-wrapper  -->
  <main class="page-content" >
    <div class="container-fluid">
        <img src="{{asset('images/add.jpg')}}" style="width: 100px; height:100px">
        <h2>Add new item</h2>
        <hr>
        <div class="row"> 

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">list an Item</div>

                            <div class="card-body">

                                @if(Session::has('success'))

                                    <div class="alert alert-success">
                                        {{ Session::get('success') }}
                                        @php
                                            Session::forget('success');
                                        @endphp
                                    </div>

                            @endif
                            <!-- from starts here -->
                                <form enctype="multipart/form-data" action="{{ url('Item') }}" method="POST" id="create-form">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="title" class="col-4 col-form-label">Title</label>
                                        <div class="col-8">
                                            <input id="title" name="title" placeholder="item title " type="text" class="form-control" required >
                                            @if ($errors->has('title'))
                                                <div class="card bg-danger text-white">
                                                    <div class="card-body text-center" style="padding: 5px;">{{ $errors->first('title') }}</div>
                                                </div>
                                            @endif
                                        </div>

                                    </div>
                                    <div class="form-group row">
                                        <label for="description" class="col-4 col-form-label">description</label>
                                        <div class="col-8">
                                            <textarea id="description" name="description" cols="40" rows="5" class="form-control" required></textarea>
                                            @if ($errors->has('description'))
                                                <div class="card bg-danger text-white">
                                                    <div class="card-body text-center" style="padding: 5px;">{{ $errors->first('description') }}</div>
                                                </div>
                                            @endif
                                        </div>

                                    </div>


                                    <div class="form-group row">
                                        <label for="category" class="col-4 col-form-label">Category</label>
                                        <div class="col-8">
                                            <select id="select" name="category" class="custom-select" required >
                                                <option value="" selected disabled hidden>Choose here</option>
                                                <option value="1">Car equipment</option>
                                                <option value="2">Clothes</option>
                                                <option value="3">High tech/Multimedia</option>
                                                <option value="4">Home-Made</option>
                                                <option value="5">House equipment</option>
                                                <option value="6">Pets</option>
                                                <option value="7">Services</option>
                                                <option value="8">Sport equipment/Hobbies</option>
                                                <option value="9">Vehicles</option>
                                            </select>
                                        </div>
                                        @if ($errors->has('category'))
                                            <div class="card bg-danger text-white">
                                                <div class="card-body text-center" style="padding: 5px;">{{ $errors->first('category') }}</div>
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group row">
                                        <label for="price" class="col-4 col-form-label">Rent Price</label>
                                        <div class="col-8">
                                            <input id="price" name="price" placeholder="$$$$ " type="text" class="form-control" required >
                                            @if ($errors->has('price'))
                                                <div class="card bg-danger text-white">
                                                    <div class="card-body text-center" style="padding: 5px;">{{ $errors->first('price') }}</div>
                                                </div>
                                            @endif
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label for="dispo_starts" class="col-4 col-form-label">Availability</label>
                                        <div class="col-8">
                                            <input type="text" id="dispo_starts" name="dispo_starts" placeholder="from" class="form-control" class="form-control" required/>
                                            <input type="text" id="dispo_ends" name="dispo_ends" placeholder="to" class="form-control" required/>
                                            @if ($errors->has('dispo_starts') or $errors->has('dispo_ends'))
                                                <div class="card bg-danger text-white">
                                                    <div class="card-body text-center" style="padding: 5px;">{{ $errors->first('dispo_starts') }} {{ $errors->first('dispo_ends') }}</div>
                                                </div>
                                            @endif
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label for="thumbnail" class="col-4 col-form-label">Thumbnail</label>
                                        <div class="col-8">

                                            <div class="input-group">

                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="thumbnail"
                                                        name="thumbnail" accept="image/*">
                                                    <label class="custom-file-label" for="thumbnail">Choose file</label>
                                                </div>
                                            </div>
                                            @if ($errors->has('thumbnail'))
                                                <div class="card bg-danger text-white">
                                                    <div class="card-body text-center" style="padding: 5px;">{{ $errors->first('thumbnail') }}</div>
                                                </div>
                                            @endif

                                        </div>

                                    </div>

                                    <div class="form-group row input-field">
                                        <label for="images" class="col-4 col-form-label">images</label>
                                        <div class="col-8">
                                            <div id="images" class="input-images-1"  style="padding-top: .5rem;"> </div>
                                            @if ($errors->has('images'))
                                                <div class="card bg-danger text-white">
                                                    <div class="card-body text-center" style="padding: 5px;">{{ $errors->first('images') }}</div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="offset-6 col-8">
                                            <button name="submit" type="submit" class="btn btn-primary" id="submit">Submit</button>
                                            <button onclick="document.getElementById('modal-wrapper').style.display='block'" type="button" class="btn btn-warning">Premium</button>
                                        </div>
                                    </div>

                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <!-- from ends here -->

    <!-- form for premium -->

    
    <div id="modal-wrapper" class="modal">
        <div class="modal-content">
            <h1>Premium</h1>
            <hr>
            <h4>Option premium will make your item appear in differents places</h4>
            <hr>
            <small>You will have to wait for the admin's approvale</small>
            <hr>
            <button style="width: 20%; margin-left:42%" id="send-premium" name="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

    

    <!-- premium script -->


    <!-- include for js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"   type="application/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script src="{{ asset('js/lightpick.js') }}" ></script>
    <script src="{{ asset('js/image-uploader.js') }}" ></script>
    <!--  -->

    <script>
        //if user clicked anywhere outside the modal, modal will close

        $( document ).ready(function() {
            var modal = document.getElementById('modal-wrapper');
            window.onclick = function(event){
            if(event.target == modal){
                modal.style.display = "none";
                
            }
            $('#send-premium').click(function(){
                $('form').append('<input type="hidden" name="premium" value="1" />');
                $('#submit').click();
            });  
            }
        });


    </script>



    <script type="application/javascript" >

        $('#thumbnail').change(function(e){
            var fileName = e.target.files[0].name;
            $('.custom-file-label').html(fileName);
        });


        var date = new Date();
        var today = date.getFullYear()+'-'+(date.getMonth()+1)+'/'+date.getDate();
        // console.log(today);
        const myPicker = new Lightpick({
            field: document.getElementById('dispo_starts'),
            secondField: document.getElementById('dispo_ends'),

            // date format
            format: 'YYYY-MM-DD',

            // separator character
            separator: ' -',

            // number of months to display
            numberOfMonths: 1,

            // number of columns to display
            numberOfColumns: 1,

            // single date mode
            singleDate: false,

            // auto close after selection
            autoclose: true,

            // Repick start/end instead of new range.
            repick: false,

            // start/end dates
            startDate: null,
            endDate: null,

            // min/max dates
            minDate: today,
            maxDate: null,

            // min/max days
            minDays: null,
            maxDays: null,

            // shows tooltip
            hoveringTooltip: true,

            // disabled dates in the range
            disabledDatesInRange: true,


            // disable Saturday and Sunday.
            disableWeekends: false,

            // inline mode (still still)
            inline: false,
        });

        $('.input-images-1').imageUploader();
    </script>


@include('inc.jsSidebar')

@endsection
