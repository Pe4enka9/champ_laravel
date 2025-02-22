@extends('layouts.main')
@section('title', 'Авторизация')

@section('content')

    <h1 class="mb-3">Авторизация</h1>

    <div class="row">
        <div class="col-3">
            <form action="{{ route('login.login') }}" method="post">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Эл. почта</label>
                    <input type="email" name="email" id="email"
                           class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                           value="{{ old('email') }}">
                    @error('email') <p class="invalid-feedback">{{ $message }}</p> @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" name="password" id="password"
                           class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}">
                    @error('password') <p class="invalid-feedback">{{ $message }}</p> @enderror
                </div>

                @error('login')
                <p class="alert alert-danger">{{ $message }}</p>
                @enderror

                <button type="submit" class="btn btn-success">Войти</button>
            </form>
        </div>
    </div>

@endsection
