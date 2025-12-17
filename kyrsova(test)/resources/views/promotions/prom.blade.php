<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Акції | VeloShop</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body>
    <header>
        <div class="logo">
            <img src="{{ asset('images/logo.png') }}" alt="VeloShop Logo">
            <h1>VeloShop</h1>
        </div>
    </header>

    <main>
        <div class="container">
            <h2>Наші акції</h2>
            <div class="promotions">
                @foreach($promotions as $promotion)
                <div class="promotion-card">
                    <h3>{{ $promotion->title }}</h3>
                    <p>{{ Str::limit($promotion->description, 150) }}</p>
                    <div class="promotion-dates">
                        <strong>Акція діє з {{ $promotion->start_date }} по {{ $promotion->end_date }}</strong>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            <p>© 2024 VeloShop. Усі права захищено.</p>
            <ul>
                <a href="{{ auth()->check() ? route('home') : route('index') }}" class="btn btn-primary">Каталог</a>
                <a href="{{ route('about') }}" class="btn btn-primary">Про нас</a>
                <a href="{{ route('contacts.cont') }}" class="btn btn-primary">Контакти</a>
                <a href="{{ route('stores.store') }}" class="btn btn-primary">Магазини</a>
                <a href="{{ route('vacancies.vacanc') }}" class="btn btn-primary">Вакансії</a>
                <a href="{{ route('promotions.prom') }}" class="btn btn-primary">Переглянути акції</a>
            </ul>
        </div>
    </footer>
</body>

</html>