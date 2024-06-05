<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BookController;

Route::prefix('user')->group(function () {
    Route::get('/users', function () {
        return $request->user();
    });
    Route::post('/register',[AuthController::class, 'register']);
    Route::post('/login',[AuthController::class, 'login'])->name('login');
    Route::post('/login',[AuthController::class, 'login']);
    Route::post('/logout',[AuthController::class, 'logout'])->middleware('auth:api');
});

Route::resource('book', BookController::class, [
        'only' => [
            'index',
            'show'
        ]
    ]);

Route::resource('book', BookController::class, [
    'except' => [
        'index',
        'show'
    ]

 ])->middleware(['auth:api']);