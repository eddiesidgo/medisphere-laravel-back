<?php

namespace App\Models;

use App\Models\Consulta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Examen extends Model
{
    use HasFactory;

    protected $table = 'examenes';

    protected $fillable = ['consulta_id', 'tipo_examen', 'resultado'];

    // Relación con Consulta
    public function consulta()
    {
        return $this->belongsTo(Consulta::class);
    }
}
