@extends('layouts.app')

@section('title', 'Вхід - VeloShop')

@section('content')
<div class="max-w-md mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-2xl font-bold mb-4">Вхід</h2>
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Email</label>
            <input type="email" name="email" class="w-full p-2 border rounded" required>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700">Пароль</label>
            <input type="password" name="password" class="w-full p-2 border rounded" required>
        </div>
        <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600">Увійти</button>
    </form>
    <p class="mt-4 text-center">
        Немає акаунта? <a href="{{ route('register') }}" class="text-blue-500">Зареєструватися</a>
    </p>
</div>
@endsection
