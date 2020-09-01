@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/questionsAdd.css')}}" rel="stylesheet">
@endsection
@section('scripts')
    <script src="{{ asset('js/questionsAdd.js') }}"></script>
@endsection

@section('nav')
    <nav class="nav">
        <a href="/" class="nav__link">Топ тестов</a>
        <a href="/dev" class="nav__link">Найти тест</a>
        <a href="/dev" class="nav__link">Мини-игры</a>
    </nav>
@endsection
@section('content')
    <form class="redactor">
        <div class="redactor__header">
            <div class="container">
                <h1 class="redactor__title">
                    Добавление вопросов для теста {{$test->title}}
                </h1>
            </div>
        </div>
        <div class="redactor-content">
            <div class="container">
                <button class="redactor-content__save-questions" type="button">Сохранить добавленные вопросы</button>
                <button class="redactor-content__add-question" type="button">Добавить вопрос</button>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <fieldset class="redactor-content__question">
                                <textarea class="redactor-content__question-text" name="question" placeholder="Вопрос" minlength="3" required></textarea>
                                <ul class="answer-list">
                                    <li class="answer-list__item">
                                        <button type="button" class="answer-list__item-del">
                                            <span class="visually-hidden">Del</span>
                                        </button>
                                        <label>
                                            <input class="answer-list__radio" name="1" type="radio" required checked>
                                            <input class="answer-list__input" name="1" type="text" placeholder="Ответ" minlength="3" required>
                                            <span></span>
                                        </label>
                                    </li>
                                    <li class="answer-list__item">
                                        <button type="button" class="answer-list__item-del">
                                            <span class="visually-hidden">Del</span>
                                        </button>
                                        <label>
                                            <input class="answer-list__radio" name="1" type="radio">
                                            <input class="answer-list__input" name="2" type="text" placeholder="Ответ" minlength="3" required>
                                            <span></span>
                                        </label>
                                    </li>
                                    <li class="answer-list__item">
                                        <button type="button" class="answer-list__item-del">
                                            <span class="visually-hidden">Del</span>
                                        </button>
                                        <label>
                                            <input class="answer-list__radio" name="1" type="radio">
                                            <input class="answer-list__input" name="3" type="text" placeholder="Ответ" minlength="3">
                                            <span></span>
                                        </label>
                                    </li>
                                    <li class="answer-list__item">
                                        <button type="button" class="answer-list__item-del">
                                            <span class="visually-hidden">Del</span>
                                        </button>
                                        <label>
                                            <input class="answer-list__radio" name="1" type="radio">
                                            <input class="answer-list__input" name="4" type="text" placeholder="Ответ" minlength="3">
                                            <span></span>
                                        </label>
                                    </li>
                                    <li class="answer-list__item">
                                        <button class="answer-list__item-add" type="button">
                                            <span class="visually-hidden">Добавить ответ</span>
                                        </button>
                                    </li>
                                </ul>
                            </fieldset>
                        </div>
                    </div>
                </div>
                <button class="swiper-button-next" type="button">Next</button>
                <button class="swiper-button-prev" type="button">Prev</button>
            </div>
        </div>
    </form>

@endsection
