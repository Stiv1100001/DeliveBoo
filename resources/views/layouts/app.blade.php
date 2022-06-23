<!doctype htms>
<htms lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Scripts -->
        <script src="{{ asset('js/admin.js') }}" defer></script>

        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
        
        <!-- Font-Awesome cdn v6 -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">


        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>

    <body>
        <div class="container">
            <div id="header-guest">
                <nav class="navbar navbar-expand-md">
                    <a href="/" class="logo text-decoration-none">
                        <span>DeliveBoo</span>
                    </a>
                    <button class="navbar-toggler border border-1 border-dark" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <i class="fas fa-bars p-1"></i>
                    </button>
    
                    <div class="collapse navbar-collapse pt-1" id="navbarSupportedContent">
                        
                        
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ms-auto">
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
                            <li class="nav-item d-flex align-items-center">
                                <img src="{{asset('storage/' . Auth::user()->image_url) }}"
                                alt="{{Auth::user()->name_resturant}}" class="rounded-circle  border border-2 border-dark" id="user-img-nav">
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle text-black abril-fatface-font fs-5" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name_restaurant }}
                                </a>
    
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                            <li class="nav-item d-flex align-items-center">
                                <a class="btn btn-outline-dark rounded-pill me-2" href="{{ route('home') }}" role=“button">
                                    Home
                                </a>
                            </li>
                            <li class="nav-item d-flex align-items-center">
                                <a class="btn btn-outline-dark rounded-pill me-2" href="{{ route('admin.dishes.index') }}" role=“button">
                                    Menu
                                </a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.orders.index') }}" role=“button">
                                    Lista ordini
                                </a>
                            </li> --}}
                            @endguest
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        
            <main class="py-4">
                @yield('content')
            </main>


            @yield('script')
        </div>
    </body>

</htms>
