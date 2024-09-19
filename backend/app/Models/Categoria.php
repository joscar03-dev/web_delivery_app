<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;
    protected $fillable = ['nombre'];
    public function negocio()
    {
        return $this->belongsTo(Negocio::class, 'negocio_id');
    }
    public function productos()
    {
        return $this->hasMany(Producto::class, 'categoria_id');
    }
}
