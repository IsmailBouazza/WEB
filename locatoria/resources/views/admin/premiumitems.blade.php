@extends('layouts.adminmenu')

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

      

.main-content {
    background: radial-gradient(ellipse farthest-corner at right bottom, #FEDB37 0%, #FDB931 8%, #9f7928 30%, #8A6E2F 40%, transparent 80%),
                radial-gradient(ellipse farthest-corner at left top, #FFFFFF 0%, #FFFFAC 8%, #D1B464 25%, #5d4a1f 62.5%, #5d4a1f 100%);

    height:100%;
}
  </style>

@endsection

@section('content')

    <div class="welcome" >
    <img class="top" src="{{asset('images/premiums.png')}}" style="width: 100px; height:100px; margin-left : 5%; margin-top : 3%; borde-radius: 50%;">
    <h2 style="margin-left:15%; font-weight: bold; color: rgb(34, 37, 14);">Premium Items</h2>
    </div>   
    <hr>


    <div class="container" style="margin-left: 3%;">
      <div class="wrapper">
          @if(($data->count()) > 0)
              @foreach($data as $item)
                  <div class="product">
                      <figure class="product__card">
                          <div class="product__image">
                              <img src="{{asset('/storage/'.$item->thumbnail_path )}}" alt="image">
                              <div class='product__btns'>
                                  <a href="{{ url('Item/'.$item->item_id) }}">quick view</a>
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