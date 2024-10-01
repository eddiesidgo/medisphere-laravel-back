<?php

namespace App\Models;

use App\Models\Cita;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Paciente extends Model
{
    use HasFactory;
    protected $table = 'pacientes';
    protected $fillable = ['nombre', 'apellido', 'dui', 'fecha_nacimiento', 'genero'];

     /**
     * Un paciente puede tener muchas citas.
     */
    public function citas()
    {
        return $this->hasMany(Cita::class);
    }
}
