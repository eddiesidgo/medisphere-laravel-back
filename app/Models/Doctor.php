<?php

namespace App\Models;

use App\Models\Cita;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Doctor extends Model
{
    use HasFactory;
    protected $table = 'doctors';
    protected $fillable = ['nombre', 'apellido', 'especialidad'];

    /**
     * Un doctor puede tener muchas citas.
     */
    public function citas()
    {
        return $this->hasMany(Cita::class);
    }
}
