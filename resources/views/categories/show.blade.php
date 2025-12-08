@extends('layouts.app')

@section('title', $category->name)

@section('content')
<h1>{{ $category->name }}</h1>
<p class="lead">{{ $category->description }}</p>

<h2>Продукти в цій категорії</h2>

@if($category->products->count() > 0)
<div class="row">
    @foreach($category->products as $product)
    <div class="col-md-4">
        <div class="card">
            @if($product->image)
                <img src="{{ asset($product->image) }}" class="card-img-top product-image" alt="{{ $product->name }}">
            @else
                <div class="card-img-top product-image bg-light d-flex align-items-center justify-content-center">
                    <span class="text-muted">Немає зображення</span>
                </div>
            @endif
            
            <div class="card-body">
                <h5 class="card-title">{{ $product->name }}</h5>
                <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                <p class="card-text"><strong>Ціна:</strong> {{ number_format($product->price, 2) }} грн</p>
                <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Детальніше</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@else
<div class="alert alert-info">
    У цій категорії ще немає продуктів.
</div>
@endif

<a href="{{ route('categories.index') }}" class="btn btn-secondary mt-4">Назад до категорій</a>
@endsection