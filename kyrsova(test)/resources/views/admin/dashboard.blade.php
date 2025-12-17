@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-3xl font-bold mb-6">Адміністративна панель</h1>

    @if(session('success'))
        <div class="alert alert-success bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">{{ session('success') }}</div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
        <a href="{{ route('admin.products.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 text-center">Додати новий товар</a>
        <a href="{{ route('admin.categories.index') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 text-center">Управління категоріями</a>
    </div>

    <h3 class="text-2xl font-bold mb-4">Список товарів</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($products as $product)
        <div class="bg-white p-4 rounded shadow">
            <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover mb-4 rounded">
            <h3 class="text-lg font-semibold mb-2">{{ $product->name }}</h3>
            <p class="text-gray-600 mb-2">{{ $product->category->name }}</p>
            <p class="text-xl font-bold text-green-600 mb-4">${{ $product->price }}</p>
            <a href="{{ route('admin.products.edit', $product->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 mr-2">Редагувати</a>
        </div>
        @endforeach
    </div>
</div>
@endsection
