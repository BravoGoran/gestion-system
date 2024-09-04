@extends('plantilla')

@section('titulo', 'Editar Factura')

@section('contenido')
    <h2>Editar Factura</h2>
    @include('factura.form', ['factura' => $factura, 'route' => 'facturas.update', $factura, 'method' => 'PATCH'])
@endsection
