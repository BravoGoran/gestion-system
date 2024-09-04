@extends('plantilla')

@section('titulo', 'Editar Proyecto')

@section('contenido')
    <h2>Editar Proyecto</h2>
    @include('proyecto.form', ['proyecto' => $proyecto, 'route' => 'proyectos.update', $proyecto, 'method' => 'PATCH'])
@endsection