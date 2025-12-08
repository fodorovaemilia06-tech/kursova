@extends('layouts.app')

@section('title', $product->name)

@section('content')
<div class="row">
    <div class="col-md-6">
        @if($product->image)
            <img src="{{ asset($product->image) }}" class="img-fluid rounded" alt="{{ $product->name }}">
        @else
            <div class="bg-light border rounded d-flex align-items-center justify-content-center" style="height: 400px;">
                <h4 class="text-muted">Зображення відсутнє</h4>
            </div>
        @endif
    </div>
    
    <div class="col-md-6">
        <h1>{{ $product->name }}</h1>
        <p class="text-muted">Категорія: {{ $product->category->name }}</p>
        
        <div class="mb-4">
            <h3>Опис:</h3>
            <p>{{ $product->description ?? 'Опис відсутній' }}</p>
        </div>
        
        <div class="mb-4">
            <h3>Ціна:</h3>
            <h2 class="text-primary">{{ number_format($product->price, 2) }} грн</h2>
        </div>
        
        <div class="mb-4">
            <h3>Додаткова інформація:</h3>
            <ul>
                <li><strong>Додано:</strong> {{ $product->created_at->format('d.m.Y H:i') }}</li>
                <li><strong>Оновлено:</strong> {{ $product->updated_at->format('d.m.Y H:i') }}</li>
            </ul>
        </div>
        
        <a href="{{ route('products.index') }}" class="btn btn-secondary">Назад до каталогу</a>
    </div>
</div>
@endsection