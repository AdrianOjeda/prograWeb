@extends('layouts.windmillProfesor')

@section('contenido')
<div id="welcome-message" class="p-6 mb-4 bg-gradient-to-r from-purple-600 via-indigo-600 to-blue-600 text-white rounded-lg shadow-lg">
  <h2 class="text-5xl font-semibold">Bienvenido, profe {{ Auth::user()->name }}!</h2>
  <p class="mt-2 text-lg">A tu izquierda encontrarás las clases que impartes
    <br> para que puedas empezar a publicar tareas!</p>
</div>
@endsection