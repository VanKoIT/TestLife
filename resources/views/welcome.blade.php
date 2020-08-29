@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/welcome.css')}}" rel="stylesheet">
@endsection
@section('scripts')
    <script src="{{ asset('js/welcome.js') }}"></script>
@endsection

@section('nav')
    <nav class="nav">
        <a href="{{route('testAdd')}}" class="nav__link">Создать свой тест</a>
        <a href="dev" class="nav__link">Найти тест</a>
        <a href="dev" class="nav__link">Мини-игры</a>
    </nav>
@endsection
@section('content')
    <div class="minor-pages">
        <div class="center">
            <nav class="minor-pages__nav">
                <a href="{{route('testAdd')}}" class="minor-pages__link">Создать свой тест</a>
                <a href="dev" class="minor-pages__link">Найти тест</a>
                <a href="dev" class="minor-pages__link">Мини-игры</a>
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
                                        <li data-test_id="{{$test->id}}" class="test-preview swiper-slide">
                                            @if($test->user_id==Auth::id())
                                                <span class="test__author-mark">Ваш тест</span>
                                            @endif
                                            <a class="test-preview__logo"
                                               @isset($test->photo_link)
                                               style="background-image: url('{{asset($test->photo_link)}}')"
                                               @endisset
                                               href="{{route('testQuestions',$test->id)}}"></a>
                                            <div class="test-preview__content">
                                                <h3 class="test-preview__name">{{$test->title}}</h3>
                                                <div class="test-preview__stat">
                                                    <span class="test-preview__quantity">{{$test->likes_count}}</span>
                                                    <button
                                                        class="test-preview__btn like-btn @if($test->is_like()) pressed @endif">
                                                        <span class="visually-hidden">like</span></button>
                                                </div>
                                                @if($test->user_id==Auth::id())
                                                    <div class="test-preview__delete">
                                                        <button
                                                            class="test-preview__btn basket-btn delete-btn"><span
                                                                class="visually-hidden">like</span></button>
                                                    </div>
                                                @endif
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
                <div class="footer__text">&#169; test life, 2020</div>
                <div class="footer__text">создание и прохождение тестов</div>
                <div class="footer__content">
                    <div class="footer__info footer__info-about hidden">
                        Project manager: Владислав Козак<br>
                        Designer: Данил Овчинников<br>
                        Back-end developer: Иван Корепанов<br>
                        Front-end developer: Руслан Ситников
                    </div>
                    <div class="footer__info footer__info-service hidden">
                        Сайт для тестирования пользователей.
                        Посетители смогут проходить тесты,
                        созданные администратором или другими пользователями.
                    </div>
                    <button class="footer__about" type="button">О нас</button>
                    <button class="footer__service" type="button">О сервисе</button>
                </div>
            </div>
        </div>
    </footer>
@endsection
