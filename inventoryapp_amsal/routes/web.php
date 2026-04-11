<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'authenticate']);
    Route::get('/register', [AuthController::class, 'register']);
    Route::post('/register', [AuthController::class, 'store']);
});

Route::middleware(['auth'])->group(function () {

    Route::get('/', [DashboardController::class, 'home']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::post('/profile', [ProfileController::class, 'update']);

    Route::middleware(['role:staff'])->group(function () {
        Route::get('/book', [BookController::class, 'index']);
        Route::get('/book/{id}', [BookController::class, 'show'])->where('id', '[0-9]+');

        Route::get('/transaction', [TransactionController::class, 'index']);
        Route::get('/transaction/create/{book_id}', [TransactionController::class, 'create']);
        Route::post('/transaction/{book_id}', [TransactionController::class, 'store']);
    });

    Route::middleware(['role:admin'])->group(function () {

        Route::get('/category', [CategoryController::class, 'category']);
        Route::get('/category/create', [CategoryController::class, 'create']);
        Route::post('/category', [CategoryController::class, 'store']);
        Route::get('/category/{id}/edit', [CategoryController::class, 'edit']);
        Route::put('/category/{id}', [CategoryController::class, 'update']);
        Route::delete('/category/{id}', [CategoryController::class, 'destroy']);

        Route::get('/category/{id}', [BookController::class, 'showCategory']);

        Route::get('/book/create', [BookController::class, 'create']);
        Route::post('/book', [BookController::class, 'store']);
        Route::get('/book/{id}/edit', [BookController::class, 'edit']);
        Route::put('/book/{id}', [BookController::class, 'update']);
        Route::delete('/book/{id}', [BookController::class, 'destroy']);
    });
});
