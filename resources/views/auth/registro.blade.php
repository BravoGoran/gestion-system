@extends('plantilla') 
@section('titulo', 'Registro')

@section('contenido')
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="card-title">Registrese aqui:</h4>
        </div>
        <div class="card-body">
            <form action="{{ route('registro') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Nombre</label>
                    <input name="name" type="text" class="form-control" id="name" value="{{ old('name') }}" autofocus="autofocus">
                    @error('name')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" id="email" value="{{ old('email') }}">
                    @error('email')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input name="password" type="password" class="form-control" id="password" value="{{ old('password') }}">
                    @error('password')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation" class="form-label">Confirmación Password</label>
                    <input name="password_confirmation" type="password" class="form-control" id="password_confirmation" value="{{ old('password_confirmation') }}">
                    @error('password_confirmation')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Grabar</button>
            </form>
        </div>
    </div>
@endsection
