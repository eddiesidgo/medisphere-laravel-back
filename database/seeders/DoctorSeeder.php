<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Doctor::create([
            'nombre' => 'Juan',
            'apellido' => 'Perez',
            'especialidad' => 'Cardiología',
        ]);

        Doctor::create([
            'nombre' => 'Maria',
            'apellido' => 'Garcia',
            'especialidad' => 'Oncología',
        ]);

        Doctor::create([
            'nombre' => 'Pedro',
            'apellido' => 'Lopez',
            'especialidad' => 'Gastroenterología',
        ]);
    }
}
