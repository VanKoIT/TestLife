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
                                <input class="redactor__test-name" type="text" name="title" placeholder="Название теста" value="{{old('title')}}"
                                       minlength="3" maxlength="100" required>
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
                                            <option value="{{$category->id}}"
                                                {{ (old("category") == $category->id ? "selected":"") }}>
                                                {{$category->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('image')
                                    <div>
                                        <span class="redactor__error-msg">{{ $message }}</span>
                                    </div>
                                    @enderror
                                </div>
                                <textarea class="redactor-content__test-info" name="description"
                                          placeholder="Описание теста"
                                          minlength="3" maxlength="500"
                                          required>{{old('description')}}</textarea>
                                <button class="minor-pages__link detail-link">Сохранить</button>
                            </fieldset>
                        </div>
                    </div>
                </div>
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
