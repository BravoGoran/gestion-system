@extends('plantilla')

@section('titulo', 'Registrar Factura')

@section('contenido')
    <h2>Registrar Factura</h2>
    @include('factura.form', ['factura' => new \App\Models\Factura, 'route' => 'facturas.store', 'method' => 'POST'])
@endsection
