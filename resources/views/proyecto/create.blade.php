@extends('plantilla')

@section('titulo', 'Registrar Proyecto')

@section('contenido')
    <h2>Registrar Proyecto</h2>
    @include('proyecto.form', ['proyecto' => new \App\Models\Proyecto, 'route' => 'proyectos.store', 'method' => 'POST'])
@endsection