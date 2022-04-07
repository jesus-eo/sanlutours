<?php

use App\Http\Controllers\GuiaController;
use App\Http\Controllers\TourController;
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

Route::get('/tourindividual/{tour}',[TourController::class, 'show'])->name('tourindividual');

Route::get('/guias', [GuiaController::class, 'index'])->name('guias');

Route::get('/gastrotours/{orden?}', [TourController::class, 'gastrotours'])->name('gastrotours');

Route::get('/freetours/{orden?}', [TourController::class, 'freetours'])->name('freetours');

Route::get('/cultutours/{orden?}',[TourController::class,
'cultutours'])->name('cultutours');

Route::get('/deportours/{orden?}',[TourController::class,
'deportours'])->name('deportours');




Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
