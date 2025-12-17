@extends('layouts.app')

@section('title', 'Реєстрація - VeloShop')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Реєстрація</h2>
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Ім'я</label>
            <input type="text" name="name" class="w-full p-2 border rounded" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Email</label>
            <input type="email" name="email" class="w-full p-2 border rounded" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Пароль</label>
            <input type="password" name="password" class="w-full p-2 border rounded" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Підтвердьте пароль</label>
            <input type="password" name="password_confirmation" class="w-full p-2 border rounded" required>
        </div>
        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">Зареєструватися</button>
    </form>
    <p class="mt-4 text-center">
        Вже маєте акаунт? <a href="{{ route('login') }}" class="text-blue-500">Увійти</a>
    </p>
</div>
@endsection
