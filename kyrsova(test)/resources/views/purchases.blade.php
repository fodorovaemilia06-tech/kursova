<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VeloShop</title>
    <link rel="stylesheet" href="{{ asset('css/purchases.css') }}">
</head>

<body>
    <header>
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="VeloShop Logo">
            <h1>VeloShop</h1>
        </div>
    </header>

    <main>
        <h2>Мої товари</h2>
        <div class="products">
            @foreach ($purchases as $purchase)
            <div class="product">
                <img src="{{ asset('images/' . $purchase->product->image) }}" alt="{{ $purchase->product->name }}">
                <h3>{{ $purchase->product->name }}</h3>
                <p>Ціна: {{ $purchase->total_price }} грн</p>
                <p>Кількість: {{ $purchase->quantity }}</p>

                <!-- Кнопка для видалення товару -->
                <form action="{{ route('purchases.destroy', $purchase->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Видалити</button>
                </form>
            </div>
            @endforeach
        </div>

        <div class="total-price">
            <p>Загальна сума: {{ $totalPrice }} грн</p>
        </div>
    </main>

    <footer>
        <ul>
        <p>© 2024 VeloShop. Усі права захищено.</p>
            <a href="{{ url('/index') }}" class="btn btn-primary">Каталог</a>
            <a href="{{ route('about') }}" class="btn btn-primary">Про нас</a>
            <a href="{{ route('contacts.cont') }}" class="btn btn-primary">Контакти</a>
            <a href="{{ route('stores.store') }}" class="btn btn-primary">Магазини</a>
            <a href="{{ route('vacancies.vacanc') }}" class="btn btn-primary">Вакансії</a>
            <a href="{{ route('promotions.prom') }}" class="btn btn-primary">Переглянути акції</a>
        </ul>
    </footer>
</body>

</html>