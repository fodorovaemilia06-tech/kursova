<?php

namespace App\Http\Controllers;

use App\Models\Promotion;

class PromotionController extends Controller
{
    public function index()
    {
        // Отримуємо всі активні акції
        $promotions = Promotion::where('is_active', 1)->get();

        // Повертаємо вигляд з акціями
        return view('promotions.prom', compact('promotions'));
    }
}
