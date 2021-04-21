<?php

use Illuminate\Support\Facades\Route;
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

//Rutas para inscripcion

Route::get('/inscripcion', [App\Http\Controllers\InscripcionController::class, 'index']);
Route::get('/inscripcion/registrar', [App\Http\Controllers\InscripcionController::class, 'store']);
//Rutas para apoderado
Route::get('/apoderado', [App\Http\Controllers\ApoderadoController::class, 'index']);
Route::post('/apoderado/registrar', [App\Http\Controllers\ApoderadoController::class, 'store']);

//rutas buscar Curso
Route::get('/frmbuscarcurso', [App\Http\Controllers\AsignacionCursoGestionController::class, 'index']);
