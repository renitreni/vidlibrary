<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">

    <!-- Icon css link -->
    <link href="/theme/css/font-awesome.min.css" rel="stylesheet">
    <link href="/theme/vendors/elegant-icon/style.css" rel="stylesheet">
    <link href="/theme/vendors/themify-icon/themify-icons.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="/theme/css/bootstrap.min.css" rel="stylesheet">

    <!-- Rev slider css -->
    <link href="/theme/vendors/revolution/css/settings.css" rel="stylesheet">
    <link href="/theme/vendors/revolution/css/layers.css" rel="stylesheet">
    <link href="/theme/vendors/revolution/css/navigation.css" rel="stylesheet">
    <link href="/theme/vendors/animate-css/animate.css" rel="stylesheet">

    <!-- Extra plugin css -->
    <link href="/theme/vendors/owl-carousel/owl.carousel.min.css" rel="stylesheet">

    <link href="/theme/css/style.css" rel="stylesheet">
    <link href="/theme/css/responsive.css" rel="stylesheet">

    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barriecito&display=swap" rel="stylesheet">
    @livewireStyles
</head>
<body>

<!--================Header Menu Area =================-->
<header class="main_menu_area">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="/">{{ env('APP_NAME') }}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="ti-menu text-white"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item @if(\Request::route()->getName() == 'home') active @endif">
                    <a href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item @if(\Request::route()->getName() == 'about') active @endif">
                    <a href="{{ route('about') }}">About</a>
                </li>
                @guest()
                    <li class="m-0 @if(\Request::route()->getName() == 'login') active @endif">
                        <a href="{{ route('login') }}" class="font-weight-bold">Login</a>
                    </li>
                    <style>
                        @media only screen and (max-width: 1026px) {
                            #fadeshow1 {
                                display: none;
                            }
                        }
                    </style>
                    <li class="mx-1" id="fadeshow1" style="color: white;font-size: large; ">
                        |
                    </li>
                    <li class="@if(\Request::route()->getName() == 'register') active @endif">
                        <a href="{{ route('register') }}" class="font-weight-bold">Register</a>
                    </li>
                @else
                    <li><a href="{{ route('dashboard') }}">My Account</a></li>
                @endauth
            </ul>
        </div>
    </nav>
</header>
<!--================End Header Menu Area =================-->

{{ $slot }}

<!--================Footer Area =================-->
<footer class="footer_area">
    <div class="copy_right_area">
        <div class="container">
            <div class="float-md-left">
                <h5>Copyright &copy;<script>document.write(new Date().getFullYear());</script>
                    All rights reserved | <a href="https://barurot.com" target="_blank">{{ env('APP_NAME') }}</a></h5>
            </div>
            <div class="float-md-right">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Disclaimer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Privacy</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact us</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!--================End Footer Area =================-->

@livewireScripts
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="/theme/js/jquery-3.2.1.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="/theme/js/popper.min.js"></script>
<script src="/theme/js/bootstrap.min.js"></script>
<!-- Rev slider js -->
<script src="/theme/vendors/revolution/js/jquery.themepunch.tools.min.js"></script>
<script src="/theme/vendors/revolution/js/jquery.themepunch.revolution.min.js"></script>
<script src="/theme/vendors/revolution/js/extensions/revolution.extension.actions.min.js"></script>
<script src="/theme/vendors/revolution/js/extensions/revolution.extension.video.min.js"></script>
<script src="/theme/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<script src="/theme/vendors/revolution/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script src="/theme/vendors/revolution/js/extensions/revolution.extension.navigation.min.js"></script>
<script src="/theme/vendors/revolution/js/extensions/revolution.extension.slideanims.min.js"></script>
<!-- Extra plugin css -->
<script src="/theme/vendors/counterup/jquery.waypoints.min.js"></script>
<script src="/theme/vendors/counterup/jquery.counterup.min.js"></script>
<script src="/theme/vendors/counterup/apear.js"></script>
<script src="/theme/vendors/counterup/countto.js"></script>
<script src="/theme/vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="/theme/vendors/parallaxer/jquery.parallax-1.1.3.js"></script>
<!--Tweets-->
<script src="/theme/vendors/tweet/tweetie.min.js"></script>
<script src="/theme/vendors/tweet/script.js"></script>

<script src="/theme/js/theme.js"></script>
</body>
</html>
