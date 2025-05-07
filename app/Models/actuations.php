<?php

namespace App\Models;

use APP//FE
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Fe extends Model
{
    use HasFactory;

    protected $fillable = ['tippfactura', 'correlativo'];

   
    public function facturations_validafioz()
    {
        if(tipo factura == 'CCF' && 'NC')
then precio * 0.13 / 1.13 

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