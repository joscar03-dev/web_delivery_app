<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CarritoController;
use App\Http\Controllers\API\NegocioController;
use App\Http\Controllers\API\PedidoController;
use App\Http\Controllers\API\TipoNegocioController;
use App\Http\Controllers\ProductoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/productos', [ProductoController::class, 'index']);

// NUEVOS
Route::middleware('auth:sanctum')->group(function () {
    
    
    
});

Route::middleware('auth:sanctum')->post('logout', [AuthController::class, 'logout']);


//lo que removi de auth:sanctum
// API de negocios
Route::get('negocios', [NegocioController::class, 'index']);
    Route::get('negocios/{id}', [NegocioController::class, 'show']);

    // API del carrito
    Route::get('carrito', [CarritoController::class, 'getCarrito']);
    Route::post('carrito/add', [CarritoController::class, 'addProducto']);
    Route::delete('carrito/remove/{id}', [CarritoController::class, 'removeProducto']);

    // API de pedidos
    Route::post('pedidos/checkout', [PedidoController::class, 'checkout']);
    Route::get('pedidos', [PedidoController::class, 'getPedidos']);
    Route::get('pedidos/{id}', [PedidoController::class, 'getPedidoById']);

    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
//API TIPO DE NEGOCIOS
Route::get('/tipos-negocios', [TipoNegocioController::class, 'index']);