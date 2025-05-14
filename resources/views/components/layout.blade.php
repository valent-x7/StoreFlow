@props(['title' => 'Document'])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
    @vite('resources/css/app.css')
</head>
<body class="h-screen">

    <div class="w-full h-full flex font-primary text-white">

        {{-- Nav --}}
        <div class="bg-[#0066cc] p-5 h-full flex flex-col justify-between">
            
            <div>
                {{-- StoreFlow --}}
                <div>
                    <h1 class="text-3xl font-bold">
                        StoreFlow
                    </h1>
                </div>
                <div class="flex flex-col text-2xl space-y-5 mt-8">
                    
                    <div class="px-2">
                        <h1>
                            Menú
                        </h1>
                    </div>

                    <a href="{{ route('products') }}"
                        class="block {{ request()->routeIs('products') ? 'bg-white/10' : '' }} hover:bg-white/10 rounded-md py-2 px-5 cursor-pointer text-white">
                        <div class="flex items-center space-x-5">
                            <i class="fa-solid fa-truck"></i>
                            <span>Productos</span>
                        </div>
                    </a>

                    <a href="{{ route('incomes') }}"
                        class="block {{ request()->routeIs('incomes') ? 'bg-white/10' : '' }} hover:bg-white/10 rounded-md py-2 px-5 cursor-pointer text-white">
                        <div class="flex items-center space-x-5">
                            <i class="fa-solid fa-money-bill-trend-up"></i>
                            <span>Ingresos</span>
                        </div>
                    </a>

                    <a href=""
                        class="block hover:bg-white/10 rounded-md py-2 px-5 cursor-pointer text-white">
                        <div class="flex items-center space-x-5">
                            <i class="fa-solid fa-money-bill-transfer"></i>
                            <span>Egresos</span>
                        </div>
                    </a>

                    <a href=""
                        class="block hover:bg-white/10 rounded-md py-2 px-5 cursor-pointer text-white">
                        <div class="flex items-center space-x-5">
                            <i class="fa-solid fa-gear"></i>
                            <span>Configuración</span>
                        </div>
                    </a>

                </div>
            </div>

            <div>
                <div class="flex flex-col text-2xl space-y-4 mt-8">
                    

                    <div class="px-2">
                        <h1>
                            Cuenta
                        </h1>
                    </div>

                    <a href="{{ route('profile') }}"
                        class="block {{ request()->routeIs('profile') ? 'bg-white/10' : '' }} hover:bg-white/10 rounded-md py-2 px-5 cursor-pointer text-white">
                        <div class="flex items-center space-x-5">
                            <i class="fa-solid fa-user"></i>
                            <span>Perfil</span>
                        </div>
                    </a>


                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="w-full text-left hover:bg-white/10 rounded-md py-2 px-5 cursor-pointer text-white flex items-center space-x-5">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <span>Salir</span>
                        </button>
                    </form>                    
                    
                </div>
            </div>


        </div>

        {{-- Contenido principal --}}
        <main class="flex-grow flex items-center justify-center text-black p-5"> {{-- Modificamos el main --}}
            {{ $slot }}
        </main>
    </div>

</body>
</html>