<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Offer\OfferController;
use App\Http\Controllers\Sale\SaleController;
use App\Http\Controllers\Product\ManageProductController;
use App\Http\Controllers\Offer\ManageOfferController;
use App\Http\Controllers\Sale\ManageSaleController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::post('/products', [ManageProductController::class, 'store'])->name('products.store');
    Route::get('/offers', [OfferController::class, 'index'])->name('offers.index');
    Route::post('/offers', [ManageOfferController::class, 'store'])->name('offers.store');
    Route::get('/sales', [SaleController::class, 'index'])->name('sales.index');
    Route::get('/sales/report', [SaleController::class, 'report'])->name('sales.report');
    Route::post('/sales', [ManageSaleController::class, 'store'])->name('sales.store');
});

require __DIR__.'/auth.php';
