<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'welcome')->name("index");

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\HoraTrabajadaController;
use App\Http\Controllers\auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('clientes', [ClienteController::class, 'index'])->name('clientes.index');
    Route::get('clientes/create', [ClienteController::class, 'create'])->name('clientes.create');
    Route::post('clientes', [ClienteController::class, 'store'])->name('clientes.store');
    Route::get('clientes/{cliente}', [ClienteController::class, 'show'])->name('clientes.show');
    Route::get('clientes/{cliente}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');
    Route::patch('clientes/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');
    Route::delete('clientes/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');
    Route::get('facturas/details', [FacturaController::class, 'details'])->name('facturas.details');
});

Route::middleware('auth')->group(function () {

    // Rutas para ProyectoController
    Route::get('proyectos', [ProyectoController::class, 'index'])->name('proyectos.index');
    Route::get('proyectos/create', [ProyectoController::class, 'create'])->name('proyectos.create');
    Route::post('proyectos', [ProyectoController::class, 'store'])->name('proyectos.store');
    Route::get('proyectos/{proyecto}', [ProyectoController::class, 'show'])->name('proyectos.show');
    Route::get('proyectos/{proyecto}/edit', [ProyectoController::class, 'edit'])->name('proyectos.edit');
    Route::patch('proyectos/{proyecto}', [ProyectoController::class, 'update'])->name('proyectos.update');
    Route::delete('proyectos/{proyecto}', [ProyectoController::class, 'destroy'])->name('proyectos.destroy');

    // Rutas para EmpleadoController
    Route::get('empleados', [EmpleadoController::class, 'index'])->name('empleados.index');
    Route::get('empleados/create', [EmpleadoController::class, 'create'])->name('empleados.create');
    Route::post('empleados', [EmpleadoController::class, 'store'])->name('empleados.store');
    Route::get('empleados/{empleado}', [EmpleadoController::class, 'show'])->name('empleados.show');
    Route::get('empleados/{empleado}/edit', [EmpleadoController::class, 'edit'])->name('empleados.edit');
    Route::patch('empleados/{empleado}', [EmpleadoController::class, 'update'])->name('empleados.update');
    Route::delete('empleados/{empleado}', [EmpleadoController::class, 'destroy'])->name('empleados.destroy');

    // Rutas para TareaController
    Route::get('tareas', [TareaController::class, 'index'])->name('tareas.index');
    Route::get('tareas/create', [TareaController::class, 'create'])->name('tareas.create');
    Route::post('tareas', [TareaController::class, 'store'])->name('tareas.store');
    Route::get('tareas/{tarea}', [TareaController::class, 'show'])->name('tareas.show');
    Route::get('tareas/{tarea}/edit', [TareaController::class, 'edit'])->name('tareas.edit');
    Route::patch('tareas/{tarea}', [TareaController::class, 'update'])->name('tareas.update');
    Route::delete('tareas/{tarea}', [TareaController::class, 'destroy'])->name('tareas.destroy');

    // Rutas para FacturaController
    Route::get('facturas', [FacturaController::class, 'index'])->name('facturas.index');
    Route::get('facturas/create', [FacturaController::class, 'create'])->name('facturas.create');
    Route::post('facturas', [FacturaController::class, 'store'])->name('facturas.store');
    Route::get('facturas/{factura}', [FacturaController::class, 'show'])->name('facturas.show');
    Route::get('facturas/{factura}/edit', [FacturaController::class, 'edit'])->name('facturas.edit');
    Route::patch('facturas/{factura}', [FacturaController::class, 'update'])->name('facturas.update');
    Route::delete('facturas/{factura}', [FacturaController::class, 'destroy'])->name('facturas.destroy');

    // Rutas para HoraTrabajadaController
    Route::get('horas', [HoraTrabajadaController::class, 'index'])->name('horas.index');
    Route::get('horas/create', [HoraTrabajadaController::class, 'create'])->name('horas.create');
    Route::post('horas', [HoraTrabajadaController::class, 'store'])->name('horas.store');
    Route::get('horas/{horaTrabajada}', [HoraTrabajadaController::class, 'show'])->name('horas.show');
    Route::get('horas/{horaTrabajada}/edit', [HoraTrabajadaController::class, 'edit'])->name('horas.edit');
    Route::patch('horas/{horaTrabajada}', [HoraTrabajadaController::class, 'update'])->name('horas.update');
    Route::delete('horas/{horaTrabajada}', [HoraTrabajadaController::class, 'destroy'])->name('horas.destroy');
});

// Rutas para AuthenticatedSessionController
Route::view('/login', 'auth.login')->name('login');
Route::post('/login', [AuthenticatedSessionController::class,'store'])->name('login.store');
Route::post('/logout', [AuthenticatedSessionController::class,'destroy'])->name('logout');

// Rutas para RegisteredUserController
Route::view('/registro', 'auth.registro')->name('registro');
Route::post('/registro', [RegisteredUserController::class,'store'])->name('registro.store');