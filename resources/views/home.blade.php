@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/welcome.css')}}" rel="stylesheet">
@endsection

@section('nav')
    <nav class="nav show">
        <a href="#" class="nav__link">Мои тесты</a>
        <a href="#" class="nav__link">Избранные</a>
    </nav>
@endsection

@section('content')
    <h2>Личный кабинет</h2>
    <h1>Пользователь: {{Auth::user()->name}}</h1>
    <h3>Решено вами тестов: {{$decidedCounter}}</h3>

    <form action="{{route('logout')}}" method="post">
        <button>Выйти</button>
    </form>
@endsection
