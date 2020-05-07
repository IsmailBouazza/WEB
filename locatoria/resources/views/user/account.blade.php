@extends('layouts.auth')

@section('content')

<br><br><br><br>
    
    <div class="block hidden">
        <div class="mini-block hidden">
            <div class="image-block flt">
                <img src="http://localhost/WEB/locatoria/public/uploads/{{$user->picture}}" style="width:250px; height:200px; border-radius:50%;">
            </div>
            <div class="title-block flt">
                Welcome to your account
            </div>
        </div>
        <br><br>
        <div class="mini-block hidden">
            <table class="mini-block">
            <tr><td><a href="http://localhost/WEB/locatoria/public/user/{{$user->id}}"><button type="button"  class="butt btn btn-secondary">My profile</button></a></td></tr>
                <tr><td><a href="http://localhost/WEB/locatoria/public/items"><button type="button" class="butt btn btn-secondary">My items</button></a></td></tr>
                <tr><td><button type="button" class="butt btn btn-secondary">My messages</button></td></tr>
            </table>
        </div>
    </div>

    <div class="block">
        <div class="info row">
            
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
                <br><br>
               
                <div class="col-md-6 mb-3">
                    <label for="zip_code"><br><br></label>
                    <a href="http://localhost/WEB/locatoria/public/user/{{$user->id}}/edit"><button class="btn btn-outline-success my-2 my-sm-0" type="submit">Edit</button></a>
                </div>
            

        </div>   
    </div>

@endsection