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
    return view('sanlutour.welcome');
})->name('index');

Route::get('/sobrenosotros', function () {
    return view('sanlutour.sobrenosotros');
})->name('sobrenosotros');

Route::get('/contacto', function () {
    return view('sanlutour.contacto');
})->name('contacto');

Route::get('/freetours', function () {
    return view('sanlutour.freetours');
})->name('freetours');

Route::get('/gastrotours', function () {
    return view('sanlutour.gastrotours');
})->name('gastrotours');

Route::get('/cultutours', function () {
    return view('sanlutour.cultutours');
})->name('cultutours');

Route::get('/deportours', function () {
    return view('sanlutour.deportours');
})->name('deportours');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
