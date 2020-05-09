@extends('layouts.auth')
<!-- link css -->
<link href="{{ asset('css/lightpick.css') }}" rel="stylesheet">
<link href="{{ asset('css/image-uploader.min.css') }}" rel="stylesheet">
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<!--  -->
@section('content')
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
                        <form enctype="multipart/form-data" action="{{ url('Item') }}" method="POST">
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
                                        <option value="1">INFORMATIQUE ET MULTIMEDIA</option>
                                        <option value="2">VEHICULES</option>
                                        <option value="3">IMMOBILIER</option>
                                        <option value="4">POUR LA MAISON ET JARDIN</option>
                                        <option value="5">HABILLEMENT ET BIEN ETRE</option>
                                        <option value="6">LOISIRS ET DIVERTISSEMENT</option>
                                        <option value="7">EMPLOI ET SERVICES</option>
                                        <option value="8">ENTREPRISES</option>
                                        <option value="9">AUTRES</option>
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
                                    <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- from ends here -->

    <!-- include for js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"   type="application/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script src="{{ asset('js/lightpick.js') }}" ></script>
    <script src="{{ asset('js/image-uploader.js') }}" ></script>
    <!--  -->
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
@endsection
