@extends('layouts.app')
<!-- link css -->
<link href="{{ asset('css/home.css') }}" rel="stylesheet">

<!--  -->
@section('content')
<div class="search" style="margin-top: 100px">
    <form  action="{{URL::to('/search')}}" method="POST" class="form-inline mt-2 mt-md-0">
        @csrf
        <input class="form-control mr-sm-2" type="text" name= 'city' placeholder="District,City,Region ...." aria-label="Search">
        <input class="form-control mr-sm-2" type="text" name= 'object' placeholder="Object" aria-label="Search">
        <input class="form-control mr-sm-2" type="text" name= 'budget_max' placeholder="Budget max" aria-label="Search">
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</div>

<div class="container" style="margin-top: 100px">
    <div class="wrapper">
        @if(($item->count()) > 0)
            @foreach($item as $result)
                @if($result->status == '1')
                    <div class="product">
                        <figure class="product__card">
                            <div class="product__image">
                                <img src="{{asset('/storage/'.$result->thumbnail_path )}}" alt="image">
                                <div class='product__btns'>
                                    <a href="{{ url('Item/'.$result->id) }}">quick view</a>
                                </div>
                            </div>
                            <figcaption class="product__description">
                                <h4>{{$result->title}}</h4>
                                <span class="price">
                                {{$result->price}} DH
                                @if(Auth::user())
                                    @if(Auth::user()->id == $result->user_id)
                                        <i class="fas fa-user-circle" style="margin-left: 80%; width:40px; height:40px; color: blue;"></i>
                                    @endif
                                @endif
                                </span>
                            </figcaption>
                        </figure>
                    </div>
                @endif
            @endforeach
        @else
            <div class="msg">
                <p class="msg">No items found</p>
                <small>Sorry try latter !!</small>
            </div>
        @endif
    </div>
</div>

@endsection