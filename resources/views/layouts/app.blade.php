<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    {{-- link Styles --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.bootstrap5.min.css">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">

    {{-- google font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anuphan&display=swap" rel="stylesheet">

    {{-- font awsome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />



    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <!-- DataTables Bootstrap 5 Theme CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.5/css/dataTables.bootstrap5.css">
    <!-- DataTables Responsive Bootstrap 5 Extension CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/3.0.2/css/responsive.bootstrap5.css">


    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables Core JS -->
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>
    <!-- DataTables Bootstrap 5 Theme JS -->
    <script src="https://cdn.datatables.net/2.0.5/js/dataTables.bootstrap5.js"></script>
    <!-- DataTables Responsive Extension JS -->
    <script src="https://cdn.datatables.net/responsive/3.0.2/js/dataTables.responsive.js"></script>
    <!-- DataTables Responsive Bootstrap 5 Extension JS -->
    <script src="https://cdn.datatables.net/responsive/3.0.2/js/responsive.bootstrap5.js"></script>

    <!-- Bootstrap Bundle with Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.all.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.8/dist/sweetalert2.min.css" rel="stylesheet">

    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Anuphan', sans-serif !important;
        }
    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <span style="color: #1d270d">ตรวจทุเรียน RBRU</span>
                    {{-- <img src="{{asset('images/logo-head.png')}}" alt="logo-head" width="150"> --}}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            @if (Auth::user()->role == 'User')
                                <li class="nav-item">
                                    <a class="nav-link  @yield('activeHome')"
                                        href="{{ route('showcreate') }}">{{ __('ลงทะเบียน') }}</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link  @yield('activeHome')"
                                        href="{{ route('info') }}">{{ __('ดูข้อมูล') }}</a>
                                </li>
                            @endif
                            @if (Auth::user()->role == 'Admin')
                                <li class="nav-item">
                                    <a class="nav-link  @yield('activeHome')"
                                        href="{{ route('showcreate') }}">{{ __('ลงทะเบียน') }}</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link  @yield('activeHome')"
                                        href="{{ route('infoAll') }}">{{ __('ดูข้อมูลทั้งหมด') }}</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link  @yield('activeHome')"
                                        href="{{ route('check') }}">{{ __('ข้อมูลการลงทะเบียน') }}</a>
                                </li>
                            @endif


                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div>
            @yield('content')
        </div>
    </div>

</body>

</html>
