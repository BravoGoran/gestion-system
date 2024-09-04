<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Factura;
use App\Models\Proyecto;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    public function index()
    {
        $facturas = Factura::all();
        return view('factura.index', compact('facturas'));
    }

    public function create()
    {
        $clientes = Cliente::all();
        $proyectos = Proyecto::all();
        return view('factura.create', compact('clientes', 'proyectos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clientes,id',
            'project_id' => 'required|exists:proyectos,id',
            'issue_date' => 'required|date',
            'due_date' => 'required|date|after_or_equal:issue_date',
            'total_amount' => 'required|numeric|min:0',
            'status' => 'required|string|in:paid,pending,overdue',
            //////TODO: FALTAN VALIDACIONES PARA PENDIENTE ETC
        ]);

        $factura = new Factura();
        $factura->client_id = $request->client_id;
        $factura->project_id = $request->project_id;
        $factura->issue_date = $request->issue_date;
        $factura->due_date = $request->due_date;
        $factura->total_amount = $request->total_amount;
        $factura->status = $request->status;
        $factura->save();

        return redirect()->route('facturas.index')->with('success', 'Factura creada exitosamente.');
    }

    public function show(Factura $factura)
    {
        return view('factura.show', compact('factura'));
    }

    public function edit(Factura $factura)
    {
        
        $clientes = Cliente::all();
        $proyectos = Proyecto::all();
        return view('factura.edit', compact('clientes', 'proyectos', 'factura'));
    }

    public function update(Request $request, Factura $factura)
    {
        $request->validate([
            'client_id' => 'required|exists:clientes,id',
            'project_id' => 'required|exists:proyectos,id',
            'issue_date' => 'required|date',
            'due_date' => 'required|date|after_or_equal:issue_date',
            'total_amount' => 'required|numeric|min:0',
            'status' => 'required|string|in:paid,pending,overdue',
        ]);

        $factura->client_id = $request->client_id;
        $factura->project_id = $request->project_id;
        $factura->issue_date = $request->issue_date;
        $factura->due_date = $request->due_date;
        $factura->total_amount = $request->total_amount;
        $factura->status = $request->status;
        $factura->update();

        return redirect()->route('facturas.index');
    }

    public function destroy(Factura $factura)
    {
        $factura->delete();

        return redirect()->route('facturas.index');
    }
}