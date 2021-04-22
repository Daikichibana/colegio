<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EstudianteController;
use App\Models\Apoderado;

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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Ruta Estudiante
Route::get('/estudiante',[App\Http\Controllers\EstudianteController::class, 'index']);
Route::post('/estudiante/registrar',[App\Http\Controllers\EstudianteController::class, 'store']);//[EstudianteController::class, 'store']'

//Route::put('/estudiante/modificar','EstudianteController@update');
//Route::get('/estudiante','EstudianteController@index');
//Route::put('/estudiante/eliminar','EstudianteController@delete');
//Route::get('/estudiante/selectEstudiante','EstudianteController@selectEstudiante');
//Rutas para inscripcion

// Ruta Inscripcion
Route::get('/inscripcion', [App\Http\Controllers\InscripcionController::class, 'index']);
Route::post('/inscripcion/registrar', [App\Http\Controllers\InscripcionController::class, 'store']);
Route::get('/inscripcion/obtenerDetalles',[App\Http\Controllers\InscripcionController::class, 'obtenerDetalles']);
Route::get('/inscripcion/obtenerCabecera',[App\Http\Controllers\InscripcionController::class, 'obtenerCabecera']);

//Rutas para apoderado
Route::get('/apoderado', [App\Http\Controllers\ApoderadoController::class, 'index']);
Route::post('/apoderado/registrar', [App\Http\Controllers\ApoderadoController::class, 'store']);

//rutas buscar Curso
Route::get('/frmbuscarcurso', [App\Http\Controllers\AsignacionCursoGestionController::class, 'index']);

//rutas buscar Curso
Route::get('/frmbuscarnotas', [App\Http\Controllers\NotaController::class, 'index']);
