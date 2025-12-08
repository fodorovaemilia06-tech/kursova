@extends('layouts.app')

@section('title', 'Додати продукт')

@section('content')
<h1>Додати новий продукт</h1>

<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <div class="mb-3">
        <label for="name" class="form-label">Назва продукту *</label>
        <input type="text" class="form-control" id="name" name="name" required>
    </div>
    
    <div class="mb-3">
        <label for="description" class="form-label">Опис</label>
        <textarea class="form-control" id="description" name="description" rows="3"></textarea>
    </div>
    
    <div class="mb-3">
        <label for="price" class="form-label">Ціна *</label>
        <input type="number" step="0.01" class="form-control" id="price" name="price" required min="0">
    </div>
    
    <div class="mb-3">
        <label for="category_id" class="form-label">Категорія *</label>
        <select class="form-select" id="category_id" name="category_id" required>
            <option value="">Виберіть категорію</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    
    <div class="mb-3">
        <label for="image" class="form-label">Зображення продукту</label>
        <input type="file" class="form-control" id="image" name="image" accept="image/*">
        <small class="text-muted">Дозволені формати: JPG, PNG, GIF, WebP (до 2MB)</small>
    </div>
    
    <button type="submit" class="btn btn-success">Додати продукт</button>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Скасувати</a>
</form>
@endsection