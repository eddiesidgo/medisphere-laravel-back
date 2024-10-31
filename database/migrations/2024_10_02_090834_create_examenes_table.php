<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('examenes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('consulta_id'); // Relación con consultas
            $table->text('tipo_examen');
            $table->text('resultado')->nullable(); // Campo para registrar los resultados del examen
            $table->timestamps();

            // Relación con consultas (foreign key)
            $table->foreign('consulta_id')->references('id')->on('consultas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('examenes');
    }
};
