@extends('layouts.app')
<!-- link css -->
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
<!--  -->
@section('content')
    <table class="img-container" style="width: 50%;">
      <tr style="width: 100%; display:flex; margin-left: 45%">
        <td class="image" style="width:30%">
          <img src="{{asset('images/logo.png')}}">
        </td>
        <td class="image" style="width:70%">
          <div id = "enter">
            <div id= "target">
            </div>
            <div id = "page">
              <section>
                <h1 id = 'text' style="font-weight: bold">Welcome</h1>
              </section>
            </div>
          </div>
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
        <br>
        <div class="btn-group">
          <p><a class="btn btn-sm btn-outline-secondary" href="http://localhost/locatoria/public/pages/researchdetails" role="button">View details &raquo;</a></p>                      
        </div>
    </div>
    <div class="categorie nav-scroller py-1 mb-2">
        <nav class="nav d-flex justify-content-between">
          <a class="p-2 text-muted" href="{{ url('/Category/4') }}">Home-made</a>
          <a class="p-2 text-muted" href="{{ url('/Category/1') }}">Car Equipement</a>
          <a class="p-2 text-muted" href="{{ url('/Category/3') }}">Multimedia/High tech</a>
          <a class="p-2 text-muted" href="{{ url('/Category/8') }}">Sport/Hobbies</a>
          <a class="p-2 text-muted" href="{{ url('/Category/2') }}">Clothes</a>
          <a class="p-2 text-muted" href="{{ url('/Category/5') }}">House Equipement</a>
          <a class="p-2 text-muted" href="{{ url('/Category/6') }}">Pets</a>
        </nav>
    </div>

    <div class="conteneur jumbotron p-4 p-md-5 text-white rounded bg-dark">
      <div class="annonce">
        <img src="{{asset('images/logo.png')}}" style="width: 120px; height: 120px">
        <h3 class="font-italic">Locatoria is here for you</h3>
      </div>  
      <div id="slider">
        <!--    Start: Buttons-->
        <button class="control_next"><i class="fa fa-chevron-right"></i></button>
        <button class="control_prev"><i class="fa fa-chevron-left"></i></button>
        <!--    End: Buttons-->
        <!--    Start: Images-->
        <ul class="image_slider_ul">
          <li>
            <div class="bgimage">
              <a class="text-muted" href="{{ url('/Category/4') }}">
                <img src="{{asset('images/home-made.jpg')}}">
              </a>
            </div>
          </li>
          <li>
            <div class="bgimage">
              <a class="text-muted" href="{{ url('/Category/2') }}">
                <img src="{{asset('images/clothes.jpg')}}" >
              </a>
            </div>
          </li>
          <li>
            <div class="bgimage">
              <a class="text-muted" href="{{ url('/Category/1') }}">
                <img src="{{asset('images/car-equipement.jpg')}}">
              </a>
            </div>
          </li>
          <li>
            <div class="bgimage">
              <a class="text-muted" href="{{ url('/Category/3') }}">
                <img src="{{asset('images/high-tech.jpg')}}">
              </a>
            </div>
          </li>
          <li>
            <div class="bgimage">
              <a class="text-muted" href="{{ url('/Category/5') }}">
                <img src="{{asset('images/house-equipment.jpg')}}">
              </a>
            </div>
          </li>
          <li>
            <div class="bgimage">
              <a class="text-muted" href="{{ url('/Category/6') }}">
                <img src="{{asset('images/pets.jpg')}}">
              </a>
            </div>
          </li>
          <li>
            <div class="bgimage">
              <a class="text-muted" href="{{ url('/Category/7') }}">
                <img src="{{asset('images/sea.jpg')}}">
              </a>
            </div>
          </li>
          <li>
            <div class="bgimage">
              <a class="text-muted" href="{{ url('/Category/9') }}">
                <img src="{{asset('images/vehicule.jpg')}}">
              </a>
            </div>
          </li>
          <li>
            <div class="bgimage">
              <a class="text-muted" href="{{ url('/Category/8') }}">
                <img src="{{asset('images/sport-equipment.jpg')}}">
              </a>
            </div>
          </li>
        </ul>
        <!--    End: Images-->
        <!--    Start: Indicators-->
        <div class="indicator_con">
          <ul class="indicator"></ul>
        </div>
        <!--    End Indicators-->
      </div>
  </div>

  <div class="slideshow">
    <div id="arrow-left" class="arrow"><i class="fa fa-angle-left"></i></div>
    <div id="arrow-right" class="arrow"><i class="fa fa-angle-right"></i></div>
        @if($items_mostvieweds->count() > 0)
            @foreach($items_mostvieweds as $item)
              <div class="slide slide1">
                <img src="{{asset('/storage/'.$item->thumbnail_path )}}" alt="image">
                <div class="content">
                  <a href="{{ url('Item/'.$item->id) }}"><div class="btn flex" style="background-color: rgb(66, 65, 65)">View Details <i class="fa fa-angle-right"></i></div></a>
                </div>
              </div>
            @endforeach
        @else
            <div class="msg">
                <p class="msg">No items added yet</p>
                <small>Sorry try latter !!</small> 
            </div>
        @endif
  </div>

  <div class="container">
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
                              @if(Auth::user())
                                  @if(Auth::user()->id == $item->user_id)
                                    <i class="fas fa-user-circle" style="margin-left: 80%; width:40px; height:40px; color: blue;"></i>
                                  @endif
                              @endif
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

