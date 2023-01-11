<?php

use Illuminate\Support\Facades\Route;
//agregamos los siguientes controladores
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\InsidenteController;
use App\Http\Controllers\RegpasajerosController;

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
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//y creamos un grupo de rutas protegidas para los controladores
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('blogs', BlogController::class);
    Route::resource('vehiculos', VehiculoController::class);
    Route::resource('personas', PersonaController::class);
    Route::resource('exams', ExamController::class);
    Route::resource('insidentes', InsidenteController::class);
    Route::resource('regpasajeros', RegpasajerosController::class);
});

// Se colocan las rutas personalizadas de las rutas del controlador resource que la contiene, 
// fue la manera que encontre de que funcionaran y no dieran problemas las rutas resource

// //ruta personalizada para activar o desactivar persona
Route::get('/personas/{persona}/{estado}',  [App\Http\Controllers\PersonaController::class, 'updateEstado'] )->name('personas.estado');

// //ruta personalizada para activar o desactivar vehiculo
Route::get('/vehiculos/{vehiculo}/{estado}',  [App\Http\Controllers\VehiculoController::class, 'updateEstado'] )->name('vehiculos.estado');

// //ruta personalizada para activar o desactivar vehiculo y mostrar
Route::get('/exams/{exam}/{estado}',  [App\Http\Controllers\ExamController::class, 'updateEstado'] )->name('exams.estado');
Route::get('/exams/{id}',  [App\Http\Controllers\ExamController::class, 'show'] )->name('exams.examenes');

// //ruta personalizada para activar o desactivar incidencia, y mostrar
// Route::get('/insidentes/{insidente}/{estado}',  [App\Http\Controllers\InsidenteController::class, 'updateEstado'] )->name('insidentes.estado');
Route::get('/insidentes/{id}',  [App\Http\Controllers\InsidenteController::class, 'show'] )->name('insidentes.insidentes');

Route::get('/insidentes/{insidente}/duracion',  [App\Http\Controllers\InsidenteController::class, 'duracion'] )->name('insidentes.duracion');
Route::put('/insidentes/{insidente}',  [App\Http\Controllers\InsidenteController::class, 'actualizar'] )->name('insidentes.actualizar');
Route::get('/insidentes/placas',  [App\Http\Controllers\InsidenteController::class, 'getPlaca'] )->name('insidentes.placas');



