@extends("welcome")
@section('title','Авторизация')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col"></div>
            <div class="col">
                <form method="POST">
                    @csrf
                    <h2 class="text-center">Авторизация</h2>
                    <div class="mb-3">
                        <label for="FIO" class="form-label">ФИО</label>
                        <input type="text" class="form-control @error('FIO') is-invalid @enderror" id="FIO" name="FIO">
                        @error('FIO')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Пароль</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                        @error('password')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Авторизоваться</button>
                </form>
            </div>
            <div class="col"></div>
        </div>
    </div>
@endsection
