<?php

use App\Http\Controllers\GuiaController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\ReservaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PayPalController;
use App\Http\Controllers\ViajeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Rutas Sanlutours
|
*/

/**
 * Ruta Index
 */
Route::get('/', function () {
    return view('sanlutour.principal');
})->name('index');
/**
 * Rutas sobrenosotros
 */
Route::get('/sobrenosotros', function () {
    return view('sanlutour.sobrenosotros');
})->name('sobrenosotros');
/**
 * Rutas contacto
 */
Route::get('/contacto', function () {
    return view('sanlutour.contacto');
})->name('contacto');
/**
 * Rutas guías
 */
Route::get('/nuestrosguias', [GuiaController::class, 'guias'])->name('guias');

/**
 * Rutas comentarios
*/
Route::get('/comentarios', function () {
    $comentarios = DB::table('comentarios')->get();
    echo json_encode($comentarios);
});
Route::post('/comentario', [TourController::class, 'crearComentarios'])->name('comentarios.store');

/**
 * Ruta valoración Estrellas guías y tours
 */
Route::post('/valguias', [GuiaController::class, 'valoracion'])->name('valoracion.guias');
Route::post('/valtour', [TourController::class, 'valoracion'])->name('valoracion.tour');

/**
 * Tours individuales
 */
Route::post('/tourindividual/{tour}', [TourController::class, 'show'])->name('tourindividual');

/**
 * Tipos de tours
 */
Route::get('/gastrotours', [TourController::class, 'gastrotours'])->name('gastrotours');
Route::get('/freetours', [TourController::class, 'freetours'])->name('freetours');
Route::get('/cultutours', [TourController::class, 'cultutours'])->name('cultutours');
Route::get('/deportours', [TourController::class, 'deportours'])->name('deportours');


/**
 * Ruta para dashboard usuarios administrador o usuales
*/
Route::get('/dashboard', function () {
    if (Auth::user()->administrador != null) {
        return redirect()->route('crudtours');
    }
    return redirect()->route('reservasusuario');
})->middleware(['auth'])->name('dashboard');

Route::post('/tours/asocguia/{tour}', [
    TourController::class,
    'asocGuia'
])->name('asocguia');

/**
 * Modo administrador
*/
Route::middleware(['auth:sanctum', 'can:esAdmin'])->group(function () {
    /*Crud tours*/
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

    /* Crud Viajes */
    Route::get('/viajes', [
        ViajeController::class,
        'index'
    ])->name('crudviajes');
    Route::post('/viajes', [ViajeController::class, 'store'])->name('viajes.store');
    Route::post('/viajes/{viaje}', [
        ViajeController::class,
        'update'
    ])->name('viajes.update');
    Route::delete('/viajes/{viaje}', [
        ViajeController::class,
        'destroy'
    ])->name('viajes.destroy');
});

/**
 * Modo usuario habitual
*/
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

/**
 * Paypal
*/
Route::get('create-transaction', [PayPalController::class, 'createTransaction'])->name('createTransaction');
Route::post('process-transaction', [PayPalController::class, 'processTransaction'])->name('processTransaction');#pulsa botón
Route::get('success-transaction', [PayPalController::class, 'successTransaction'])->name('successTransaction');
Route::get('cancel-transaction', [PayPalController::class, 'cancelTransaction'])->name('cancelTransaction');

/**
 * Tramite reserva y pago
*/
Route::post('/tramitereserva/{tour}', [ReservaController::class, 'tramitar'])->name('tramitereserva');
Route::get('/tramitepago', [ReservaController::class, 'pagar'])->name('realizarpago');

/**
 * Email
 */
Route::post('/correo', [MailController::class,'sendEmail'])->name('enviarCorreo');

/**Chat bot */
Route::get('/chatBot', function () {
    return view('sanlutour.bot');
})->name('bot');
