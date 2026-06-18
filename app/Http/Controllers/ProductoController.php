<?php

namespace App\Http\Controllers;

use App\Models\Producto; // Traemos el modelo
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    // Listar todos los productos en la vista principal
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    // Mostrar el formulario para crear un producto
    public function create()
    {
        return view('productos.create');
    }

    // Validar los datos y guardar el producto nuevo
    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|unique:productos',
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'cantidad' => 'required|integer',
            'categoria' => 'required',
        ]);

        Producto::create($request->all());
        return redirect()->route('productos.index')->with('success', 'Creado con éxito');
    }

    // Ver el detalle de un solo producto (opcional)
    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    // Mostrar el formulario con los datos cargados para editar
    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    // Validar y actualizar el producto modificado
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'codigo' => 'required|unique:productos,codigo,' . $producto->id,
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'cantidad' => 'required|integer',
            'categoria' => 'required',
        ]);

        $producto->update($request->all());
        return redirect()->route('productos.index')->with('success', 'Actualizado con éxito');
    }

    // Borrar el producto del sistema
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('success', 'Eliminado con éxito');
    }
}