<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Doctor::all();
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
        $doctor = new Doctor();
        $doctor->nombre = $request->nombre;
        $doctor->apellido = $request->apellido;
        $doctor->especialidad = $request->especialidad;
        $doctor->save();

        return response()->json(['message' => 'Doctor creado correctamente', $doctor], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Doctor $doctor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        //
        $doctor = Doctor::find($id);

        if (!$doctor) {
            return response()->json(['message' => 'Doctor no encontrado'], 404);
        }

        $doctor->nombre = $request->nombre;
        $doctor->apellido = $request->apellido;
        $doctor->especialidad = $request->especialidad;
        $doctor->save();

        return response()->json(['message' => 'Doctor actualizado correctamente', $doctor], 200);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Doctor $doctor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();

        return response()->json([
           'message' => 'Doctor eliminado correctamente',
        ]);
    }
}
