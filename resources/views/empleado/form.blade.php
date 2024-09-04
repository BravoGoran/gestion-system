<form action="{{ route($route, $empleado->id ?? null) }}" method="POST">
    @csrf
    @method($method)
    <div class="form-group">
        <label for="first_name">Nombre:</label>
        <input type="text" id="first_name" name="first_name" class="form-control" value="{{ old('first_name', $empleado->first_name) }}">        
        @error('first_name')
            <small style="color: red">{{ $message }}</small><br>
        @enderror
    </div>
    <div class="form-group">
        <label for="last_name">Apellidos:</label>
        <input type="text" id="last_name" name="last_name" class="form-control" value="{{ old('last_name', $empleado->last_name) }}">
        @error('last_name')
            <small style="color: red">{{ $message }}</small><br>
        @enderror
    </div>
    <div class="form-group">
        <label for="address">Dirección:</label>
        <input type="text" id="address" name="address" class="form-control" value="{{ old('address', $empleado->address) }}">
        @error('address')
            <small style="color: red">{{ $message }}</small><br>
        @enderror
    </div>
    <div class="form-group">
        <label for="phone">Teléfono:</label>
        <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', $empleado->phone) }}">
        @error('phone')
            <small style="color: red">{{ $message }}</small><br>
        @enderror
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" class="form-control" value="{{ old('email', $empleado->email) }}">
        @error('email')
            <small style="color: red">{{ $message }}</small><br>
        @enderror
    </div>
    <div class="form-group">
        <label for="hire_date">Fecha de Contratación:</label>
        <input type="date" id="hire_date" name="hire_date" class="form-control" value="{{ old('hire_date', $empleado->hire_date) }}">
        @error('hire_date')
            <small style="color: red">{{ $message }}</small><br>
        @enderror
    </div>
    <div class="form-group">
        <label for="position">Cargo:</label>
        <input type="text" id="position" name="position" class="form-control" value="{{ old('position', $empleado->position) }}">
        @error('position')
            <small style="color: red">{{ $message }}</small><br>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
