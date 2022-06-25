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
        <div id="header-guest" class="container-fluid px-0 shadow">
            <div class="container">
                <nav class="d-flex justify-content-between align-items-center">
                    <a href="/" class="logo text-decoration-none">
                        <span>DeliveBoo</span>
                    </a>

                    <div class="navbar" id="navbarNav">
                        
                        <!-- Right Side Of Navbar -->
                        <div class="navbar-nav d-flex">
                            <!-- Authentication Links -->
                            @guest
                            <li class="nav-item d-flex align-items-center">
                                <a class="btn btn-outline-dark rounded-pill me-2" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                            <li class="nav-item d-flex align-items-center">
                                <a class="btn btn-outline-dark rounded-pill me-2" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                            @endif
                            @else
                            {{-- <li class="nav-item d-flex align-items-center">
                                <img src="{{asset('storage/' . Auth::user()->image_url) }}"
                                alt="{{Auth::user()->name_resturant}}" class="rounded-circle  border border-2 border-dark" id="user-img-nav">
                            </li> --}}
                            <div class="nav-item dropdown d-flex align-items-center">
                                <img src="{{asset('storage/' . Auth::user()->image_url) }}"
                                alt="{{Auth::user()->name_resturant}}" class="rounded-circle  border border-2 border-dark me-3" id="user-img-nav">

                                <div class="dropdown">
                                    <button class="btn btn-outline-dark rounded abril-fatface-font fs-5" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{ Auth::user()->name_restaurant }}
                                        <i class="fas fa-bars p-1"></i>
                                    </button>
                                    <ul class="dropdown-menu bg-bone border border-1 border-dark" aria-labelledby="dropdownMenuLink">
                                        
                                        <li class="dropdown-item text-center p-0">
                                            <a class="text-decoration-none text-black abril-fatface-font"  href="{{ route('home') }}" role=“button">
                                                <i class="fas fa-house me-1"></i>
                                                Home
                                            </a>
                                        </li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li class="dropdown-item text-center p-0">
                                            <a class="text-decoration-none text-black abril-fatface-font" href="{{ route('admin.dishes.index') }}" role=“button">
                                                <i class="fas fa-utensils me-1"></i>
                                                Menu
                                            </a>
                                        </li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li class="dropdown-item text-center p-0">
                                            <a class="text-decoration-none text-black abril-fatface-font" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                <i class="fas fa-right-from-bracket me-1"></i>
                                                {{ __('Logout') }}
                                            </a>
            
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                                {{-- <a id="navbarDropdown" class="nav-link dropdown-toggle text-black abril-fatface-font fs-5 me-2" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name_restaurant }}
                                </a>
    
                                <div class="dropdown-menu dropdown-menu-right me-2" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
    
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div> --}}



                                {{-- <a class="btn btn-outline-dark rounded-pill me-2" href="{{ route('home') }}" role=“button">
                                    Home
                                </a>
                                <a class="btn btn-outline-dark rounded-pill me-2" href="{{ route('admin.dishes.index') }}" role=“button">
                                    Menu
                                </a> --}}
                            </div>
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="{{ route('admin.orders.index') }}" role=“button">
                                    Lista ordini
                                </a>
                            </li> --}}
                            @endguest
                        </div>
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
