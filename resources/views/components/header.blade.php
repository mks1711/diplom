<header>
    <nav class="container navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{route('/')}}">Свежий взгляд</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <div>
                    @auth()
                        @if(\Illuminate\Support\Facades\Auth::user()->position==='Админ')
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('list_user')}}">Список пользователей</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('create_user')}}">Создание пользователей</a>
                                </li>
                            </ul>
                        @elseif(\Illuminate\Support\Facades\Auth::user()->position==='Менеджер')
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link " href="{{route('list_order')}}">Список</a>
                                    </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="{{route('create_order')}}">Оформить заказ</a>
                                </li>
                            </ul>
                            @else
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link " href="{{route('list_order')}}">Список</a>
                                </li>
                            </ul>
                        @endif
                </div>
            </div>
            <a href="{{route('logout')}}" class="btn btn-danger">Выйти</a>
            @endauth
            @guest()
                <a href="{{route('auth')}}" class="btn btn-outline-primary ">Вход</a>
            @endguest
        </div>
    </nav>
</header>

