@extends('layouts.main')
@section('title', 'Категории')

@section('content')

    <h1 class="mb-3">Категории</h1>
    <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Добавить</a>
    <a href="{{ route('products.index') }}" class="btn btn-primary mb-3">Товары</a>

    <table class="table table-striped">
        <thead>
        <tr>
            <th>Название</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td><a href="{{ route('categories.show', $category) }}" class="btn btn-primary">Подробнее</a></td>
                <td><a href="{{ route('categories.edit', $category) }}" class="btn btn-primary">Изменить</a></td>
                <td>
                    <form action="{{ route('categories.destroy', $category) }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Удалить</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
