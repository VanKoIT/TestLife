@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/testPage.css')}}" rel="stylesheet">
@endsection
@section('scripts')
    <script src="{{ asset('js/testPage.js') }}"></script>
@endsection

@section('content')
    <section class="test">
        <div class="test__header">
            <div class="container">
                <h1 class="test__name">{{$test->title}}</h1>
                <div class="test__control-btns">
                    <button type="button" class="test__continue">Продолжить</button>
                    <button type="button" class="test__start">Начать заново</button>
                </div>
                <div class="test__counter-questions hidden">
                    Вопрос
                    <span class="test__actual-question">3</span>
                    из
                    <span class="test__total-questions">20</span>
                </div>
            </div>
        </div>
        <div class="test-content">
            <div class="container swiper-container">
                <div class="test-content__info">
                    @isset($test->description)
                    <p class="test-content__text">{{$test->description}}</p>
                    @else
                        <p class="test-content__text">Нет информации о тесте</p>
                    @endisset
                    <p class="test-content__author">
                        <cite>Автор теста: {{$test->author->name}}</cite>
                    </p>
                    <button class="test-content__begin" type="button">
                        <span class="visually-hidden">Начать тест</span>
                    </button>
                </div>

                <ul class="questions-list swiper-wrapper hidden">
                    @foreach($test->questions as $question)
                        <li class="questions-list__item swiper-slide">
                            <form class="question" action="#">
                                <h3>{{$question->text}}</h3>
                                @foreach($question->answers as $answer)
                                    <p>
                                        <input name="answer1" id="1" data-id="{{$answer->id}}" type="radio" class="questions-list__answer">
                                        <label for="1">{{$answer->text}}</label>
                                    </p>
                                @endforeach
                            </form>
                        </li>
                    @endforeach
                </ul>

                <div class="test-content__result hidden">
                    <p class="test-content__result-text">
                        Поздравляем, вы прошли тест!!! Здесь мог бы быть ваш результат, удачи!
                    </p>
                    <p class="test-content__author">
                        <cite>Автор теста: GG Team</cite>
                    </p>
                </div>

                <div class="test-content__icons">
                    <button class="test-content__like" type="button">
                        <span class="visually-hidden">In my heart</span>
                    </button>
                    <a href="/" class="test-content__close"></a>
                </div>
                <button class="swiper-button-next hidden"></button>
                <button class="swiper-button-prev hidden"></button>
                <button class="test-content__forms-submit-btn hidden">Результат</button>
            </div>
        </div>
    </section>
@endsection
