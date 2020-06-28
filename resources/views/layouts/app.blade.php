<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> ABD E-Learning </title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- --------- Owl-Carousel ------------------->
    <link rel="stylesheet" href="{{asset('/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/owl.theme.default.min.css')}}">

    <!-- ------------ AOS Library ------------------------- -->
    <link rel="stylesheet" href="{{asset('/css/aos.css')}}">

    <!-- Custom Style   -->
    <link rel="stylesheet" href="{{asset('/css/Style.css')}}">

    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('/css/all.css')}}">
</head>
<body style="background-image: url('https://img.freepik.com/free-vector/leaves-background-with-metallic-foil_79603-914.jpg?size=626&ext=jpg');
background-size: cover; background-position-y: center; background-position-x: center; background-repeat: no-repeat;">
    <div id="app" class="flex-center position-ref full-height">
        
        <nav class="nav fixed-top" style="background-image: url('https://img.freepik.com/free-vector/summer-themed-banner-design_1048-12364.jpg?size=626&ext=jpg');
background-size: cover; background-position-y: center; background-position-x: center; background-repeat: no-repeat;">
            <div class="nav-menu flex-row">
                <div class="nav-brand">
                    <a href="{{ url('/') }}" class="text-gray">ABD E-Learning</a>
                </div>
                <div class="toggle-collapse">
                    <div class="toggle-icons">
                        <i class="fas fa-bars"></i>
                    </div>
                </div>
                <div>
                    <ul class="nav-items">
                        <li class="nav-link">
                            <a href=" {{ url('/') }} ">TRANG CHỦ</a>
                        </li>
                        <li class="nav-link">
                            <a href="{{ url('/courses') }}">KHÓA HỌC</a>
                        </li>
                        <!-- <li class="nav-link">
                            <a href="{{ url('/askandanswer') }}">HỎI ĐÁP</a>
                        </li> -->
                        <li class="nav-link">
                            <a href="{{ url('/sponsored') }}">TÀI TRỢ</a>
                        </li>
                        <li class="nav-link">
                            <a href="{{ url('/contact') }}">LIÊN HỆ</a>
                        </li>
                    </ul>
                </div>
                <div>
                    @guest
                        <ul class="nav-items">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Đăng Nhập') }}</a>
                            @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Đăng Ký') }}</a>
                            @endif
                        </ul>
                    @else
                        <li class="nav-items dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->username }} <span class="caret"></span>
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ url('/home') }}">Dashboard</a>
                                <a class="dropdown-item" href="{{ route('users.edit', Auth::user()) }}">Profile</a>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Đăng Xuất') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </div>
            </div>
        </nav>        

        <main class="py-4" style="margin-top: 150px; padding-bottom: 350px;">
            @yield('content')
        </main>

        <!-- Jquery Library file -->
        <script type="application/javascript" src="/js/Jquery3.4.1.min.js"></script>

        <!-- --------- Owl-Carousel js ------------------->
        <script type="application/javascript" src="/js/owl.carousel.min.js"></script>

        <!-- ------------ AOS js Library  ------------------------- -->
        <script type="application/javascript" src="/js/aos.js"></script>

        <!-- Custom Javascript file -->
        <script type="application/javascript" src="/js/main.js"></script>
    </div>
</body>
</html>
