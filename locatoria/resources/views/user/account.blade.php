@extends('layouts.app')

@section('content')

<br><br><br>
    
    <div class="nav">
        <div class="mini-block">
            <img src="http://localhost/WEB/locatoria/storage/app/public/{{$user->picture}}" style="width:150px; height:150px; border-radius:50%; margin-left:250px;">
            <div class="s-nav">
                <a href="#"><button type="button" class="butt btn btn-secondary"><i class="fas fa-envelope-open-text" style="margin-right: 7px;"></i>My messages</button></a>
            <a href="http://localhost/WEB/locatoria/public/items/myitems/{{$user->id}}"><button type="button"  class="butt btn btn-secondary"><i class="fas fa-shopping-cart" style="margin-right: 7px;"></i>My items</button></a>
                <a href="#"><button type="button"  class="butt btn btn-secondary"><i class="fas fa-heart" style="margin-right: 7px;"></i>My favorites</button></a>
                </i><a href="http://localhost/WEB/locatoria/public/user/{{$user->id}}/edit"><button type="button" class="butt btn btn-secondary"><i class="fas fa-edit" style="margin-right: 7px;"></i>Update Profile</button></a>
            </div>
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

                <div class="col-md-6 mb-3">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" id="password" value="{{$user->password}}" readonly>
                    <div class="invalid-feedback">
                        Valid password is required.
                    </div>
                </div>
                
               
               
            

        </div>   
    </div>

@endsection