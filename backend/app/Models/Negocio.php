<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Negocio extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'telefono',
        'direccion',
        'email',
        'tipo_negocio_id',
        'horario_atencion',
        'imagen',
        'hora_apertura',
        'hora_cierre',
        'estado',
    ];
    public function platos()
    {
        return $this->hasMany(Plato::class);
    }

    public function tipoNegocio()
    {
        return $this->belongsTo(TipoNegocio::class, 'tipo_negocio_id');
    }
    /* public function estaAbierto()
    {
        
        $horaActual = Carbon::now();
        $horaApertura = Carbon::createFromFormat('H:i:s', $this->hora_apertura);
        $horaCierre = Carbon::createFromFormat('H:i:s', $this->hora_cierre);
        

        return $horaActual->between($horaApertura, $horaCierre);
    } */
    public function getEstadoAttribute()
    {
        $horaActual = Carbon::now();

        // Verifica si hora_apertura o hora_cierre son nulos
        if (is_null($this->hora_apertura) || is_null($this->hora_cierre)) {
            return 'Cerrado';
        }

        try {
            $horaApertura = Carbon::createFromFormat('H:i:s', $this->hora_apertura);
            $horaCierre = Carbon::createFromFormat('H:i:s', $this->hora_cierre);
        } catch (\Exception $e) {
            // Si hay algún error en el formato, devuelve "Cerrado"
            return 'Cerrado';
        }

        // Si la hora de cierre es mayor que la hora de apertura, se maneja normalmente
        if ($horaCierre->greaterThan($horaApertura)) {
            return $horaActual->between($horaApertura, $horaCierre) ? 'Abierto' : 'Cerrado';
        }

        // Si la hora de cierre es menor que la hora de apertura, significa que cruza la medianoche
        if ($horaActual->greaterThanOrEqualTo($horaApertura) || $horaActual->lessThanOrEqualTo($horaCierre)) {
            return 'Abierto';
        }

        return 'Cerrado';
    }
}
