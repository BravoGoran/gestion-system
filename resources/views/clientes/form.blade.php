<form action="{{ route($route, $cliente->id ?? null) }}" method="POST">
    @csrf
    @method($method)
    <div class="form-group">
        <label for="name">Nombre:</label>
        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $cliente->name) }}">
        @error('name')
            <small style="color: red">{{ $message }}</small><br>
        @enderror
    </div>
    <div class="form-group">
        <label for="address">Dirección:</label>
        <input type="text" id="address" name="address" class="form-control" value="{{ old('address', $cliente->address) }}">
        @error('address')
            <small style="color: red">{{ $message }}</small><br>
        @enderror
    </div>
    <div class="form-group">
        <label for="phone">Teléfono:</label>
        <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', $cliente->phone) }}">
        @error('phone')
            <small style="color: red">{{ $message }}</small><br>
        @enderror
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $cliente->email) }}">
        @error('email')
            <small style="color: red">{{ $message }}</small><br>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
