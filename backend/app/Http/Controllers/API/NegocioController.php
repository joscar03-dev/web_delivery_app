<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Negocio;
use Illuminate\Http\Request;

class NegocioController extends Controller
{
    // Obtener la lista de negocios (opcionalmente filtrada por tipo de negocio)
    public function index(Request $request)
    {
        $tipoNegocioId = $request->query('tipo_negocio_id');

        if ($tipoNegocioId) {
            $negocios = Negocio::where('tipo_negocio_id', $tipoNegocioId)->with('platos.categoria')->get();
        } else {
            $negocios = Negocio::with('platos.categoria')->get();
        }

        return response()->json($negocios);
    }

    // Obtener un negocio específico y sus platos
    public function show($id)
    {
        $negocio = Negocio::with('platos.categoria')->findOrFail($id);
        return response()->json($negocio);
    }
}
