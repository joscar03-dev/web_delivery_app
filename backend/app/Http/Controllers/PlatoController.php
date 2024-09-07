<?php

namespace App\Http\Controllers;

use App\Models\Plato;
use Illuminate\Http\Request;

class PlatoController extends Controller
{
    public function index()
    {
        $platos = Plato::all()->map(function ($plato) {
            $plato->imagen = url('storage/' . $plato->imagen); // Si tus imágenes están en storage
            return $plato;
        });

        return response()->json($platos, 200);
    }
}
