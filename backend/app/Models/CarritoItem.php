<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarritoItem extends Model
{
    // Agrega las propiedades que pueden ser asignadas en masa
    protected $fillable = [
        'carrito_id',
        'producto_id',
        'cantidad',
        'precio_unitario',
        'total',
    ];
    use HasFactory;
    public function carrito()
    {
        return $this->belongsTo(Carrito::class);
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
}
