<form action="{{ route($route, $hora->id ?? null) }}" method="POST">
    @csrf
    @method($method)
    
    <div class="form-group">
        <label for="employee_id">Empleado:</label>
        <select id="employee_id" name="employee_id" class="form-control">
            @foreach($empleados as $empleado)
                <option value="{{ $empleado->id }}" {{ (old('employee_id') ?? $hora->employee_id) == $empleado->id ? 'selected' : '' }}>
                    {{ $empleado->first_name }}
                </option>
            @endforeach
        </select>
        @error('employee_id')
            <small style="color: red">{{ $message }}</small><br>
        @enderror
    </div>

    <div class="form-group">
        <label for="project_id">Proyecto:</label>
        <select id="project_id" name="project_id" class="form-control">
            @foreach($proyectos as $proyecto)
                <option value="{{ $proyecto->id }}" {{ (old('project_id') ?? $hora->project_id) == $proyecto->id ? 'selected' : '' }}>
                    {{ $proyecto->name }}
                </option>
            @endforeach
        </select>
        @error('project_id')
            <small style="color: red">{{ $message }}</small><br>
        @enderror
    </div>

    <div class="form-group">
        <label for="date">Fecha:</label>
        <input type="date" id="date" name="date" class="form-control" value="{{ old('date', $hora->date) }}">
        @error('date')
            <small style="color: red">{{ $message }}</small><br>
        @enderror
    </div>

    <div class="form-group">
        <label for="hours">Horas:</label>
        <input type="number" id="hours" name="hours" class="form-control" value="{{ old('hours', $hora->hours) }}">
        @error('hours')
            <small style="color: red">{{ $message }}</small><br>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{ route('horas.index') }}" class="btn btn-secondary">Cancelar</a>
</form>