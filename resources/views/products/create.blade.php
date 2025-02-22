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
                    <input type="text" name="name" id="name"
                           class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') }}"
                           placeholder="Название">
                    @error('name') <p class="invalid-feedback">{{ $message }}</p> @enderror
                </div>

                <div class="mb-3">
                    <label for="price" class="form-label">Цена</label>
                    <input type="number" name="price" id="price"
                           class="form-control {{ $errors->has('price') ? 'is-invalid' : '' }}"
                           value="{{ old('price') }}" placeholder="Цена">
                    @error('price') <p class="invalid-feedback">{{ $message }}</p> @enderror
                </div>

                <div class="mb-3">
                    <label for="category_id" class="form-label">Категория</label>
                    <select name="category_id" id="category_id"
                            class="form-select {{ $errors->has('category_id') ? 'is-invalid' : '' }}">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id') <p class="invalid-feedback">{{ $message }}</p> @enderror
                </div>

                <button type="submit" class="btn btn-success">Добавить</button>
            </form>
        </div>
    </div>

@endsection
