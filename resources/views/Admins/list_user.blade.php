@extends('welcome')
@section('title', 'Список заказов')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <ul class="list-group list-group-item-dark">
                    @foreach($users as $user)
                        <li class="list-group-item">ФИО:{{$user->FIO}}</li>
                        <li class="list-group-item">Должность:{{$user->position}}</li>
                        <li class="list-group-item">Пароль:{{$user->password}}</li>
                        <form action="{{route('delete', $user)}}" method="post">
                            @csrf
                            <button class="btn btn-danger" type="submit">Удалить</button>
                        </form>
                    @endforeach
                </ul>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
