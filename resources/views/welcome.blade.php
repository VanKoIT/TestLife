@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/welcome.css')}}" rel="stylesheet">
@endsection
@section('scripts')
    <script src="{{ asset('js/welcome.js') }}"></script>
@endsection

@section('nav')
    <nav class="nav">
        <a href="#" class="nav__link">Создать свой тест</a>
        <a href="#" class="nav__link">Найти тест</a>
        <a href="#" class="nav__link">Мини-игры</a>
    </nav>
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
                                        <li data-test_id="{{$test->id}}" class="test-preview swiper-slide">
                                            <a class="test-preview__logo"
                                               @isset($test->photo_link)                                              style="background-image: url('{{asset('images/'.$test->photo_link)}}')"
                                               @endisset
                                               href="{{route('testQuestions',$test->id)}}"></a>
                                            <div class="test-preview__content">
                                                <h3 class="test-preview__name">{{$test->title}}</h3>
                                                <div class="test-preview__stat">
                                                    <span class="test-preview__quantity">{{$test->likes_count}}</span>
                                                    <button
                                                        class="test-preview__btn like-btn @if($test->is_like()) pressed @endif"><span class="visually-hidden">like</span></button>
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
                <div class="footer__text">&#169; test life, 2020</div>
                <div class="footer__text">создание и прохождение тестов</div>
                <div class="footer__content">
                    <a class="footer__column" href="#">О нас</a>
                    <a class="footer__column" href="#">О сервисе</a>
                </div>
            </div>
        </div>
    </footer>
@endsection
