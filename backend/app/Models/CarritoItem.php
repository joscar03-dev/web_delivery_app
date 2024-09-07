<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarritoItem extends Model
{
    use HasFactory;
    public function carrito()
    {
        return $this->belongsTo(Carrito::class);
    }

    public function plato()
    {
        return $this->belongsTo(Plato::class);
    }
}
