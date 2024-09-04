@extends('plantilla')

@section('titulo', 'Registrar Horas Trabajadas')

@section('contenido')
    <h2>Registrar Horas Trabajadas</h2>
    @include('hora.form', ['hora' => new \App\Models\Hora, 'route' => 'horas.store', 'method' => 'POST'])
@endsection
