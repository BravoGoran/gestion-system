@extends('plantilla')

@section('titulo', 'Editar Empleado')

@section('contenido')
    <h2>Editar Empleado</h2>
    @include('empleado.form', ['empleado' => $empleado, 'route' => 'empleados.update', $empleado, 'method' => 'PATCH'])
@endsection