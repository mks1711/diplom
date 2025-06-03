@extends('welcome')
@section('title', 'Замеры')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col">
                @if($orders->isEmpty())
                    <div class="alert alert-info">
                        Для всех заказов уже внесены замеры. Новые замеры добавить нельзя.
                    </div>
                @else
                    <form action="{{ route('measurement_create') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label for="order_id" class="form-label">Номер заказа</label>
                            <select class="form-select" id="order_id" name="order_id" required>
                                @foreach($orders as $order)
                                    <option value="{{ $order->id }}">{{ $order->order_number }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="width" class="form-label">Ширина</label>
                            <input type="number" class="form-control" id="width" name="width" aria-describedby="widthHelp" required>
                        </div>
                        <div class="mb-3">
                            <label for="height" class="form-label">Высота</label>
                            <input type="number" class="form-control" id="height" name="height" required>
                        </div>
                        <div class="mb-3">
                            <label for="gaps" class="form-label">Зазоры</label>
                            <input type="number" class="form-control" id="gaps" name="gaps">
                        </div>
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </form>
                @endif
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
