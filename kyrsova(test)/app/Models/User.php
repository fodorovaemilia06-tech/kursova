<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;
//Масив полів, які можна заповнювати.
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Додаємо роль
    ];

// Масив, що містить атрибути, які повинні бути приховані при серіалізації
    protected $hidden = [
        'password',
    ];
}

