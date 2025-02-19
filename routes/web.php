<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\GuestMiddleware;
use Illuminate\Support\Facades\Route;

/**
 * @see ProductController
 * @see CategoryController
 * @see UserController
 */

Route::controller(ProductController::class)->prefix('products')->name('products.')->group(function () {
    Route::get('/', 'index')->name('index');

    Route::middleware(AuthMiddleware::class)->group(function () {
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{product}', 'show')->name('show');
        Route::get('/{product}/edit', 'edit')->name('edit');
        Route::patch('/{product}', 'update')->name('update');
        Route::delete('/{product}', 'destroy')->name('destroy');
    });
});

Route::middleware(AuthMiddleware::class)->controller(CategoryController::class)
    ->prefix('categories')->name('categories.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/', 'store')->name('store');
        Route::get('/{category}', 'show')->name('show');
        Route::get('/{category}/edit', 'edit')->name('edit');
        Route::patch('/{category}', 'update')->name('update');
        Route::delete('/{category}', 'destroy')->name('destroy');
    });

Route::middleware(GuestMiddleware::class)->controller(UserController::class)->group(function () {
    Route::get('/register', 'registerForm')->name('register.form');
    Route::post('/register', 'register')->name('register.register');
    Route::get('/login', 'loginForm')->name('login.form');
    Route::post('/login', 'login')->name('login.login');
});

Route::post('/logout', [UserController::class, 'logout'])->name('logout')->middleware(AuthMiddleware::class);
