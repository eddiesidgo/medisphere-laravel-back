<?php

namespace Database\Seeders;

use App\Models\Examen;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ExamenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Examen::create([
            'consulta_id' => 1, // ID de la consulta asociada
            'tipo_examen' => 'Hemograma',
            'resultado' => 'Normal'
        ]);

        Examen::create([
            'consulta_id' => 2,
            'tipo_examen' => 'Electrocardiograma',
            'resultado' => 'Sin alteraciones'
        ]);
    }
}
