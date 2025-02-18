@extends('layouts.main')
@section('title', $category->name)

@section('content')

    <a href="{{ route('categories.index') }}" class="btn btn-primary mb-3">Назад</a>
    <h1>{{ $category->name }}</h1>

@endsection
