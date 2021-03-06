@extends('layouts.app')
<!-- link css -->
<link href="{{ asset('css/myitems.css') }}" rel="stylesheet">
<link href="{{ asset('css/home.css') }}" rel="stylesheet">


<!--  -->
@section('content')
@include('inc.sidebar')


  <!-- sidebar-wrapper  -->
  <main class="page-content" >
    <div class="container-fluid" style="height: auto">
        <img src="{{asset('images/edit.png')}}" style="width: 100px; height:100px">
        <h2>Edit Profile</h2>
        <hr>
        <div class="row" >  

        <form action="{{ url('user/'.$user->id) }}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')

            <div class="edit-block" style="width: 60%; height:auto;">
                <div class="float marg">
                    <div class="info row">
                            <div class="col-md-6 mb-3">
                                <label for="name">Your Name</label>
                                <input type="text" class="form-control" name="name"  value="{{old('name') ?? $user->name}}"  required>
                                <div class="invalid-feedback">
                                    Please enter your name .
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="name">Bio</label>
                                <input type="text" class="form-control" name="bio" value="{{old('bio') ?? $user->bio}}" value=""  required>
                                <div class="invalid-feedback">
                                    Please enter your bio .
                                </div>
                            </div>

                            
                            <div class="col-md-6 mb-3">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" name="email" value="{{old('email') ?? $user->email}}"  required>
                                <div class="invalid-feedback">
                                    Valid email is required.
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="phone">Phone</label>
                                <input type="text" class="form-control" name="phone" value="{{old('phone') ?? $user->phone}}"  required>
                                <div class="invalid-feedback">
                                    Valid number is required.
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="adresse">Adresse</label>
                                <input type="text" class="form-control" name="adresse" value="{{old('adresse') ?? $user->adresse}}"  required>
                                <div class="invalid-feedback">
                                    Valid number is required.
                                </div>
                            </div>
                            
                            <div class="col-md-6 mb-3">
                                <label for="zip_code">ZIP code</label>
                                <input type="text" class="form-control" name="zip_code" value="{{old('zip_code') ?? $user->zip_code}}"  required>
                                <div class="invalid-feedback">
                                    Valid code is required.
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="city">City</label>
                                <input type="text" class="form-control" name="city" value="{{old('city') ?? $user->city}}" required>
                                <div class="invalid-feedback">
                                    Valid city is required.
                                </div>
                            </div>
                        
                            <div class="col-md-6 mb-3">
                                <label for="city">Picture</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="picture"
                                        name="picture" accept="image/*">
                                    <label class="custom-file-label" for="picture">Choose new picture </label>
                                </div>
                                @if($errors->has('picture'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('picture')}}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="password">Password</label>
                                <input type="text" class="form-control" name="password" value="{{old('password') ?? $user->password}}" required>
                                <div class="invalid-feedback">
                                    Valid password is required.
                                </div>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="zip_code"><br><br></label>
                                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Edit</button>
                            </div>
                    </div>
                </div>   
            </div>
        </form>
        <br><br><br>
@include('inc.jsSidebar')

@endsection