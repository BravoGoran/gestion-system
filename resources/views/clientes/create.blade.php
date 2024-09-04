@extends('plantilla')

@section('titulo', 'Registrar Cliente')

@section('contenido')
    <h2>Registrar Cliente</h2>
    @include('clientes.form', ['cliente' => new \App\Models\Cliente, 'route' => 'clientes.store', 'method' => 'POST'])
@endsection