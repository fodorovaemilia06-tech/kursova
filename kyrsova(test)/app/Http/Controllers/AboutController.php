<?php

namespace App\Http\Controllers;


use App\Models\Product; // Імпорт моделі Product
use App\Models\Category; // Імпорт моделі Category
use Illuminate\Http\Request;


class AboutController extends Controller
{
    public function index()
    {
        return view('about'); // Повертає вид для сторінки "Про нас"
    }
}