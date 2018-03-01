
<html lang="{{ app()->getLocale() }}">
<link href="{{ asset('css/main.css') }}" rel="stylesheet">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('CagedOnion', 'CagedOnion') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">



                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('CagedOnion', 'CagedOnion') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->


                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                             <div class=signInOptions>
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                            </div>
                        @else

                          <div class="login-name">
                                <a href="#" aria-expanded="false">
                                  You are logged in as:  {{ Auth::user()->name }}
                                </a>
				</div>

                        <div class=listingOptions>
                      <a href='/choppedCarrots'>CreateListing</a><br>
		                 <a href='/garbageDisposal'>DeleteListing</a><br>
                     <a href='/theMist'>LinkWallet</a><br>
                    <a href="{{ route('logout') }}">Logout</a><br>
		   </div>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @yield('content')
    </div>

    <!-- Scripts -->

</body>
</html>
