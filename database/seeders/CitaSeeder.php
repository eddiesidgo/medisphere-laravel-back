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
            'title' => 'Cita 1',
            'date' => '2024-10-01 10:00:00', //yyyy-mm-dd hh:mm:ss
            'estado' => 'pendiente',
        ]);

        Cita::create([
            'paciente_id' => 2,
            'doctor_id' => 2,
            'title' => 'Cita 2',
            'date' => '2024-10-02 12:00:00',
            'estado' => 'confirmada',
        ]);

        Cita::create([
            'paciente_id' => 3,
            'doctor_id' => 3,
            'title' => 'Cita 3',
            'date' => '2024-10-03 14:00:00',
            'estado' => 'cancelada',
        ]);
    }
}
