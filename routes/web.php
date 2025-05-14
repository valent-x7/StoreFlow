<?php

use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\LostPasswordController;
use App\Http\Controllers\ProductController;
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

// Forzamos autenticación para el menú
Route::middleware('auth')->group(function () {

    // Productos
    Route::get('/menu/productos', ProductController::class)->name('products');
    Route::post('/menu/productos', [ProductController::class, 'createProduct'])->name('products.create');
    // Eliminar un producto
    Route::delete('/menu/productos/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    // Mostrar el formulario de edición
    Route::get('/menu/productos/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    // Actualizar el producto
    Route::put('/menu/productos/{product}', [ProductController::class, 'update'])->name('products.update');

    // Ingresos
    Route::get('/menu/ingresos', IncomeController::class)->name('incomes');
    Route::post('/menu/ingresos', [IncomeController::class, 'createIncome'])->name('incomes.create');
    // Eliminar ingreso
    Route::delete('menu/ingresos/{income}', [IncomeController::class, 'destroy'])->name('incomes.destroy');
    // Mostrar formulario de edición
    Route::get('/menu/ingresos/{income}/edit', [IncomeController::class, 'edit'])->name('incomes.edit');
    // Actualizar el ingreso
    Route::put('/menu/ingresos/{income}', [IncomeController::class, 'update'])->name('incomes.update');

    // Egresos
    Route::get('/menu/egresos', ExpenseController::class)->name('expenses');
    Route::post('/menu/egresos/', [ExpenseController::class, 'createExpense'])->name('expenses.create');
    // Eliminar egreso
    Route::delete('menu/egresos/{expense}', [ExpenseController::class, 'destroy'])->name('expenses.destroy');
    // Mostrar formulario de edición
    Route::get('/menu/egresos/{expense}/edit', [ExpenseController::class, 'edit'])->name('expenses.edit');
    // Actualizar el egreso
    Route::put('/menu/egresos/{expense}', [ExpenseController::class, 'update'])->name('expenses.update');



    // Perfil
    Route::get('/menu/perfil', ProfileController::class)->name('profile');
    Route::post('/menu/perfil', [ProfileController::class, 'saveChanges'])->name('profile.save');

    //Log out
    Route::post('/logout', LogoutController::class)->name('logout');
});