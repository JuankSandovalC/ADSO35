<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto - Unicomputo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-slate-800 font-sans min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">

    <div class="max-w-md w-full bg-white rounded-2xl shadow-sm border border-slate-200 p-8">
        <div class="mb-6">
            <a href="{{ route('productos.index') }}" class="text-xs font-medium text-slate-400 hover:text-blue-600 transition-colors">← Cancelar y volver</a>
            <h2 class="text-2xl font-bold text-slate-900 mt-2 tracking-tight">Editar Artículo</h2>
            <p class="text-xs text-slate-500 mt-1">Modifica la información seleccionada del sistema.</p>
        </div>

        <form action="{{ route('productos.update', $producto->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')
            
            <div>
                <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-1">Código único</label>
                <input type="text" name="codigo" value="{{ $producto->codigo }}" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-purple-500/20 focus:border-purple-500 transition-all">
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-1">Nombre del Producto</label>
                <input type="text" name="nombre" value="{{ $producto->nombre }}" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-purple-500/20 focus:border-purple-500 transition-all">
            </div>

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-1">Precio ($)</label>
                    <input type="number" step="0.01" name="precio" value="{{ $producto->precio }}" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-purple-500/20 focus:border-purple-500 transition-all">
                </div>
                <div>
                    <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-1">Cantidad</label>
                    <input type="number" name="cantidad" value="{{ $producto->cantidad }}" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-purple-500/20 focus:border-purple-500 transition-all">
                </div>
            </div>

            <div>
                <label class="block text-xs font-semibold text-slate-600 uppercase tracking-wider mb-1">Categoría</label>
                <input type="text" name="categoria" value="{{ $producto->categoria }}" required class="w-full bg-slate-50 border border-slate-200 rounded-xl px-4 py-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-purple-500/20 focus:border-purple-500 transition-all">
            </div>

            <button type="submit" class="w-full mt-2 bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-medium text-sm py-3 rounded-xl shadow-sm transition-all duration-200 transform hover:-translate-y-0.5">
                Actualizar Cambios
            </button>
        </form>
    </div>

</body>
</html>