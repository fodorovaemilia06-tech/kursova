<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Показуємо форму входу
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Логін користувача
    public function login(Request $request)
    {
        // Валідація введених даних
        $credentials = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Спробуємо автентифікацію
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            // Якщо успішно увійшли, перевіряємо роль користувача
            $user = Auth::user();
            if ($user->role === 'admin') {
                // Якщо адмін, перенаправляємо на адмін-панель
                return redirect()->route('admin.dashboard');
            } else {
                // Якщо звичайний користувач, перенаправляємо на домашню сторінку
                return redirect()->route('home');
            }
        }

        // Якщо автентифікація не вдалася, повертаємо назад з помилкою
        return back()->withErrors(['email' => 'Невірний email або пароль.']);
    }

    // Вихід користувача
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('index');// Повернення на головну сторінку
    }
}