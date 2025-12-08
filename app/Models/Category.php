<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Дозволяє масове призначення для цих полів
    protected $fillable = ['name', 'description'];

    /**
     * Зв'язок один-до-багатьох з продуктами
     * Одна категорія може мати багато продуктів
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}