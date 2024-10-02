<?php

namespace App\Http\Controllers;

use App\Models\Receta;
use Illuminate\Http\Request;

class RecetaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Receta $receta)
    {
        $data = $request->validate([
            'consulta_id' => 'required|exists:consultas,id',
            'medicamento' => 'required|string',
            'dosis' => 'required|string',
            'frecuencia' => 'required|string'
        ]);

        $receta = Receta::create($data);

        return response()->json($receta, 201);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $receta = Receta::findOrFail($id);

        $data = $request->validate([
            'medicamento' => 'required|string',
            'dosis' => 'required|string',
            'frecuencia' => 'required|string'
        ]);

        $receta->update($data);

        return response()->json($receta);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Receta $receta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Receta $receta)
    {
        //
    }
}
