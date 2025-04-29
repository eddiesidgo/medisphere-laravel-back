<?php

namespace App\Models;

use App\Models\FE;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Examen extends Model
{
    use HasFactory;

    protected $table = 'examenes';

    protected $fillable = [
     
    'Valor',
    'precio',
    'unidad_equi',
    'iva',
    'afecta'

    ];

   
    public function show_FE()
    {
        return $this->belongsTo(FE::class);
    }
}