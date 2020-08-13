@extends('layouts.app')

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
                                                        {{$test->likes()}}
                                                    </span>
                                                    <button class="test-preview__btn @if($test->is_like()) pressed @endif">

                                                    </button>
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
@endsection
