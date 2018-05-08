<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<!--     <meta name="viewport" content="width=device-width, initial-scale=1"> -->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- <link href="{{ asset('css/main.css') }}" rel="stylesheet"> -->
   <!--  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="/resources/demos/style.css"> -->
    <link type="text/css" rel="stylesheet" href="{{ asset('theme/css/persianDatepicker.css') }}" />

<!--  <link rel="stylesheet" href="css/persian.datepicker.css"/>
 -->
<!--     <link href="https://unpkg.com/vue2-persian-datepicker/dist/vue2-persian-datepicker.css" rel="stylesheet"></script>
 -->    <!-- <link href="{{ asset('css/pcss.css') }}" rel="stylesheet"> -->
<link rel="stylesheet" href="{{ asset('css/persian.datepicker.css') }}"/>

<style>
    .color_red { color: red }
    .color_blue { color: blue }
</style>
    <!-- @yield('styles') -->
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
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
                            <li><a class="nav-link" href="{{ route('login') }}">Login</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
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

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('theme/js/jquery-1.10.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('theme/js/persianDatepicker.min.js') }}"></script>

   
  <!-- <script src="js/jquery.js"></script>
  <script src="js/persian.date.js"></script>
  <script src="js/persian.datepicker.js"></script>
 
  <script src="node_modules/persian-date/dist/persian-date.js" type="text/javascript"></script> -->

<!-- <script type=text/javascript src="https://unpkg.com/vue"></script>
<script type=text/javascript src="https://unpkg.com/vue2-persian-datepicker/dist/vue2-persian-datepicker.js"></script> -->
<!--  <script src="{{ asset('jquery/jquery-ui.js') }}"></script> 
  <script src="{{ asset('js/persian.date.js"></script> 
  <script src="{{ asset('js/persian.datepicker.js"></script>  -->

    @yield('scripts')
</body>
</html>
