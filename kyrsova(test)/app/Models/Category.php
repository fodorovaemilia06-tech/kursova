<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Вказуємо таблицю, яку ця модель буде представляти (якщо вона не відповідає конвенціям)
    protected $table = 'categories';

    // Описуємо атрибути, які можуть бути заповнені масово
    protected $fillable = [
        'name',
        'description',
    ];

    // Вказуємо зв'язок "один до багатьох" (одна категорія може містити багато товарів)
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}