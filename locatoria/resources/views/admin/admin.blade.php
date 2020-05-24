@extends('layouts.adminmenu')

<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


@section('css')
<style>


</style>

{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">--}}
@endsection


@section('content')

 {{--  <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">

                        <button onclick="window.location.href = '/users';" type="button" class="btn btn-dark btn-primary btn-lg"><i class="fas fa-users" aria-hidden="true"></i> Users List</button>

                    </div>
                </div>
            </div>
        </div>
    </div>--}}
    <div class="welcome">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="content">
              <h2>Welcome to your Dashboard</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    

    <section class="statistics" style="margin-top:10%; display:flex; flex-wrap: wrap; justify-content: space-around;">
      <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
        <div class="card-header" style="font-weight: bold; display: flex; flex-wrap: wrap;"><i class="fa fa-user fa-3x "></i><h5 style="margin-left: 4%; margin-top:5%; ">Users number</h5></div>
        <div class="card-body"> 
          @if(count($users)>0) <h1 class="card-title" style="text-align: center; font-weight: bold;">{{$users->count()}}</h1> @else <h4 class="card-title">No users registered<i class="far fa-sad-tear"></i></h4>@endif
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>
      
      <div class="card text-white bg-secondary mb-3" style="max-width: 18rem;">
        <div class="card-header" style="font-weight: bold;  display: flex; flex-wrap: wrap;"><i class="fas fa-toolbox  fa-3x"></i><h5 style="margin-left: 4%; margin-top:5%; ">Items number</h5></div>
        <div class="card-body">
          @if(count($items)>0) <h1 class="card-title" style="text-align: center; font-weight: bold;">{{$items->count()}}</h1> @else <h4 class="card-title">No items found<i class="far fa-sad-tear"></i></h4>@endif
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>
      <div class="card text-white bg-info mb-3" style="max-width: 18rem;">
        <div class="card-header"  style="font-weight: bold; display: flex; flex-wrap: wrap;"><i class="far fa-bookmark  fa-3x"></i><h5 style="margin-left: 4%; margin-top:5%; ">Reservations number</h5></div>
        <div class="card-body">
          @if(count($reservations)>0) <h1 class="card-title" style="text-align: center; font-weight: bold;">{{$reservations->count()}}</h1> @else <h4 class="card-title">No users registered<i class="far fa-sad-tear"></i></h4>@endif
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
        </div>
      </div>
      
    </section>



@endsection 

