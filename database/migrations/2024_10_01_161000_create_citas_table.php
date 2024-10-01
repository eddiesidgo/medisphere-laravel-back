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
        Schema::create('citas', function (Blueprint $table) {
            $table->id();

            // Clave foránea para 'pacientes'
            $table->unsignedBigInteger('paciente_id');
            $table->foreign('paciente_id')
                  ->references('id')->on('pacientes')
                  ->onDelete('cascade'); // Opcional: elimina las citas si el paciente se elimina

            // Clave foránea para 'doctores'
            $table->unsignedBigInteger('doctor_id')->nullable();
            $table->foreign('doctor_id')
                  ->references('id')->on('doctors')
                  ->onDelete('set null'); // Opcional: establece doctor_id en null si el doctor se elimina

            $table->dateTime('fecha');
            $table->string('estado');
            $table->timestamp('created_at', 0)->useCurrent();
            $table->timestamp('updated_at', 0)->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};


