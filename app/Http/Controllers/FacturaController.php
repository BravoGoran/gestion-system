<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Factura;
use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FacturaController extends Controller
{
    public function index()
    {
        $facturas = Factura::all();
        return view('factura.index', compact('facturas'));
    }

    //////////////////////////////////////////////////////////////////

    public function eloqSinRelaciones()
    {
        $facturas = Factura::select(
                'id',
                'client_id',
                'project_id',
                'issue_date',
                'due_date',
                'total_amount',
                'status'
            )
            ->get();

        return view('factura.details', compact('facturas'));
    }

    public function table()
    {
        $facturas = DB::table('facturas as fa')
            ->join('clientes as cli', 'cli.id', '=', 'fa.client_id')
            ->join('proyectos as pr', 'pr.id', '=', 'fa.project_id')
            ->select(
                'fa.id as id',
                'fa.client_id as client_id',
                'cli.name as client_name',
                'cli.email as email',
                'fa.project_id as project_id',
                'pr.name as project_name',
                'fa.issue_date as issue_date',
                'fa.due_date as due_date',
                'fa.total_amount as total_amount',
                'fa.status as status'
            )
            ->get();
        
        return view('factura.details', compact('facturas'));
    }

        public function select()
    {
        $facturas = DB::select("
            SELECT 
                fa.id as id,
                fa.client_id as client_id,
                cli.name as client_name,
                cli.email as email,
                fa.project_id as project_id,
                pr.name as project_name,
                fa.issue_date as issue_date,
                fa.due_date as due_date,
                fa.total_amount as total_amount,
                fa.status as status
            FROM facturas fa
            JOIN clientes cli ON cli.id = fa.client_id
            JOIN proyectos pr ON pr.id = fa.project_id
        ");
        
        return view('factura.details', compact('facturas'));
    }

    public function eloqRelaciones()
    {
        $facturas = Factura::with(['clientes', 'proyectos'])
            ->select(
                'id',
                'client_id',
                'project_id',
                'issue_date',
                'due_date',
                'total_amount',
                'status'
            )
            ->get();

        return view('factura.details', compact('facturas'));
    }

    //////////////////////////////////////////////////////////////////

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