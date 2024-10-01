<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return response()->json($productos);
    }
    public function obtenerProductosPorCategoria($categoriaId)
    {

        $categoria = Categoria::find($categoriaId);
        if (!$categoria) {
            return response()->json(['mensaje' => 'Categoría no encontrada'], 404);
        }

        $productos = $categoria->productos()->get();
        return response()->json($productos);
    }
}
