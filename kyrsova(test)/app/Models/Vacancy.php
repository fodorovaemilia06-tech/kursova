<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vacancy extends Model
{
    // Таблиця, з якою працює модель
    protected $table = 'vacancies';

    // Поля, які можна масово заповнювати
    protected $fillable = ['title', 'responsibilities', 'requirements', 'benefits', 'schedule', 'location', 'salary'];

    
    public $timestamps = true;
}
