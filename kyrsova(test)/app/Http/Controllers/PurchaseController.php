<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    public function store(Request $request, $productId)
    {
        $product = Product::findOrFail($productId);

        Purchase::create([
            'user_id' => auth()->id(),
            'product_id' => $productId,
            'quantity' => $request->input('quantity', 1),
            'total_price' => $product->price * $request->input('quantity', 1),
        ]);

        return redirect()->route('my.purchases');
    }

    public function index()
    {
        $purchases = Purchase::where('user_id', auth()->id())->with('product')->get();
    

    // Підраховуємо загальну суму всіх покупок
    $totalPrice = $purchases->sum(function ($purchase) {
        return $purchase->total_price;
    });

    return view('purchases', compact('purchases', 'totalPrice'));
    }


    // Метод для видалення покупки
    public function destroy($id)
    {
        // Знаходимо покупку за ID та перевіряємо, що вона належить поточному користувачу
        $purchase = Purchase::where('id', $id)->where('user_id', auth()->id())->first();

        if ($purchase) {
            // Видалити покупку
            $purchase->delete();
        }

        // Переадресувати користувача назад на сторінку покупок
        return redirect()->route('my.purchases');
    }
}