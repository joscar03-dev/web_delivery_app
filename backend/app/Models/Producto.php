<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'productos';
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'imagen',
        'categoria_id',
        'negocio_id'
    ];
    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }
    public function opciones()
    {
        return $this->hasMany(OpcionPlato::class);
    }
    public function negocio()
    {
        return $this->belongsToThrough(Negocio::class, Categoria::class, 'negocio_id', 'categoria_id');
    }
}
