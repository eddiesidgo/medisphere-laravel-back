<?php

namespace Database\Seeders;

use App\Models\Receta;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RecetaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Receta::create([
            'consulta_id' => 1, // ID de la consulta asociada
            'medicamento' => 'Paracetamol',
            'dosis' => '500mg',
            'frecuencia' => 'Cada 8 horas'
        ]);

        Receta::create([
            'consulta_id' => 2,
            'medicamento' => 'Ibuprofeno',
            'dosis' => '200mg',
            'frecuencia' => 'Cada 12 horas'
        ]);
    }
}
