@extends('plantilla')

@section('titulo', 'Listado de Proyectos')

@section('contenido')
    <a href="{{ route('proyectos.create') }}" class="btn btn-primary">Registrar Proyecto</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Fecha de Inicio</th>
                <th>Fecha de Finalización</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proyectos as $proyecto)
                <tr>
                    <td>{{ $proyecto->id }}</td>
                    <td>{{ $proyecto->cliente->name }}</td>
                    <td>{{ $proyecto->name }}</td>
                    <td>{{ $proyecto->description }}</td>
                    <td>{{ $proyecto->start_date }}</td>
                    <td>{{ $proyecto->end_date }}</td>
                    <td>{{ $proyecto->status }}</td>
                    <td>
                        <a href="{{ route('proyectos.show', $proyecto) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('proyectos.edit', $proyecto) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('proyectos.destroy', $proyecto) }}" method="POST" style="display: inline-block;">
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
