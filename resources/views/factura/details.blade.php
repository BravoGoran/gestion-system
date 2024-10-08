@extends('plantilla')

@section('titulo', 'Detalle de la Factura')

@section('contenido')
    <a href="{{ route('facturas.index') }}" class="btn btn-primary">Volver</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID Cliente</th>
                <th>Nombre Cliente</th>
                <th>Email</th>
                <th>ID Proyecto</th>
                <th>Nombre del Proyecto</th>
                <th>Fecha de Finalizacion</th>
                <th>Fecha de Inicio</th>
                <th>Total</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($facturas as $factura)
                <tr>
                    <td>{{ $factura->id }}</td>
                    <td>{{ $factura->client_id }}</td>

                    <!-- Si se utiliza Eloquent con relaciones -->
                    @if (isset($factura->clientes))
                        <td>{{ $factura->clientes->name }}</td>
                        <td>{{ $factura->clientes->email }}</td>
                    @else
                        <!-- Si se usa Query Builder o Eloquent sin relaciones -->
                        <td>{{ $factura->client_name }}</td>
                        <td>{{ $factura->email }}</td>
                    @endif

                    <td>{{ $factura->project_id }}</td>

                    <!-- Si se utiliza Eloquent con relaciones -->
                    @if (isset($factura->proyectos))
                        <td>{{ $factura->proyectos->name }}</td>
                    @else
                        <!-- Si se usa Query Builder o Eloquent sin relaciones -->
                        <td>{{ $factura->project_name }}</td>
                    @endif

                    <td>{{ $factura->issue_date }}</td>
                    <td>{{ $factura->due_date }}</td>
                    <td>{{ $factura->total_amount }}</td>
                    <td>{{ $factura->status }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
