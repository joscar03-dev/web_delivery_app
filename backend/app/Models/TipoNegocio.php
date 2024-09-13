<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoNegocio extends Model
{
    use HasFactory;
    protected $fillable = ['nombre'];
    protected $table = 'tipos_negocios';
    public function negocios () {
        return $this->hasMany(Negocio::class);
    }
}
