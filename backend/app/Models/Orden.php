<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orden extends Model
{
    use HasFactory;
    protected $table = [
        'ordenes'
    ];

    public function items()
    {
        return $this->hasMany(OrdenItem::class);
    }
    public function cupon()
    {
        return $this->belongsToMany(Cupon::class, 'ordenes_cupones');
    }
}
