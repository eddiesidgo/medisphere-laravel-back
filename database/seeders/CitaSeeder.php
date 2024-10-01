<?php

namespace Database\Seeders;

use App\Models\Cita;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CitaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Cita::create([
            'paciente_id' => 1,
            'doctor_id' => 1,
            'fecha' => '2022-01-15 10:00:00', //yyyy-mm-dd hh:mm:ss
            'estado' => 'pendiente',
        ]);

        Cita::create([
            'paciente_id' => 2,
            'doctor_id' => 2,
            'fecha' => '2022-01-20 12:00:00',
            'estado' => 'confirmada',
        ]);

        Cita::create([
            'paciente_id' => 3,
            'doctor_id' => 3,
            'fecha' => '2022-01-25 14:00:00',
            'estado' => 'cancelada',
        ]);
    }
}
