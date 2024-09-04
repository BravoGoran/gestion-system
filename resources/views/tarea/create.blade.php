@extends('plantilla')

@section('titulo', 'Registrar Tarea')

@section('contenido')
    <h2>Registrar Tarea</h2>
    @include('tarea.form', ['tarea' => new \App\Models\Tarea, 'route' => 'tareas.store', 'method' => 'POST'])
@endsection
