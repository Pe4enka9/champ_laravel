@extends('layouts.main')
@section('title', 'Добавить')

@section('content')

    <a href="{{ route('categories.index') }}" class="btn btn-primary mb-3">Назад</a>
    <h1 class="mb-3">Добавить</h1>

    <div class="row">
        <div class="col-3">
            <form action="{{ route('categories.store') }}" method="post">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Название</label>
                    <input type="text" name="name" id="name"
                           class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}"
                           placeholder="Название">
                    @error('name') <p class="invalid-feedback">{{ $message }}</p> @enderror
                </div>

                <button type="submit" class="btn btn-success">Добавить</button>
            </form>
        </div>
    </div>

@endsection
