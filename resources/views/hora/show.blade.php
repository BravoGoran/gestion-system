@extends('plantilla')

@section('titulo', 'Detalle de Horas Trabajadas')

@section('contenido')
    <h2>Detalle de Horas Trabajadas</h2>
    <div class="form-group">
        <label for="employee_id">Empleado:</label>
        <p>{{ $horaTrabajada->empleado->first_name }}</p>
    </div>
    <div class="form-group">
        <label for="project_id">Proyecto:</label>
        <p>{{ $horaTrabajada->proyecto->name }}</p>
    </div>
    <div class="form-group">
        <label for="date">Fecha:</label>
        <p>{{ $horaTrabajada->date }}</p>
    </div>
    <div class="form-group">
        <label for="hours">Horas:</label>
        <p>{{ $horaTrabajada->hours }}</p>
    </div>
    <div class="form-group">
        <label for="task_description">Descripción de la Tarea:</label>
        <p>{{ $horaTrabajada->task_description }}</p>
    </div>
    <a href="{{ route('horas.index') }}" class="btn btn-secondary">Volver</a>
@endsection
