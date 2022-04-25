<?php

use App\Http\Controllers\GuiaController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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

/**Index, sobre nosotros,contacto y guias */
Route::get('/', function () {
    return view('sanlutour.principal');
})->name('index');
Route::get('/sobrenosotros', function () {
    return view('sanlutour.sobrenosotros');
})->name('sobrenosotros');
Route::get('/contacto', function () {
    return view('sanlutour.contacto');
})->name('contacto');
Route::get('/nuestrosguias', [GuiaController::class, 'guias'])->name('guias');

/* Comentarios */
Route::get('/comentarios', function () {
    $comentarios = DB::table('comentarios')->get();
    echo json_encode($comentarios);
});
Route::post('/comentario', [TourController::class, 'crearComentarios'])->name('comentarios.store');

/*Tramite reserva y pago*/
Route::post('/tramitereserva/{tour}', [ReservaController::class, 'tramitar'])->name('tramitereserva');
Route::post('/tramitepago', [ReservaController::class, 'pagar'])->name('realizarpago');

/**Estrellas***/
Route::post('/valguias', [GuiaController::class, 'valoracion'])->name('valoracion.guias');
Route::post('/valtour', [TourController::class, 'valoracion'])->name('valoracion.tour');

/* Tours individuales y completos */
Route::get('/tourindividual/{tour}', [TourController::class, 'show'])->name('tourindividual');


/**Tipos de tours **/
Route::get('/gastrotours/{orden?}', [TourController::class, 'gastrotours'])->name('gastrotours');
Route::get('/freetours/{orden?}', [TourController::class, 'freetours'])->name('freetours');
Route::get('/cultutours/{orden?}', [TourController::class, 'cultutours'])->name('cultutours');
Route::get('/deportours/{orden?}', [TourController::class, 'deportours'])->name('deportours');


/* Ruta para usuarios administrador o normales */
Route::get('/dashboard', function () {
    if (Auth::user()->administrador != null) {
        return redirect()->route('crudtours');
    }
    return redirect()->route('reservasusuario');
})->middleware(['auth'])->name('dashboard');


/* -----Modo administrador---- */
Route::middleware(['auth:sanctum', 'can:esAdmin'])->group(function () {
    /*---Cruds Modo admin---*/
    /* Crud Tours */
    Route::get('/tours', [
        TourController::class,
        'index'
    ])->name('crudtours');
    Route::post('/tours', [TourController::class, 'store'])->name('tours.store');
    Route::post('/tours/{tour}', [
        TourController::class,
        'update'
    ])->name('tours.update');
    Route::delete('/tours/{tour}', [
        TourController::class,
        'destroy'
    ])->name('tours.destroy');

    /* Crud guias*/
    Route::get('/guias', [
        GuiaController::class,
        'index'
    ])->name('crudguias');
    Route::post('/guias', [GuiaController::class, 'store'])->name('guias.store');
    Route::post('/guias/{guia}', [
        GuiaController::class,
        'update'
    ])->name('guias.update');
    Route::delete('/guias/{guia}', [
        GuiaController::class,
        'destroy'
    ])->name('guias.destroy');

    /* Crud reservar */
    Route::get('/reservasadmin', [
        ReservaController::class,
        'index'
    ])->name('crudreservas');
    Route::post('/reservasadmin', [ReservaController::class, 'store'])->name('reservas.store');
    Route::post('/reservasadmin/{reserva}', [
        ReservaController::class,
        'update'
    ])->name('reservas.update');
    Route::delete('/reservasadmin/{reserva}', [
        ReservaController::class,
        'destroy'
    ])->name('reservas.destroy');

    /* Crud Usuario */
    Route::get('/usuarios', [
        UserController::class,
        'index'
    ])->name('crudusuarios');
    Route::post('/usuarios', [UserController::class, 'store'])->name('usuario.store');
    Route::post('/usuarios/{usuario}', [UserController::class,'update'])->name('usuarios.update');
    Route::delete('/usuarios/{usuario}', [UserController::class,'destroy'])->name('usuario.destroy');
});

/*-----Modo usuario------- */
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/reservas', [
        ReservaController::class,
        'indexusuario'
    ])->name('reservasusuario');
    Route::delete('/reservas/{reserva}', [
        ReservaController::class,
        'destroy'
    ])->name('reservasusuario.destroy');
});

