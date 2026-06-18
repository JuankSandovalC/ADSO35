<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventario - Unicomputo</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-slate-800 font-sans min-h-screen">

    <div class="max-w-6xl mx-auto px-4 py-10">
        <div class="flex flex-col md:flex-row md:items-center md:justify-between border-b border-slate-200 pb-6 mb-8">
            <div>
                <h1 class="text-3xl font-bold text-slate-900 tracking-tight">Unicomputo</h1>
                <p class="text-sm text-slate-500 mt-1">Panel de administración de inventario tecnológico.</p>
            </div>
            <div class="mt-4 md:mt-0">
                <a href="{{ route('productos.create') }}" class="inline-flex items-center bg-gradient-to-r from-blue-600 to-purple-600 hover:from-blue-700 hover:to-purple-700 text-white font-medium text-sm px-5 py-2.5 rounded-xl shadow-sm transition-all duration-200 transform hover:-translate-y-0.5">
                    + Registrar Producto
                </a>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-slate-200/80 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="bg-slate-100/70 border-b border-slate-200 text-xs font-semibold text-slate-600 uppercase tracking-wider">
                            <th class="px-6 py-4">Código</th>
                            <th class="px-6 py-4">Nombre del Artículo</th>
                            <th class="px-6 py-4">Precio</th>
                            <th class="px-6 py-4">Disponibles</th>
                            <th class="px-6 py-4">Categoría</th>
                            <th class="px-6 py-4 text-right">Acciones</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-slate-100 text-sm">
                        @forelse($productos as $p)
                        <tr class="hover:bg-slate-50/80 transition-colors">
                            <td class="px-6 py-4 font-mono font-medium text-purple-600">{{ $p->codigo }}</td>
                            <td class="px-6 py-4 font-medium text-slate-900">{{ $p->nombre }}</td>
                            <td class="px-6 py-4 text-slate-600">${{ number_format($p->precio, 2) }}</td>
                            <td class="px-6 py-4">
                                <span class="inline-flex items-center px-2.5 py-1 rounded-md text-xs font-medium bg-blue-50 text-blue-700">
                                    {{ $p->cantidad }} unds
                                </span>
                            </td>
                            <td class="px-6 py-4 text-slate-500">{{ $p->categoria }}</td>
                            <td class="px-6 py-4 text-right space-x-3">
                                <a href="{{ route('productos.edit', $p->id) }}" class="text-blue-600 hover:text-blue-800 font-medium transition-colors">Editar</a>
                                <form action="{{ route('productos.destroy', $p->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('¿Seguro de borrarlo, men?')" class="text-rose-600 hover:text-rose-800 font-medium transition-colors">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-10 text-center text-slate-400">No hay productos registrados todavía.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>