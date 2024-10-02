<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CitaController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\ExamenController;
use App\Http\Controllers\RecetaController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\PacienteController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [AuthController::class, 'register']);

Route::post('login', [AuthController::class, 'login']);

Route::get('pacientes', [PacienteController::class, 'index']);

Route::post('pacientes/create', [PacienteController::class, 'store']);

Route::put('pacientes/{id}', [PacienteController::class, 'edit']);

Route::delete('pacientes/{id}', [PacienteController::class, 'destroy']);

Route::get('doctores', [DoctorController::class, 'index']);

Route::post('doctores/create', [DoctorController::class, 'store']);

Route::put('doctores/{id}', [DoctorController::class, 'edit']);

Route::delete('doctores/{id}', [DoctorController::class, 'destroy']);

Route::get('citas', [CitaController::class, 'index']);

Route::post('citas/create', [CitaController::class, 'store']);

Route::put('citas/{id}', [CitaController::class, 'edit']);

Route::delete('citas/{id}', [CitaController::class, 'destroy']);

// Rutas para Consultas
Route::post('/consultas', [ConsultaController::class, 'store']);
Route::get('/consultas/{id}', [ConsultaController::class, 'show']);
Route::get('/consultas', [ConsultaController::class, 'index']);
Route::put('/consultas/{id}', [ConsultaController::class, 'edit']);

// Rutas para Recetas
Route::post('/recetas', [RecetaController::class, 'store']);
Route::put('/recetas/{id}', [RecetaController::class, 'edit']);

// Rutas para Exámenes
Route::post('/examenes', [ExamenController::class, 'store']);
Route::put('/examenes/{id}', [ExamenController::class, 'edit']);



Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::get('logout', [AuthController::class, 'logout']);

});
