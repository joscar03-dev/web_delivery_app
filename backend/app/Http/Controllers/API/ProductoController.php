<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function obtenerProductosPorCategoria($categoriaId)
    {
        // Verificamos si la categoría existe
        $categoria = Categoria::find($categoriaId);

        if (!$categoria) {
            return response()->json(['mensaje' => 'Categoría no encontrada'], 404);
        }

        // Obtenemos los productos de la categoría
        $productos = $categoria->productos()->get();

        // Retornamos los productos en formato JSON
        return response()->json($productos);
    }
}
