<form action="{{ route($route, $tarea->id ?? null) }}" method="POST">
    @csrf
    @method($method)
    
    <div class="form-group">
        <label for="project_id">Proyecto:</label>
        <select id="project_id" name="project_id" class="form-control">
            @foreach($proyectos as $proyecto)
                <option value="{{ $proyecto->id }}" {{ (old('project_id') ?? $tarea->project_id) == $proyecto->id ? 'selected' : '' }}>
                    {{ $proyecto->name }}
                </option>
            @endforeach
        </select>
        @error('project_id')
            <small style="color: red">{{ $message }}</small><br>
        @enderror
    </div>

    <div class="form-group">
        <label for="employee_id">Empleado:</label>
        <select id="employee_id" name="employee_id" class="form-control">
            @foreach($empleados as $empleado)
                <option value="{{ $empleado->id }}" {{ (old('employee_id') ?? $tarea->employee_id) == $empleado->id ? 'selected' : '' }}>
                    {{ $empleado->first_name }}
                </option>
            @endforeach
        </select>
        @error('employee_id')
            <small style="color: red">{{ $message }}</small><br>
        @enderror
    </div>

    <div class="form-group">
        <label for="description">Descripción:</label>
        <textarea id="description" name="description" class="form-control">{{ old('description', $tarea->description) }}</textarea>
        @error('description')
            <small style="color: red">{{ $message }}</small><br>
        @enderror
    </div>

    <div class="form-group">
        <label for="start_date">Fecha de Inicio:</label>
        <input type="date" id="start_date" name="start_date" class="form-control" value="{{ old('start_date', $tarea->start_date) }}">
        @error('start_date')
            <small style="color: red">{{ $message }}</small><br>
        @enderror
    </div>

    <div class="form-group">
        <label for="end_date">Fecha de Finalización:</label>
        <input type="date" id="end_date" name="end_date" class="form-control" value="{{ old('end_date', $tarea->end_date) }}">
        @error('end_date')
            <small style="color: red">{{ $message }}</small><br>
        @enderror
    </div>

    <div class="form-group">
        <label for="status">Estado:</label>
        <select id="status" name="status" class="form-control">
            <option value="pending" {{ (old('status') ?? $tarea->status) == 'pending' ? 'selected' : '' }}>Pendiente</option>
            <option value="in_progress" {{ (old('status') ?? $tarea->status) == 'in_progress' ? 'selected' : '' }}>En Progreso</option>
            <option value="completed" {{ (old('status') ?? $tarea->status) == 'completed' ? 'selected' : '' }}>Completada</option>
        </select>
        @error('status')
            <small style="color: red">{{ $message }}</small><br>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{ route('tareas.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
