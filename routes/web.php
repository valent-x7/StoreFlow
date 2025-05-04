<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Login
Route::get('/login', LoginController::class)->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.create');

// Register
Route::get('/register', RegisterController::class)->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.store');

// Forzamos autenticación

Route::middleware('auth')->group(function () {
    // Perfil
    Route::get('/profile', ProfileController::class)->name('profile');
    Route::post('/profile', [ProfileController::class, 'saveChanges'])->name('profile.save');
});

// Productos
Route::get('/products', function() {
    return view('products');
})->name('products');

//Log out
Route::post('/logout', LogoutController::class)->name('logout');