@extends('layouts.app')
<!-- link css -->
<link href="{{ asset('css/myitems.css') }}" rel="stylesheet">
<!--  -->
@section('content')
    
    <br><br><br>
    <div class="nav">
      <div class="mini-block">
           <div class="s-nav">
              <a href="#"><button type="button" class="butt btn btn-secondary"><i class="fas fa-envelope-open-text" style="margin-right: 7px;"></i>My messages</button></a>
          <a href="{{$user->id}}/"><button type="button"  class="butt btn btn-secondary"><i class="fas fa-shopping-cart" style="margin-right: 7px;"></i>My items</button></a>
          <a href="{{ url('Item/create/') }}"><button type="button"  class="butt btn btn-secondary"><i class="fas fa-plus-circle" style="margin-right: 7px;"></i>Add item</button></a>
              <a href="#"><button type="button"  class="butt btn btn-secondary"><i class="fas fa-heart" style="margin-right: 7px;"></i>My favorites</button></a>
              </i><a href="http://localhost/WEB/locatoria/public/user/{{$user->id}}/edit"><button type="button" class="butt btn btn-secondary"><i class="fas fa-edit" style="margin-right: 7px;"></i>Update Profile</button></a>
          </div>
      </div>
  </div>
    <h1>My items</h1><br><br>

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