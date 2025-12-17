@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-2xl">
    <h1 class="text-3xl font-bold mb-6">Редагувати товар</h1>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-lg shadow">
        @csrf
        @method('PUT')

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Назва товару *</label>
            <input type="text" name="name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-600" value="{{ old('name', $product->name) }}" required>
            @error('name')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Опис</label>
            <textarea name="description" rows="5" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-600">{{ old('description', $product->description) }}</textarea>
            @error('description')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Ціна ($) *</label>
                <input type="number" name="price" step="0.01" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-600" value="{{ old('price', $product->price) }}" required>
                @error('price')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Категорія *</label>
                <select name="category_id" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-600" required>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
                @error('category_id')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mb-6">
            <label class="block text-sm font-medium text-gray-700 mb-2">Зображення товару</label>
            <input type="file" name="image" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-orange-600" accept="image/*">
            @if($product->image)
                <div class="mt-4">
                    <p class="text-sm text-gray-600 mb-2">Поточне зображення:</p>
                    <img src="{{ asset('images/' . $product->image) }}" alt="Current image" class="w-32 h-32 object-cover rounded">
                </div>
            @endif
            @error('image')
                <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex gap-4">
            <button type="submit" class="flex-1 bg-orange-600 text-white py-3 rounded-lg font-semibold hover:bg-orange-700 transition">
                <i class="fas fa-save mr-2"></i> Оновити товар
            </button>
            <a href="{{ route('admin.dashboard') }}" class="flex-1 bg-gray-300 text-gray-800 py-3 rounded-lg font-semibold hover:bg-gray-400 transition text-center">
                <i class="fas fa-times mr-2"></i> Скасувати
            </a>
        </div>
    </form>
</div>
@endsection
</body>
</html>
