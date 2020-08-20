@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/welcome.css')}}" rel="stylesheet">
@endsection
@section('scripts')
    <script src="{{ asset('js/register.js') }}"></script>
@endsection

@section('content')
    <div class="modal show">
        <div class="modal__window">
            <h2 class="modal__title">Регистрация</h2>
            <form class="registration" method="POST" action="{{route('register')}}">
                <input name="name" class="registration__input registration__input_name" id="reg-name" type="text"
                       minlength="3" maxlength="255" required>
                <label class="registration__label name-label" for="reg-name">ФИО</label>
                <input name="email" class="registration__input registration__input_email" id="reg-email" type="email"
                       minlength="4" maxlength="255" required>
                <label class="registration__label email-label" for="reg-email">Email</label>
                <input name="password" class="registration__input registration__input_pass" id="reg-pass"
                       type="password" minlength="4" maxlength="255" required>
                <label class="registration__label pass-label" for="reg-pass">Пароль</label>
                <input name="password_confirmation" class="registration__input registration__input_pass-repeat"
                       id="reg-pass-repeat" type="password" minlength="4" maxlength="255" required>
                <label class="registration__label pass-repeat-label" for="reg-pass-repeat">Повторите пароль</label>
                <div class="registration__error-msg hidden">Ошибка: Пароли не совпадают</div>
                <div class="registration__error-msg email hidden">Такой email уже существует</div>
                <button class="registration__submit" type="submit">Регистрация</button>
                <a href="{{route('login')}}">
                    <button class="registration__login" type="button">Авторизация</button>
                </a>
                <a class="registration__link" href="#"></a>
            </form>
        </div>
        <a href="/" class="modal__close"></a>
    </div>
@endsection
