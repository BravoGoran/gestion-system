<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = Empleado::all();
        return view('empleado.index', compact('empleados'));
    }

    public function create()
    {
        return view('empleado.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:empleados,email',
            'hire_date' => 'required|date',
            'position' => 'required|string|max:255',
        ]);

        $empleado = new Empleado();
        $empleado->first_name = $request->first_name;
        $empleado->last_name = $request->last_name;
        $empleado->address = $request->address;
        $empleado->phone = $request->phone;
        $empleado->email = $request->email;
        $empleado->hire_date = $request->hire_date;
        $empleado->position = $request->position;
        $empleado->save();

        return redirect()->route('empleados.index')->with('success', 'Empleado creado exitosamente.');;
    }

    public function show(Empleado $empleado)
    {
        return view('empleado.show', compact('empleado'));
    }

    public function edit(Empleado $empleado)
    {
        return view('empleado.edit', compact('empleado'));
    }

    public function update(Request $request, Empleado $empleado)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:empleados,email,' . $empleado->id,
            'hire_date' => 'required|date',
            'position' => 'required|string|max:255',
        ]);

        $empleado->first_name = $request->first_name;
        $empleado->last_name = $request->last_name;
        $empleado->address = $request->address;
        $empleado->phone = $request->phone;
        $empleado->email = $request->email;
        $empleado->hire_date = $request->hire_date;
        $empleado->position = $request->position;
        $empleado->update();

        return redirect()->route('empleados.index');
    }

    public function destroy(Empleado $empleado)
    {
        $empleado->delete();

        return redirect()->route('empleados.index');
    }
}
