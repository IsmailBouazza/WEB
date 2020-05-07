@extends('layouts.auth')

@section('content')

<br><br><br><br>
    
    <form action="{{ url('Users/'.$user->id) }}" enctype="multipart/form-data" method="POST">
        @csrf
        @method('PUT')

        <div class="block">
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
                    <br><br>
                
                    <div class="col-md-6 mb-3">
                        <label for="zip_code"><br><br></label>
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Edit</button>
                    </div>
            </div>   
        </div>
    </form>

@endsection