<x-layout title="Perfil">
    
    <div class="flex items-center justify-center h-screen">
        <div class="bg-white/10 w-[42rem] flex flex-col border border-black/10 rounded-md shadow-md p-5">
            <h1 class="text-4xl font-bold text-center mt-2">
                Perfil
            </h1>

            {{-- Mensaje de éxito --}}
            @if(session('success'))
                <p class="text-xl text-green-500 mt-4 text-center">
                    {{ session('success') }}
                </p>
            @endif

            <form action="{{ route('profile.save') }}" method="POST"
                class="mt-6 p-4 flex flex-col">
                @csrf

                <x-label for="username" name="username">
                    Usuario
                </x-label>

                <x-input type="text" :last="false" name="username" placeholder="{{ $user->username }}"/>

                <x-label for="email" name="email">
                    Correo electrónico
                </x-label>

                <x-input type="email" :last="false" name="email" placeholder="{{ $user->email }}"/>

                <x-label for="password" name="password">
                    Contraseña
                </x-label>

                <x-input type="password" :last="true" name="password" placeholder=""/>

                {{-- Errores de validación --}}
                <div class="mt-3 space-y-2">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <p class="text-md text-center text-red-600">
                                {{ $error }}
                            </p>
                        @endforeach
                    @endif
                </div>


                <x-button>
                    Guardar cambios
                </x-button>

            </form>

        </div>
    </div>


</x-layout>