<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Контакти | VeloShop</title>
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
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
            <h2>Контактна інформація</h2>
            <div class="contact-info">
                <p><strong>Телефон:</strong> +38 (067) 123-45-67</p>
                <p><strong>Email:</strong> info@veloshop.ua</p>
                <p><strong>Адреса головного офісу:</strong> Київ, вул. Воздвиженська, 18</p>
                <p><strong>Графік роботи:</strong> Пн-Пт: 9:00-18:00, Сб-Нд: 10:00-16:00</p>
            </div>

            <h3>Мапа нашого головного офісу</h3>
            <div class="map">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2537.334146633411!2d30.51218971573161!3d50.45948307947745!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4ce565e548dbd%3A0x78e9dbff62f8f5c6!2z0YPQuy4g0JPQvtC00LDRgNC40YLRgdGM0LrQsCwgMTgsINCa0LjQtdCyLCAwMDEwMA!5e0!3m2!1suk!2sua!4v1680650838237!5m2!1suk!2sua"
                    width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy">
                </iframe>
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