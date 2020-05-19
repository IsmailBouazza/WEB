@extends('layouts.app')
<!-- link css -->
<title>Register</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="{{ asset('css/account.css') }}" rel="stylesheet">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="{{url('/public/images/icons/favicon.ico')}}"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('/vendor/bootstrap/css/bootstrap.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('/vendor/animate/animate.css')}}">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="{{url('/vendor/css-hamburgers/hamburgers.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('/vendor/select2/select2.min.css')}}">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="{{url('/css/util.css')}}">
	<link rel="stylesheet" type="text/css" href="{{url('/css/main.css')}}">
<!--===============================================================================================-->

<!--  -->
@section('content')
	

	<div class="limiter" style="margin-top: 30px; height:100%">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="{{asset('images/logo.png')}}" alt="IMG">
				</div>

                <form class="login100-form validate-form"  method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                    @csrf
                    
					<span class="login100-form-title">
						Register
                    </span>
                    
                    <div class="wrap-input100 validate-input" data-validate = "Valid name is required: ex@abc.xyz">
						<input class="input100 form-control @error('name') is-invalid @enderror" type="text" name="name" placeholder="Name" value="{{ old('name') }}" required autocomplete="email" autofocus>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fas fa-user-alt" aria-hidden="true" style="margin-left: 90%"></i>
                        </span>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100 form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true" style="margin-left: 90%"></i>
                        </span>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="wrap-input100 validate-input" data-validate = "Valid bio is required: ex@abc.xyz">
						<input class="input100 form-control @error('bio') is-invalid @enderror" type="text" name="bio" placeholder="Bio" value="{{ old('bio') }}" required autocomplete="bio" autofocus>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fas fa-book" aria-hidden="true" style="margin-left: 90%"></i>
                        </span>
                        @error('bio')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="wrap-input100 validate-input" data-validate = "Valid picture is required: ex@abc.xyz">
						<div class="custom-file">
							<input class="custom-file-input input100" id="picture" type="file" name="picture" accept="image/*">
							<label class="custom-file-label" for="picture">Choose a picture </label>
						</div>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true" style="margin-left: 90%"></i>
                        </span>
                        @if($errors->has('picture'))
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('picture')}}</strong>
                            </span>
                        @endif
                    </div>
                    
                    <div class="wrap-input100 validate-input" data-validate = "Valid phone is required: ex@abc.xyz">
						<input class="input100 form-control @error('phone') is-invalid @enderror" type="text" name="phone" placeholder="Phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fas fa-phone" aria-hidden="true" style="margin-left: 90%"></i>
                        </span>
                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="wrap-input100 validate-input" data-validate = "Valid adresse is required: ex@abc.xyz">
						<input class="input100 form-control @error('adresse') is-invalid @enderror" type="text" name="adresse" placeholder="Adresse" value="{{ old('adresse') }}" required autocomplete="adresse" autofocus>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fas fa-map-marker" aria-hidden="true" style="margin-left: 90%"></i>
                        </span>
                        @error('adresse')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    

					<div class="wrap-input100 validate-input" data-validate = "Valid city is required: ex@abc.xyz">
						<input class="input100 form-control @error('city') is-invalid @enderror" type="text" name="city" placeholder="City" value="{{ old('city') }}" required autocomplete="city" autofocus>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fas fa-city" aria-hidden="true" style="margin-left: 90%"></i>
                        </span>
                        @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    
                    <div class="wrap-input100 validate-input" data-validate = "Valid zip code is required: ex@abc.xyz">
						<input class="input100 form-control @error('zip_code') is-invalid @enderror" type="text" name="zip_code" placeholder="Zip code" value="{{ old('zip_code') }}" required autocomplete="zip_code" autofocus>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fas fa-file-archive" aria-hidden="true" style="margin-left: 90%"></i>
                        </span>
                        @error('zip_code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input class="input100 form-control @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password" required autocomplete="current-password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true" style="margin-left: 90%"></i>
                        </span>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Password is required">
						<input id="password-confirm" class="input100 form-control" type="password" name="password_confirmation" placeholder="Confirm password" required autocomplete="current-password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true" style="margin-left: 90%"></i>
                        </span>
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
					</div>
					
					<div class="container-login100-form-btn">
						<button type="submit" class="login100-form-btn">
                            {{ __('Register') }}

                        </button>
					</div>


					<div class="text-center p-t-136">
						<a class="txt2" href="{{url('/login')}}">
							Login to your Account
							<i class="fas fa-long-arrow-alt-right" aria-hidden="true"></i>
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

	
<!--===============================================================================================-->	
	<script src="{{asset('vendor/jquery/jquery-3.2.1.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('vendor/bootstrap/js/popper.js')}}"></script>
	<script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('vendor/select2/select2.min.js')}}"></script>
<!--===============================================================================================-->
	<script src="{{asset('vendor/tilt/tilt.jquery.min.js')}}"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="{{asset('js/main.js')}}"></script>


@endsection