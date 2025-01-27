@extends('welcome')
@section('title', 'Создание пользователя')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <form method="post" action="{{route('create_user')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="FIO" class="form-label">ФИО</label>
                        <input type="text" class="form-control" id="FIO" name="FIO">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Пароль</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="position" class="form-label">Должность</label>
                        <select class="form-select" id="position" name="position">
                            @foreach($positions as $position)
                                <option value="{{ $position }}">{{ $position }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Создать</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
