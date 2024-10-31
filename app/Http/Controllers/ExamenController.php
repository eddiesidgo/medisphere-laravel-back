<?php

namespace App\Http\Controllers;

use App\Models\Examen;
use Illuminate\Http\Request;

class ExamenController extends Controller
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
        $data = $request->validate([
            'consulta_id' => 'required|exists:consultas,id',
            'tipo_examen' => 'required|string',
            'resultado' => 'nullable|string'
        ]);

        $examen = Examen::create($data);

        return response()->json($examen, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Examen $examen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $examen = Examen::findOrFail($id);

        $data = $request->validate([
            'tipo_examen' => 'required|string',
            'resultado' => 'nullable|string'
        ]);

        $examen->update($data);

        return response()->json($examen);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Examen $examen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Examen $examen)
    {
        //
    }
}
