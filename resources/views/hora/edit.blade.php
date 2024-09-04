@extends('plantilla')

@section('titulo', 'Editar Horas Trabajadas')

@section('contenido')
    <h2>Editar Horas Trabajadas</h2>
    @include('hora.form', ['hora' => $horaTrabajada, 'route' => 'horas.update', $horaTrabajada, 'method' => 'PATCH'])
@endsection
