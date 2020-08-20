<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="google" content="notranslate">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>TestLife</title>

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->


    <!-- Styles -->
    <link href="{{ asset('css/helper/swiper.css') }}" rel="stylesheet">
    @yield('styles')
</head>
<body>
<header class="header">
    <div class="container">
        <div class="header__logo">
            <a class="header__main-page-link" href="/">test life</a>
        </div>
        <div class="center">
            @yield('nav')
        </div>
        @auth
            <a href="{{route('home')}}" class="header__user"></a>
        @else
            <a href="{{route('login')}}" class="header__user">
                <span class="hidden">Вход пользователя</span>
            </a>
        @endauth
    </div>
</header>
@yield('content')

<script src="{{ asset('js/swiper.js') }}"></script>
<script src="{{ asset('js/before.js') }}"></script>
@yield('scripts')

</body>
</html>
