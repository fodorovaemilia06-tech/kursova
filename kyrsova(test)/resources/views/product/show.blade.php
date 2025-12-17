@extends('layouts.app')

@section('title', $product->name . ' - VeloShop')

@section('content')
<div class="bg-white p-6 rounded shadow max-w-4xl mx-auto">
    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-64 object-cover mb-4 rounded">
    <h1 class="text-3xl font-bold mb-4">{{ $product->name }}</h1>
    <p class="text-gray-600 mb-4">{{ $product->description }}</p>
    <p class="text-2xl font-bold text-green-600 mb-4">${{ $product->price }}</p>
    <p class="text-sm text-gray-500">Категорія: {{ $product->category->name }}</p>
    <a href="{{ route('index') }}" class="mt-4 inline-block bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Назад до каталогу</a>
</div>
@endsection