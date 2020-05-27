@extends('layouts.adminmenu')
<link href="{{ asset('css/reported.css') }}" rel="stylesheet">

@section('css')
  
  <style>
    

      @import url("https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap");
      *,
      ::before,
      ::after {
          box-sizing: border-box;
      }
      body {
          font-family: "Montserrat", sans-serif;
      }
      a {
          color: lightgray;
          text-decoration: none;
          
          transition: .3s ease-in-out;
      }
      a:hover {
          color: red;
      }
      img {
          width: auto;
          max-width: 100%;
      }
      .container {
          max-width: 1200px;
          margin: 0 auto;
          padding: 0 24px;
      }

      .wrapper {
          display: flex;
          flex-wrap: wrap;
          
          margin: 0 -10px;
          padding: 24px 0;
      }

      .product__image img{
        height: 250px;
      }

      .product {
          
          width: 370px;
          height: 400px;
          padding: 0 10px;
          margin-bottom: 20px;
      }
      .product__card {
          transition: .3s ease-in-out;
      }
      .product__card:hover {
        box-shadow: 0 10px 20px rgba(0, 0, 0, .1);
      }
      .product__card:hover .product__image::after {
        transform: rotateZ(0deg);
        opacity: 1;
      }
      .product__card:hover  div.product__btns {
        opacity: 1;
        }
          
      .product__image {
          position: relative;
      }
      .product__image::after {
        content: '';
        background: rgba(21, 21, 21, 0.4);

        position: absolute;
        left: 0;
        right: 0;
        bottom: 0;
        top: 0;

        opacity: 0;

        transform: rotate(50deg);
        transition: 0.5s ease-in-out;
      }
      div.product__btns {
        position: absolute;  
        top: 50%;
        left: 50%;
        z-index: 1;
        transform: translate(-50%, -50%);  
        
        opacity: 0;
        
        transition: .3s ease-in-out;
      }



      div.product__btns > a {
      position: relative;
      overflow: hidden;
      
      display: block;
      
      margin-bottom: 10px;
      
      text-align: center;
      padding: 12px 40px;
      
      font-size: 10px;
      color: white;
      text-transform: uppercase;
      
      border: 1px solid white;
      }
      div.product__btns > a::after {
        content: '';

        position: absolute;
        left: -200%;
        top: -50%;
        width: 150%;
        height: 200%;
        z-index: -1;
        
        transform: skew(-45deg);
        background: white;
        transition: .7s all;
      }
      div.product__btns > a:hover::after {
        left: -30%;
      }
      div.product__btns > a:hover {
        color: #333;
      }
      div.product__btns > a:last-child {
        margin-bottom: 0;
      }
              
      .product__description {
        padding: 14px 14px 18px;
      }
      .product__description  h4 {
        margin-bottom: 8px;
        text-transform: uppercase;
      }




  </style>

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