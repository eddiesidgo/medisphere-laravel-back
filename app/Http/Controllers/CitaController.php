<?php

namespace App\Http\Controllers;

use App\Models\Cita;
use App\Models\Doctor;
use App\Models\Paciente;
use Illuminate\Http\Request;

class CitaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $citas = Cita::with(['doctor', 'paciente'])->get();
        return response()->json($citas, 200);
        // return Cita::all();
        // return response()->json(Cita::all(), 200);
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
        $cita = new Cita();
        $cita->doctor_id = $request->doctor_id;
        $cita->paciente_id = $request->paciente_id;
        $cita->fecha = $request->fecha;
        $cita->estado = $request->estado;
        $cita->save();

        return response()->json($cita, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cita $cita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        //
        $cita = Cita::find($id);

        if (!$cita) {
            return response()->json(['message' => 'Cita no encontrada'], 404);
        }

        $cita->doctor_id = $request->doctor_id;
        $cita->paciente_id = $request->paciente_id;
        $cita->fecha = $request->fecha;
        $cita->estado = $request->estado;
        $cita->save();

        return response()->json($cita, 200);


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cita $cita)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $cita = Cita::find($id);

        if (!$cita) {
            return response()->json(['message' => 'Cita no encontrada'], 404);
        }

        $cita->delete();

        return response()->json(['message' => 'Cita eliminada exitosamente'], 204);
    }
}
