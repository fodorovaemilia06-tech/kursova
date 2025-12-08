<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Дозволяє масове призначення для цих полів
    // ДОДАЛИ 'image' до масиву
    protected $fillable = [
        'name', 
        'description', 
        'price', 
        'image',      // це нове поле для зображення
        'category_id'
    ];

    /**
     * Зв'язок багато-до-одного з категоріями
     * Багато продуктів належать одній категорії
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}