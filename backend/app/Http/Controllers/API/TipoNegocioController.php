<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\TipoNegocio;
use Illuminate\Http\Request;


class TipoNegocioController extends Controller
{
    public function index()
    {
        $tipos = TipoNegocio::all(); // Obtén todos los tipos de negocios
        return response()->json($tipos);
    }
}
