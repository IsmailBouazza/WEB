@extends('layouts.adminmenu')

@section('css')
  
  <link href="{{ asset('css/myitems.css') }}" rel="stylesheet">
@endsection

@section('content')

<div class="title" style=" margin-left : 30%; display : flex; flex-wrap : wrap; text-align: center; margin-top : 7%;">
    <i class="fas fa-shopping-cart fa-5x"></i>
    <h1 style="margin-top : 15px; margin-left : 2%;;">Locatoria's items</h1>

</div>
<hr>

<div class="row">  
    <div class="album ">
      @if($items->count() > 0)
      @foreach($items as $item)
      <div class="card" style="width: 18rem;">
        <img src="{{asset('/storage/' .$item->thumbnail_path )}}" class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" aria-label="Placeholder: Image cap" preserveAspectRatio="xMidYMid slice" role="img"><title>Placeholder</title><rect width="100%" height="100%" fill="#868e96"/><text x="50%" y="50%" fill="#dee2e6" dy=".3em"></text>
    
      <div class="card-body">
        <h5 class="card-title">{{$item->title}}</h5>
        <p class="card-text">{{$item->description}}</p>
        <a href="{{ url('/Item/'.$item->id) }}" class="btn btn-primary">view details</a>
      </div>        
    </div>
</div>
</div>
@endforeach


@else

   <h2 style="margin-top : 10%; margin-left : 50%; ">No items created <i class="far fa-sad-tear"></i></h2>
@endif

@endsection