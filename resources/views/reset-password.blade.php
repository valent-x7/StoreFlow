<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Restablecer contraseña</title>

    <link rel="icon" href="{{ asset('images/storeflow.png') }}" type="image/png">

    @vite('resources/css/app.css')

</head>
<body class="bg-[#fff] min-h-screen flex justify-center items-center font-primary">

    <div class="bg-white border border-black/10 p-10 rounded-lg shadow-xl">

        <form method="POST"
            action="{{ route('password.restore') }}"
            class="flex flex-col space-y-6 text-xl">
            @csrf

            <h1 class="text-4xl text-center font-bold">
                Restablecer contraseña
            </h1>

            <input type="hidden" name="token" value="{{ $token ?? '' }}">
            <input type="hidden" name="email" value="{{ $email ?? '' }}">

            <label for="password">Nueva contraseña:</label>
            <input type="password"
                name="password"
                class="text-xl font-medium px-4 py-2 border border-black/20 rounded-md 
                    focus:outline-none focus:ring-2 focus:ring-[#0066cc]
                    transition duration-150 ease-in-out"
                placeholder="Ingresa tu nueva contraseña"
                required>

            <label for="password_confirmation">
                Confirmar nueva contraseña:
            </label>

            <input type="password"
                name="password_confirmation"
                class="text-xl font-medium px-4 py-2 border border-black/20 rounded-md 
                    focus:outline-none focus:ring-2 focus:ring-[#0066cc]
                    transition duration-150 ease-in-out"
                placeholder="Confirma tu nueva contraseña"
                required>

            <button
                type="submit"
                class="px-5 py-2 bg-[#0066cc] rounded-md border border-black/10 hover:bg-[#0052a3] cursor-pointer">
                    Restablecer Contraseña
            </button>
        </form>


    </div>
</body>
</html>