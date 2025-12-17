<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VacancyController extends Controller
{
    public function index()
    {
        $vacancies = DB::table('vacancies')->get(); // Отримуємо всі вакансії з бази
        return view('vacancies.vacanc', compact('vacancies'));
    }
}