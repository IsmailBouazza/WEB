@extends('layouts.app')
<!-- link css -->
<link href="{{ asset('css/account.css') }}" rel="stylesheet">
<link href="{{ asset('css/myitems.css') }}" rel="stylesheet">
<link href="{{ asset('css/home.css') }}" rel="stylesheet">
<link href="{{ asset('css/category.css') }}" rel="stylesheet">
<link href="{{ asset('css/item.css') }}" rel="stylesheet">
<link href="{{ asset('css/showitem.css') }}" rel="stylesheet">


<!--  -->
@section('content')
    
<br><br><br>

<div class="nav">
    <div class="mini-block">
        <img src="{{asset('storage/'.$user->picture)}}" style="width:150px; height:150px; border-radius:50%; margin-left:100px;">
        <div class="s-nav">
            <a href="{{ url('/user/'.$user->id) }}"><button type="button" class="butt btn btn-secondary"><i class="fas fa-home" style="margin-right: 7px;"></i>My Profile</button></a>
            <a href="#"><button type="button" class="butt btn btn-secondary"><i class="fas fa-envelope-open-text" style="margin-right: 7px;"></i>My messages</button></a>
            <a href="{{ url('items/myitems/'.$user->id) }}"><button type="button"  class="butt btn btn-secondary"><i class="fas fa-shopping-cart" style="margin-right: 7px;"></i>My items</button></a>
            <a href="#"><button type="button"  class="butt btn btn-secondary"><i class="fas fa-heart" style="margin-right: 7px;"></i>My favorites</button></a>
            <a href="{{ url('/Reservation') }}"><button type="button"  class="butt btn btn-secondary"><i class="fas fa-check-square" style="margin-right: 7px;"></i>My reservations</button></a>
        </div>
    </div>
</div>



    <form action="{{ url('user/'.$user->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')

        <div class="edit-block">
            <div class="float">
                <img src="{{asset('images/edit.png')}}" >
            </div>
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
                            <label for="city">Image</label>
                            <input type="file" class="form-control-file" name="picture" value="{{old('picture') ?? $user->picture}}">
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

@endsection