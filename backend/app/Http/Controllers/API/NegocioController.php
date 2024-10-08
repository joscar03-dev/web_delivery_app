<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Negocio;
use Illuminate\Http\Request;

class NegocioController extends Controller
{
    // VERSION 1 API
    // Obtener la lista de negocios (opcionalmente filtrada por tipo de negocio)
    public function index(Request $request)
    {
        $tipoNegocioId = $request->query('tipo_negocio_id');

        if ($tipoNegocioId) {
            $negocios = Negocio::where('tipo_negocio_id', $tipoNegocioId)->with('productos.categoria')->get()->map(function ($negocio) {
                $negocio->imagen = $negocio->imagen ? url('storage/' . $negocio->imagen) : null; //poner storage si usamos el storage
                $negocio->estado = $negocio->estado;
                return $negocio;
            });
        } else {
            $negocios = Negocio::with('productos.categoria')->get()->map(function ($negocio) {
                $negocio->imagen = $negocio->imagen ? url('storage/' . $negocio->imagen) : null;
                $negocio->estado = $negocio->estado;
                return $negocio;
            });
        }

        return response()->json($negocios);
    }

    // Obtener un negocio específico y sus platos
    public function show($id)
    {
        // Obtener el negocio con sus platos y las categorías de los platos
        $negocio = Negocio::with('productos.categoria')->findOrFail($id);

        // Transformar la imagen para que utilice la URL del storage si es necesario
        $negocio->imagen = $negocio->imagen ? url('storage/' . $negocio->imagen) : null;

        return response()->json($negocio);
    }

    // VERSION 2 API
    /* public function index()
    {
        // Obtener todos los negocios y devolverlos como JSON
        $negocios = Negocio::all();
        return response()->json($negocios);
    } */
   //Version 3
    /* public function index()
    {
        $negocios = Negocio::all()->map(function ($negocio) {
            $negocio->imagen = $negocio->imagen ? url('storage/' . $negocio->imagen) : null;
            return $negocio;
        });
        
        return response()->json($negocios);
    } */
}
