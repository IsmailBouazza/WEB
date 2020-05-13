@extends('layouts.app')

@section('content')


    <div class="box-container img-container">

        <div class="info-img">
            <div>{{$item->title}}</div>
            <hr>
            <div>{{$item->description}}</div>
        </div>

        @foreach ($item_photos as $item_photo)

            <img src="{{asset('storage/'.$item_photo->photo_path)}}">

        @endforeach


        <div class="link">
            {{$item_photos->links()}}
        </div>
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

    
@endsection