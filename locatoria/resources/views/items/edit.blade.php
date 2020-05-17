@extends('layouts.app')
@section('content')
<link href="{{ asset('css/image-uploader.min.css') }}" rel="stylesheet">
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
                    <form enctype="multipart/form-data" action="{{ url('Item/'.$item->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group row">
                            <label for="title" class="col-4 col-form-label">Title</label>
                            <div class="col-8">
                                <input id="title" name="title" placeholder="item title " type="text" class="form-control" required value="{{$item->title}}">
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
                                <textarea id="description" name="description" cols="40" rows="5" class="form-control" required ></textarea>

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

                                    <option value="1" @if ($item->category_id== 1) selected @endif>INFORMATIQUE ET MULTIMEDIA</option>
                                    <option value="2" @if ($item->category_id== 2) selected @endif>VEHICULES</option>
                                    <option value="3" @if ($item->category_id== 3) selected @endif>IMMOBILIER</option>
                                    <option value="4" @if ($item->category_id== 4) selected @endif>POUR LA MAISON ET JARDIN</option>
                                    <option value="5" @if ($item->category_id== 5) selected @endif>HABILLEMENT ET BIEN ETRE</option>
                                    <option value="6" @if ($item->category_id== 6) selected @endif>LOISIRS ET DIVERTISSEMENT</option>
                                    <option value="7" @if ($item->category_id== 7) selected @endif>EMPLOI ET SERVICES</option>
                                    <option value="8" @if ($item->category_id== 8) selected @endif>ENTREPRISES</option>
                                    <option value="9" @if ($item->category_id== 9) selected @endif>AUTRES</option>
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
                                <input id="price" name="price" placeholder="$$$$ " type="text" class="form-control" required value="{{$item->price}}">
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
                                <input type="text" id="dispo_starts" name="dispo_starts" placeholder="from" class="form-control" class="form-control" required value="{{$item->dispo_starts}}"/>
                                <input type="text" id="dispo_ends" name="dispo_ends" placeholder="to" class="form-control" required value="{{$item->dispo_ends}}"/>
                                @if ($errors->has('dispo_starts') or $errors->has('dispo_ends'))
                                    <div class="card bg-danger text-white">
                                        <div class="card-body text-center" style="padding: 5px;">{{ $errors->first('dispo_starts') }} {{ $errors->first('dispo_ends') }}</div>
                                    </div>
                                @endif
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="dispo_starts" class="col-4 col-form-label">Current thumbnail</label>
                            <div class="col-8">
                                <div class="bg-primary text-center">
                                    <img width="200px" height="200px" src="{{asset('/storage/'.$item->thumbnail_path)}}" alt="Old thumbnail">
                                </div>
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="dispo_starts" class="col-4 col-form-label">Current Images</label>
                            <div class="col-8">
                                <div class="row">
                                    @foreach($item_photos_links as $photo_id => $photo_path)
                                        <div class="col-sm-6 col-md-4 mb-3">
                                            <img style="width:100px" src="{{asset('/storage/'.$photo_path)}}"  >
                                            <button type="button" style="width:100%"class="btn btn-danger p-1" id="{{$photo_id}}">delete</button>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="thumbnail" class="col-4 col-form-label">Add new Thumbnail</label>
                            <div class="col-8">

                                <div class="input-group">

                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="thumbnail" name="thumbnail" accept="image/*">
                                        <label class="custom-file-label" for="thumbnail">Choose new file </label>
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
                            <label for="images" class="col-4 col-form-label">Add new images</label>
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
                                <input type="hidden" name="id" value="{{$item->id}}" />
                                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>

                    </form>



                </div>
            </div>
        </div>
    </div>
</div>




<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="{{ asset('js/image-uploader.js') }}" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script>
    // add model to show old

    //filling up description
    $( document ).ready(function() {
        $("#description").val("{{$item->description}}");

    });


    $(document).on("click",".btn", function () {
        var id = $(this).attr('id');
        var token = $("meta[name='csrf-token']").attr("content");
        $.ajax({
            url: "../../ItemPhoto/"+id,
            type: 'DELETE',
            data: {"_token": token,
                "id": id,
            }, success: function (msg){
                alert(msg)
            }
        });

        $(this).parent().fadeOut( 2000 );
    });

    // show thumbnail file name in the input field
    $('#thumbnail').change(function(e){
        var fileName = e.target.files[0].name;
        $('.custom-file-label').html(fileName);
    });

    // images loader
    $('.input-images-1').imageUploader();


</script>
@endsection
