<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // Показуємо форму реєстрації
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Реєстрація користувача
    public function register(Request $request)
    {
        // Валідація введених даних
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Створення нового користувача
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        // Авторизація користувача після реєстрації
        auth()->login($user);

        
        // Перенаправлення на домашню сторінку
        return redirect()->route('home');
    }
}