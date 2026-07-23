<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProductApiController;
use App\Http\Controllers\Api\CategoryApiController;
use App\Http\Controllers\Api\TransactionApiController;

Route::apiResource('products', ProductApiController::class)
    ->names('api.products');

Route::apiResource('categories', CategoryApiController::class)
    ->names('api.categories');

Route::apiResource('transactions', TransactionApiController::class)
    ->names('api.transactions');