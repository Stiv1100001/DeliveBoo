<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Style -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">


    <!-- Animation CSS -->
</head>

<body>
    <div id="root">

    </div>


    {{-- <header class="p-3">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <!-- Toggle button -->
                <button class="navbar-toggler" type="button" data-mdb-toggle="collapse"
                    data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fas fa-bars"></i>
                </button>

                <!-- Collapsible wrapper -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Navbar brand -->
                    <a class="navbar-brand mt-2 mt-lg-0" href="#">
                        <img src="{{ asset('') }}" alt="Logo" loading="lazy" />
                    </a>
                    <!-- Left links -->
                    <a class="nav-link" href="#">Dashboard</a>
                </div>

                <!-- Right elements -->
                <div class="d-flex align-items-center">
                    <!-- Icon -->
                    <a class="text-reset text-decoration-none me-3" href="#">
                        <i class="fas fa-shopping-cart"></i>
                    </a>

                    <!-- Login-->
                    @if (Route::has('login'))
                        <div class="login-control me-3">
                            @auth
                                <a href="{{ url('/home') }}" class="text-decoration-none">Home</a>
                            @else
                                <a href="{{ route('login') }}" class="btn btn-light rounded-pill">Login</a>

                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="btn btn-info rounded-pill">Register</a>
                                @endif
                            @endauth
                        </div>
                    @endif
                </div>
            </div>
        </nav>
    </header> --}}
    <script src=" {{ asset('js/front.js') }} "></script>
</body>

</html>
