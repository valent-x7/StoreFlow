<x-layout title="Productos">

    <div class="p-5 h-full w-full">

        {{-- Mensaje de éxito (inicialmente oculto) --}}
        <div id="success-message" class="bg-green-200 border-green-400 text-green-700 px-4 py-3 rounded relative hidden mb-4" role="alert">
            <strong class="font-bold">¡Éxito!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>

        <div class="flex flex-row justify-end items-center">
            <button onclick="document.getElementById('modalCrearProducto').classList.remove('hidden')"
                class="bg-[#2ecc71] hover:bg-[#27ae60] text-white font-bold py-2 px-4 rounded cursor-pointer focus:outline-none focus:shadow-outline mb-4">
                Nuevo Producto
            </button>
        </div>

        {{-- Tabla de los productos --}}
        <div class="overflow-x-auto">
            <div style="max-height: 800px; overflow-y: auto;">
                <table class="min-w-full leading-normal shadow-md rounded-lg">
                    <thead class="bg-gray-200 sticky top-0">
                        <tr>
                            <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Nombre
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Descripción
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Cantidad
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Precio
                            </th>
                            <th class="px-5 py-3 border-b-2 border-gray-200 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @forelse ($products as $product)
                            <tr>
                                {{-- Nombre --}}
                                <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        {{ $product->name }}
                                    </p>
                                </td>
                                {{-- Descripcion --}}
                                <td class="px-5 py-5 border-b border-gray-200 text-sm max-w-lg">
                                    <p class="text-gray-900">
                                        {{ $product->description }}
                                    </p>
                                </td>
                                {{-- Cantidad --}}
                                <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap text-center">
                                        {{ number_format($product->quantity) }}
                                    </p>
                                </td>
                                {{-- Precio --}}
                                <td class="px-5 py-5 border-b border-gray-200 text-sm">
                                    <p class="text-gray-900 whitespace-no-wrap">
                                        ${{ number_format($product->price, 2) }}
                                    </p>
                                </td>
                                <td class="px-5 py-5 border-b border-gray-200 text-sm">

                                    {{-- Actualizar producto --}}
                                    <a href="{{ route('products.edit', $product->id) }}" class="text-white px-4 py-2 rounded-md bg-indigo-600 hover:bg-indigo-900 mr-5">Detalles</a>

                                    {{-- Borrar producto --}}
                                    <form method="POST" action="{{ route('products.destroy', $product->id) }}" class="inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-white px-4 py-2 rounded-md cursor-pointer bg-red-600 hover:bg-red-900"
                                                onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?')">
                                            Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="px-5 py-5 border-b border-gray-200 text-sm" colspan="5">
                                    <p class="text-gray-500 text-center">No hay productos registrados.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Modal Crear Producto --}}

        <div id="modalCrearProducto" class="fixed inset-0 bg-black/50 flex items-center justify-center hidden">
            <div class="bg-white border border-black/10 rounded-lg shadow-xl p-8 w-full max-w-md relative">

                {{-- Cerrar modal --}}
                <button onclick="document.getElementById('modalCrearProducto').classList.add('hidden')"
                        class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                    <svg class="h-6 w-6 fill-current cursor-pointer" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>

                <h2 class="text-xl font-bold mb-4">Crear Producto</h2>

                {{-- Formulario --}}
                <form class="space-y-5"
                    method="POST"
                    action="{{ route('products.create') }}">
                    @csrf

                    {{-- Nombre del producto --}}
                    <div>
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                        <input type="text" id="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required>
                    </div>

                    {{-- Descripcion --}}
                    <div>
                        <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Descripción:</label>
                        <textarea id="descritcion" name="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                    </div>

                    {{-- Cantidad --}}
                    <div>
                        <label for="quantity" class="block text-gray-700 text-sm font-bold mb-2">Cantidad:</label>
                        <input type="number" id="quantity" name="quantity" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            required>
                    </div>

                    {{-- Costo --}}
                    <div>
                        <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Precio:</label>
                        <input type="number" id="price" name="price" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            required>
                    </div>

                    {{-- Guardar producto --}}
                    <div class="flex justify-end items-center">
                        <button type="submit"
                            class="bg-[#2ecc71] hover:bg-[#27ae60] cursor-pointer text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Guardar Producto
                        </button>
                    </div>

                </form>
            </div>
        </div>

        @if (session('success'))
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    document.getElementById('success-message').classList.remove('hidden');

                    // Ocultar el mensaje después de unos segundos
                    setTimeout(function() {
                        document.getElementById('success-message').classList.add('hidden');
                    }, 3000); // Ocultar después de 3 segundos (3000 milisegundos)
                });
            </script>
        @endif

    </div>

</x-layout>