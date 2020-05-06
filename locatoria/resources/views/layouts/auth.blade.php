<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link href="{{ asset('css/account.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <main class="py-4">
            @include('inc.navbar')
            @yield('content')
        </main>
        <div class="footer" style="margin-top:600px;">
            <footer class="my-5 pt-5 text-muted text-center text-small">
              <p class="mb-1">&copy; 2019-2020 </p>
              <ul class="list-inline">
                <li class="list-inline-item"><a href="#" style="color : gray;">Privacy</a></li>
                <li class="list-inline-item"><a href="#" style="color : gray;">Terms</a></li>
                <li class="list-inline-item"><a href="#" style="color : gray;">Support</a></li>
              </ul>
            </footer>
        </div>
    </div>
</body>
</html>
