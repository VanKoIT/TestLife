@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/development.css')}}" rel="stylesheet">
@endsection

@section('content')
    <main class="development">
        <div class="content">
            <p class="development__title">в разработке</p>
            <a href="{{URL::previous()}}" class="development__close">
                <span class="visually-hidden">Close</span>
            </a>
        </div>
    </main>
@endsection
