<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Negocio;
use Illuminate\Http\Request;

class NegocioController extends Controller
{
    // VERSION 1 API
    /* // Obtener la lista de negocios (opcionalmente filtrada por tipo de negocio)
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
    } */

    // VERSION 2 API
    /* public function index()
    {
        // Obtener todos los negocios y devolverlos como JSON
        $negocios = Negocio::all();
        return response()->json($negocios);
    } */
    public function index()
    {
        $negocios = Negocio::all()->map(function ($negocio) {
            $negocio->imagen = $negocio->imagen ? url('storage/' . $negocio->imagen) : null;
            return $negocio;
        });
        
        return response()->json($negocios);
    }
}
