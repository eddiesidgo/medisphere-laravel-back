<?php

namespace App\Models;

use App\Models\Cita;
use App\Models\Examen;
use App\Models\Receta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Consulta extends Model
{
    use HasFactory;

    protected $fillable = ['cita_id', 'diagnostico'];

    // Relación con Cita
    public function cita()
    {
        return $this->belongsTo(Cita::class);
    }

    // Relación con Recetas (una consulta puede tener muchas recetas)
    public function recetas()
    {
        return $this->hasMany(Receta::class);
    }

    // Relación con Exámenes (una consulta puede tener muchos exámenes)
    public function examenes()
    {
        return $this->hasMany(Examen::class);
    }
}
