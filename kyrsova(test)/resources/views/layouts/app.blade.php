<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'VeloShop')</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100">
    <header class="bg-white shadow">
        <div class="container mx-auto px-4 py-4 flex justify-between items-center">
            <h1 class="text-2xl font-bold text-gray-800">VeloShop</h1>
            <nav class="flex space-x-4">
                <a href="{{ route('index') }}" class="text-gray-600 hover:text-gray-800">Home</a>
                @auth
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="text-gray-600 hover:text-gray-800">Admin</a>
                    @endif
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-600 hover:text-gray-800">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-600 hover:text-gray-800">Login</a>
                    <a href="{{ route('register') }}" class="text-gray-600 hover:text-gray-800">Register</a>
                @endauth
            </nav>
        </div>
    </header>
    <main class="container mx-auto px-4 py-8">
        @yield('content')
    </main>
    <footer class="bg-gray-800 text-white py-4">
        <div class="container mx-auto px-4 text-center">
            &copy; 2025 VeloShop. All rights reserved.
        </div>
    </footer>
</body>
</html>