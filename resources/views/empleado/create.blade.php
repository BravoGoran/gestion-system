@extends('plantilla')

@section('titulo', 'Registrar Empleado')

@section('contenido')
    <h2>Registrar Empleado</h2>
    @include('empleado.form', ['empleado' => new \App\Models\Empleado, 'route' => 'empleados.store', 'method' => 'POST'])
@endsection