@extends('layouts.app')

@section('title', 'Категорії')

@section('content')
<h1>Категорії</h1>

<div class="row">
    @foreach($categories as $category)
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $category->name }}</h5>
                <p class="card-text">{{ $category->description }}</p>
                <p class="card-text">
                    <small class="text-muted">
                        {{ $category->products_count }} продуктів
                    </small>
                </p>
                <a href="{{ route('categories.show', $category->id) }}" class="btn btn-primary">
                    Переглянути продукти
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection