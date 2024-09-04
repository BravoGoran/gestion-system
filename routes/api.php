<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

use App\Http\Controllers\Api\ApiClienteController;

Route::get('/clientes', [ApiClienteController::class, 'index']); // Obtener todos los clientes
Route::post('/clientes', [ApiClienteController::class, 'store']); // Crear un nuevo cliente
Route::get('/clientes/{id}', [ApiClienteController::class, 'show']); // Obtener un cliente por ID
Route::put('/clientes/{id}', [ApiClienteController::class, 'update']); // Actualizar un cliente por ID
Route::delete('/clientes/{id}', [ApiClienteController::class, 'destroy']); // Eliminar un cliente por ID

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
