@extends('welcome')
@section('title', 'Спецификации')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col">
                @if($orders->isEmpty())
                    <div class="alert alert-info">
                        Для всех заказов уже внесены спецификации. Новые спецификации добавить нельзя.
                    </div>
                @else
                    <form action="{{ route('create_specification') }}" method="post">
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
                            <label for="material" class="form-label">Материал</label>
                            <input type="text" class="form-control" id="material" name="material" required>
                        </div>
                        <div class="mb-3">
                            <label for="furniture" class="form-label">Фурнитура</label>
                            <input type="text" class="form-control" id="furniture" name="furniture" required>
                        </div>
                        <div class="mb-3">
                            <label for="sound_insulation" class="form-label">Звукоизоляция</label>
                            <input type="text" class="form-control" id="sound_insulation" name="sound_insulation">
                        </div>
                        <div class="mb-3">
                            <label for="thermal_insulation" class="form-label">Теплоизоляция</label>
                            <input type="text" class="form-control" id="thermal_insulation" name="thermal_insulation">
                        </div>
                        <button type="submit" class="btn btn-primary">Добавить</button>
                    </form>
                @endif
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
