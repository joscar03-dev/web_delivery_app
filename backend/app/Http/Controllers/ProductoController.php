<?php

namespace App\Http\Controllers;

use App\Models\Plato;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index()
    {
        $platos = Producto::all()->map(function ($producto) {
            $producto->imagen = url('storage/' . $producto->imagen); // Si tus imágenes están en storage
            return $producto;
        });

        return response()->json($platos, 200);
    }
}
