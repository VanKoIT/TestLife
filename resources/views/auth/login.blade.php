@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/welcome.css')}}" rel="stylesheet">
@endsection
@section('scripts')
    <script src="{{ asset('js/login.js') }}"></script>
@endsection
@section('content')
    <div class="modal show">
        <div class="modal__window">
            <h2 class="modal__title">Авторизация</h2>
            <form class="authorization" method="POST" action="{{route('login')}}">
                <input name="email" class="authorization__input authorization__input_email" id="aut-name" type="text"
                       required>
                <label class="authorization__label name-label" for="aut-name">Email</label>
                <input name="password" class="authorization__input authorization__input_pass" id="aut-email"
                       type="password" required>
                <label class="authorization__label email-label" for="aut-email">Пароль</label>
                <div class="authorization__error-msg hidden">Неверный логин или пароль</div>
                <button class="authorization__submit" type="submit">Авторизация</button>
                <a href="{{route('register')}}"><button class="authorization__account" type="button">Регистрация</button></a>
            </form>
        </div>
        <a href="/" class="modal__close"></a>
    </div>
@endsection
