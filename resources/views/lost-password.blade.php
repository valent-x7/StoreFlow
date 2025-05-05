<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Olvidaste tu contraseña?</title>
    @vite('resources/css/app.css')

</head>
<body class="bg-white h-screen">

    <div class="flex flex-col h-full">

        {{-- NavBar --}}
        <div class="mx-5 px-10 py-2 border-b border-black/10 font-primary">
            
            <nav class="flex justify-between items-center">
                <div>
                    <h1 class="text-3xl">
                        ¿Olvidaste tu contraseña?
                    </h1>
                </div>

                {{-- Regreso al Login --}}
                <div class="w-[300px] flex justify-end items-center">
                    
                    <a href="{{ route('login') }}">
                        <button
                            class="text-white bg-[#0066cc] text-xl font-medium px-2 py-3 cursor-pointer rounded-md hover:bg-[#0052a3]">
                            Iniciar sesión
                        </button>
                    </a>

                </div>
            </nav>

        </div>

        {{-- Main --}}
        <main class="bg-gray-400/10 h-full flex justify-center items-center">

            {{-- Formulario --}}
            <div class="w-full max-w-md text-xl bg-white border border-gray-200 rounded-lg shadow-md p-6">

                <h2 class="text-3xl text-center text-black/90 mb-4">
                    Restablece tu contraseña
                </h2>
                <p class="text-center text-sm mb-6">
                    Ingresa tu correo electrónico y te enviaremos instrucciones para restablecer tu contraseña.
                </p>

                <form method="POST" action="{{ route('sendEmail') }}" class="space-y-4">
                    @csrf

                    <div>
                        <label for="email" class="block mb-2">
                            Correo electrónico
                        </label>
                        <input type="email" name="email"
                            required
                            class="w-full p-3 border border-black/20 rounded-md 
                                focus:outline-none focus:ring-2 focus:ring-[#0066cc]
                                invalid:focus:ring-red-600
                                transition duration-150 ease-in-out mb-4"
                            placeholder="Ingresa tu correo electrónico">
                    </div>

                    @error('email')
                        <p class="text-red-600 text-sm text-center mt-2 mb-6">{{ $message }}</p>
                    @enderror

                    <button type="submit"
                        class="w-full text-white bg-[#0066cc] text-xl font-medium px-2 py-3 cursor-pointer rounded-md hover:bg-[#0052a3]">
                        Enviar correo de recuperación
                    </button>

                    <p class="text-center text-sm text-gray-400 mt-4">
                        StoreFlow © 2025
                    </p>

                </form>
            </div>



        </main>


    </div>

</body>
</html>