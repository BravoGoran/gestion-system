@extends('plantilla')

@section('titulo', 'Listado de Tareas')

@section('contenido')
    <a href="{{ route('tareas.create') }}" class="btn btn-primary">Registrar Tarea</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Proyecto</th>
                <th>Empleado</th>
                <th>Descripción</th>
                <th>Fecha de Inicio</th>
                <th>Fecha de Finalización</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tareas as $tarea)
                <tr>
                    <td>{{ $tarea->id }}</td>
                    <td>{{ $tarea->proyecto->name }}</td>
                    <td>{{ $tarea->empleado->first_name }}</td>
                    <td>{{ $tarea->description }}</td>
                    <td>{{ $tarea->start_date }}</td>
                    <td>{{ $tarea->end_date }}</td>
                    <td>{{ $tarea->status }}</td>
                    <td>
                        <a href="{{ route('tareas.show', $tarea) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('tareas.edit', $tarea) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('tareas.destroy', $tarea) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Borrar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
