<!-- resources/views/tareas/show.blade.php -->
@extends('plantilla')

@section('titulo', 'Detalle de la Tarea')

@section('contenido')
    <h2>Detalle de la Tarea</h2>
    <div class="form-group">
        <label for="project_id">Proyecto:</label>
        <p>{{ $tarea->proyecto->name }}</p>
    </div>
    <div class="form-group">
        <label for="employee_id">Empleado:</label>
        <p>{{ $tarea->empleado->nombre }}</p>
    </div>
    <div class="form-group">
        <label for="description">Descripción:</label>
        <p>{{ $tarea->description }}</p>
    </div>
    <div class="form-group">
        <label for="start_date">Fecha de Inicio:</label>
        <p>{{ $tarea->start_date }}</p>
    </div>
    <div class="form-group">
        <label for="end_date">Fecha de Finalización:</label>
        <p>{{ $tarea->end_date }}</p>
    </div>
    <div class="form-group">
        <label for="status">Estado:</label>
        <p>{{ $tarea->status }}</p>
    </div>
    <a href="{{ route('tareas.index') }}" class="btn btn-secondary">Volver</a>
@endsection
