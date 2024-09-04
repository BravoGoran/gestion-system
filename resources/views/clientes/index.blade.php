@extends('plantilla')

@section('titulo', 'Listado de Clientes')

@section('contenido')
    <a href="{{ route('clientes.create') }}" class="btn btn-primary">Registrar Cliente</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Fecha de Registro</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->id }}</td>
                    <td>{{ $cliente->name }}</td>
                    <td>{{ $cliente->address }}</td>
                    <td>{{ $cliente->phone }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>{{ $cliente->registered_at }}</td>
                    <td>
                        <a href="{{ route('clientes.show', $cliente) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('clientes.edit', $cliente) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('clientes.destroy', $cliente) }}" method="POST" style="display: inline-block;">
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