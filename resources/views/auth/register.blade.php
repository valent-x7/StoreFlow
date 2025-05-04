<x-form-layout head_title="Register" form_title="Crear cuenta" action="{{ route('register.store') }}">

    {{-- Usuario --}}
    <x-label for="username" name="username">
        Usuario
    </x-label>
    <x-input type="text" :last="false" name="username" placeholder="Ingresa un usuario"/>

    {{-- Correo --}}
    <x-label for="email" name="email">
        Correo electrónico
    </x-label>
    <x-input type="email" :last="false" name="email" placeholder="Ingresa un correo electrónico"/>

    {{-- Contraseña --}}
    <x-label for="password" name="password">
        Contraseña
    </x-label>
    <x-input type="password" :last="false" name="password" placeholder="Ingresa una contraseña"/>

    {{-- Confirmar contraseña --}}
    <x-label for="password_confirmation" name="password_confirmation">
        Confirmar contraseña
    </x-label>
    <x-input type="password" :last="true" name="password_confirmation" placeholder="Repite tu contraseña"/>

    <div class="mt-3 space-y-2">
        @if ($errors->any())
            @foreach ($errors->all() as $error) 
                <p class="text-red-600 text-center">{{ $error }}</p>
            @endforeach
        @endif
    </div>

    {{-- Boton --}}
    <x-button>
        Registrarse
    </x-button>

    {{-- Link --}}
    <x-link type="center" p_text="Ya tienes cuenta?" a_text="Inicia sesión" href="{{ route('login') }}"/>

</x-form-layout>