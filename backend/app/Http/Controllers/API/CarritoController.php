<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Carrito;
use App\Models\CarritoItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

/* class CarritoController extends Controller
{
    // Obtener el carrito del usuario autenticado
    public function getCarrito()
    {
        $carrito = Carrito::with('items.producto.negocio')
            ->where('usuario_id', auth()->id())
            ->first();
        if (!$carrito) {
            return response()->json(['message' => 'El carrito está vacío'], 200);
        }
        return response()->json($carrito);
    }
    // Agregar un producto al carrito
    public function addProducto(Request $request)
    {
        // Validar los datos de entrada
        $request->validate([
            'productoId' => 'required|integer|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'precio' => 'required|numeric'
        ]);

        // Obtener o crear el carrito para el usuario
        $carrito = Carrito::firstOrCreate(['usuario_id' => auth()->id()]);

        // Verificar si el producto ya está en el carrito, y actualizar cantidad si es necesario
        $item = CarritoItem::where('carrito_id', $carrito->id)
            ->where('plato_id', $request->input('productoId'))
            ->first();

        if ($item) {
            // Si el producto ya está en el carrito, simplemente actualiza la cantidad
            $item->cantidad += $request->input('cantidad');
            $item->save();
        } else {
            // Si no está en el carrito, se crea un nuevo item
            CarritoItem::create([
                'carrito_id' => $carrito->id,
                'plato_id' => $request->input('productoId'),
                'cantidad' => $request->input('cantidad'),
                'precio_unitario' => $request->input('precio')
            ]);
        }

        return response()->json(['message' => 'Producto agregado al carrito'], 200);
    }
    

    // Remover un producto del carrito
    public function removeProducto($id)
    {
        // Primero obtener el carrito del usuario
        $carrito = Carrito::where('usuario_id', auth()->id())->first();

        if (!$carrito) {
            return response()->json(['message' => 'Carrito no encontrado'], 404);
        }

        // Buscar el item dentro del carrito y eliminarlo
        $item = CarritoItem::where('carrito_id', $carrito->id)
            ->where('id', $id)
            ->firstOrFail();

        $item->delete();

        return response()->json(['message' => 'Producto removido del carrito'], 200);
    }
} */

class CarritoController extends Controller
{
    // Obtener el carrito del usuario autenticado
    public function getCarrito()
    {
        $carrito = Carrito::with('items.producto.negocio')
            ->where('usuario_id', auth()->id())
            ->first();

        if (!$carrito || $carrito->items->isEmpty()) {
            return response()->json(['message' => 'El carrito está vacío'], 200);
        }

        return response()->json($carrito, 200);
    }

    // Agregar un producto al carrito
    public function addProducto(Request $request)
    {
        Log::info('Datos recibidos en addProducto:', $request->all());
        // Validar los datos de entrada
        $request->validate([
            'productoId' => 'required|integer|exists:productos,id',
            'cantidad' => 'required|integer|min:1',
            'precio' => 'required|numeric'
        ]);

        // Obtener o crear el carrito para el usuario
        $carrito = Carrito::firstOrCreate(['usuario_id' => auth()->id()]);

        // Verificar si el producto ya está en el carrito, y actualizar cantidad si es necesario
        $item = CarritoItem::where('carrito_id', $carrito->id)
            ->where('plato_id', $request->input('productoId'))
            ->first();

        if ($item) {
            // Si el producto ya está en el carrito, simplemente actualiza la cantidad
            $item->cantidad += $request->input('cantidad');
            $item->save();
        } else {
            // Si no está en el carrito, se crea un nuevo item
            CarritoItem::create([
                'carrito_id' => $carrito->id,
                'plato_id' => $request->input('productoId'),
                'cantidad' => $request->input('cantidad'),
                'precio_unitario' => $request->input('precio')
            ]);
        }

        // Devolver el carrito actualizado
        $carrito->load('items.producto.negocio');
        // dd($request->all());
        return response()->json($carrito, 200);
    }

    // Remover un producto del carrito
    public function removeProducto($id)
    {
        // Obtener el carrito del usuario
        $carrito = Carrito::where('usuario_id', auth()->id())->first();

        if (!$carrito) {
            return response()->json(['message' => 'Carrito no encontrado'], 404);
        }

        // Buscar el item dentro del carrito y eliminarlo
        $item = CarritoItem::where('carrito_id', $carrito->id)
            ->where('id', $id)
            ->firstOrFail();

        $item->delete();

        // Devolver el carrito actualizado después de eliminar el producto
        $carrito->load('items.producto.negocio');
        return response()->json($carrito, 200);
    }
}
