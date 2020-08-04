<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <!-- Fonts Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" />
    <!-- Styles -->
    {{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
    <div id="app">
        <header class="container shadow-sm">
            <div class="row">
                <div class="col-sm-12">
                    <nav class="navbar fixed-top navbar-expand-md navbar-light bg-white">
                        <div class="container">
                            <a class="navbar-brand" href="{{ url('/') }}">
                                <img src="{{asset('/storage/avatar/logo_jobport.png')}}" alt="" width="75px">
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <!-- Left Side Of Navbar -->
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item">
                                        <a class="nav-link" href="">{{ __('Trang Chủ') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="">{{ __('Việc Làm') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="">{{ __('Nhà Tuyển Dụng') }}</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="">{{ __('Ứng Viên') }}</a>
                                    </li>
                                </ul>

                                <!-- Right Side Of Navbar -->
                                <ul class="navbar-nav ml-auto">
                                    <!-- Authentication Links -->
                                    @guest
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Đăng Nhập') }}</a>
                                    </li>
                                    @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Đăng Ký') }}</a>
                                    </li>
                                    @endif
                                    @else
                                    <li class="nav-item dropdown">
                                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                            {{ Auth::user()->name }} <span class="caret"></span>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                                                                                                             document.getElementById('logout-form').submit();">
                                                {{ __('Đăng Xuất') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                style="display: none;">
                                                @csrf
                                            </form>
                                        </div>
                                    </li>
                                    @endguest
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            <div class="row" style="margin-top: 100px">
                @yield('search')
            </div>
        </header>

        <main class="py-4">
            @yield('content')
        </main>

        <footer class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-sm-3">
                    <img src="{{asset('/storage/avatar/logo_jobport.png')}}" alt="" width="50px">
                </div>
                <div class="col-sm-6">
                    <div class="row justify-content-center">
                        <div class="col-sm-8">
                            <div class="col-sm-12 text-center">
                                <h6 class="h6">© 2020 Codegym. All rights reserved</h6>
                            </div>
                            <div class="col-sm-12 text-center">
                                <i class="px-1 fab fa-facebook fa-3x"></i>
                                <i class="px-1 fab fa-twitter-square fa-3x"></i>
                                <i class="px-1 fab fa-instagram fa-3x"></i>
                                <i class="px-1 fab fa-google-plus-g fa-3x"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>