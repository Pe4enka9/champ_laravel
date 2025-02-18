@extends('layouts.main')
@section('title', 'Добавить')

@section('content')

    <a href="{{ route('products.index') }}" class="btn btn-primary mb-3">Назад</a>
    <h1 class="mb-3">Добавить</h1>

    <div class="row">
        <div class="col-3">
            <form action="{{ route('products.store') }}" method="post">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">Название</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Название">
                    @error('name')<p>{{ $message }}</p>@enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Цена</label>
                    <input type="number" name="price" id="price" class="form-control" placeholder="Цена">
                    @error('price')<p>{{ $message }}</p>@enderror
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Категория</label>
                    <select name="category_id" id="category_id" class="form-select">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-success">Добавить</button>
            </form>
        </div>
    </div>

@endsection
