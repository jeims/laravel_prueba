@extends('layouts.app')

@section('titulo')
Home
@endsection

@section('contenido')

<div class="contenedor text-center">

    <h2 class="text-2xl font-bold">Bienvenido</h2>

       <div class="profile-info pt-5">
             <p class="mb-2">
            <strong>Nombre Completo:</strong>
            {{ $user->name }} {{ $user->last_name }} {{ $user->mother_last_name }}
        </p>
       
        <p class="mb-2"><strong>Email: </strong>  {{ $user->email }}</p>
        <p class="mb-2"><strong>Edad: </strong>  {{ $user->age }}</p>
        <p class="mb-2"><strong>Género: </strong>  {{ $user->gender->gender ?? 'N/A' }}</p>
        <p class="mb-2"><strong>Estado Civil: </strong>  {{ $user->civilStatus->civil_status ?? 'N/A' }}</p>
         <p class="mb-2"><strong>Nivel de Interés del Curso:</strong> 
            {{ optional(optional($user->course)->interestLevel)->interest_name ?? 'N/A' }}
        </p>
        <p class="mb-2"><strong>Curso: </strong>  
            {{ optional($user->course)->prefix ?? '' }} 
            {{ optional($user->course)->course_name ?? 'N/A' }}
        </p>
        
    </div>


</div>
@endsection

