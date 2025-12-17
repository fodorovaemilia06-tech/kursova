<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вакансії | VeloShop</title>
    <link rel="stylesheet" href="{{ asset('css/vacancy.css') }}">
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
            <h2>Доступні вакансії</h2>
            <div class="vacancies">
                @foreach($vacancies as $vacancy)
                <div class="vacancy-card">
                    <h3>{{ $vacancy->title }}</h3>
                    <p><strong>Обов'язки:</strong> {{ $vacancy->responsibilities }}</p>
                    <p><strong>Вимоги до кандидата:</strong> {{ $vacancy->requirements }}</p>
                    <p><strong>Ми пропонуємо:</strong> {{ $vacancy->benefits }}</p>
                    <p><strong>Графік роботи:</strong> {{ $vacancy->schedule }}</p>
                    <p><strong>Місто:</strong> {{ $vacancy->location }}</p>
                    @if($vacancy->salary)
                    <p><strong>Заробітня плата:</strong> {{ $vacancy->salary }}</p>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </main>

    <footer>
        <div class="container">
            <ul>
            <p>© 2024 VeloShop. Усі права захищено.</p>
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