<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    // Перегляд всіх товарів
    public function index()
    {
        $products = Product::all(); // Отримуємо всі продукти
        return view('admin.dashboard', compact('products'));
    }

    // Сторінка для додавання нового товару
    public function create()
    {
        $categories = Category::all(); // Отримуємо всі категорії
        return view('admin.products.create', compact('categories'));
    }

    // Збереження нового товару
    public function store(Request $request)
    {
        // Валідація даних
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric|min:0',
        'category_id' => 'required|exists:categories,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $imageName = null;
    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
    }

    // Створення товару з масиву даних
    Product::create(array_merge($validatedData, ['image' => $imageName]));

    return redirect()->route('admin.products.index')->with('success', 'Товар успішно доданий!');

    }

    // Сторінка для редагування товару
    public function edit($id)
    {
        $product = Product::findOrFail($id); // Отримуємо товар
        $categories = Category::all(); // Отримуємо всі категорії
        return view('admin.products.edit', compact('product', 'categories'));
    }

    // Оновлення товару
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $request->only(['name', 'description', 'price', 'category_id']);

        if ($request->hasFile('image')) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        // Оновлюємо товар
        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Товар успішно оновлений!');
    }
            'image' => $request->image,
        ]);

        return redirect()->route('admin.products.index')->with('success', 'Товар успішно оновлений!');
    }
}