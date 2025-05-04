<x-form-layout head_title="Login" form_title="Iniciar sesión" action="{{ route('login') }}">

    @if (session('success'))
        <p class="text-xl text-green-500 mb-6 text-center">
            {{ session('success') }}
        </p>
    @endif

    <x-label for="username" name="username">
        Usuario
    </x-label>
    <x-input type="text" :last="false" name="username" placeholder="Ingresa tu usuario"/>

    <x-label for="password" name="password">
        Contraseña
    </x-label>
    <x-input type="password" :last="true" name="password" placeholder="Ingresa tu contraseña"/>

    <x-link type="right" p_text="" a_text="Se me olvidó mi contraseña" href="#"/>

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
        Login
    </x-button>

    <x-link type="center" p_text="No tienes cuenta?" a_text="Registrate" href="{{ route('register') }}"/>

</x-form-layout>