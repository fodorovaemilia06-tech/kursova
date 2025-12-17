<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Вказуємо таблицю, яку ця модель буде представляти (якщо вона не відповідає конвенціям)
    protected $table = 'products';

    // Описуємо атрибути, які можуть бути заповнені масово
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
        'category_id',
    ];

    // Вказуємо зв'язок "багато до одного" (багато товарів можуть належати одній категорії)
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}