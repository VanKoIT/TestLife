@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/welcome.css')}}" rel="stylesheet">
@endsection
@section('scripts')
    <script src="{{ asset('js/welcome.js') }}"></script>
@endsection

@section('content')
    <div class="minor-pages">
        <div class="center">
            <nav class="minor-pages__nav">
                <a href="" class="minor-pages__link">Создать свой тест</a>
                <a href="" class="minor-pages__link">Найти тест</a>
                <a href="" class="minor-pages__link">Мини-игры</a>
            </nav>
        </div>
    </div>

    <section class="tests">
        <div class="center">
            <h1 class="tests__title">Самые популярные тесты</h1>
            <ul class="tests__group-list">
                @foreach($categories as $category)
                    @if(count($category->tests))
                        <li class="tests__group">
                            <h2 class="tests__subtitle">{{$category->name}}</h2>
                            <div class="swiper-container">
                                <ul class="tests__list swiper-wrapper">
                                    @foreach($category->tests as $test)
                                        <li class="test-preview swiper-slide">
                                            <a class="test-preview__logo"
                                               href="{{route('testQuestions',$test->id)}}"></a>
                                            <div class="test-preview__content">
                                                <h3 class="test-preview__name">{{$test->title}}</h3>
                                                <div class="test-preview__stat">
                                                    <span class="test-preview__quantity">
                                                        {{$test->likes_count}}
                                                    </span>
                                                    <button class="test-preview__btn like-btn @if($test->is_like()) pressed @endif"></button>
                                                </div>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <button class="swiper-button-prev">Prev</button>
                            <button class="swiper-button-next">Next</button>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </section>
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
            <h2 class="modal__title">Регистрация</h2>
            <form class="registration" method="POST" action="{{route('register')}}">
                <input name="name" class="registration__input registration__input_name" id="reg-name" type="text" required>
                <label class="registration__label name-label" for="reg-name">ФИО</label>
                <input name="email" class="registration__input registration__input_email" id="reg-email" type="email" required>
                <label class="registration__label email-label" for="reg-email">Email</label>
                <input name="password" class="registration__input registration__input_pass" id="reg-pass" type="password" required>
                <label class="registration__label pass-label" for="reg-pass">Пароль</label>
                <input name="password_confirmation" class="registration__input registration__input_pass-repeat" id="reg-pass-repeat" type="password" required>
                <label class="registration__label pass-repeat-label" for="reg-pass-repeat">Повторите пароль</label>
                <div class="registration__error-msg hidden">Ошибка: Пароли не совпадают</div>
                <button class="registration__submit" type="submit">Регистрация</button>
                <button class="registration__login" type="button">Авторизация</button>

            </form>
            <form class="authorization hidden" method="POST" action="{{route('login')}}">
                <input name="email" class="authorization__input authorization__input_email" id="aut-name" type="text" required>
                <label class="authorization__label name-label" for="aut-name">Email</label>
                <input name="password" class="authorization__input authorization__input_pass" id="aut-email" type="password" required>
                <label class="authorization__label email-label" for="aut-email">Пароль</label>
                <div class="authorization__error-msg hidden">Ошибка: Пароли не совпадают</div>
                <button class="authorization__submit" type="submit">Авторизация</button>
                <button class="authorization__account" type="button">Регистрация</button>
                <a class="authorization__link" href="{{route('auth.social','vkontakte')}}"></a>
            </form>
        </div>
        <button class="modal__close"></button>
    </div>
@endsection
