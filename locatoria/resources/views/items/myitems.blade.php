@extends('layouts.auth')
<link href="{{ asset('css/myitems.css') }}" rel="stylesheet">
@section('content')
    
    <br><br><br><br><br><br>
    <h1>Items</h1><br><br>
    <a href="http://localhost/locatoria/public/items/create"><button id="btn" type="button" class="btn btn-dark">Add item</button></a>

    <div class="album ">
    
      
            @if($user->items->count() > 0)
            @foreach($user->items as $item)
            <div class="card" style="width: 18rem;">
            <img src="{{asset('/storage/' .$item->thumbnail_path )}}" class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" role="img"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em"></text>
          
            <div class="card-body">
              <h5 class="card-title">{{$item->title}}</h5>
              <p class="card-text">{{$item->description}}</p>
              <a href="../showitem/{{$item->id}}" class="btn btn-primary">view details</a>
            </div>
          </div>
       
          @endforeach
          @else
            <p>NO ITEM FOUND</p>
          @endif
       
  </div>
  
@endsection