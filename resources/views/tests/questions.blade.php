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
                    <p class="test-content__text">
                        {{$test->description}}
                    </p>
                    <p class="test-content__author">
                        <cite>Автор теста: {{$test->author->name}}</cite>
                    </p>
                    <button class="test-content__begin" type="button">
                        <span class="visually-hidden">Начать тест</span>
                    </button>
                </div>

                <form name="testAnswers" id="test" method="POST"
                      class="questions-list swiper-wrapper hidden">
                    @foreach($test->questionsRandom as $question)
                        <div class="questions-list__item swiper-slide">
                            <fieldset form="test" class="question">
                                <h2>{{$question->text}}</h2>
                                @foreach($question->answersRandom as $answer)
                                    <p>
                                        <label>
                                            <input name="answer-{{$question->id}}" type="radio"
                                                   class="questions-list__answer" data-answer="{{$answer->id}}">
                                            <span class="questions-list__text">{{$answer->text}}</span>
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

                <a href="{{$previousURI}}" class="test-content__close" type="button">
                    <span class="visually-hidden">Close</span>
                </a>
                <button class="swiper-button-next hidden" type="button">Next</button>
                <button class="swiper-button-prev hidden" type="button">Prev</button>
            </div>
        </div>
    </section>
@endsection
