@extends('layouts.main')
@section('title', $product->name)

@section('content')

    <a href="{{ route('products.index') }}" class="btn btn-primary mb-3">Назад</a>
    <h1 class="mb-3">{{ $product->name }}</h1>
    <h4 class="mb-3">Цена: {{ $product->price }} руб.</h4>
    <p>Категория: {{ $product->category->name }}</p>

@endsection
