<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:clientes,email'
        ]);

        $cliente = new Cliente();
        $cliente->name = $request->name;
        $cliente->address = $request->address;
        $cliente->phone = $request->phone;
        $cliente->email = $request->email;
        $cliente->registered_at = now();
        $cliente->save();

        return redirect()->route('clientes.index')->with('success', 'Cliente creado exitosamente.');
    }

    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    public function edit(Cliente $cliente)
    {
        $cliente->registered_at = Carbon::parse($cliente->registered_at);
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|unique:clientes,email,' . $cliente->id
        ]);

        $cliente->name = $request->name;
        $cliente->address = $request->address;
        $cliente->phone = $request->phone;
        $cliente->email = $request->email;
        $cliente->registered_at = $cliente->registered_at;
        $cliente->update();

        return redirect()->route('clientes.index');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();

        return redirect()->route('clientes.index');
    }
}