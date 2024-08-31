@extends('layouts.app')

@section('titulo')
Registro
@endsection

@section('contenido')
<div class="max-w-2xl mx-auto p-6 bg-white shadow-md rounded">

        <h2 class="text-2xl font-bold mb-4 text-blue-500 ">Registro</h2>

        <form action="{{route('registro')}}" method="POST" novalidate>
            @csrf
            <div class="mb-5">
                <label id="name" class=" mb-2 block uppercase text-gray-500 font-bold" for="">
                    Nombre
                </label>
                <input type="text" name="name" id="name" placeholder="Tu nombre" class="border p-3 w-full rounded-lg @error('name') border-red-500 @enderror " value="{{old('name')}}">
                @error('name')
                <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{$message}}</p>
                @enderror
            </div>

     <div class="grid grid-cols-2 gap-4 mb-5">
            <div>
                <label for="last_name" class="mb-2 block uppercase text-gray-500 font-bold">Apellido Paterno</label>
                <input type="text"  placeholder="Tu apellido paterno" id="last_name" name="last_name" class="border p-3 w-full rounded-lg" >
            </div>
            <div>
                <label for="mother_last_name" class="mb-2 block uppercase text-gray-500 font-bold">Apellido Materno</label>
                <input type="text" placeholder="Tu apellido materno" id="mother_last_name" name="mother_last_name" class="border p-3 w-full rounded-lg">
            </div>
        </div>

              <div class="grid grid-cols-3 gap-4 mb-5">
       <div>
                <label for="civil_status_id" class="mb-2 block uppercase text-gray-500 font-bold">Estado civil</label>
                <select id="civil_status_id" name="civil_status_id" class="border p-3 w-full rounded-lg">
                     <option value="" disabled selected>Selecciona</option>
                         @foreach($civilStatuses as $civilStatus)
                <option value="{{ $civilStatus->id }}">{{ $civilStatus->civil_status }}</option>
            @endforeach
                </select>
            </div>
            <div>
                <label for="age" class="mb-2 block uppercase text-gray-500 font-bold">Edad</label>
                <input type="number" id="age" name="age" class="border p-3 w-full rounded-lg">
            </div>

            <div>
                    <label for="gender_id" class="mb-2 block uppercase text-gray-500 font-bold">Género</label>
                    <select id="gender_id" name="gender_id" class="border p-3 w-full rounded-lg">
                       <option value="" disabled selected>Selecciona</option>
                @foreach($genders as $gender)
                    <option value="{{ $gender->id }}">{{ $gender->gender }}</option>
                @endforeach
                    </select>
            </div>
       
        </div>
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

        <div class="mb-5">
            <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold">Confirmar Contraseña</label>
            <input type="password" id="password_confirmation"  placeholder="Repetir contraseña"name="password_confirmation" class="border p-3 w-full rounded-lg">
        </div>

           <div class="mb-5">
            <label for="interest_level_id" class="mb-2 block uppercase text-gray-500 font-bold">Nivel de interés</label>
            <select id="interest_level_id" name="interest_level_id" class="border p-3 w-full rounded-lg">
                <option value="" disabled selected>Selecciona</option>
                @foreach($interestLevels as $interestLevel)
                    <option value="{{ $interestLevel->id }}">{{ $interestLevel->interest_name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-5">
              <label for="course_id" class="mb-2 block uppercase text-gray-500 font-bold">Nivel de interes</label>
                <select id="course_id" name="course_id" class="border p-3 w-full rounded-lg" disabled>
                <option value="" disabled selected>Selecciona</option>
            @foreach($courses as $course)
            
                <option value="{{ $course->id }}">{{ $course->prefix }} {{ $course->course_name }}</option>
            @endforeach
                </select>
        </div>

        <div>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 transition-colors duration-300 ease-in-out">Registrar</button>
        </div>
        
        
       

        </form>



</div>
@endsection

