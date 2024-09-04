<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Hora;
use App\Models\Proyecto;
use Illuminate\Http\Request;

class HoraTrabajadaController extends Controller
{
    public function index()
    {
        $horasTrabajadas = Hora::all();
        return view('hora.index', compact('horasTrabajadas'));
    }

    public function create()
    {
        $proyectos = Proyecto::all();
        $empleados = Empleado::all();
        return view('hora.create', compact('empleados', 'proyectos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:empleados,id',
            'project_id' => 'required|exists:proyectos,id',
            'hours' => 'required|numeric|min:0',
            'date' => 'required|date',
        ]);

        $horaTrabajada = new Hora();
        $horaTrabajada->employee_id = $request->employee_id;
        $horaTrabajada->project_id = $request->project_id;
        $horaTrabajada->hours = $request->hours;
        $horaTrabajada->date = $request->date;
        $horaTrabajada->save();

        return redirect()->route('horas.index')->with('success', 'Hora creada exitosamente.');;
    }

    public function show(Hora $horaTrabajada)
    {
        return view('hora.show', compact('horaTrabajada'));
    }

    public function edit(Hora $horaTrabajada)
    {
        $empleados = Empleado::all();
        $proyectos = Proyecto::all();
        return view('hora.edit', compact('horaTrabajada', 'empleados', 'proyectos'));
    }

    public function update(Request $request, Hora $horaTrabajada)
    {
        $request->validate([
            'employee_id' => 'required|exists:empleados,id',
            'project_id' => 'required|exists:proyectos,id',
            'hours' => 'required|numeric|min:0',
            'date' => 'required|date',
        ]);

        $horaTrabajada->employee_id = $request->employee_id;
        $horaTrabajada->project_id = $request->project_id;
        $horaTrabajada->hours = $request->hours;
        $horaTrabajada->date = $request->date;
        $horaTrabajada->update();

        return redirect()->route('horas.index');
    }

    public function destroy(Hora $horaTrabajada)
    {
        $horaTrabajada->delete();

        return redirect()->route('horas.index');
    }
}
