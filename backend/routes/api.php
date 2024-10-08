<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\CarritoController;
use App\Http\Controllers\API\CategoriaController;
use App\Http\Controllers\API\NegocioController;
use App\Http\Controllers\API\PedidoController;
use App\Http\Controllers\API\ProductoController;
use App\Http\Controllers\API\TipoNegocioController;
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


Route::get('/platos', [ProductoController::class, 'index']);



//lo que removi de auth:sanctum
//API Categorias
Route::get('negocios/{negocioId}/categorias', [CategoriaController::class, 'obtenerCategoriasPorNegocio']);

//API productos
Route::get('categorias/{categoriaId}/productos', [ProductoController::class, 'obtenerProductosPorCategoria']);

// API de negocios
Route::get('negocios', [NegocioController::class, 'index']);
Route::get('negocios/{id}', [NegocioController::class, 'show']);



// API de pedidos
Route::post('pedidos/checkout', [PedidoController::class, 'checkout']);
Route::get('pedidos', [PedidoController::class, 'getPedidos']);
Route::get('pedidos/{id}', [PedidoController::class, 'getPedidoById']);



//API TIPO DE NEGOCIOS
Route::get('/tipos-negocios', [TipoNegocioController::class, 'index']);


Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('logout', [AuthController::class, 'logout']);
Route::middleware('auth:sanctum')->get('user', [AuthController::class, 'user']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('cart/add', [CarritoController::class, 'add']);
    Route::get('cart', [CarritoController::class, 'view']);
    Route::post('cart/remove', [CarritoController::class, 'remove']);
});