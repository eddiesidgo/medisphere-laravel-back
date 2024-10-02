<?php

namespace Database\Seeders;

use App\Models\Consulta;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ConsultaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Consulta::create([
            'cita_id' => 1, // ID de la cita asociada
            'diagnostico' => 'Paciente presenta síntomas leves de resfriado.'
        ]);

        Consulta::create([
            'cita_id' => 2,
            'diagnostico' => 'Revisión anual. Estado de salud general: bueno.'
        ]);
    }
}
