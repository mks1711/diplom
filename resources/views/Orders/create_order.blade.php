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
                        <label for="order_number" class="form-label">Номер заказа</label>
                        <input type="number" class="form-control" id="order_number" name="order_number">
                    </div>
                    <div class="mb-3">
                        <label for="order_date" class="form-label">Дата заказа</label>
                        <input type="date" class="form-control" id="order_date" name="order_date">
                    </div>
                    <div class="mb-3">
                        <label for="order_status" class="form-label">Статус</label>
                        <select class="form-select" id="order_status" name="order_status">
                            @foreach($statuses as $status)
                                <option value="{{ $status }}">{{ $status }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="order_customer" class="form-label">Клиент</label>
                        <input type="text" class="form-control" id="order_customer" name="order_customer">
                    </div>
                    <div class="mb-3">
                        <label for="order_address" class="form-label">Адрес клиента</label>
                        <input type="text" class="form-control" id="order_address" name="order_address">
                    </div>
                    <div class="mb-3">
                        <label for="order_name" class="form-label">Наименование заказа</label>
                        <input type="text" class="form-control" id="order_name" name="order_name">
                    </div>
                    <div class="mb-3">
                        <label for="order_description" class="form-label">Описание заказа</label>
                        <textarea class="form-control" id="order_description" name="order_description"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="order_size" class="form-label">Размеры изделия</label>
                        <input type="number" class="form-control" id="order_size" name="order_size">
                    </div>
                    <button type="submit" class="btn btn-primary">Оформить</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
