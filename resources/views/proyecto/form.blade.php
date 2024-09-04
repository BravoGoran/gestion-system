<form action="{{ route($route, $proyecto->id ?? null) }}" method="POST">
    @csrf
    @method($method)
    <div class="form-group">
        <label for="client_id">Cliente:</label>
        <select id="client_id" name="client_id" class="form-control">
            @foreach($clientes as $cliente)
                <option value="{{ $cliente->id }}" {{ (old('client_id') ?? $proyecto->client_id) == $cliente->id ? 'selected' : '' }}>
                    {{ $cliente->name }}
                </option>
            @endforeach
        </select>
        @error('client_id')
            <small style="color: red">{{ $message }}</small>
            <br>
        @enderror
    </div>
    <div class="form-group">
        <label for="name">Nombre del Proyecto:</label>
        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $proyecto->name) }}">
        @error('name')
            <small style="color: red">{{ $message }}</small>
            <br>
        @enderror
    </div>
    <div class="form-group">
        <label for="description">Descripción:</label>
        <textarea id="description" name="description" class="form-control">{{ old('description', $proyecto->description) }}</textarea>
        @error('description')
            <small style="color: red">{{ $message }}</small>
            <br>
        @enderror
    </div>
    <div class="form-group">
        <label for="start_date">Fecha de Inicio:</label>
        <input type="date" id="start_date" name="start_date" class="form-control" value="{{ old('start_date', $proyecto->start_date) }}">
        @error('start_date')
            <small style="color: red">{{ $message }}</small>
            <br>
        @enderror
    </div>
    <div class="form-group">
        <label for="end_date">Fecha de Finalización:</label>
        <input type="date" id="end_date" name="end_date" class="form-control" value="{{ old('end_date', $proyecto->end_date) }}">
        @error('end_date')
            <small style="color: red">{{ $message }}</small>
            <br>
        @enderror
    </div>
    <div class="form-group">
        <label for="status">Estado:</label>
        <select id="status" name="status" class="form-control">
            <option value="in_progress" {{ (old('status') ?? $proyecto->status) == 'in_progress' ? 'selected' : '' }}>En Progreso</option>
            <option value="completed" {{ (old('status') ?? $proyecto->status) == 'completed' ? 'selected' : '' }}>Completado</option>
            <option value="on_hold" {{ (old('status') ?? $proyecto->status) == 'on_hold' ? 'selected' : '' }}>En Espera</option>
        </select>
        @error('status')
            <small style="color: red">{{ $message }}</small>
            <br>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
