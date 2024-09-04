@extends('plantilla')

@section('titulo', 'Detalle de la Factura')

@section('contenido')
    <h2>Detalle de la Factura</h2>
    <div class="form-group">
        <label for="client_id">Cliente:</label>
        <p>{{ $factura->clientes->name }}</p>
    </div>
    <div class="form-group">
        <label for="project_id">Proyecto:</label>
        <p>{{ $factura->proyectos->name }}</p>
    </div>
    <div class="form-group">
        <label for="issue_date">Fecha de Emisión:</label>
        <p>{{ $factura->issue_date }}</p>
    </div>
    <div class="form-group">
        <label for="due_date">Fecha de Vencimiento:</label>
        <p>{{ $factura->due_date }}</p>
    </div>
    <div class="form-group">
        <label for="total_amount">Monto Total:</label>
        <p>{{ $factura->total_amount }}</p>
    </div>
    <div class="form-group">
        <label for="status">Estado:</label>
        <p>{{ $factura->status }}</p>
    </div>
    <a href="{{ route('facturas.index') }}" class="btn btn-secondary">Volver</a>
@endsection
