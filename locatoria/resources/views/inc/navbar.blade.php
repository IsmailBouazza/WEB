<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <div class="container">
      <a class="navbar-brand" href="{{ url('/home') }}" style="position: relative; padding-left:50px;">

        <img src="{{asset('images/logo.png')}}" style="width:32px; height:32px; position:absolute; top:5px; left:10px; border-radius:50%;">
        {{ config('app.name', 'Locatoria') }}
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{ url('/home') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ url('/Category') }}">Categories <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              @if(! Auth::guard('admin')->check())
                <a class="nav-link" href="/favorite">My favorites <span class="sr-only">(current)</span></a>
              @else
                <a class="nav-link" href="/admin">administration<span class="sr-only">(current)</span></a>
              @endif
            </li>
          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
              <!-- Authentication Links -->
              @if(Auth::guard('admin')->check() || Auth::user())

                  <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="position: relative; padding-left:50px;">

                          @if(Auth::user())


                            <div class="container">
                            <img src="{{ asset('storage/'.Auth::user()->picture) }}" style="width:37px; height:37px; position:absolute; top:5px; left:10px; border-radius:50%;">
                            </div>
                            {{ Auth::user()->name }}
                          @else

                            {{"admin"}}

                          @endif


                      </a>

                      <div class="dropdown-menu dropdown-menu-right" >


                          @if(Auth::user())

                              <a class="dropdown-item" href=#{{url ('/user/'.Auth::user()->id ) }}">Messages<span class="sr-only">(current)</span></a>
                              <a class="dropdown-item" href="#">Favorite <span class="sr-only">(current)</span></a>

                              <span class="dotx count2" ></span>
                              <a class="dropdown-item" href="{{url ('/MyRequests') }}">Requests </a>

                              <span class="dotx count1" ></span>
                              <a class="dropdown-item" href="{{url ('/MyReservations' ) }}">Reservation </a>

                              <hr>

                              <a class="dropdown-item" href="{{url ('/user/'.Auth::user()->id ) }}">Account <span class="sr-only">(current)</span></a>


                          @endif

                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                      </div>
                  </li>

              @else

                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
                  @if (Route::has('register'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                      </li>
                  @endif

              @endif
          </ul>
      </div>
  </div>
</nav>
