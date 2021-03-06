@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/home.css')}}" rel="stylesheet">
@endsection
@section('nav')
    <nav class="nav">
        <a href="/" class="nav__link">Топ тестов</a>
        <a href="#" class="nav__link">Найти тест</a>
    </nav>
@endsection

@section('content')
    <main class="person">
        <h2 class="history__title">Тест: {{$test->title}}</h2>
        <div class="center">
            <aside class="history-sidebar test-history">
                <h2 class="history-sidebar__title">История прохождений</h2>
                <ul class="history-sidebar__list">
                    @forelse($history as $attempt)
                        <li class="history-sidebar__item">
                            <a href="{{route('testResult',$attempt->id)}}"
                               class="history-sidebar__link">
                                <p class="history-sidebar__item-name">
                                    Пользователь: {{$attempt->user->name}}
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
                        <h3>Ваш тест ещё никто не проходил</h3>
                    @endforelse
                </ul>
            </aside>
        </div>
    </main>

@endsection
