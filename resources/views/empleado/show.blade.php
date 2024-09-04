@extends('plantilla')

@section('titulo', 'Detalle del Empleado')

@section('contenido')
    <h2>Detalle del Empleado</h2>
    <div class="form-group">
        <label for="first_name">Nombre:</label>
        <p>{{ $empleado->first_name }}</p>
    </div>
    <div class="form-group">
        <label for="last_name">Apellidos:</label>
        <p>{{ $empleado->last_name }}</p>
    </div>
    <div class="form-group">
        <label for="address">Dirección:</label>
        <p>{{ $empleado->address }}</p>
    </div>
    <div class="form-group">
        <label for="phone">Teléfono:</label>
        <p>{{ $empleado->phone }}</p>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <p>{{ $empleado->email }}</p>
    </div>
    <div class="form-group">
        <label for="hire_date">Fecha de Contratación:</label>
        <p>{{ $empleado->hire_date }}</p>
    </div>
    <div class="form-group">
        <label for="position">Cargo:</label>
        <p>{{ $empleado->position }}</p>
    </div>
    <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Volver</a>
@endsection
