@extends('plantilla')

@section('titulo', 'Listado de Empleados')

@section('contenido')
    <a href="{{ route('empleados.create') }}" class="btn btn-primary">Registrar Empleado</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Fecha de Contratación</th>
                <th>Cargo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($empleados as $empleado)
                <tr>
                    <td>{{ $empleado->id }}</td>
                    <td>{{ $empleado->first_name }}</td>
                    <td>{{ $empleado->last_name }}</td>
                    <td>{{ $empleado->address }}</td>
                    <td>{{ $empleado->phone }}</td>
                    <td>{{ $empleado->email }}</td>
                    <td>{{ $empleado->hire_date }}</td>
                    <td>{{ $empleado->position }}</td>
                    <td>
                        <a href="{{ route('empleados.show', $empleado) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('empleados.edit', $empleado) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('empleados.destroy', $empleado) }}" method="POST" style="display: inline-block;">
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
