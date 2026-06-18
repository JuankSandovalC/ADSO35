<?php

use Illuminate\Support\Facades\Route;
use App\Models\Producto; // Traemos el modelo

// Ruta API para consultar todos los productos en formato JSON
Route::get('/productos', function () {
    return response()->json(Producto::all(), 200);
});