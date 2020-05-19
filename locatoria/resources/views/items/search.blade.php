@extends('layouts.app')
<!-- link css -->
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
<h1>Search results</h1>
@if (count($item)>0)
    @foreach ($item as $result)
    <div id="card" class="card" style="width: 18rem;">
        <img class="card-img-top" src="{{asset('/storage/' .$result->thumbnail_path )}}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">{{$result->title}}</h5>
          <p class="card-text">{{$result->description}}</p>
  
        <a href="{{ url('Item/'.$result->id) }}" class="btn btn-primary">view details</a>
        </div>
      </div>
    @endforeach
@else
    <p>No results found</p>
@endif
@endsection