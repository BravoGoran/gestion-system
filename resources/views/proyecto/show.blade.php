<!-- resources/views/proyectos/show.blade.php -->
@extends('plantilla')

@section('titulo', 'Detalle del Proyecto')

@section('contenido')
    <h2>Detalle del Proyecto</h2>
    <div class="form-group">
        <label for="client_id">Cliente:</label>
        <p>{{ $proyecto->cliente->name }}</p>
    </div>
    <div class="form-group">
        <label for="name">Nombre del Proyecto:</label>
        <p>{{ $proyecto->name }}</p>
    </div>
    <div class="form-group">
        <label for="description">Descripción:</label>
        <p>{{ $proyecto->description }}</p>
    </div>
    <div class="form-group">
        <label for="start_date">Fecha de Inicio:</label>
        <p>{{ $proyecto->start_date }}</p>
    </div>
    <div class="form-group">
        <label for="end_date">Fecha de Finalización:</label>
        <p>{{ $proyecto->end_date }}</p>
    </div>
    <div class="form-group">
        <label for="status">Estado:</label>
        <p>{{ $proyecto->status }}</p>
    </div>
    <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">Volver</a>
@endsection
