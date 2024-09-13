<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plato extends Model
{
    use HasFactory;
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
        return $this->belongsTo(Categoria::class);
    }
    public function opciones()
    {
        return $this->hasMany(OpcionPlato::class);
    }
    public function negocio(){
        return $this->belongsTo(Negocio::class);
    }
}
