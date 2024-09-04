@extends('plantilla')

@section('titulo', 'Editar Cliente')

@section('contenido')
    <h2>Editar Cliente</h2>
    @include('clientes.form', ['cliente' => $cliente, 'route' => 'clientes.update', $cliente, 'method' => 'PATCH'])
@endsection
