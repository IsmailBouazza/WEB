@extends('layouts.app')
<!-- link css -->
<link href="{{ asset('css/myitems.css') }}" rel="stylesheet">
<link href="{{ asset('css/account.css') }}" rel="stylesheet">

<!--  -->
@section('content')
    
    <br><br><br>
    <div class="nav">
      <div class="mini-block">
        <img src="{{asset('storage/'.$user->picture)}}" style="width:150px; height:150px; border-radius:50%; margin-left:100px;">
           <div class="s-nav">
            <a href="http://localhost/WEB/locatoria/public/user/{{$user->id}}"><button type="button" class="butt btn btn-secondary"><i class="fas fa-home" style="margin-right: 7px;"></i>My Profile</button></a>
              <a href="#"><button type="button" class="butt btn btn-secondary"><i class="fas fa-envelope-open-text" style="margin-right: 7px;"></i>My messages</button></a>
              <a href="#"><button type="button"  class="butt btn btn-secondary"><i class="fas fa-heart" style="margin-right: 7px;"></i>My favorites</button></a>
              <a href="http://localhost/WEB/locatoria/public/Reservation"><button type="button"  class="butt btn btn-secondary"><i class="fas fa-check-square" style="margin-right: 7px;"></i>My reservations</button></a>
              <a href="{{ url('Item/create/') }}"><button type="button"  class="butt btn btn-secondary"><i class="fas fa-plus-circle" style="margin-right: 7px;"></i>Add item</button></a>            
            </div>
      </div>
    </div>

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
          </div>
       
          @endforeach
          @else
            <p>NO ITEM FOUND</p>
          @endif
       
  </div>
  
@endsection