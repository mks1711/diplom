@extends('welcome')
@section('title', 'Список заказов')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <ul class="list-group list-group-item-dark">
                    <li class="list-group-item">Номер заказа: </li>
                    <li class="list-group-item">Cтатус:
                        <select id="disabledSelect" class="form-select">
                            <option>Новый заказ</option>
                            <option>Отменен</option>
                            <option>Производятся замеры</option>
                            <option>У мастера</option>
                            <option>Готов</option>
                        </select></li>
                    <li class="list-group-item">Заказчик:</li>
                    <li class="list-group-item">Дата:</li>
                    <li class="list-group-item">Адрес:</li>
                    <li class="list-group-item"><a class="link-dark" href="{{route('list_order_full')}}">Подробнее</a></li>
                </ul>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
