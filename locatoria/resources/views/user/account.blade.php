@extends('layouts.app')


@section('content')
@include('inc.sidebar')


  <!-- sidebar-wrapper  -->
  <main class="page-content">
    <div class="container-fluid">
        <img src="{{asset('images/profile.png')}}" style="width: 100px; height:100px">
        <h2>Profile</h2>
        <hr>
        <div class="row">  

          <div class="col-md-6 mb-3">
            <label for="name">Your Name</label>
            <input type="text" class="form-control" id="name" value="{{$user->name}}"   readonly>
            <div class="invalid-feedback">
                Please enter your name .
            </div>
          </div>

          <div class="col-md-6 mb-3">
              <label for="name">Bio</label>
              <input type="text" class="form-control" id="name" value="{{$user->bio}}"   readonly>
              <div class="invalid-feedback">
                  Please enter your bio .
              </div>
          </div>

          
          <div class="col-md-6 mb-3">
              <label for="email">Email</label>
              <input type="text" class="form-control" id="email" value="{{$user->email}}"  readonly>
              <div class="invalid-feedback">
                  Valid email is required.
              </div>
          </div>
          <div class="col-md-6 mb-3">
              <label for="phone">Phone</label>
              <input type="text" class="form-control" id="phone" value="{{$user->phone}}"  readonly>
              <div class="invalid-feedback">
                  Valid number is required.
              </div>
          </div>

          <div class="col-md-6 mb-3">
              <label for="adresse">Adresse</label>
              <input type="text" class="form-control" id="adresse" value="{{$user->adresse}}"  readonly>
              <div class="invalid-feedback">
                  Valid number is required.
              </div>
          </div>
          
          <div class="col-md-6 mb-3">
              <label for="zip_code">ZIP code</label>
              <input type="text" class="form-control" id="zip_code" value="{{$user->zip_code}}"  readonly>
              <div class="invalid-feedback">
                  Valid code is required.
              </div>
          </div>

          <div class="col-md-6 mb-3">
              <label for="city">City</label>
              <input type="text" class="form-control" id="city" value="{{$user->city}}" readonly>
              <div class="invalid-feedback">
                  Valid city is required.
              </div>
          </div>

          <div class="col-md-6 mb-3">
              <label for="password">Password</label>
              <input type="text" class="form-control" id="password" value="{{$user->password}}" readonly>
              <div class="invalid-feedback">
                  Valid password is required.
              </div>
          </div>
          

      </div>    
    </div>
  </main>
  <!-- page-content" -->

@include('inc.jsSidebar')
@endsection
