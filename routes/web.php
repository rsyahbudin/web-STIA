<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\FoodProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Combined Catalog Routes
Route::get('/catalog', [CatalogController::class, 'index'])->name('catalog.index');
Route::get('/catalog/{type}/{id}', [CatalogController::class, 'show'])->name('catalog.show');

// Legacy Routes (for backward compatibility)
Route::get('/products', [FoodProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [FoodProductController::class, 'show'])->name('products.show');
Route::get('/apis', [ApiController::class, 'index'])->name('apis.index');
Route::get('/apis/{id}', [ApiController::class, 'show'])->name('apis.show');

require __DIR__ . '/auth.php';
require __DIR__ . '/settings.php';
