<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('css')
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="{{ asset('js/adminmenu.js') }}" ></script>
    <script src="https://code.jquery.com/jquery-2.2.0.min.js"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/fontawesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/adminmenu.css') }}" rel="stylesheet">

</head>
<body>
    <main class="py-4">
        @include('inc.navbar')
        
<div class="header bg-dark">
    <div class="logo">
        <i class="fa fa-tachometer"></i>
        <span>Brand</span>
    </div>
    <a href="#" class="nav-trigger"><span></span></a>
</div>
<div class="side-nav bg-dark">
    <div class="logo">
        <i class="fa fa-tachometer"></i>
        <span>Brand</span>
    </div>
    <nav class="bg-dark">
        <ul>
            <li>
                <a href="{{ asset('/admin') }}">
                    <span><i class="fas fa-tachometer-alt"></i></span>
                    <span>Dashboard</span>
                </a>
            </li>
           
            <li>
                <a href="{{ asset('/users') }}">
                    <span><i class="fa fa-user"></i></span>
                    <span>Users</span>
                </a>
            </li>
           
            <li>
                <a href="{{ asset('/premium') }}">
                    <span><i class="fas fa-dollar-sign"></i></i></span>
                    <span>Premium</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <span><i class="fa fa-envelope"></i></span>
                    <span>Messages</span>
                </a>
            </li>
            <li>
                <a href="{{ asset('/items') }}">
                    <span><i class="fas fa-toolbox"></i></i></span>
                    <span>Items</span>
                </a>
            </li>
        </ul>
    </nav>
</div>
<div class="main-content">
    @yield('content')
    
</div>



</main>

</body>

</html>