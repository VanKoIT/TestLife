@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/testAdd.css')}}" rel="stylesheet">
@endsection
@section('scripts')
    <script src="{{ asset('js/addTest.js') }}"></script>
@endsection
@section('nav')
    <nav class="nav">
        <a href="/" class="nav__link">Топ тестов</a>
        <a href="/dev" class="nav__link">Найти тест</a>
        <a href="/dev" class="nav__link">Мини-игры</a>
    </nav>
@endsection

@section('content')
    <form class="redactor" action="{{route('testAdd')}}"
          method="post" enctype="multipart/form-data">
        <div class="redactor__header">
            <div class="container">
                <h1 class="redactor__title">Редактор тестов</h1>
            </div>
        </div>
        <div class="redactor-content">
            <div class="container">
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <fieldset class="redactor-content__info">
                                <input class="redactor__test-name" type="text" name="title" placeholder="Название теста"
                                       minlength="5" maxlength="100" required>
                                <h2 class="redactor-content__title-params">Изображение и категория</h2>
                                <div class="redactor-content__info-head">
                                    <input alt="photo" type="file" name="image" id="image" accept="image/*"
                                           class="redactor-content__avatar" required>
                                    <label for="image" class="redactor-content__avatar-label">
                                        <span class="visually-hidden">Добавить фото</span>
                                    </label>
                                    <select class="redactor-content__category" name="category" id="category" size="1"
                                            required>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">
                                                {{$category->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <textarea class="redactor-content__test-info" name="description"
                                          placeholder="Описание теста" minlength="3" maxlength="500"
                                          required></textarea>
                                <button class="minor-pages__link detail-link">Сохранить</button>
                            </fieldset>
                        </div>
                        {{--<div class="swiper-slide">
                            <fieldset class="redactor-content__question">
                                <textarea class="redactor-content__question-text" name="question" placeholder="Вопрос" minlength="5" maxlength="150" required></textarea>
                                <ul class="answer-list">
                                    <li class="answer-list__item">
                                        <button type="button" class="answer-list__item-del">
                                            <span class="visually-hidden">Del</span>
                                        </button>
                                        <label>
                                            <input class="answer-list__radio" name="1" type="radio" required>
                                            <input class="answer-list__input" name="1" type="text" placeholder="Ответ" minlength="5" maxlength="50" required>
                                            <span></span>
                                        </label>
                                    </li>
                                    <li class="answer-list__item">
                                        <button type="button" class="answer-list__item-del">
                                            <span class="visually-hidden">Del</span>
                                        </button>
                                        <label>
                                            <input class="answer-list__radio" name="1" type="radio">
                                            <input class="answer-list__input" name="2" type="text" placeholder="Ответ" minlength="5" maxlength="50" required>
                                            <span></span>
                                        </label>
                                    </li>
                                    <li class="answer-list__item">
                                        <button type="button" class="answer-list__item-del">
                                            <span class="visually-hidden">Del</span>
                                        </button>
                                        <label>
                                            <input class="answer-list__radio" name="1" type="radio">
                                            <input class="answer-list__input" name="3" type="text" placeholder="Ответ" minlength="5" maxlength="50">
                                            <span></span>
                                        </label>
                                    </li>
                                    <li class="answer-list__item">
                                        <button type="button" class="answer-list__item-del">
                                            <span class="visually-hidden">Del</span>
                                        </button>
                                        <label>
                                            <input class="answer-list__radio" name="1" type="radio">
                                            <input class="answer-list__input" name="4" type="text" placeholder="Ответ" minlength="5" maxlength="50">
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
                        </div>--}}
                    </div>
                </div>
                {{--<button class="swiper-button-next" type="button">Next</button>
                <button class="swiper-button-prev" type="button">Prev</button>--}}
            </div>
        </div>
    </form>

    <div class="modal hidden">
        <div class="modal__window">
            <button class="modal__return" type="button">
                <span class="visually-hidden">Return</span>
            </button>
            <h2 class="modal__title">Выходите?</h2>
            <button class="modal__submit" type="submit">Сохранить и выйти</button>
            <a href="#" class="modal__link">Удалить и выйти</a>
        </div>
    </div>
@endsection
