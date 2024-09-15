<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Negocio extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'telefono',
        'descripcion',
        'email',
        'tipo_negocio_id',
        'horario_atencion',
        'imagen',
        
    ];
    public function platos()
    {
        return $this->hasMany(Plato::class);
    }

    public function tipoNegocio()
    {
        return $this->belongsTo(TipoNegocio::class, 'tipo_negocio_id');
    }
}
