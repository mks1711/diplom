@extends('welcome')
@section('title', 'Подробная информация о заказе')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col">
                @foreach($orders as $order)
                    <h2>Заказ #{{ $order->order_number }}</h2>
                    <ul class="list-group list-group-item-dark">
                        <li class="list-group-item">Номер заказа: {{ $order->order_number }}</li>
                        <li class="list-group-item">Cтатус:
                            @auth()
                                @if(Illuminate\Support\Facades\Auth::user()->position==='Менеджер')
                                    <span>Текущий статус: {{ $order->order_status }}</span>
                                    <form method="post" action="{{ route('update_status') }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $order->id }}">
                                        <select name="status" onchange="this.form.submit()">
                                            <option {{ $order->order_status == 'Новый заказ' ? 'selected' : '' }} value="Новый заказ">Новый заказ</option>
                                            <option {{ $order->order_status == 'Отменен' ? 'selected' : '' }} value="Отменен">Отменен</option>
                                            <option {{ $order->order_status == 'Производятся замеры' ? 'selected' : '' }} value="Производятся замеры">Производятся замеры</option>
                                        </select>
                                    </form>
                                @elseif(Illuminate\Support\Facades\Auth::user()->position==='Замерщик')
                                    <span>Текущий статус: {{ $order->order_status }}</span>
                                    <form method="post" action="{{ route('update_status') }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $order->id }}">
                                        <select name="status" onchange="this.form.submit()">
                                            <option {{ $order->order_status == 'Производятся замеры' ? 'selected' : '' }} value="Производятся замеры">Производятся замеры</option>
                                            <option {{ $order->order_status == 'У мастера' ? 'selected' : '' }} value="У мастера">У мастера</option>
                                            <option {{ $order->order_status == 'Отменен' ? 'selected' : '' }} value="Отменен">Отменен</option>
                                        </select>
                                    </form>
                                @elseif(Illuminate\Support\Facades\Auth::user()->position==='Мастер')
                                    <span>Текущий статус: {{ $order->order_status }}</span>
                                    <form method="post" action="{{ route('update_status') }}">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $order->id }}">
                                        <select name="status" onchange="this.form.submit()">
                                            <option {{ $order->order_status == 'У мастера' ? 'selected' : '' }} value="У мастера">У мастера</option>
                                            <option {{ $order->order_status == 'Готов' ? 'selected' : '' }} value="Готов">Готов</option>
                                            <option {{ $order->order_status == 'Отменен' ? 'selected' : '' }} value="Отменен">Отменен</option>
                                        </select>
                                    </form>
                                @else
                                    <select id="disabledSelect" class="form-select">
                                        <option {{ $order->order_status == 'Новый заказ' ? 'selected' : '' }} value="Новый заказ">Новый заказ</option>
                                        <option {{ $order->order_status == 'Отменен' ? 'selected' : '' }} value="Отменен">Отменен</option>
                                        <option {{ $order->order_status == 'Производятся замеры' ? 'selected' : '' }} value="Производятся замеры">Производятся замеры</option>
                                        <option {{ $order->order_status == 'У мастера' ? 'selected' : '' }} value="У мастера">У мастера</option>
                                        <option {{ $order->order_status == 'Готов' ? 'selected' : '' }} value="Готов">Готов</option>
                                    </select>
                                @endif
                            @else
                                <select id="disabledSelect" class="form-select">
                                    <option value="" selected>Выберите статус</option>
                                    <option {{ $order->order_status == 'Новый заказ' ? 'selected' : '' }} value="Новый заказ">Новый заказ</option>
                                    <option {{ $order->order_status == 'Отменен' ? 'selected' : '' }} value="Отменен">Отменен</option>
                                    <option {{ $order->order_status == 'Производятся замеры' ? 'selected' : '' }} value="Производятся замеры">Производятся замеры</option>
                                    <option {{ $order->order_status == 'У мастера' ? 'selected' : '' }} value="У мастера">У мастера</option>
                                    <option {{ $order->order_status == 'Готов' ? 'selected' : '' }} value="Готов">Готов</option>
                                </select>
                            @endauth
                        </li>
                        <li class="list-group-item">Заказчик: {{ $order->order_customer }}</li>
                        <li class="list-group-item">Дата: {{ $order->order_date }}</li>
                        <li class="list-group-item">Адрес: {{ $order->order_address }}</li>
                        <li class="list-group-item">Наименование заказа: {{ $order->order_name }}</li>
                        <li class="list-group-item">Описание: {{ $order->order_description }}</li>
                        <li class="list-group-item">Размеры готового изделия: {{ $order->order_size }}</li>
                        @auth()
                            @if(Illuminate\Support\Facades\Auth::user()->position==='Замерщик')
                                <li class="list-group-item"> <a class="link-dark" href="{{route('measurement')}}">Замеры</a>:
                                    @foreach($order->measurements as $measurement)
                                        Ширина: {{ $measurement->width }}, Высота: {{ $measurement->height }}, Зазоры: {{ $measurement->gaps }}<br>
                                    @endforeach
                                </li>
                            @else
                                <li class="list-group-item">Замеры:
                                    @foreach($order->measurements as $measurement)
                                        Ширина: {{ $measurement->width }}, Высота: {{ $measurement->height }}, Зазоры: {{ $measurement->gaps }}<br>
                                    @endforeach
                                </li>
                            @endif
                            @if(Illuminate\Support\Facades\Auth::user()->position==='Мастер')
                                <li class="list-group-item">
                                    <a class="link-dark" href="{{route('specification')}}">Спецификации</a>:
                                    @foreach($order->specifications as $specification)
                                        Материал: {{ $specification->material }}, Фурнитура: {{ $specification->furniture }},
                                        Звукоизоляция: {{ $specification->sound_insulation }}, Теплоизоляция: {{ $specification->thermal_insulation }}<br>
                                    @endforeach
                                </li>
                                @else
                                    <li class="list-group-item">
                                        Спецификации:
                                        @foreach($order->specifications as $specification)
                                            Материал: {{ $specification->material }}, Фурнитура: {{ $specification->furniture }},
                                            Звукоизоляция: {{ $specification->sound_insulation }}, Теплоизоляция: {{ $specification->thermal_insulation }}<br>
                                        @endforeach
                                    </li>
                            @endif
                        @endauth
                    </ul>
                    <hr>
                @endforeach
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
