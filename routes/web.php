<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;




Route::get('/', [UserController::class, 'loginForm'])->name('login');

// Process the login form submission
Route::post('/login', [UserController::class, 'login'])->name('login.process');

// Profile and logout routes
Route::get('/profile', [UserController::class, 'profile'])->name('profile');
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

// Routes protected by authentication middleware
Route::middleware(['auth'])->group(function () {
    Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::get('/posts', [PostController::class, 'index'])->name('posts.index'); // Add this line
});
