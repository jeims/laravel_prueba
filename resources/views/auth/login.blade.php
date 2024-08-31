@extends('layouts.app')

@section('titulo')
Inicia Sesion
@endsection

@section('contenido')
<div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded">

        <h2 class="text-2xl font-bold mb-4 text-blue-500 ">Inicia Sesion</h2>

        <form action="{{route('login')}}" method="POST" novalidate>
            @csrf

            @if (session('mensaje'))
                 <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{session('mensaje')}}</p>
            @endif
   

            <div class="mb-5">
            <label for="email" class="mb-2 block uppercase text-gray-500 font-bold">E-mail</label>
            <input type="email" placeholder="Tu email" id="email" name="email" class="border p-3 w-full rounded-lg @error('email') border-red-500 @enderror " value="{{old('email')}}">
                  @error('email')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
        </div>
           <div class="mb-5">
            <label for="password" class="mb-2 block uppercase text-gray-500 font-bold">Contraseña</label>
            <input type="password" placeholder="Tu contraseña" id="password" name="password" class="border p-3 w-full rounded-lg @error('password') border-red-500 @enderror">
                @error('password')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
        </div>


        <div>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition-colors duration-300 ease-in-out">Iniciar Sesion</button>
        </div>
        
        
       

        </form>



</div>
@endsection

