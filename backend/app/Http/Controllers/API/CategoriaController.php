<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Negocio;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function obtenerCategoriasPorNegocio($negocioId)
    {
        // Verificamos si el negocio existe
        $negocio = Negocio::find($negocioId);

        if (!$negocio) {
            return response()->json(['mensaje' => 'Negocio no encontrado'], 404);
        }

        // Obtenemos las categorías asociadas al negocio
        $categorias = $negocio->categorias()->get();

        // Retornamos las categorías en formato JSON
        return response()->json($categorias);
    }
}
