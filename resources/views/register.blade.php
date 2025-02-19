@extends('layouts.main')
@section('title', 'Регистрация')

@section('content')

    <h1 class="mb-3">Регистрация</h1>

    <div class="row">
        <div class="col-3">
            <form action="{{ route('register.register') }}" method="post">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Имя</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Эл. почта</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>

                <button type="submit" class="btn btn-success mb-3 d-block">Зарегистрироваться</button>
                <a href="{{ route('login.form') }}" class="link">Войти</a>
            </form>
        </div>
    </div>

@endsection
