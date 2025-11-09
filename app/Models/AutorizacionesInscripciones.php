<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class AutorizacionesInscripciones extends Model
{
    use HasFactory; 
    
    protected $table = 'autorizaciones_inscripciones';

    public $timestamps = true;
    
    protected $fillable = [ 
        "periodo", 
        'no_de_control',
        "tipo_autorizacion", 
        "motivo_autorizacion",
        "quien_autoriza", 
        "fecha_hora_autoriza",
        "materia_afectada",
        'cantidad'
    ];
    
    protected $casts = [
       "fecha_hora_autoriza" => 'datetime',
    ];

    /**
     * MUTATOR: Convertir automáticamente el formato de fecha
     * Se ejecuta cuando se asigna un valor a fecha_hora_autoriza
     */
   public function setFechaHoraAutorizaAttribute($value)
    {
        if ($value) {
            $this->attributes['fecha_hora_autoriza'] = Carbon::parse($value)->format('Y-m-d H:i:s');
        }
    }

    /**
     * ACCESSOR: Opcional - formatear la fecha al obtenerla
     * Se ejecuta cuando se lee el valor de fecha_hora_autoriza
     */
   
}
