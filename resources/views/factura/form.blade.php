<form action="{{ route($route, $factura->id ?? null) }}" method="POST">
    @csrf
    @method($method)
    
    <div class="form-group">
        <label for="client_id">Cliente:</label>
        <select id="client_id" name="client_id" class="form-control">
            @foreach($clientes as $cliente)
                <option value="{{ $cliente->id }}" {{ (old('client_id') ?? $factura->client_id) == $cliente->id ? 'selected' : '' }}>
                    {{ $cliente->name }}
                </option>
            @endforeach
        </select>
        @error('client_id')
            <small style="color: red">{{ $message }}</small><br>
        @enderror
    </div>

    <div class="form-group">
        <label for="project_id">Proyecto:</label>
        <select id="project_id" name="project_id" class="form-control">
            @foreach($proyectos as $proyecto)
                <option value="{{ $proyecto->id }}" {{ (old('project_id') ?? $factura->project_id) == $proyecto->id ? 'selected' : '' }}>
                    {{ $proyecto->name }}
                </option>
            @endforeach
        </select>
        @error('project_id')
            <small style="color: red">{{ $message }}</small><br>
        @enderror
    </div>

    <div class="form-group">
        <label for="issue_date">Fecha de Emisión:</label>
        <input type="date" id="issue_date" name="issue_date" class="form-control" value="{{ old('issue_date', $factura->issue_date) }}">
        @error('issue_date')
            <small style="color: red">{{ $message }}</small><br>
        @enderror
    </div>

    <div class="form-group">
        <label for="due_date">Fecha de Vencimiento:</label>
        <input type="date" id="due_date" name="due_date" class="form-control" value="{{ old('due_date', $factura->due_date) }}">
        @error('due_date')
            <small style="color: red">{{ $message }}</small><br>
        @enderror
    </div>

    <div class="form-group">
        <label for="total_amount">Monto Total:</label>
        <input type="number" step="0.01" id="total_amount" name="total_amount" class="form-control" value="{{ old('total_amount', $factura->total_amount) }}">
        @error('total_amount')
            <small style="color: red">{{ $message }}</small><br>
        @enderror
    </div>

    <div class="form-group">
        <label for="status">Estado:</label>
        <select id="status" name="status" class="form-control">
            <option value="paid" {{ (old('status') ?? $factura->status) == 'paid' ? 'selected' : '' }}>Pagada</option>
            <option value="pending" {{ (old('status') ?? $factura->status) == 'pending' ? 'selected' : '' }}>Pendiente</option>
            <option value="overdue" {{ (old('status') ?? $factura->status) == 'overdue' ? 'selected' : '' }}>Vencida</option>
        </select>
        @error('status')
            <small style="color: red">{{ $message }}</small><br>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
    <a href="{{ route('facturas.index') }}" class="btn btn-secondary">Cancelar</a>
</form>
