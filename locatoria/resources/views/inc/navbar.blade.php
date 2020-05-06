<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <div class="container">
      <a class="navbar-brand" href="{{ url('http://localhost/WEB/locatoria/public/home') }}">
          {{ config('app.name', 'Locatoria') }}
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
          <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Left Side Of Navbar -->
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="http://localhost/WEB/locatoria/public/home">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="http://localhost/WEB/locatoria/public/pages/rent">To rent <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="http://localhost/WEB/locatoria/public/pages/favorite">My favorites <span class="sr-only">(current)</span></a>
            </li>
            @if(Auth::guest())
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">My account <span class="sr-only">(current)</span></a>
                </li>
            @else
                <li class="nav-item">
                    <a class="nav-link" href="http://localhost/WEB/locatoria/public/user/{{ Auth::user()->id }}">My account <span class="sr-only">(current)</span></a>
                </li>
            @endif
          </ul>

          <!-- Right Side Of Navbar -->
          <ul class="navbar-nav ml-auto">
              <!-- Authentication Links -->
              @guest
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                  </li>
                  @if (Route::has('register'))
                      <li class="nav-item">
                          <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                      </li>
                  @endif
              @else
                  <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->name }} <span class="caret"></span>
                      </a>

                      <div class="dropdown-menu dropdown-menu-right" >
                          <a class="dropdown-item" href="{{ url('logout') }}">Logout</a>
                      </div>
                  </li>
              @endguest
          </ul>
      </div>
  </div>
</nav>
    