<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Каталог продуктів')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { padding-top: 20px; }
        .product-image { height: 200px; object-fit: cover; }
        .card { margin-bottom: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">Каталог</a>
                <div class="navbar-nav">
                    <a class="nav-link" href="{{ route('products.index') }}">Продукти</a>
                    <a class="nav-link" href="{{ route('categories.index') }}">Категорії</a>
                    <a class="nav-link" href="{{ route('products.create') }}">Додати продукт</a>
                </div>
            </div>
        </nav>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap