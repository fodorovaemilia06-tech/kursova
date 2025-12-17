<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function home(Request $request)
{
    // Отримуємо вибрані категорії (за замовчуванням порожній масив)
    $selectedCategories = $request->input('categories', []);

    // Отримуємо всі категорії
    $categories = Category::all();

    // Отримуємо товари, відфільтровані за вибраними категоріями
    $products = Product::when(!empty($selectedCategories), function ($query) use ($selectedCategories) {
        return $query->whereIn('category_id', $selectedCategories);
    })->get();

    // Повертаємо представлення з даними
    return view('home', compact('categories', 'products', 'selectedCategories'));
}

public function index(Request $request)
{
    $selectedCategories = $request->input('categories', []);
    $categories = Category::all(); // Завантаження всіх категорій
    $products = Product::when(!empty($selectedCategories), function ($query) use ($selectedCategories) {
        return $query->whereIn('category_id', $selectedCategories);
    })->when($request->min_price, function ($query) use ($request) {
        return $query->where('price', '>=', $request->min_price);
    })->when($request->max_price, function ($query) use ($request) {
        return $query->where('price', '<=', $request->max_price);
    })->paginate(12);

    return view('index', compact('categories', 'products', 'selectedCategories'));
}

public function show($id)
{
    $product = Product::with('category')->findOrFail($id);
    return view('product.show', compact('product'));
}

public function search(Request $request)
    {
        $query = $request->input('query');
        $categories = Category::all();
        $selectedCategories = [];

        $products = Product::where('name', 'like', '%' . $query . '%')
            ->orWhere('description', 'like', '%' . $query . '%')
            ->paginate(12);

        return view('index', compact('categories', 'products', 'selectedCategories'));
    }

    public function autocomplete(Request $request)
{
    $query = $request->input('query');
    $products = Product::where('name', 'like', '%' . $query . '%')->pluck('name');
    return response()->json($products);
}
}