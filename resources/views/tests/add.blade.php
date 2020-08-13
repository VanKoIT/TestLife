@extends('layouts.app')

@section('content')
    <form action="{{route('addTest')}}" method="post">
        @csrf
        <select name="category">
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        <input name="title" type="text" placeholder="название">
        <button>Добавить вопросы</button>
    </form>
@endsection
