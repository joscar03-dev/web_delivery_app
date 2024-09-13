<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Carrito;
use App\Models\Orden;
use App\Models\OrdenItem;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    // Confirmar el pedido
    public function checkout(Request $request)
    {
        $carrito = Carrito::with('items')->where('usuario_id', auth()->id())->firstOrFail();

        // Crear la orden
        $orden = Orden::create([
            'usuario_id' => auth()->id(),
            'total' => $carrito->items->sum('total'),
            'estado' => 'pendiente'
        ]);

        // Mover los items del carrito a la orden
        foreach ($carrito->items as $item) {
            OrdenItem::create([
                'orden_id' => $orden->id,
                'plato_id' => $item->plato_id,
                'cantidad' => $item->cantidad,
                'precio_unitario' => $item->precio_unitario,
                'total' => $item->total
            ]);
        }

        // Vaciar el carrito
        $carrito->items()->delete();

        return response()->json(['message' => 'Pedido confirmado', 'orden' => $orden]);
    }

    // Obtener los pedidos del usuario
    public function getPedidos()
    {
        $pedidos = Orden::where('usuario_id', auth()->id())->with('items.plato')->get();
        return response()->json($pedidos);
    }

    // Obtener un pedido específico
    public function getPedidoById($id)
    {
        $pedido = Orden::with('items.plato')->findOrFail($id);
        return response()->json($pedido);
    }
}