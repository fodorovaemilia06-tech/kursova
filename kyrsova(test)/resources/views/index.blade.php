@extends('layouts.app')

@section('content')
<h2 class="text-3xl font-bold mb-6">Наші Товари</h2>

<form action="{{ route('search') }}" method="GET" class="mb-6 bg-white p-4 rounded shadow">
    <div class="flex flex-col md:flex-row md:items-center md:space-x-4">
        <input type="text" name="query" id="search-input" placeholder="Пошук товарів..." class="flex-1 p-2 border rounded" value="{{ request('query') }}" autocomplete="off">
        <input type="number" name="min_price" placeholder="Мін ціна" class="w-full md:w-32 p-2 border rounded mt-2 md:mt-0" value="{{ request('min_price') }}">
        <input type="number" name="max_price" placeholder="Макс ціна" class="w-full md:w-32 p-2 border rounded mt-2 md:mt-0" value="{{ request('max_price') }}">
        <button type="submit" class="mt-2 md:mt-0 bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Пошук</button>
    </div>
    <ul id="suggestions" class="mt-2 bg-white border rounded shadow hidden"></ul>
</form>

<form action="{{ route('index') }}" method="GET" class="mb-6 bg-white p-4 rounded shadow">
    <h3 class="text-xl font-semibold mb-4">Категорії</h3>
    <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-6 gap-4 mb-4">
        @foreach ($categories as $category)
        <div class="flex items-center">
            <input type="checkbox" name="categories[]" value="{{ $category->id }}" id="category-{{ $category->id }}"
                {{ in_array($category->id, $selectedCategories) ? 'checked' : '' }} class="mr-2">
            <label for="category-{{ $category->id }}" class="text-sm">{{ $category->name }}</label>
        </div>
        @endforeach
    </div>
    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Застосувати</button>
</form>

<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
    @forelse($products as $product)
    <div class="bg-white p-4 rounded shadow hover:shadow-lg transition">
        <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover mb-4 rounded">
        <h3 class="text-lg font-semibold mb-2">{{ $product->name }}</h3>
        <p class="text-gray-600 mb-2">{{ Str::limit($product->description, 100) }}</p>
        <p class="text-xl font-bold text-green-600 mb-4">${{ $product->price }}</p>
        <a href="{{ route('product.show', $product->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Детальніше</a>
    </div>
    @empty
    <p class="col-span-full text-center text-gray-500">No products found.</p>
    @endforelse
</div>

@if($products->hasPages())
<div class="mt-8">
    {{ $products->links() }}
</div>
@endif

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#search-input').on('input', function() {
        let query = $(this).val();
        let suggestions = $('#suggestions');

        if (query.length > 1) {
            $.ajax({
                url: "{{ route('autocomplete') }}",
                type: "GET",
                data: { query: query },
                success: function(data) {
                    suggestions.empty().removeClass('hidden');

                    if (data.length > 0) {
                        data.forEach(function(item) {
                            suggestions.append(`<li class="p-2 hover:bg-gray-100 cursor-pointer">${item}</li>`);
                        });

                        suggestions.find('li').on('click', function() {
                            $('#search-input').val($(this).text());
                            suggestions.addClass('hidden').empty();
                        });
                    } else {
                        suggestions.append('<li class="p-2 text-gray-500">Нічого не знайдено</li>');
                    }
                },
            });
        } else {
            suggestions.addClass('hidden').empty();
        }
    });

    $(document).click(function(e) {
        if (!$(e.target).closest('#search-input, #suggestions').length) {
            $('#suggestions').addClass('hidden').empty();
        }
    });
});
</script>
@endsection