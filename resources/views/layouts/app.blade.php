<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel - @yield('titulo')</title>
    @vite('resources/css/app.css')
    @vite('resources/js/app.js')


</head>

<body class="bg-slate-100" >
    <header class="p-5 border-b bg-white shadow" >

    <div class="container mx-auto flex justify-between items-center">
    <h1 class=" text-3xl font-black">@yield('titulo')</h1>


    @auth
         <nav class="flex gap-2 items-center">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
            <button type="submit" class="font-bold uppercase text-gray-600 text-sm" >Cerrar Sesion</button>

            </form>


    </nav>
    @endauth

    @guest
         <nav class="flex gap-2 items-center">
    <a class="font-bold uppercase text-gray-600 text-sm" href="{{ route('login')}}">Login</a>
    <a href="{{ route('registro')}}" class="font-bold uppercase text-gray-600 text-sm" >Crear cuenta</a>

    </nav>
    @endguest


   
    </div>

        
    </header>

    <main class="container mx-auto mt-10">
        @yield('contenido')

    </main>

    <footer class=" mt-10 text-center p-5 text-gray-500 font-bold uppercase">

        JeimsMonroy - Todos los derechos reservados {{now()->year}}

    </footer>


</body>

</html>