@extends('plantilla')

@section('titulo', 'Editar Tarea')

@section('contenido')
    <h2>Editar Tarea</h2>
    @include('tarea.form', ['tarea' => $tarea, 'route' => 'tareas.update', $tarea, 'method' => 'PATCH'])
@endsection
