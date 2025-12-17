<?php
namespace App\Http\Controllers;

use App\Models\Product; // Імпорт моделі Product
use App\Models\Category; // Імпорт моделі Category
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get(); // Отримуємо всі продукти з категоріями
        return view('admin.dashboard', compact('products'));
    }
}