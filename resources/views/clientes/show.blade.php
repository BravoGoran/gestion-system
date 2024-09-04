<!-- resources/views/clientes/show.blade.php -->
@extends('plantilla')

@section('titulo', 'Detalle del Cliente')

@section('contenido')
    <h2>Detalle del Cliente</h2>
    <div class="form-group">
        <label for="name">Nombre:</label>
        <p>{{ $cliente->name }}</p>
    </div>
    <div class="form-group">
        <label for="address">Dirección:</label>
        <p>{{ $cliente->address }}</p>
    </div>
    <div class="form-group">
        <label for="phone">Teléfono:</label>
        <p>{{ $cliente->phone }}</p>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <p>{{ $cliente->email }}</p>
    </div>
    <div class="form-group">
        <label for="registered_at">Fecha de Registro:</label>
        <p>{{ $cliente->registered_at }}</p>
    </div>
    <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Volver</a>
@endsection
