<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inicia con StoreFlow</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-[#0066cc] min-h-svh p-20 flex items-center justify-center">
    <div class="bg-white w-full h-full p-10 border border-black/10 rounded-lg font-primary shadow-xl max-w-2xl">

        <div class="space-y-10">
            <h1 class="font-bold text-5xl">
                StoreFlow
            </h1>

            <p class="text-2xl">
                Visualiza el estado actual de tu inventario, con herramientas para una gestión precisa y eficiente. 
            </p>

            <div class="flex justify-end items-center space-x-5 text-xl text-white font-semibold">
                <a href="{{ route('login') }}"
                    class="px-5 py-2 bg-[#0066cc] rounded-md border border-black/10 hover:bg-[#0052a3]">
                    Inicia sesión
                </a>

                <a href="{{ route('register') }}"
                    class="px-5 py-2 bg-[#0066cc] rounded-md border border-black/10 hover:bg-[#0052a3]">
                    Crea tu cuenta
                </a>
            </div>

        </div>

    </div>
</body>
</html>