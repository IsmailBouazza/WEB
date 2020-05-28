@extends('layouts.adminmenu')
<link href="{{ asset('css/reported.css') }}" rel="stylesheet">

@section('css')
  
 
@endsection

@section('content')

{{--<div class="title" style=" margin-left : 30%; display : flex; flex-wrap : wrap; text-align: center; margin-top : 7%;">
    <i class="fas fa-shopping-cart fa-5x"></i>
    <h1 style="margin-top : 15px; margin-left : 2%;;">Locatoria's items</h1>

</div>--}}
<img class="top" src="{{asset('images/items.png')}}" style="width: 90px; height:90px; border-radius: 50%; margin-left:5%; margin-top:2%;">
    <h2 style="margin-left : 9%;">Locatoria's Items </h2>
    
<hr>

<div class="container" style="margin-left: 3%;">
  <div class="wrapper">
      @if(($items->count()) > 0)
          @foreach($items as $item)
            @if($item->status == '1')
              <div class="product">
                  <figure class="product__card">
                      <div class="product__image">
                          <img src="{{asset('/storage/'.$item->thumbnail_path )}}" alt="image">
                          <div class='product__btns'>
                              <a href="{{ url('Item/'.$item->id) }}">quick view</a>
                          </div>
                      </div>
                      <figcaption class="product__description">
                          <h4>{{$item->title}}</h4>
                          <span class="price">
                            {{$item->price}} Dh
                           
                          </span>
                      </figcaption>
                  </figure>
              </div>
              @endif
          @endforeach
      @else
          <div class="msg">
              <p class="msg">No items added yet</p>
              <small>Sorry try latter !!</small> 
          </div>
      @endif
  </div>
</div>




@endsection