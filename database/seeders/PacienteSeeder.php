<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Paciente;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        Paciente::create([
            'nombre' => 'Rodolfo',
            'apellido' => 'Rojas',
            'dui' => '0319228939',
            'fecha_nacimiento' => '1989-12-31',
            'genero' => 'masculino',
        ]);

        Paciente::create([
            'nombre' => 'Lorena',
            'apellido' => 'Lopez',
            'dui' => '0520123456',
            'fecha_nacimiento' => '1990-05-15',
            'genero' => 'femenino',
        ]);

        Paciente::create([
            'nombre' => 'Carlos',
            'apellido' => 'Castillo',
            'dui' => '0411345678',
            'fecha_nacimiento' => '1991-07-20',
            'genero' =>'masculino',
        ]);

        Paciente::create([
            'nombre' => 'Maria',
            'apellido' => 'Martinez',
            'dui' => '0612456789',
            'fecha_nacimiento' => '1992-09-10',
            'genero' => 'femenino',
        ]);

    }
}
