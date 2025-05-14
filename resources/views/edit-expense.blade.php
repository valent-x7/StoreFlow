<x-layout title="Editar Egreso">

    <div class="p-5 h-full w-full">
        <h2 class="text-xl font-bold mb-4">Editar Egreso</h2>

        <form class="space-y-5" method="POST" action="{{ route('expenses.update', $expense->id) }}">
            @csrf
            @method('PUT') {{-- Especificamos que la intención es actualizar --}}

            <div>
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nombre:</label>
                <input type="text" id="name" name="name" value="{{ $expense->name }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div>
                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Descripción:</label>
                <textarea id="description" name="description" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $expense->description }}</textarea>
            </div>

            <div>
                <label for="amount" class="block text-gray-700 text-sm font-bold mb-2">Cantidad:</label>
                <input type="number" id="amount" name="amount" value="{{ $expense->amount }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="flex justify-end items-center">
                <button type="submit" class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline cursor-pointer">
                    Actualizar Egreso
                </button>
                <a href="{{ route('expenses') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline ml-2">
                    Cancelar
                </a>
            </div>
        </form>
    </div>

</x-layout>