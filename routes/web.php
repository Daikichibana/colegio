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

Route::get('/', function () {
    return view('index');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Rutas para inscripcion

Route::get('/inscripcion', [App\Http\Controllers\InscripcionController::class, 'index']);
Route::get('/inscripcion/registrar', [App\Http\Controllers\InscripcionController::class, 'store']);
<<<<<<< HEAD

//Rutas para apoderado
Route::get('/apoderado', [App\Http\Controllers\ApoderadoController::class, 'index']);
Route::post('/apoderado/registrar', [App\Http\Controllers\ApoderadoController::class, 'store']);
=======
>>>>>>> b5f2385c6078127ead3aaca6d059231d3ed1c66d
