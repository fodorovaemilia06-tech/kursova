<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    // Вказуємо таблицю, яку ця модель буде представляти
    protected $table = 'promotions';

    // Описуємо заповнювані атрибути
    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'is_active',
    ];
}
