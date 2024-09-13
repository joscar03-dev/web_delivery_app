<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Carrito;
use App\Models\CarritoItem;
use Illuminate\Http\Request;

class CarritoController extends Controller
{
    // Obtener el carrito del usuario autenticado
    public function getCarrito()
    {
        $carrito = Carrito::with('items.plato.negocio')
            ->where('usuario_id', auth()->id())
            ->first();

        return response()->json($carrito);
    }

    // Agregar un producto al carrito
    public function addProducto(Request $request)
    {
        $carrito = Carrito::firstOrCreate(['usuario_id' => auth()->id()]);

        CarritoItem::create([
            'carrito_id' => $carrito->id,
            'plato_id' => $request->input('productoId'),
            'cantidad' => $request->input('cantidad'),
            'precio_unitario' => $request->input('precio')
        ]);

        return response()->json(['message' => 'Producto agregado al carrito']);
    }

    // Remover un producto del carrito
    public function removeProducto($id)
    {
        $item = CarritoItem::where('carrito_id', auth()->id())->findOrFail($id);
        $item->delete();

        return response()->json(['message' => 'Producto removido del carrito']);
    }
}