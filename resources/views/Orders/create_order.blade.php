@extends('welcome')
@section('title', 'Список заказов')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <form method="post" action="{{route('create_order')}}">
                    @csrf
                    <div class="mb-3">
                        <label for="number" class="form-label">Номер заказа</label>
                        <input type="number" class="form-control" id="number" name="number">
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">Дата заказа</label>
                        <input type="date" class="form-control" id="date" name="date">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Статус</label>
                        <select class="form-select" id="status" name="status">
                            @foreach($statuses as $status)
                                <option value="{{ $status }}">{{ $status }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="customer" class="form-label">Клиент</label>
                        <input type="text" class="form-control" id="customer" name="customer">
                    </div>
                    <div class="mb-3">
                        <label for="address" class="form-label">Адрес клиента</label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>
                    <div class="mb-3">
                        <label for="name_order" class="form-label">Наименование заказа</label>
                        <input type="text" class="form-control" id="name_order" name="name_order">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Описание заказа</label>
                        <input type="text" class="form-control" id="description" name="description">
                    </div>
                    <div class="mb-3">
                        <label for="size" class="form-label">Размеры изделия</label>
                        <input type="number" class="form-control" id="size" name="size">
                    </div>
                    <button type="submit" class="btn btn-primary">Оформить</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
