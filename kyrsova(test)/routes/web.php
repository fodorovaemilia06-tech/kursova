<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware(['web'])->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/', [ProductController::class, 'index'])->name('index');
});

Route::get('/home', [ProductController::class, 'home'])->name('home');
Route::get('/index', [ProductController::class, 'index'])->name('index');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/search', [ProductController::class, 'search'])->name('search');
Route::get('/autocomplete', [ProductController::class, 'autocomplete'])->name('autocomplete');


use App\Http\Controllers\PromotionController;

Route::get('/promotions', [PromotionController::class, 'index'])->name('promotions.prom');


use App\Http\Controllers\VacancyController;

Route::get('/vacancies', [VacancyController::class, 'index'])->name('vacancies.vacanc');

use App\Http\Controllers\StoreController;

Route::get('/stores', [StoreController::class, 'index'])->name('stores.store');

use App\Http\Controllers\ContactController;

Route::get('/contacts', [ContactController::class, 'index'])->name('contacts.cont');

use App\Http\Controllers\AboutController;

Route::get('/about', [AboutController::class, 'index'])->name('about');



use App\Http\Controllers\Auth\RegisterController;
// Реєстрація
Route::get('/register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

use App\Http\Controllers\Auth\LoginController;
// Вхід
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');





use App\Http\Controllers\HomeController;
use App\Http\Controllers\PurchaseController;

#Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::post('/purchase/{product}', [PurchaseController::class, 'store'])->name('purchase');
Route::get('/my-purchases', [PurchaseController::class, 'index'])->name('my.purchases');
Route::delete('/purchases/{id}', [PurchaseController::class, 'destroy'])->name('purchases.destroy');




use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\AdminDashboardController;

Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

     // Перегляд всіх товарів
     Route::get('products', [AdminProductController::class, 'index'])->name('admin.products.index');
    
     // Сторінка для додавання нового товару
     Route::get('products/create', [AdminProductController::class, 'create'])->name('admin.products.create');
     Route::post('products', [AdminProductController::class, 'store'])->name('admin.products.store');
     
     // Сторінка для редагування товару
     Route::get('products/{product}/edit', [AdminProductController::class, 'edit'])->name('admin.products.edit');
     Route::put('products/{product}', [AdminProductController::class, 'update'])->name('admin.products.update');

     // Categories
     Route::resource('categories', CategoryController::class, ['as' => 'admin']);
});






