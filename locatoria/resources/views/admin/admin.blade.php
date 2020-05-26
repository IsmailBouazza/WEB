@extends('layouts.adminmenu')

<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


@section('css')
<style>
            
            .card-list {
            width: 100%;
          }
          .card-list:before, .card-list:after {
            content: " ";
            display: table;
          }
          .card-list:after {
            clear: both;
          }

          .card {
            border-radius: 8px;
            color: white;
            padding: 10px;
            position: relative;
          }
          .card .zmdi {
            color: white;
            font-size: 28px;
            opacity: 0.3;
            position: absolute;
            right: 13px;
            top: 13px;
          }
          .card .stat {
            border-top: 1px solid rgba(255, 255, 255, 0.3);
            font-size: 8px;
            margin-top: 25px;
            padding: 10px 10px 0;
            text-transform: uppercase;
          }
          .card .title {
            display: inline-block;
            font-size: 8px;
            padding: 10px 10px 0;
            text-transform: uppercase;
          }
          .card .value {
            font-size: 28px;
            padding: 0 10px;
          }
          .card.blue {
            background-color: #2298f1;
          }
          .card.green {
            background-color: #66b92e;
          }
          .card.orange {
            background-color: #da932c;
          }
          .card.red {
            background-color: #d65b4a;
          }


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
    <div class="welcome" >
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12" >
            <div class="content bg-dark">
              <h2>Welcome to your Dashboard</h2>
              <p></p>
            </div>
          </div>
        </div>
      </div>
    </div>
    

    <section class="statistics" style="margin-top:10%; display:flex; flex-wrap: wrap; justify-content: space-around;">
      
      <main role="main" class="col-md-9 col-lg-10 my-3">
        <div class="card-list">
          <div class="row">
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
              <div class="card blue">
                <div class="title">All users</div>
                <i class="zmdi zmdi-upload"></i>
                @if(count($users)>0)<div class="value">{{$users->count()}}</div>@else <div class="value"> No users registered<i class="far fa-sad-tear"></i></div>  @endif
                <div class="stat"><b></b><i class="fa fa-user fa-3x"></i></div>
              </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
              <div class="card green">
                <div class="title">All items</div>
                <i class="zmdi zmdi-upload"></i>
                @if(count($items)>0)<div class="value">{{$items->count()}}</div>@else <div class="value"> No items found<i class="far fa-sad-tear"></i></div> @endif
                <div class="stat"><b></b><i class="fas fa-shopping-cart fa-3x"></i></div>
              </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
              <div class="card red">
                <div class="title">Reservations</div>
                <i class="zmdi zmdi-download"></i>
                @if(count($reservations)>0)<div class="value">{{$reservations->count()}}</div> @else <i class="fab fa-creative-commons-zero fa-3x" style="margin-left: 2%;"></i> @endif
                <div class="stat"><b></b><i class="far fa-bookmark  fa-3x"></i></div>
              </div>
            </div>
            <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-4">
              <div class="card orange">
                <div class="title">Premium items</div>
                <i class="zmdi zmdi-download"></i>
                @if(count($premium)>0)<div class="value">{{$premium->count()}}</div> @else <i class="fab fa-creative-commons-zero fa-3x" style="margin-left: 2%;"></i> @endif
                <div class="stat"><b></b><i class="fas fa-dollar-sign fa-3x"></i></div>
              </div>
            </div>
          </div>
        </div>
  
  
      
      
    </section>
    



@endsection 

