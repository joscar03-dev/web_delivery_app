<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TipoNegocio;

class TipoNegocioController extends Controller
{
    public function index()
    {
        $tipos = TipoNegocio::all(); // Obtén todos los tipos de negocios
        return response()->json($tipos);
    }
}
