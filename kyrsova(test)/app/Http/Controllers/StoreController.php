<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    public function index()
    {
        $stores = DB::table('stores')->get();
        return view('stores.store', compact('stores'));
    }
}
