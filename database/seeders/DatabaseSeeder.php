<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\CitaSeeder;
use Database\Seeders\DoctorSeeder;
use Database\Seeders\ExamenSeeder;
use Database\Seeders\RecetaSeeder;
use Database\Seeders\ConsultaSeeder;
use Database\Seeders\PacienteSeeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('admin123'),
        ]);

        $this->call(PacienteSeeder::class);

        $this->call(DoctorSeeder::class);

        $this->call(CitaSeeder::class);

        $this->call(ConsultaSeeder::class);

        $this->call(RecetaSeeder::class);

        $this->call(ExamenSeeder::class);

    }
}
