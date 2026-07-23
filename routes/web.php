<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Bisa diakses semua user yang login
    Route::resource('transactions', TransactionController::class);

    // Hanya admin
    Route::middleware('role:admin')->group(function () {
        Route::resource('categories', CategoryController::class);
        Route::resource('products', ProductController::class);
        
        Route::get(
        '/products/export/excel',
        [ProductController::class, 'exportExcel']
    )->name('products.export.excel');

    Route::get('/products/export/pdf', [ProductController::class, 'exportPdf'])
    ->name('products.export.pdf');
    });
    

});

require __DIR__.'/auth.php';