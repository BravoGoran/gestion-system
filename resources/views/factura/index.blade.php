@extends('plantilla')

@section('titulo', 'Listado de Facturas')

@section('contenido')
    <a href="{{ route('facturas.create') }}" class="btn btn-primary">Registrar Factura</a>
    <a href="{{ route('facturas.details') }}" class="btn btn-secondary">Detalles Facturas</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Cliente</th>
                <th>Proyecto</th>
                <th>Fecha de Emisión</th>
                <th>Fecha de Vencimiento</th>
                <th>Monto Total</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($facturas as $factura)
                <tr>
                    <td>{{ $factura->id }}</td>
                    <td>{{ $factura->clientes->name }}</td>
                    <td>{{ $factura->proyectos->name }}</td>
                    <td>{{ $factura->issue_date }}</td>
                    <td>{{ $factura->due_date }}</td>
                    <td>{{ $factura->total_amount }}</td>
                    <td>{{ $factura->status }}</td>
                    <td>
                        <a href="{{ route('facturas.show', $factura) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('facturas.edit', $factura) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('facturas.destroy', $factura) }}" method="POST" style="display: inline-block;">
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