<div class="annonce-premium">
  <div class="float" style="margin-left: 5%; margin-top:100px;">
    <h1 style="color: white; margin-left: 10%; font-weight:bold;">Discover premium ads</h1>
    <h4 style="color: white; margin-left: 10%;">Now you can see different items from differents categories and with a high quality</h4>
  </div>
  <div class="float" style="margin-left: 25%;">
    <a href="{{ url('Premium') }}">
      <button type="button" class="btn btn-outline-secondary" style="color: white; border:white solid 2px; font-size:1.2em">Discover more</button>
    </a>
  </div>
  <div class="space"></div>
    <div class="container" style="height: 50px">
      <div class="row">
        <div class="col-md">
          <button id="prev">Prev</button>
          <button id="next">Next</button>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        @foreach($items_premium as $item)
          <div class="m-auto on-screen image-container" style="border-radius: 12px;">
            <img src="{{asset('/storage/' .$item->thumbnail_path )}}" class="img-fluid" >
          </div>
        @endforeach
      </div>
    </div>
      
</div>
                       
        
        

<!-- slide 1 -->

<script>

  $(document).ready(function(){
  
  var slideCount = $('#slider ul.image_slider_ul li').length;
  var slideWidth = $('#slider ul.image_slider_ul li').width();
  var slideHeight = $('#slider ul.image_slider_ul li').height();
  var sliderUlWidth = slideCount * slideWidth;
  
  $('#slider ul.image_slider_ul').css({ marginLeft: - slideWidth });
  
    $('#slider ul.image_slider_ul li:last-child').prependTo('#slider ul.image_slider_ul');
  
    function moveLeft() {
        $('#slider ul.image_slider_ul').animate({
            left: + slideWidth
        }, 600, function () {
            $('#slider ul.image_slider_ul li:last-child').prependTo('#slider ul.image_slider_ul');
            $('#slider ul.image_slider_ul').css('left', '');
        });
    };
  
    function moveRight() {
        $('#slider ul.image_slider_ul').animate({
            left: - slideWidth
        }, 600, function () {
            $('#slider ul.image_slider_ul li:first-child').appendTo('#slider ul.image_slider_ul');
            $('#slider ul.image_slider_ul').css('left', '');
        });
    };
  
    var navDots= [];
  
    for(var i=0; i<slideCount; i++)
    {
    navDots[i]='<li currentSlide="'+i+'"></li>';
    $('.indicator').append(navDots[i]);
    }
  
  
    var count = 0;
      $("ul.indicator li").eq(count).addClass("active");
  
  
      slideCountforindicators = slideCount-1;
      $('button.control_prev').click(function () {
          moveLeft();
  
          $("ul.indicator li").eq(count).removeClass("active");
          count--;
          if(count<0)
          {
          count=slideCountforindicators;
          }
  
          $("ul.indicator li").eq(count).addClass('active');
      });
  
      $('button.control_next').click(function () {
          moveRight();
  
          $("ul.indicator li").eq(count).removeClass("active");
            count++;
            if(count>slideCountforindicators)
            {
            count=0;
  
            }
        
            $("ul.indicator li").eq(count).addClass('active');
      });
      
  //   Automatic Slider
    
    setInterval(function () {
  
        if($('#slider').is(':hover')) {
  
        }else{
            moveRight();
                $("ul.indicator li").eq(count).removeClass("active");
                  count++;
                  if(count>slideCountforindicators)
                  {
                  count=0;
  
                  }
  
                  $("ul.indicator li").eq(count).addClass('active');
        }
    }, 8000);
    
  });
  
  
  </script>
          
  
  
  <!-- slide 1 -->
  
  <script>
  
  $('#next').click(function (){
    
    if($('.on-screen').next().length == 0){
      $('.on-screen').removeClass('on-screen come-in').addClass('out-screen');
      $('.image-container').first('image-container').removeClass('out-screen').addClass('come-in on-screen');
    }
    else
      $('.on-screen').removeClass('on-screen come-in').addClass('out-screen').next('.image-container').addClass('come-in on-screen');
  });
  $('#prev').click(function (){
    
    if($('.on-screen').prev().length == 0){
      $('.on-screen').removeClass('on-screen come-in').addClass('out-screen');
      $('.image-container').last('image-container').removeClass('out-screen').addClass('come-in on-screen');
    }
    else
      $('.on-screen').removeClass('on-screen come-in').addClass('out-screen').prev('.image-container').addClass('come-in on-screen');
  });
  
  </script>
  
  
  
  
  <!--  Most Viewed -->
  
  
  
  <script>
  
  let sliderImages = document.querySelectorAll('.slide'),
      arrowRight = document.querySelector('#arrow-right'),
      arrowLeft = document.querySelector('#arrow-left'),
      i = 0
  
  
  
  function reset() {
    for (let i = 0; i < sliderImages.length; i++) {
      sliderImages[i].style.display = 'none'
    }
  }
  function startSlider() {
    reset()
    sliderImages[i].style.display = 'block'
  }
  arrowRight.addEventListener('click', function() {
    if(i > sliderImages.length - 2 ) {i = -1}
    i++
    startSlider()
  })
  arrowLeft.addEventListener('click', function() {
    if (i === 0) {i = sliderImages.length}
    i--
    startSlider()
  })
  
  function alert1() {
    let y = 1
    alert(y)
    y++
    setTimeout(alert1, 6000)
  }
  // alert1()
  
  startSlider()
  
  
  </script>
  
  
  
  <!-- animated welcome -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js"></script>
  
  
  
  <script>
  var length = 50;
  var string = "";
  for(var a = 0; a < length; a++){
    string = string.concat("<div class = 'bar' id = 'bar"+a+"' style = 'left: "+(a/4)*2+"vw; width: "+6+"px; opacity: "+0.7+";'></div>");
  }
  document.getElementById("target").innerHTML = string;
  for(var a = 0; a < length/2; a++){
    var bar = document.getElementById("bar"+a*2);
    TweenMax.to(bar, 2, {top:"80px", delay: a/8, yoyo:true, ease:Power2.easeInOut, repeat:-1});
      TweenMax.to(bar, 8, {backgroundColor: "#ff7700", delay: a/20, ease:Power2.easeInOut, yoyo:true, repeat:-1});
  }
  for(var a = 0; a < length/2; a++){
    var bar = document.getElementById("bar"+((a*2)+1));
    TweenMax.to(bar, 2, {top:"80px", delay: (a/8)+ 2, yoyo:true, ease:Power2.easeInOut, repeat:-1});
    TweenMax.to(bar, 8, {backgroundColor: "#ff7700", delay:(a/20) - 10, ease:Power2.easeInOut, yoyo:true, repeat:-1});
  }
  function enterAnimation(){
    for(var a = 0; a < length; a++){
      var bar = document.getElementById("bar"+a);
      TweenMax.to(bar, 5, {left: "0vw",width: "10px", ease:Power2.easeInOut});
      if(a%2 == 0){
        TweenMax.to(bar, 5, {top:"-100px", delay: 0});
      }
      else{
        TweenMax.to(bar, 5, {top:"100px", delay: 0});
      }
      
    }
    var text = document.getElementById("text");
    TweenMax.to(text, 2, {delay: 4, opacity: 0, ease:Power2.easeInOut, onComplete:exit});
  }
  
  </script>
          
  
  @endsection