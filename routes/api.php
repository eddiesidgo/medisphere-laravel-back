<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorController;
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



Route::group(['middleware' => 'auth:sanctum'], function () {

    Route::get('logout', [AuthController::class, 'logout']);

});
