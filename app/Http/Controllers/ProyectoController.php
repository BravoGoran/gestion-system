<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Proyecto;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    public function index()
    {
        $proyectos = Proyecto::all();
        return view('proyecto.index', compact('proyectos'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        return view('proyecto.create', compact('clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clientes,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'status' => [
                'required',
                'string',
                Rule::in(['in_progress', 'completed', 'on_hold']),
                function ($attribute, $value, $fail) use ($request) {
                    if ($value === 'completed' && !$request->end_date) {
                        $fail('El estado no puede ser completado sin una fecha de finalización.');
                    }
                    if ($value !== 'completed' && $request->end_date) {
                        $fail('El estado debe ser completado si hay una fecha de finalización.');
                    }
                }
            ],
        ]);

        $proyecto = new Proyecto();
        $proyecto->client_id = $request->client_id;
        $proyecto->name = $request->name;
        $proyecto->description = $request->description;
        $proyecto->start_date = $request->start_date;
        $proyecto->end_date = $request->end_date;
        $proyecto->status = $request->status;
        $proyecto->save();

        return redirect()->route('proyectos.index')->with('success', 'Proyecto creado exitosamente.');;
    }

    public function show(Proyecto $proyecto)
    {
        return view('proyecto.show', compact('proyecto'));
    }

    public function edit(Proyecto $proyecto)
    {
        $clientes = Cliente::all();
        return view('proyecto.edit', compact('proyecto', 'clientes'));
    }

    public function update(Request $request, Proyecto $proyecto)
    {
        $request->validate([
            'client_id' => 'required|exists:clientes,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'status' => [
                'required',
                'string',
                Rule::in(['in_progress', 'completed', 'on_hold']),
                function ($attribute, $value, $fail) use ($request) {
                    if ($value === 'completed' && !$request->end_date) {
                        $fail('El estado no puede ser completado sin una fecha de finalización.');
                    }
                    if ($value !== 'completed' && $request->end_date) {
                        $fail('El estado debe ser completado si hay una fecha de finalización.');
                    }
                }
            ],
        ]);

        $proyecto->client_id = $request->client_id;
        $proyecto->name = $request->name;
        $proyecto->description = $request->description;
        $proyecto->start_date = $request->start_date;
        $proyecto->end_date = $request->end_date;
        $proyecto->status = $request->status;
        $proyecto->update();

        return redirect()->route('proyectos.index');
    }

    public function destroy(Proyecto $proyecto)
    {
        $proyecto->delete();

        return redirect()->route('proyectos.index');
    }
}
