<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductoController; // 👈 Importamos tu controlador optimizado
use Illuminate\Support\Facades\Route;

// Pantalla de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Panel de control (Dashboard) al loguearse
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// 🔒 TODAS ESTAS RUTAS REQUIEREN INICIAR SESIÓN (AUTH)
Route::middleware('auth')->group(function () {
    // Rutas del perfil de usuario (Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // 📦 CRUD completo de productos para Unicomputo
    Route::resource('productos', ProductoController::class);
});

require __DIR__.'/auth.php';