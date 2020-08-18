@extends('layouts.app')

@section('content')
@auth
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Личный кабинет</div>

                    <div class="card-body">
                        {{Auth::user()->name}}
                    </div>
                    @auth
                        <form action="{{route('logout')}}" method="post">
                            @csrf
                            <button>выйти</button>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </div>
@endauth
@endsection
