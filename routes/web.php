<?php

use App\Http\Controllers\GuiaController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\ReservaController;
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
    return view('sanlutour.principal');
})->name('index');
Route::get('/sobrenosotros', function () {
    return view('sanlutour.sobrenosotros');
})->name('sobrenosotros');
Route::get('/contacto', function () {
    return view('sanlutour.contacto');
})->name('contacto');


/**Estrellas***/
Route::post('/valguias', [GuiaController::class, 'valoracion'])->name('valoracion.guias');
Route::post('/valtour', [TourController::class, 'valoracion'])->name('valoracion.tour');

/* Tours individuales y completos */
Route::get('/tourindividual/{tour}',[TourController::class, 'show'])->name('tourindividual');
Route::get('/nuestrosguias', [GuiaController::class, 'guias'])->name('guias');

/**Tours individuales**/
Route::get('/gastrotours/{orden?}', [TourController::class, 'gastrotours'])->name('gastrotours');
Route::get('/freetours/{orden?}', [TourController::class, 'freetours'])->name('freetours');
Route::get('/cultutours/{orden?}',[TourController::class,'cultutours'])->name('cultutours');
Route::get('/deportours/{orden?}',[TourController::class,'deportours'])->name('deportours');


/* Cruds Modo admin */
/* Crud Tours */
Route::get('/tours',[TourController::class,
'index'])->name('crudtours');
Route::post('/tours',[TourController::class,'store'])->name('tours.store');
Route::post('/tours/{tour}',[TourController::class,
'update'])->name('tours.update');
Route::delete('/tours/{tour}',[TourController::class,
'destroy'])->name('tours.destroy');

/* Crud guias*/
Route::get('/guias',[GuiaController::class,
'index'])->name('crudguias');
Route::post('/guias',[GuiaController::class,'store'])->name('guias.store');
Route::post('/guias/{guia}',[GuiaController::class,
'update'])->name('guias.update');
Route::delete('/guias/{guia}',[GuiaController::class,
'destroy'])->name('guias.destroy');

/* Crud reservar */
Route::get('/reservas',[ReservaController::class,
'index'])->name('crudreservas');
Route::post('/reservas',[ReservaController::class,'store'])->name('reservas.store');
Route::post('/reservas/{reserva}',[ReservaController::class,
'update'])->name('reservas.update');
Route::delete('/reservas/{reserva}',[ReservaController::class,
'destroy'])->name('reservas.destroy');



Route::middleware(['auth:sanctum','verified'])->group(function () {
    Route::get('/dashboard', function(){ return view('dashboard');
    })->name('dashboard');


});

/* Route::middleware(['auth:sanctum', 'verified'])->get('/crudtours', function () {
    return view('crudtours');
    })->name('crudtours'); */

/* Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard'); */


/* Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return view('crudfree');
})->name('crudfree'); */
