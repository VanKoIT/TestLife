@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/home.css')}}" rel="stylesheet">
@endsection
@section('scripts')
    <script src="{{ asset('js/home.js') }}"></script>
@endsection

@section('nav')
    <nav class="nav">
        <button class="nav__btn nav__btn_person-tests" type="button">Мои тесты</button>
        <button class="nav__btn nav__btn_chosen-tests" type="button">Избранные</button>
        <button class="nav__btn visually-hidden" type="button">История</button>
    </nav>
@endsection

@section('content')
    <main class="person">
        <div class="center">
            <section class="user">
                <h1 class="user__title">Личный кабинет</h1>
                <div class="user__info">
                    <div class="user__name">{{Auth::user()->name}}</div>
                </div>
                <a class="user__redaction-link" href="dev">
                    <button class="user__redaction" type="button">
                        <span class="visually-hidden">Redaction</span>
                    </button>
                </a>
                <form class="user__redaction-form" action="{{route('logout')}}" method="post">
                    <button class="user__exit">
                        <span class="visually-hidden">Exit</span>
                    </button>
                </form>

                <div class="user__stat">
                    <div class="user__stat-title">Решено вами тестов</div>
                    <div class="user__stat-number">{{$decidedCounter}}</div>
                </div>
            </section>
            <aside class="history-sidebar">
                <h2 class="history-sidebar__title">История</h2>
                <ul class="history-sidebar__list">
                    @forelse($shortHistory as $attempt)
                        <li class="history-sidebar__item">
                            <a href="{{route('testResult',$attempt->id)}}"
                               class="history-sidebar__link">
                                <p class="history-sidebar__item-name">
                                    {{$attempt->test->title}}
                                </p>
                                <p class="history-sidebar__item-result">
                                    Правильно {{$attempt->questions_success}} из {{$attempt->questions_number}}
                                </p>
                                <p class="history-sidebar__item-date">
                                    {{$attempt->diff_passed_at}}
                                </p>
                            </a>
                        </li>
                    @empty
                        <h3>Вы ещё не проходили тесты</h3>
                    @endforelse
                </ul>
            </aside>
        </div>
    </main>

    <section class="person-tests hidden">
        <div class="center">
            <h1 class="person-tests__title">Мои тесты</h1>
            <ul class="person-tests__list">
                <li class="person-tests__item">
                    <button class="person-tests__add">Add test</button>
                </li>
                @foreach($userTests as $test)
                    <li class="person-tests__item">
                        <h2 class="person-tests__category">
                            {{$test->category->name}}
                        </h2>
                        <a class="person-tests__logo"
                           @isset($test->photo_link)                                              style="background-image: url('{{asset($test->photo_link)}}')"
                           @endisset
                           href="{{route('testHistory',$test->id)}}"></a>
                        <div class="person-tests__content">
                            <span class="person-tests__name">{{$test->title}}</span>
                            <div class="person-tests__stat">
                                <span class="person-tests__quantity quantity">
                                    {{$test->likes_count}}
                                </span>
                                <button class="person-tests__btn" type="button">
                                    <span class="visually-hidden">like</span>
                                </button>
                            </div>
                        </div>
                        <button class="person-tests__redact">Redact</button>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    <section class="chosen-tests hidden">
        <div class="center">
            <div class="chosen-tests__title">
                <h1 class="chosen-tests__title-text">Избранные</h1>
                <button class="chosen-tests__search" type="button">Найти</button>
            </div>
            <ul class="chosen-tests__list">
                @forelse($favoritesTests as $test)
                    <li class="chosen-tests__item test-preview" data-test_id="{{$test->id}}">
                        <h2 class="chosen-tests__category">
                            {{$test->category->name}}
                        </h2>
                        <a class="chosen-tests__logo"
                           @isset($test->photo_link)                                            style="background-image: url('{{asset($test->photo_link)}}')"
                           @endisset
                           href="{{route('testQuestions',$test->id)}}"></a>
                        <div class="chosen-tests__content">
                            <span class="chosen-tests__name">{{$test->title}}</span>
                            <div class="chosen-tests__stat">
                                <button class="chosen-tests__btn like-btn pressed" type="button">
                                    <span class="visually-hidden">like</span>
                                </button>
                            </div>
                        </div>
                    </li>
                @empty
                    <h3>У вас нет избранных тестов. Чтобы добавить тест в избранное поставьте ему лайк</h3>
                @endforelse
            </ul>
        </div>
    </section>

    <footer class="footer-social hidden">
        {{--<div class="center">
            <span class="footer-social__text">Поделиться</span>
            <a href="#" class="footer-social__link">VK</a>
        </div>--}}
    </footer>
@endsection
