<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = [
            'phone' => '+38 (067) 123-45-67',
            'email' => 'info@veloshop.ua',
            'address' => 'Київ, вул. Воздвиженська, 18',
            'working_hours' => 'Пн-Пт: 9:00-18:00, Сб-Нд: 10:00-16:00',
        ];

        return view('contacts.cont', compact('contacts'));
    }


    
}
