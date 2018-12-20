<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>dIV Forum</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    {{-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> --}}
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
</head>
<body>
    <div id="app">
        <div  class="container">
            <div class="text-md-right">
                    <label id="date"> </label>
            </div>
        </div>
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    dIV Forum
                </a>
                @auth
                <a class="navbar-brand" href="{{ url('/myforum/'.Auth::user()->id) }}">
                    My Forum
                </a>
                @if(Auth::user()->admin == 1)
                <li class="nav-item dropdown" style="list-style-type: none;">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle navbar-brand" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="position:relative; color: black; font-size: 18px;">
                            Master
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item navbar-brand" href="{{ url('user') }}">
                            User
                        </a>
                        <a class="dropdown-item navbar-brand" href="{{ url('master') }}">
                            Forum
                        </a>
                        <a class="dropdown-item navbar-brand" href="{{ url('category') }}">
                           Category
                        </a>
                </li>
                
                @endif
                @endauth
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                @endif
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="position:relative; padding-left:50px;">
                                    <img src="{{ asset('storage/' . Auth::user()->avatar) }}" style="width:32px; height:32px;position:absolute;top:10px; left:10px;border-radius:50%">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ url('profile/'.Auth::user()->id) }}">
                                        {{ __('Profile') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ url('message/'.Auth::user()->id) }}">
                                        {{ __('Inbox') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                   

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </li>
                            
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<script>
$(document).ready(function() {
    setInterval(function() {
        var now = new Date();
        var day = now.getDate();
        var month = now.getMonth();
        var year = now.getFullYear();
        var hour = now.getHours();
        var minute = now.getMinutes();
        var second = now.getSeconds();

        if (hour < 10)
            hour = "0" + hour;
        if (minute < 10)
            minute = "0" + minute;
        if (second < 10)
            second = "0" + second;

        document.getElementById("date").innerHTML = day + "-" + month + "-" + year + " " + hour + ":" + minute + ":" + second;
    }, 1000);

    // All browser support for datepicker
    if ( $('[type="date"]').prop('type') != 'date' )
        $('[type="date"]').datepicker();
});
</script>
<style>
    .navbar-light .navbar-brand:hover{
        color: blue;
    }
</style>
</html>