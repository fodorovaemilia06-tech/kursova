@extends('layouts.app')

@section('title', 'Всі продукти')

@section('content')
<h1>Каталог продуктів</h1>
<a href="{{ route('products.create') }}" class="btn btn-success mb-4">Додати новий продукт</a>

<div class="row">
    @foreach($products as $product)
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
                <p class="card-text"><strong>Категорія:</strong> {{ $product->category->name }}</p>
                <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Детальніше</a>
            </div>
        </div>
    </div>
    @endforeach
</div>

<div class="mt-4">
    {{ $products->links() }}
</div>
@endsection