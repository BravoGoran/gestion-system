<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Proyecto;
use App\Models\Tarea;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TareaController extends Controller
{
    public function index()
    {
        $tareas = Tarea::all();
        return view('tarea.index', compact('tareas'));
    }

    public function create()
    {
        $empleados = Empleado::all();
        $proyectos = Proyecto::all();
        return view('tarea.create', compact('empleados', 'proyectos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'project_id' => 'required|exists:proyectos,id',
            'employee_id' => 'required|exists:empleados,id',
            'description' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'status' => [
                'required',
                'string',
                Rule::in(['in_progress', 'completed', 'pending']),
                function ($attribute, $value, $fail) use ($request) {
                    if ($value === 'completed' && !$request->end_date) {
                        $fail('El estado no puede ser completado sin una fecha de finalización.');
                    }
                    if ($value !== 'completed' && $request->end_date) {
                        $fail('El estado debe ser completado si hay una fecha de finalización.');
                    }
                }
            ]
        ]);

        $tarea = new Tarea();
        $tarea->project_id = $request->project_id;
        $tarea->employee_id = $request->employee_id;
        $tarea->description = $request->description;
        $tarea->start_date = $request->start_date;
        $tarea->end_date = $request->end_date;
        $tarea->status = $request->status;
        $tarea->save();

        return redirect()->route('tareas.index');
    }

    public function show(Tarea $tarea)
    {
        return view('tarea.show', compact('tarea'));
    }

    public function edit(Tarea $tarea)
    {
        $empleados = Empleado::all();
        $proyectos = Proyecto::all();
        return view('tarea.edit', compact('tarea', 'proyectos', 'empleados'));
    }

    public function update(Request $request, Tarea $tarea)
    {
        $request->validate([
            'project_id' => 'required|exists:proyectos,id',
            'employee_id' => 'required|exists:empleados,id',
            'description' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'status' => [
                'required',
                'string',
                Rule::in(['in_progress', 'completed', 'pending']),
                function ($attribute, $value, $fail) use ($request) {
                    if ($value === 'completed' && !$request->end_date) {
                        $fail('El estado no puede ser completado sin una fecha de finalización.');
                    }
                    if ($value !== 'completed' && $request->end_date) {
                        $fail('El estado debe ser completado si hay una fecha de finalización.');
                    }
                }
            ]
        ]);

        $tarea->project_id = $request->project_id;
        $tarea->employee_id = $request->employee_id;
        $tarea->description = $request->description;
        $tarea->start_date = $request->start_date;
        $tarea->end_date = $request->end_date;
        $tarea->status = $request->status;
        $tarea->update();

        return redirect()->route('tareas.index');
    }

    public function destroy(Tarea $tarea)
    {
        $tarea->delete();

        return redirect()->route('tareas.index');
    }
}