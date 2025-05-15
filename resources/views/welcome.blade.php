<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" href="{{ asset('images/storeflow.png') }}" type="image/png">

    <title>Inicia con StoreFlow</title>
    @vite('resources/css/app.css')

    <style>
        body {
            background-image: url('/images/welcome_background.webp');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>

</head>
<body class="min-h-svh p-20 flex items-center justify-center font-primary">

    <div class="p-20 min-w-xl min-h-xl flex flex-row space-x-5">

        <div class="bg-white/80 p-10 rounded-xl border border-black/10">
            <div class="flex flex-col items-center space-x-4">
                <p class="text-4xl font-bold text-center">StoreFlow</p>
                <img src="{{ asset('images/storeflow-remove.png') }}" alt="Logo"
                    class="h-66 w-auto">
            </div>
        </div>

        <div class="bg-white/80 p-10 rounded-xl border border-black/10 flex flex-col space-y-5 max-w-md justify-between">
            <div>
                <p class="text-xl">
                    Visualiza el estado actual de tu <span class="text-[#0066cc] font-semibold">inventario</span>, con herramientas para una <span class="text-[#0066cc] font-semibold">gestión precisa y eficiente</span>.
                    <br>
                    Mantén un <span class="text-[#0066cc] font-semibold">control total</span> sobre tus <span class="text-[#0066cc] font-semibold">productos</span>, desde el <span class="text-[#0066cc] font-semibold">ingreso</span> hasta la <span class="text-[#0066cc] font-semibold">salida</span>, optimizando tus procesos y reduciendo pérdidas.
                </p>
            </div>

            <div class="text-xl space-x-5 flex justify-end">
                <a href="{{ route('login') }}"
                    class="px-5 py-2 bg-[#0066cc] rounded-md border border-black/10 hover:bg-[#0052a3]">
                    Inicia sesión
                </a>

                <a href="{{ route('register') }}"
                    class="px-5 py-2 cursor-pointer bg-[#0066cc] rounded-md border border-black/10 hover:bg-[#0052a3]">
                    Crea tu cuenta
                </a>
            </div>

        </div>

    </div>

</body>
</html>