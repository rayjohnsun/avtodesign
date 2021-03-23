<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="/js/app.js" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="/css/guest.css" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar fixed-top">
          <a class="navbar-brand" href="#">
            <img src="/images/logo.svg" width="30" height="30" alt="">
          </a>
            @if (Route::has('login'))
                <div class="">
                    @auth
                        <a href="{{ route('home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </nav>
        <main class="container-fluid mt-5 pt-3">
            @yield('content')
        </main>
    </div>
</body>
</html>