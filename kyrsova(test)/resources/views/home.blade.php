<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VeloShop</title>
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
</head>

<body>
    <header>
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="VeloShop Logo">
            <h1>VeloShop</h1>
        </div>

        <div class="buttons">
            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                @csrf
                <button type="submit" class="logout-button"><strong>Вихід</strong></button>
            </form>
            <a href="{{ route('my.purchases') }}">
                <button class="btn btn-my-purchases">Кошик</button>
            </a>

            <form action="{{ route('search') }}" method="GET" class="search-form">
                <input type="text" name="query" id="search-input" placeholder="Введіть назву товару" required
                    autocomplete="off">
                <button type="submit">Пошук</button>
                <ul id="suggestions" class="suggestions-list"></ul>
            </form>

            @if(session('error'))
            <p class="error-message">{{ session('error') }}</p>
            @endif

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>
            $(document).ready(function() {
                $('#search-input').on('input', function() {
                    let query = $(this).val();

                    if (query.length > 1) {
                        $.ajax({
                            url: "{{ route('autocomplete') }}",
                            type: "GET",
                            data: {
                                query: query
                            },
                            success: function(data) {
                                let suggestions = $('#suggestions');
                                suggestions.empty();

                                if (data.length > 0) {
                                    data.forEach(function(item) {
                                        suggestions.append(
                                            `<li class="suggestion-item">${item}</li>`
                                            );
                                    });

                                    $('.suggestion-item').on('click', function() {
                                        $('#search-input').val($(this).text());
                                        suggestions.empty();
                                    });
                                } else {
                                    suggestions.append(
                                        '<li class="no-results">Нічого не знайдено</li>'
                                        );
                                }
                            },
                        });
                    } else {
                        $('#suggestions').empty();
                    }
                });

                $(document).click(function(e) {
                    if (!$(e.target).closest('#search-input, #suggestions').length) {
                        $('#suggestions').empty();
                    }
                });
            });
            </script>
        </div>
        @if (auth()->check())
        <h1>Ласкаво просимо, {{ auth()->user()->name }}</h1>
        @else
        <h1>Ласкаво просимо, Гість!</h1>
        @endif
    </header>

    <main>
    @if(!empty($categories))
    <form action="{{ route('home') }}" method="GET" class="category-form">
        <h3>Категорії</h3>
      
        @foreach ($categories as $category)
        <div class="category-item">
            <input type="checkbox" name="categories[]" value="{{ $category->id }}" id="category-{{ $category->id }}"
                {{ in_array($category->id, $selectedCategories) ? 'checked' : '' }}>
            <label for="category-{{ $category->id }}">{{ $category->name }}</label>
        </div>
        @endforeach
        <button type="submit" class="filter-button">Застосувати</button>
    </form>
    @endif
    <h2>Наші Товари</h2>
    <div class="products">
        @forelse($products as $product)
        <div class="product">
            <a href="{{ route('product.show', $product->id) }}">
                <div style="height: 158px;">
                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}">
                </div>
                <h3>{{ $product->name }}</h3>
                <p>{{ $product->price }} грн</p>
            </a>
            <form action="{{ route('purchase', ['product' => $product->id]) }}" method="POST">
                @csrf
                <input type="hidden" name="quantity" value="1">
                <button type="submit" class="buy-button">Придбати</button>
            </form>
        </div>
        @empty
        <p>Товарів не знайдено</p>
        @endforelse
    </div>
</main>


    <footer>
        <ul>
        <p>© 2024 VeloShop. Усі права захищено.</p>
            <a href="{{ url('/home') }}" class="btn btn-primary">Каталог</a>
            <a href="{{ route('about') }}" class="btn btn-primary">Про нас</a>
            <a href="{{ route('contacts.cont') }}" class="btn btn-primary">Контакти</a>
            <a href="{{ route('stores.store') }}" class="btn btn-primary">Магазини</a>
            <a href="{{ route('vacancies.vacanc') }}" class="btn btn-primary">Вакансії</a>
            <a href="{{ route('promotions.prom') }}" class="btn btn-primary">Переглянути акції</a>
        </ul>
    </footer>
</body>

</html>