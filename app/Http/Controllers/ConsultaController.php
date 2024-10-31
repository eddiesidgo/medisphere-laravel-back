<?php

namespace App\Http\Controllers;

use App\Models\Consulta;
use Illuminate\Http\Request;

class ConsultaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $consulta = Consulta::with(['cita'])->get();
        return response()->json($consulta, 200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        /// Validamos los datos de la consulta
        $data = $request->validate([
            'cita_id' => 'required|exists:citas,id',
            'diagnostico' => 'nullable|string'
        ]);

        // Creamos la consulta
        $consulta = Consulta::create($data);

        return response()->json($consulta, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Obtenemos la consulta con sus recetas y exámenes
        $consulta = Consulta::with(['recetas', 'examenes'])->findOrFail($id);
        return response()->json($consulta);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $consulta = Consulta::findOrFail($id);

        // Validamos y actualizamos los datos
        $data = $request->validate([
            'diagnostico' => 'nullable|string'
        ]);

        $consulta->update($data);

        return response()->json($consulta);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Consulta $consulta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Consulta $consulta)
    {
        //
    }
}
