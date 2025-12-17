<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Наші Магазини | VeloShop</title>
    <link rel="stylesheet" href="{{ asset('css/store.css') }}">
</head>

<body>
    <header>
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="VeloShop Logo">
            <h1>Наші Магазини</h1>
        </div>
    </header>
    <main>
        <div class="container">
            <h2>Адреси та графік роботи</h2>
            <div class="stores">
                @foreach($stores as $store)
                <div class="store-card">
                    <p><strong>Адреса:</strong> {{ $store->address }}</p>
                    <p><strong>Графік роботи:</strong> {{ $store->working_hours }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </main>
    <footer>
    <p>© 2024 VeloShop. Усі права захищено.</p>
        <a href="{{ auth()->check() ? route('home') : route('index') }}" class="btn btn-primary">Каталог</a>
        <a href="{{ route('about') }}" class="btn btn-primary">Про нас</a>
        <a href="{{ route('contacts.cont') }}" class="btn btn-primary">Контакти</a>
        <a href="{{ route('stores.store') }}" class="btn btn-primary">Магазини</a>
        <a href="{{ route('vacancies.vacanc') }}" class="btn btn-primary">Вакансії</a>
        <a href="{{ route('promotions.prom') }}" class="btn btn-primary">Переглянути акції</a>
    </footer>
</body>

</html>