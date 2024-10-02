<?php

namespace App\Models;

use App\Models\Consulta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Receta extends Model
{
    use HasFactory;

    protected $fillable = ['consulta_id', 'medicamento', 'dosis', 'frecuencia'];

    // Relación con Consulta
    public function consulta()
    {
        return $this->belongsTo(Consulta::class);
    }
}
