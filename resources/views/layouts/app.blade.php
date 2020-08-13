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
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<header class="header">
    <div class="container">
        <div class="header__logo">
            <a class="header__main-page-link" href="/">test life</a>
        </div>
        <div class="center">
            <nav class="nav">
                <a href="#" class="nav__link">Создать свой тест</a>
                <a href="#" class="nav__link">Найти тест</a>
                <a href="#" class="nav__link">Мини-игры</a>
            </nav>
        </div>
        <button class="header__user" type="button">
            <span class="hidden">Вход пользователя</span>
        </button>
    </div>
</header>

        <main class="py-4">
            @yield('content')
        </main>

<footer class="footer">
    <div class="center">
        <div class="footer__inner">
            <div class="footer__content">
                <div class="footer__column">бла-бла-бла инфа</div>
                <div class="footer__column">бла-бла-бла инфа</div>
            </div>
            <div class="footer__text">бла-бла-бла инфа бла-бла-бла инфа бла-бла-бла инфа</div>
        </div>
    </div>
</footer>

<div class="modal">
    <div class="modal__window">
        <h2 class="modal__title">Авторизация</h2>
        <form action="{{route('login')}}" method="post" class="registration">
            @csrf
            <input class="registration__input registration__input_email" id="reg-email" type="email" name="email">
            <label class="registration__label email-label" for="reg-email">Email</label>
            <input class="registration__input registration__input_pass" id="reg-pass" type="password" name="password">
            <label class="registration__label pass-label" for="reg-pass">Пароль</label>
            <button class="registration__account">Войти</button>
            <a href="#" class="registration__login">Регистрация</a>
            <div class="registration__social">
                <a class="registration__link" href="#"></a>
                <a class="registration__link" href="#"></a>
            </div>
        </form>
        @auth
            <form action="{{route('logout')}}" method="post">
                @csrf
                <button>выйти</button>
            </form>
        @endauth
    </div>
    <button class="modal__close"></button>
</div>
</body>
</html>
