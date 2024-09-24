<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProyectoRequest;
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

    public function store(ProyectoRequest $request)
    {
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

    public function update(ProyectoRequest $request, Proyecto $proyecto)
    {
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
