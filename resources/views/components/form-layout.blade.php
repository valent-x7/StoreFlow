@props(['head_title' => 'Form Layout',
        'form_title' => 'Form Title',
        'action' => '#'])

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" href="{{ asset('images/storeflow.png') }}" type="image/png">

    <title>{{ $head_title }}</title>
    @vite('resources/css/app.css')

    <style>
        body {
            background-image: url('/images/background.webp');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }
    </style>

</head>
<body class="h-screen flex justify-center items-center font-primary">

    <form action="{{ $action }}" method="POST"
        class="bg-white/95 border-1 border-black rounded-xl p-10 flex flex-col w-full max-w-md shadow-lg">
        @csrf

        <h1 class="text-5xl font-bold mb-[40px] text-center">
            {{ $form_title }}
        </h1>

        {{ $slot }}

    </form>
    
</body>
</html>