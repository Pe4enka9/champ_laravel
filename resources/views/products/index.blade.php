@extends('layouts.main')
@section('title', 'Товары')

@section('content')

    <h1 class="mb-3">Продукты</h1>
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Добавить</a>
    <a href="{{ route('categories.index') }}" class="btn btn-primary mb-3">Категории</a>

    <div class="row">
        <div class="col-2">
            <form>
                <div class="mb-3">
                    <label for="category_id" class="form-label">Категория</label>
                    <select name="category_id" id="category_id" class="form-select">
                        <option value="all">Все</option>
                        @foreach($categories as $category)
                            <option
                                value="{{ $category->id }}" {{ ($_GET['category_id'] ?? '') == $category->id ? 'selected' : '' }} >{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-success mb-3">Искать</button>
            </form>
        </div>
    </div>

    @if($products->isEmpty())
        <h3>Таких товаров нет :(</h3>
    @else
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Название</th>
                <th>Цена</th>
                <th>Категория</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td><a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Подробнее</a></td>
                    <td><a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Изменить</a></td>
                    <td>
                        <form action="{{ route('products.destroy', $product->id) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @endif

@endsection
