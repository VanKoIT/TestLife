@extends('layouts.app')

@section('styles')
    <link href="{{ asset('css/development.css')}}" rel="stylesheet">
@endsection

@section('content')
    <section class="development">
        <div class="content">
            <h1 class="development__title">в разработке</h1>
            <a href="{{URL::previous()}}" class="development__close">
                <span class="visually-hidden">Close</span>
            </a>
        </div>
    </section>
@endsection
