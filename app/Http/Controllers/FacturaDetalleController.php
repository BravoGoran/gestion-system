<?php

namespace App\Http\Controllers;

use App\Models\FacturaDetalle;

class FacturaDetalleController extends Controller
{
    public function index()
    {
        $facturas = FacturaDetalle::all();
        // dd($facturas);
        return view('factura.details', compact('facturas'));
    }
}
