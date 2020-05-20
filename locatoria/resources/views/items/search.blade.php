@extends('layouts.app')
<!-- link css -->
<link href="{{ asset('css/home.css') }}" rel="stylesheet">

<!--  -->
@section('content')
<table class="img-container">
    <tr>
      <td class="image">
        <img src="{{asset('images/logo.png')}}">
      </td>
      <td class="image">
        Welcome to the best renting website
      </td>
    </tr>
  </table>
<div class="search">
    <form  action="{{URL::to('/search')}}" method="POST" class="form-inline mt-2 mt-md-0">
        @csrf
        <input class="form-control mr-sm-2" type="text" name= 'city' placeholder="District,City,Region ...." aria-label="Search">
        <input class="form-control mr-sm-2" type="text" name= 'object' placeholder="Object" aria-label="Search">
        <input class="form-control mr-sm-2" type="text" name= 'budget_max' placeholder="Budget max" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</div>

<div class="album" style="">

    @if (count($item)>0)
        @foreach ($item as $result)
            <div id="card" class="card" style="width: 18rem; height:400px">
                <img style="height: 50%" class="card-img-top" src="{{asset('/storage/' .$result->thumbnail_path )}}" alt="Card image cap">
                <div class="card-body">
                    <h5 class="card-title">{{$result->title}}</h5>
                    <p class="card-text">{{$result->description}}</p>
            
                    <div class="desc btn-group">
                        <p><a style="margin-top: 10%; margin-left: 30px" class="btn btn-sm btn-outline-secondary" href="{{asset('/Item/'.$result->id)}}" role="button">View details &raquo;</a></p> 
                        @if($result->status == '0')
                            <a href="{{url('Premium')}}">
                                <i class="fas fa-star" style="width: 50px; height: 50px; margin-left: 30px; color:yellow"></i>
                            </a>
                        @endif                     
                    </div>
                </div>
            </div>
             
        @endforeach
    @else
        <div class="msg">
            <p class="msg">No Results found</p>
            <small>Sorry try latter !!</small> 
        </div>    
    @endif

</div>
@endsection