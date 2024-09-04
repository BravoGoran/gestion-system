@extends('plantilla')

@section('titulo', 'Listado de Horas Trabajadas')

@section('contenido')
    <a href="{{ route('horas.create') }}" class="btn btn-primary">Registrar Horas Trabajadas</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Empleado</th>
                <th>Proyecto</th>
                <th>Fecha</th>
                <th>Horas</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($horasTrabajadas as $hora)
                <tr>
                    <td>{{ $hora->id }}</td>
                    <td>{{ $hora->empleado->first_name}}</td>
                    <td>{{ $hora->proyecto->name}}</td>
                    <td>{{ $hora->date }}</td>
                    <td>{{ $hora->hours }}</td>
                    <td>
                        <a href="{{ route('horas.show', $hora) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('horas.edit', $hora) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('horas.destroy', $hora) }}" method="POST" style="display: inline-block;">
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
