<x-layout title="Editar Producto">

    <div class="p-5 h-full w-full">

        {{-- Mensaje de éxito (inicialmente oculto) --}}
        <div id="success-message" class="bg-green-200 border-green-400 text-green-700 px-4 py-3 rounded relative hidden mb-4" role="alert">
            <strong class="font-bold">¡Éxito!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>

        {{-- Boton --}}
        <div class="flex flex-row justify-between items-center mb-5">

            <h1 class="text-2xl font-bold">Ver detalles del producto</h1>

            <button onclick="document.getElementById('modalEditarProducto').classList.remove('hidden')"
                class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded cursor-pointer focus:outline-none focus:shadow-outline">
                Editar Producto
            </button>
        </div>

        {{-- Mostrar datos del producto --}}
        <div class="space-y-5 text-xl">

            <div>
                <label for="name" class="block text-gray-700 font-bold mb-2">Nombre:</label>
                <input type="text" id="name" name="name" value="{{ $product->name }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    disabled>
            </div>

            <div>
                <label for="description" class="block text-gray-700 font-bold mb-2">Descripción:</label>
                <textarea id="description" name="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" disabled>{{ $product->description }}</textarea>
            </div>

            <div>
                <label for="quantity" class="block text-gray-700 font-bold mb-2">Cantidad:</label>
                <input type="number" id="quantity" name="quantity" value="{{ $product->quantity }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    disabled>
            </div>

            <div>
                <label for="price" class="block text-gray-700 font-bold mb-2">Precio:</label>
                <input type="number" id="price" name="price" value="{{ $product->price }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    disabled>
            </div>

            <div class="flex justify-end items-center space-x-4">
                {{-- <button type="submit" class="bg-[#2ecc71] hover:bg-[#27ae60] text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer">
                    Añadir como ingreso
                </button> --}}
                <a href="{{ route('products') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline ml-2">
                    Volver
                </a>
            </div>
        </div>

        {{-- Añadir a ingreso --}}
        <form method="POST" action="{{ route('product.to.income', $product) }}" class="space-y-5 text-xl">
            @csrf

            <h1 class="text-2xl font-bold">Añadir como ingreso</h1>

            {{-- Campos ocultos --}}
            <input type="hidden" name="name" value="{{ $product->name }}">
            <input type="hidden" name="description" value="{{ $product->description }}">
            <input type="hidden" name="price" value="{{ $product->price }}">

            <div>
                <label for="quantity_to_income" class="block text-gray-700 font-bold mb-2">Cantidad a añadir como ingreso:</label>
                <input type="number" id="quantity_to_income" name="quantity_to_income" value="1" min="1" max="{{ $product->quantity }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                    required>
                <small class="text-gray-500">Cantidad disponible: {{ $product->quantity }}</small>
            </div>

            <div class="flex justify-end items-center space-x-4">
                <button type="submit" class="bg-[#2ecc71] hover:bg-[#27ae60] text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer">
                    Añadir como ingreso
                </button>
            </div>
        </form>

        {{-- Modal Editar Producto --}}

        <div id="modalEditarProducto" class="fixed inset-0 bg-black/50 flex items-center justify-center hidden">
            <div class="bg-white border border-black/10 rounded-lg shadow-xl p-8 w-full max-w-md relative">

                {{-- Cerrar modal --}}
                <button onclick="document.getElementById('modalEditarProducto').classList.add('hidden')"
                        class="absolute top-2 right-2 text-gray-500 hover:text-gray-700">
                    <svg class="h-6 w-6 fill-current cursor-pointer" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                </button>

                <h2 class="text-xl font-bold mb-4">Editar Producto</h2>

                {{-- Formulario --}}
                <form class="space-y-5"
                    method="POST"
                    action="{{ route('products.update', $product->id) }}">
                    @csrf
                    @method('PUT')  {{-- Especificamos que es para editar --}}

                    {{-- Nombre del producto --}}
                    <div>
                        <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                        <input type="text" id="name" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        required
                        value="{{ $product->name }}">
                    </div>

                    {{-- Descripcion --}}
                    <div>
                        <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Descripción:</label>
                        <textarea id="descritcion" name="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $product->description }}</textarea>
                    </div>

                    {{-- Cantidad --}}
                    <div>
                        <label for="quantity" class="block text-gray-700 text-sm font-bold mb-2">Cantidad:</label>
                        <input type="number" id="quantity" name="quantity" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            required
                            value="{{ $product->quantity }}">
                    </div>

                    {{-- Costo --}}
                    <div>
                        <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Precio:</label>
                        <input type="number" id="price" name="price" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            required
                            value="{{ $product->price }}">
                    </div>

                    {{-- Guardar producto --}}
                    <div class="flex justify-end items-center">
                        <button type="submit"
                            class="bg-[#2ecc71] hover:bg-[#27ae60] cursor-pointer text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                            Guardar
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