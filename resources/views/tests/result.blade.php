@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/testPage.css')}}" rel="stylesheet">
@endsection
@section('scripts')
    <script src="{{ asset('js/result.js') }}"></script>
@endsection

@section('content')
    <section class="test">
        <div class="test__header">
            <div class="container">
                <h1 class="test__name">{{$attempt->test->title}}</h1>
                <h4 class="test__name test-date">
                    {{$attemptDate}}
                </h4>
                <div class="test__counter-questions">
                    Вопрос
                    <span class="test__actual-question">3</span>
                    из
                    <span class="test__total-questions">20</span>
                </div>
            </div>
        </div>
        <div class="test-content">
            <div class="container swiper-container">

                <form name="testAnswers" id="test" method="POST"
                      class="questions-list swiper-wrapper">
                    @foreach($attempt->answers as $attemptAnswer)
                        <div class="questions-list__item swiper-slide">
                            <fieldset form="test" class="question">
                                <h2>{{$attemptAnswer->question->text}}</h2>
                                @foreach($attemptAnswer->question->answers as $answer)
                                    <p>
                                        <label>
                                            <input name="answer-{{$attemptAnswer->question->id}}" type="radio" disabled data-answer="{{$answer->id}}" class="questions-list__answer
                                            @if(($answer->is_correct)) correct
                                            @elseif(!$answer->is_correct
&& $attemptAnswer->id==$answer->id) incorrect @endif
                                            @if($attemptAnswer->id==$answer->id) checked                                                 @endif" >
                                            <span class="questions-list__text">
                                                {{$answer->text}}
                                            </span>
                                        </label>
                                    </p>
                                @endforeach
                            </fieldset>
                        </div>
                    @endforeach
                </form>
                <button class="test-content__forms-submit-btn hidden" type="submit" form="test">Результат</button>

                <div class="test-content__result hidden">
                    <p class="test-content__result-text">
                        Отправка ответов...
                    </p>
                    <p class="test-content__author">
                        <a href="" class="minor-pages__link detail-link">Подробнее</a>
                    </p>
                </div>

                <a href="/home" class="test-content__close" type="button">
                    <span class="visually-hidden">Close</span>
                </a>
                <button class="swiper-button-next" type="button">Next</button>
                <button class="swiper-button-prev" type="button">Prev</button>
            </div>
        </div>
    </section>
@endsection

