<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\LostPasswordController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ResetPasswordController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Login
Route::get('/login', LoginController::class)->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.create');

// Contraseña olvidada
Route::get('/password/lost', LostPasswordController::class)->name('lost-password');
Route::post('/password/lost', [LostPasswordController::class, 'sendEmail'])->name('sendEmail');

// Rutas restablecer contraseña
Route::get('/password/reset/{token}', ResetPasswordController::class)->name('reset.password');
Route::post('/password/reset', [ResetPasswordController::class, 'restorePassword'])->name('password.restore');

// Register
Route::get('/register', RegisterController::class)->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.store');

// Forzamos autenticación
Route::middleware('auth')->group(function () {

    // Productos
    Route::get('/menu/productos', function() {
        return view('products');
    })->name('products');



    // Perfil
    Route::get('/menu/perfil', ProfileController::class)->name('profile');
    Route::post('/menu/perfil', [ProfileController::class, 'saveChanges'])->name('profile.save');

    //Log out
    Route::post('/logout', LogoutController::class)->name('logout');
});