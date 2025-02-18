@extends('layouts.main')
@section('title', 'Изменить')

@section('content')

    <a href="{{ route('categories.index') }}" class="btn btn-primary mb-3">Назад</a>
    <h1 class="mb-3">Изменить</h1>

    <div class="row">
        <div class="col-3">
            <form action="{{ route('categories.update', $category) }}" method="post">
                @csrf
                @method('patch')

                <div class="mb-3">
                    <label for="name" class="form-label">Название</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Название" value="{{ $category->name }}">
                </div>

                <button type="submit" class="btn btn-success">Изменить</button>
            </form>
        </div>
    </div>

@endsection
