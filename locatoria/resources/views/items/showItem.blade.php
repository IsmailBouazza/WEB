@extends('layouts.app')

<link href="{{ asset('css/home.css') }}" rel="stylesheet">

<!--  -->
@section('content')
<div class="search">
    <form  action="{{URL::to('/search')}}" method="POST" class="form-inline mt-2 mt-md-0">
        @csrf
        <input class="form-control mr-sm-2" type="text" placeholder="District,City,Region ...." aria-label="Search">
        <input class="form-control mr-sm-2" type="text" placeholder="Object" aria-label="Search">
        <input class="form-control mr-sm-2" type="text" placeholder="Budget max" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</div>

<h1>{{$item->title}}</h1>
<p>{{$item->description}}</p>
<p>{{$item->status}}</p>

    
@endsection