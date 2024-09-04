@extends('plantilla')
@section('titulo', 'Registro')
@section('contenido')
    <form action="{{ route('registro') }}" method="POST">
        @csrf
        <label>
            Nombre <br>
            <input name="name" type="text" value="{{ old('name') }}" autofocus="autofocus"> <br>
            @error('name')
                <small style="color: red">{{ $message }}</small>
                <br>
            @enderror
        </label>
        <label>
            Email <br>
            <input name="email" type="email" value="{{ old('email') }}"> <br>
            @error('email')
                <small style="color: red">{{ $message }}</small>
                <br>
            @enderror
        </label>
        <label>
            Password <br>
            <input name="password" type="password" value="{{ old('password') }}"> <br>
            @error('password')
                <small style="color: red">{{ $message }}</small>
                <br>
            @enderror
        </label>
        <label>
            Confirmación Password <br>
            <input name="password_confirmation" type="password" value="{{ old('password_confirmation') }}"> <br>
            @error('password_confirmation')
                <small style="color: red">{{ $message }}</small>
                <br>
            @enderror
        </label>
        <button type="submit">Grabar</button> <br>

    </form>

@endsection