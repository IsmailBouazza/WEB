@extends('layouts.app')
<!-- link css -->
<link href="{{ asset('css/item.css') }}" rel="stylesheet">
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


    <form id="checkoutform" action="{{ url('Reservation') }}" method="POST" enctype="multipart/form-data">

        <input type="text" name="date_start" id="start">
        <input type="text" name="date_end" id="end">
        <input type="text" name="total_price">
        <input type="hidden" name="item_id" value="{{$item->id}}">
        <div class="offset-6 col-8">
            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

@endsection