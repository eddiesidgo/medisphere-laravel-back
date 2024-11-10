<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class PacienteController extends Controller
{



    public function buscar_pacientes(Request $request)
{
    $query = $request->input('query');
    
    if (!empty($query)) { // Verifica que $query no esté vacío
        DB::enableQueryLog(); // Habilita el registro de consultas

        $Pacientes = Paciente::where('nombre', 'LIKE', "%{$query}%")
                          ->limit(10)
                          ->get();

        // dd(DB::getQueryLog()); // Usa esto solo para depuración temporal
        return response()->json($Pacientes); // Devuelve los resultados encontrados
    }

    return response()->json([]); // Retorna una respuesta vacía si $query está vacío
}



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Paciente::all();
        // return response()->json(Paciente::all(), 200);
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
        //api endopint to create a new paciente resource
        $paciente = new Paciente();
        $paciente->nombre = $request->nombre;
        $paciente->apellido = $request->apellido;
        $paciente->dui = $request->dui;
        $paciente->fecha_nacimiento = $request->fecha_nacimiento;
        $paciente->genero = $request->genero;
        $paciente->save();

        return response()->json($paciente, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Paciente $paciente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $paciente = Paciente::find($id);

        if (!$paciente) {
            return response()->json(['message' => 'Paciente no encontrado'], 404);
        }

        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'dui' => 'required|unique:pacientes,dui,' . $id,  // al actualizar se excluye el ID actual            'fecha_nacimiento' => 'required|date',
            'genero' => 'required|string',
        ]);

        $paciente->update($validatedData);

        return response()->json($paciente, 200);


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paciente $paciente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $paciente = Paciente::findOrFail($id);
        $paciente->delete();

        return response()->json([
            'message' => 'Paciente deleted successfully',
        ]);
    }
}
