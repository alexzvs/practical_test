<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

// Define API routes for the ProductController
Route::apiResource('products', ProductController::class);

// Define API routes for the CategoryController
Route::apiResource('categories', CategoryController::class);
